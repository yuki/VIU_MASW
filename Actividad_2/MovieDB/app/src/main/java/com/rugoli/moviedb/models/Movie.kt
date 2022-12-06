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

//
class Movie(private val movieService: MoviesInterface, private val moviesDataStore: DataStore<MovieStore>) {

    private val coroutineScope = CoroutineScope(Job() + Dispatchers.IO)

    private val _movies = MutableStateFlow<List<Movie>>(listOf())
    var movies = _movies as StateFlow<List<com.rugoli.moviedb.dataclass.Movie>>
    //var movies = _movies as List<com.rugoli.moviedb.dataclass.Movie>

    init {
        d { "rugolid:  Movie init" }

//        coroutineScope.launch {
//            moviesDataStore.data
//                .map { it.initialized }
//                .filter { !it }
//                .first {
//                    d { "Initialize data store..." }
//                    initDataStore()
//                    return@first true
//                }
//        }
    }

    private fun initDataStore() {
        d { "rugolid:  Movie initDataStore...start" }
        // create moshi parser
        val moshi = Moshi.Builder()
            .add(KotlinJsonAdapterFactory())
            .build()
        val type = Types.newParameterizedType(List::class.java, Movie::class.java)
        val adapter = moshi.adapter<List<com.rugoli.moviedb.dataclass.Movie>>(type)

        // read the json
        //val moviesFromJson: List<Movie> = adapter.fromJson(this@Movie.movies)!!
        val moviesFromJson: List<com.rugoli.moviedb.dataclass.Movie> = adapter.fromJson("[{}]")!!

        // create the storedAnimals list
        val moviesToStore = moviesFromJson.map { it.asStoredMovie() }

        // save data to data store
        coroutineScope.launch {
            moviesDataStore.updateData { animalStore ->
                animalStore.toBuilder()
                    .addAllMovies(moviesToStore)
                    .setInitialized(true)
                    .build()
            }
        }
        d { "rugolid:  Movie initDataStore...end" }
    }

    fun loadData() {
        d { "rugolid:  Movie loadData...start" }
        coroutineScope.launch {
            try {
                var movies = movieService.downloadMovies()
                d { "rugolid: Movies actually downloaded now: " + movies.toString() }
            } catch (e: HttpException) {
                e(e)
            }
        }
        d { "rugolid: loadData...end" }
    }

}