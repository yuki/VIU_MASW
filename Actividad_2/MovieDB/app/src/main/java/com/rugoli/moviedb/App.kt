package com.rugoli.moviedb

import android.app.Application
import androidx.datastore.core.DataStore
import androidx.datastore.dataStore

import com.rugoli.moviedb.interfaces.MoviesInterface
import com.rugoli.moviedb.models.Movie

import com.github.ajalt.timberkt.d
import com.squareup.moshi.Moshi
import com.squareup.moshi.kotlin.reflect.KotlinJsonAdapterFactory
import org.koin.android.ext.koin.androidContext
import org.koin.android.ext.koin.androidLogger
import org.koin.androidx.viewmodel.dsl.viewModel
import org.koin.core.context.startKoin
import org.koin.core.logger.Level
import org.koin.dsl.module
import retrofit2.Retrofit
import retrofit2.converter.moshi.MoshiConverterFactory

class App:Application() {

    private val moviesDataStore: DataStore<MovieStore> by dataStore(
        fileName = "movies.pb",
        serializer = MovieStoreSerializer
    )


    override fun onCreate() {
        super.onCreate()

        if (BuildConfig.DEBUG) {
            timber.log.Timber.plant(timber.log.Timber.DebugTree())
            d {"rugolid: estamos en modo debug"}
        }

        //koin
        startKoin {
            androidLogger(Level.ERROR)
            androidContext(this@App)
            modules(
                module { single { moviesDataStore } },
                mainModule,
                mainActivity
            )
        }
    }
}

val mainModule = module {
    d {"rugolid: mainModule"}

    // retrofit Movie service
    single {
        Retrofit.Builder()
            .baseUrl("https://gist.githubusercontent.com/")
            .addConverterFactory(
                MoshiConverterFactory.create(
                    Moshi.Builder()
                        .add(KotlinJsonAdapterFactory())
                        .build()
                )
            )
            .build()
            .create(MoviesInterface::class.java)
    }

    // app model
    //
    single { com.rugoli.moviedb.models.Movie(movieService = get(), moviesDataStore = get()) }
}

val mainActivity = module {
    d {"rugolid: mainActivity"}
    viewModel { MainActivityViewModel(model = get(), application = get()) }
}