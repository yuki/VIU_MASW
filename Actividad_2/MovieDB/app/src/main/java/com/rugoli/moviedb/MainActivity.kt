package com.rugoli.moviedb

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import com.github.ajalt.timberkt.d
import org.koin.androidx.viewmodel.ext.android.viewModel

class MainActivity : AppCompatActivity() {

    private val viewModel: MainActivityViewModel by viewModel()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        d { "rugolid: main activity onCreate" }

        viewModel.loadData()
        //findViewById<Button>(R.id.button).setOnClickListener {
        //    viewModel.loadData()

        //}
    }
}