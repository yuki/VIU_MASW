package com.rugoli.moviedb.models

import androidx.datastore.core.DataStore
import com.github.ajalt.timberkt.d
import com.github.ajalt.timberkt.e
import com.rugoli.moviedb.MovieStore
import com.rugoli.moviedb.interfaces.MoviesInterface
import com.squareup.moshi.Moshi
import com.squareup.moshi.Types
import com.squareup.moshi.kotlin.reflect.KotlinJsonAdapterFactory
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
                .map { it.initialized }
                .filter { !it }
                .first {
                    initDataStore()
                    return@first true
                }
        }

        coroutineScope.launch {
            moviesDataStore.data
                .collect { movieStore ->
                    d { "rugolid: Movies count: ${movieStore.moviesCount}" }
                    if (movieStore.moviesCount == 0) {
                        d{"rugolid: no more movies"}
                        // TODO: if the database is empty, download again the json from internet
                        // the database is empty, we set "initialized" to false.
                        moviesDataStore.updateData { movieStore ->
                            movieStore.toBuilder()
                                .setInitialized(false)
                                .build()
                        }
//                        downloadMovies()
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

    private fun initDataStore() {
        d { "rugolid:  Movie initDataStore...start" }
        // create moshi parser
        val moshi = Moshi.Builder()
            .add(KotlinJsonAdapterFactory())
            .build()
        val type = Types.newParameterizedType(List::class.java, com.rugoli.moviedb.dataclass.Movie::class.java)
        val adapter = moshi.adapter<List<com.rugoli.moviedb.dataclass.Movie>>(type)

        downloadMovies()

        d { "rugolid:  Movie initDataStore...end" }
    }

    //download movies from internet and insert into database
    fun downloadMovies() {
        // get the data and store
        coroutineScope.launch {
            d { "rugolid:  Movie loadData from internet...start" }
            try {
                var movies = movieService.downloadMovies()
                d { "rugolid: Movies actually downloaded now: " + movies.toString() }
                // create the storedMovies list
                val moviesToStore = movies.map { it.asStoredMovie() }

                // if the dataStore is not initialized, it means it's empty. So we store the data.
                val isInitialized: Boolean = moviesDataStore.data.map { movieStore -> movieStore.initialized }.toString().toBoolean()
                if (isInitialized == false) {
                    // store the data
                    moviesDataStore.updateData { movieStore ->
                        movieStore.toBuilder()
                            .addAllMovies(moviesToStore)
                            .setInitialized(true)
                            .build()
                    }
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