package com.rugoli.moviedb

import android.net.Uri
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageButton
import android.widget.ImageView
import android.widget.TextView
import com.rugoli.moviedb.dataclass.Movie

import androidx.recyclerview.widget.DiffUtil
import androidx.recyclerview.widget.ListAdapter
import androidx.recyclerview.widget.RecyclerView
import com.github.ajalt.timberkt.d
import com.squareup.picasso.Picasso

class MovieAdapter(
    val movieSelected: (Movie) -> Unit,
    val removeMovie: (Movie) -> Unit,
):  ListAdapter<com.rugoli.moviedb.dataclass.Movie, MovieAdapter.MovieViewHolder>(MovieDiffCallback) {

    class MovieViewHolder(
        view: View,
        movieSelected: (Int) -> Unit,
        removeMovie: (Int) -> Unit
    ) : RecyclerView.ViewHolder(view) {
        private val nameTextView: TextView = view.findViewById(R.id.titleText)
        private val yearTextView: TextView = view.findViewById(R.id.yearText)
        private val plotTextView: TextView = view.findViewById(R.id.infoplot)
        private val movieImage: ImageView = view.findViewById(R.id.movieImage)

        private val removeButton: ImageButton = view.findViewById(R.id.removeButton)

        init {
            d { "rugolid: movie adapter init ()" }
            view.setOnClickListener {
                movieSelected(adapterPosition)
            }
            removeButton.setOnClickListener {
                d { "rugolid: Remove movie...." }
                removeMovie(adapterPosition)
            }
        }

        fun bind(movie: Movie) {
            d { "rugolid: bind()" }

            nameTextView.text = movie.name
            yearTextView.text = movie.release.toString()
            //limit the plot text
            plotTextView.text = movie.plot.substring(0,250) + " ..."
            Picasso.get()
                .load(Uri.parse(movie.posterUrl))
                .placeholder(R.drawable.ic_launcher_foreground)
                .into(movieImage)
        }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): MovieViewHolder {
        d { "rugolid: onCreateViewHolder()" }
        val view = LayoutInflater.from(parent.context).inflate(R.layout.movie_item, parent, false)
        return MovieViewHolder(
            view,
            { movieSelected(getItem(it)) },
            { removeMovie(getItem(it)) }
        )
    }

    override fun onBindViewHolder(holder: MovieViewHolder, position: Int) {
        d { "rugolid: onBindViewHolder(): ${getItem(position).name}" }
        holder.bind(getItem(position))
    }
}


private object MovieDiffCallback : DiffUtil.ItemCallback<Movie>() {

    override fun areItemsTheSame(oldItem: Movie, newItem: Movie): Boolean {
        return oldItem.id == newItem.id
    }

    override fun areContentsTheSame(oldItem: Movie, newItem: Movie): Boolean {
        return oldItem.id == newItem.id
    }

}