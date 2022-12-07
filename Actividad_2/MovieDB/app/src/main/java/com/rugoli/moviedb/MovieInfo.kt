package com.rugoli.moviedb

import android.net.Uri
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.ImageView
import android.widget.TextView
import com.github.ajalt.timberkt.d
import com.squareup.picasso.Picasso

class MovieInfo : AppCompatActivity() {

    companion object {
        const val NAME: String = "Title"
        const val RELEASE: String = "1983"
        const val PLAYTIME: String = "1h"
        const val PLOT: String = "bla bla"
        const val POSTER: String = "url"
        const val DESCRIPTION: String = "bla bla bla"
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_movie_info)

        val name = intent.getStringExtra(NAME)
        val release = intent.getStringExtra(RELEASE)
        findViewById<TextView>(R.id.infoTitle).text = name + " ($release)"

        val playtime = intent.getStringExtra(PLAYTIME)
        findViewById<TextView>(R.id.infoPLaytime).text = "Playtime: $playtime"

        val plot = intent.getStringExtra(PLOT)
        findViewById<TextView>(R.id.infoplot).text = plot

        val poster = intent.getStringExtra(POSTER)
        val posterImage: ImageView = findViewById<ImageView>(R.id.infoPoster)
        d {"rugolid: " + poster}
        Picasso.get()
            .load(Uri.parse(poster))
            .placeholder(R.drawable.ic_launcher_foreground)
            .into(posterImage)

        val description = intent.getStringExtra(DESCRIPTION)
        findViewById<TextView>(R.id.infoDescription).text = description
    }
}