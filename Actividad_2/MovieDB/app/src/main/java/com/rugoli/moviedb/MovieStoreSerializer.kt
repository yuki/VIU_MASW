package com.rugoli.moviedb

import androidx.datastore.core.CorruptionException
import androidx.datastore.core.Serializer
import com.google.protobuf.InvalidProtocolBufferException
import java.io.InputStream
import java.io.OutputStream

object MovieStoreSerializer : Serializer<MovieStore> {
    override val defaultValue: MovieStore = MovieStore.getDefaultInstance()

    override suspend fun readFrom(input: InputStream): MovieStore {
        try {
            return MovieStore.parseFrom(input)
        } catch (exception: InvalidProtocolBufferException) {
            throw CorruptionException("Cannot read proto.", exception)
        }
    }

    override suspend fun writeTo(t: MovieStore, output: OutputStream) = t.writeTo(output)
}