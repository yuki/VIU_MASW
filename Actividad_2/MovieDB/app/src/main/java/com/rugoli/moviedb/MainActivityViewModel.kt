package com.rugoli.moviedb

import android.app.Application
import androidx.lifecycle.AndroidViewModel
import androidx.lifecycle.viewModelScope
import com.rugoli.moviedb.models.Movie
import kotlinx.coroutines.launch

class MainActivityViewModel(application: Application, val model: Movie) :
    AndroidViewModel(application) {

    fun loadData() {
        viewModelScope.launch {  }
        model.loadData()
    }

}