package com.rugoli.moviedb.models

import androidx.datastore.core.DataStore
import com.github.ajalt.timberkt.d
import com.github.ajalt.timberkt.e
import com.rugoli.moviedb.MovieStore
import com.rugoli.moviedb.interfaces.MoviesInterface
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.Job
import kotlinx.coroutines.flow.*
import kotlinx.coroutines.launch
import retrofit2.HttpException


class Movie(private val movieService: MoviesInterface, private val moviesDataStore: DataStore<MovieStore>) {

    private val coroutineScope = CoroutineScope(Job() + Dispatchers.IO)

    private val _movies = MutableStateFlow<List<com.rugoli.moviedb.dataclass.Movie>>(listOf())
    var movies = _movies as StateFlow<List<com.rugoli.moviedb.dataclass.Movie>>
    //var movies = _movies as List<com.rugoli.moviedb.dataclass.Movie>

    init {
        d { "rugolid:  Movie init" }

        coroutineScope.launch {
            moviesDataStore.data
                .collect { movieStore ->
                    d { "rugolid: Movies count: ${movieStore.moviesCount}" }
                    if (movieStore.moviesCount == 0) {
                        d{"rugolid: no more movies wee need tod download them"}
                        downloadMovies()
                    }
                    val movies = movieStore.moviesList.map {
                        com.rugoli.moviedb.dataclass.Movie(
                            it.id,
                            it.name,
                            it.release,
                            it.playtime,
                            it.description,
                            it.plot,
                            it.posterUrl,
                            it.gifUrl
                        )
                    }
                    _movies.value = movies
                }
        }
    }

    //download movies from internet and insert into database
    fun downloadMovies() {
        // get the data and store
        coroutineScope.launch {
            d { "rugolid:  Movie loadData from internet...start" }
            try {
                // download movies from internet
                var movies = movieService.downloadMovies()
                d { "rugolid: Movies actually downloaded now: " + movies.toString() }
                // create the storedMovies list
                val moviesToStore = movies.map { it.asStoredMovie() }
                // store them
                moviesDataStore.updateData { movieStore ->
                    movieStore.toBuilder()
                        .addAllMovies(moviesToStore)
                        .build()
                }

            } catch (e: HttpException) {
                e(e)
            }
            d { "rugolid: loadData...end" }
        }
    }

    fun removeMovie(movie: com.rugoli.moviedb.dataclass.Movie) {
        val toStoreMovies = movies.value
            .filter { it.id != movie.id }
            .map { it.asStoredMovie() }

        coroutineScope.launch {
            moviesDataStore.updateData { movieStore ->
                movieStore.toBuilder()
                    .clearMovies()
                    .addAllMovies(toStoreMovies)
                    .build()
            }
        }
    }

}