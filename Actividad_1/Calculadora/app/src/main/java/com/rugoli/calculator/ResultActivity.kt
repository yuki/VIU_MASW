package com.rugoli.calculator

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import com.github.ajalt.timberkt.d


class ResultActivity : AppCompatActivity() {

    companion object {
        const val RESULT: String = "0"
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_result)

        // set the result into the view
        val result = intent.getStringExtra(RESULT)
        d {"rugolid: Result Activity: " + result}
        findViewById<TextView>(R.id.resultText).text = result

        // share button
        val bshare = findViewById<Button>(R.id.bshare_result)
        // example from https://developer.android.com/guide/components/intents-filters#ForceChooser
        val sendIntent = Intent().apply {
            action = Intent.ACTION_SEND
            putExtra(Intent.EXTRA_TEXT,result)
            // if the type is "text/plain" will not show all apps.
            type = "text/plain"
        }

        val shareIntent = Intent.createChooser(sendIntent,null)

        bshare.setOnClickListener {
            // Verify the original intent will resolve to at least one activity
            if (sendIntent.resolveActivity(packageManager) != null) {
                startActivity(shareIntent)
            }
        }
    }
}