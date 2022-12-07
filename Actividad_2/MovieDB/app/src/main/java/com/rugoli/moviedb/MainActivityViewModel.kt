package com.rugoli.moviedb

import android.app.Application
import androidx.lifecycle.AndroidViewModel
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.github.ajalt.timberkt.d
import com.rugoli.moviedb.models.Movie
import kotlinx.coroutines.launch

class MainActivityViewModel(application: Application, val model: Movie) : ViewModel() {

    val movies = model.movies

    fun removeMovie(movie: com.rugoli.moviedb.dataclass.Movie) {
        model.removeMovie(movie)
    }

}