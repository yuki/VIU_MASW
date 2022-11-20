package com.rugoli.moviedb

import android.app.Application
import com.github.ajalt.timberkt.d

class App:Application() {
    override fun onCreate() {
        super.onCreate()

        if (BuildConfig.DEBUG) {
            timber.log.Timber.plant(timber.log.Timber.DebugTree())
            d {"rugolid: estamos en modo debug"}
        }

    }
}