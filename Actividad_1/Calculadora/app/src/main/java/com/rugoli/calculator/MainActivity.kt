package com.rugoli.calculator

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import com.github.ajalt.timberkt.d

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        d {"rugolid: oncreate... empezamos"}
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)


    }
}