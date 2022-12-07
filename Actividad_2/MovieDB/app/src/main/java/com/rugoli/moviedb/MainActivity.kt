package com.rugoli.moviedb

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import androidx.lifecycle.lifecycleScope
import androidx.recyclerview.widget.RecyclerView
import com.github.ajalt.timberkt.d
import org.koin.androidx.viewmodel.ext.android.viewModel

class MainActivity : AppCompatActivity() {

    private val viewModel: MainActivityViewModel by viewModel()

    private lateinit var movieAdapter: MovieAdapter

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        d { "rugolid: main activity onCreate" }

        // crate the adapter
        movieAdapter = MovieAdapter(
            movieSelected = {
                d { "Selected movie $it!!!" }
            },
            removeMovie = {
                d { "Remove movie $it !!!" }
                removeMovie(it)
            }
        )

        // set the adapter
        findViewById<RecyclerView>(R.id.movieList).adapter = movieAdapter

        // subscribe to data changes
        lifecycleScope.launchWhenResumed {
            viewModel.movies.collect {
                // submit list
                movieAdapter.submitList(it)
            }
        }

    }

    private fun removeMovie(movie: com.rugoli.moviedb.dataclass.Movie) {
        viewModel.removeMovie(movie)
    }
}