package com.rugoli.moviedb.models

import com.github.ajalt.timberkt.d
import com.github.ajalt.timberkt.e
import com.rugoli.moviedb.interfaces.MoviesInterface
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.Job
import kotlinx.coroutines.launch
import retrofit2.HttpException


class Movie(private val movieService: MoviesInterface) {

    private val coroutineScope = CoroutineScope(Job() + Dispatchers.IO)

    fun loadData() {
        d { "rugolid: loadData...start" }
        coroutineScope.launch {
            try {
                val movies = movieService.downloadMovies()
                d { "rugolid: Movies actually downloaded now: $movies" }
            } catch (e: HttpException) {
                e(e)
            }
        }
        d { "rugolid: loadData...end" }
    }

}