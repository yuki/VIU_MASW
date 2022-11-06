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
        val sendIntent = Intent(Intent.ACTION_SEND)
        // Always use string resources for UI text.
        // This says something like "Share this photo with"
        val title: String = resources.getString(R.string.chooser_title)
        // Create intent to show the chooser dialog
        // TODO: esto no parece funcionar
//        val chooser: Intent = Intent.createChooser(sendIntent, title)

        // the result is a text, so we put this type
        sendIntent.setType("text/plain")

        bshare.setOnClickListener {
            // Verify the original intent will resolve to at least one activity
            if (sendIntent.resolveActivity(packageManager) != null) {
                startActivity(sendIntent)
            }
        }
    }
}