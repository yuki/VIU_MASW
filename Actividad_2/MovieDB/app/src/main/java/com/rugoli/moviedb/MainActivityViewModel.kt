package com.rugoli.moviedb

import android.app.Application
import androidx.lifecycle.AndroidViewModel
import androidx.lifecycle.viewModelScope
import com.github.ajalt.timberkt.d
import com.rugoli.moviedb.models.Movie
import kotlinx.coroutines.launch

class MainActivityViewModel(application: Application, val model: Movie) : AndroidViewModel(application) {

    fun loadData() {
        d { "rugolid: main activity view MODEL loadData" }
        viewModelScope.launch {  }
        model.loadData()
    }

}