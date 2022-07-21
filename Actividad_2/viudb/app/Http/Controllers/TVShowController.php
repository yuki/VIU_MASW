<?php

namespace App\Http\Controllers;

use App\TVShow;
use Illuminate\Support\Facades\DB;
use App\Platform;
use Illuminate\Http\Request;

class TVShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tvshows = TVShow::orderBy('name')->paginate(5);
        return view('tvshows.list', ['tvshows' => $tvshows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $platforms = Platform::orderBy('name')->get();
        return view('tvshows.create', ['platforms' => $platforms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateTVShow($request);
        $tvshow = new TVShow();
        $tvshow->name = $request->name;
        $tvshow->sinopsis = $request->sinopsis;
        $tvshow->url = $request->url;
        // TODO: cambiar cómo se guarda la relación
        $tvshow->platform_id = $request->platform_id;
        $tvshow->save();
        // si viene con imagen, la guardamos
        if (isset($request->file)) {
            saveImage($request,$tvshow->id,'tvshow');
        }
        return redirect()->route('tvshows.index')->with('success',__('viudb.tvshow_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TVShow  $tVShow
     * @return \Illuminate\Http\Response
     */
    public function show(TVShow $tvshow)
    {
        return view('tvshows.show', ['tvshow' => $tvshow]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TVShow  $tVShow
     * @return \Illuminate\Http\Response
     */
    public function edit(TVShow $tvshow)
    {
        $platforms = Platform::orderBy('name')->get();
        return view('tvshows.edit', ['tvshow' => $tvshow, 'platforms' => $platforms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TVShow  $tVShow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TVShow $tvshow)
    {
        $this->validateTVShow($request,$tvshow);
        $tvshow->name = $request->name;
        $tvshow->sinopsis = $request->sinopsis;
        $tvshow->url = $request->url;
        // TODO: cambiar cómo se guarda la relación
        $tvshow->platform_id = $request->platform_id;
        $tvshow->save();
        // si viene con imagen, la guardamos
        if (isset($request->file)) {
            saveImage($request,$tvshow->id,'tvshow');
        }
        return redirect()->route('tvshows.index')->with('success',__('viudb.tvshow_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TVShow  $tVShow
     * @return \Illuminate\Http\Response
     */
    public function destroy(TVShow $tvshow)
    {
        //
    }

    // Validación de los campos
    protected function validateTVShow($request,$tvshow=null) {
        return $request->validate(
                [
                    // si estamos actualizando, que no se queje si mantenemos el nombre original
                    'name' => 'required|'.\Illuminate\Validation\Rule::unique('tvshows')->ignore($tvshow).'|min:3|max:255,',
                    // TODO: modificar el mensaje de validación del platform_id
                    'platform_id' => 'required|integer|gt:0',
                    'sinopsis' => 'nullable|max:512',
                    'file' => 'nullable|image|mimes:jpg,png,jpeg'
                ]);
    }

}
