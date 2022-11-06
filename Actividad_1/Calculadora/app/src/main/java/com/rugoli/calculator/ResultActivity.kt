package com.rugoli.calculator

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.TextView
import com.github.ajalt.timberkt.d


class ResultActivity : AppCompatActivity() {

    companion object {
        const val RESULT: String = "0"
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_result)



        val name = intent.getStringExtra(RESULT)
        d {"rugolid: Result Activity: " + name}
        findViewById<TextView>(R.id.resultText).text = name
    }
}