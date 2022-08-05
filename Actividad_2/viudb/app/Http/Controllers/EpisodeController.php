<?php

namespace App\Http\Controllers;

use App\Celebrity;
use App\Episode;
use App\TVShow;
use App\Language;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = null;
        if ($request->has('name')) {
            $name = $request->name;
            $episodes = search_episode($name)->paginate(env('VIEW_PAGINATE'));
            $episodes->appends(['name' => $request->name]);
        } else {
            $episodes = Episode::orderBy('name')->paginate(env('VIEW_PAGINATE'));
        }
        return view('episodes.list', ['episodes' => $episodes, 'name'=> $name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tvshows = TVShow::orderBy('name')->get();
        return view('episodes.create', ['tvshows' => $tvshows]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateEpisode($request);
        $episode = new Episode();
        $episode->name = $request->name;
        $episode->sinopsis = $request->sinopsis;
        $episode->season = $request->season;
        $episode->episode = $request->episode;
        $episode->released = $request->released;
        // TODO: cambiar cómo se guarda la relación
        $episode->tvshow_id = $request->tvshow_id;
        $episode->save();
        // si viene con imagen, la guardamos
        if (isset($request->file)) {
            saveImage($request,$episode->id,'episode');
        }
        return redirect()->route('episodes.index')->with('success',__('viudb.episode_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Episode $episode)
    {
        // para añadir celebrity al episodio
        if ($request->has('celebrity_id') && $request->has('funcion') && $request->funcion != '0') {
            if (count($episode->celebrities()->where('celebrity_id','=',$request->celebrity_id)->wherePivot('perform_as',$request->funcion)->get())==0){
                $episode->celebrities()->attach($request->celebrity_id,['perform_as' => $request->funcion]);
            }
        }

        // para añadir/borrar idiomas al episodio
        if ($request->has('language_id') && $request->has('type') && $request->type != '0') {
            if ($request->has('action') && $request->action == 'delete_language'){
                // toca borrar el idioma
                $episode->languages()->where('language_id','=',$request->language_id)->wherePivot('type',$request->type)->detach($request->language_id);
            } else {
                // añadimos el idioma
                if (count($episode->languages()->where('language_id','=',$request->language_id)->wherePivot('type',$request->type)->get())==0){
                    $episode->languages()->attach($request->language_id,['type' => $request->type]);
                }
            }
        }

        $all_celebrities = Celebrity::orderBy('name')->get();
        $all_languages = Language::orderBy('name')->get();
        $performances = celebrity_episode_performances();
        $types = language_episode_types();
        return view('episodes.show',
                    [
                        'episode' => $episode,
                        'celebrities' => $episode->celebrities()->orderBy('name')->paginate(env('VIEW_PAGINATE')),
                        'languages' => $episode->languages()->paginate(env('VIEW_PAGINATE')),
                        'performances'=> $performances,
                        'all_celebrities' => $all_celebrities,
                        'all_languages' => $all_languages,
                        'types' => $types,
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        $tvshows = TVShow::orderBy('name')->get();
        return view('episodes.edit', ['episode' => $episode, 'tvshows' => $tvshows]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Episode $episode)
    {
        $this->validateEpisode($request,$episode);
        $episode->name = $request->name;
        $episode->sinopsis = $request->sinopsis;
        $episode->season = $request->season;
        $episode->episode = $request->episode;
        $episode->released = $request->released;
        // TODO: cambiar cómo se guarda la relación
        $episode->tvshow_id = $request->tvshow_id;
        $episode->save();
        // si viene con imagen, la guardamos
        if (isset($request->file)) {
            saveImage($request,$episode->id,'episode');
        }
        return redirect()->route('episodes.index')->with('success',__('viudb.episode_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        if ($episode != null){
            $episode->delete();
            // borra los datos de la tabla intermedia celebrity_episode
            $episode->celebrities()->detach();
            // borra los datos de la tabla intermedia episode_language
            $episode->languages()->detach();
            return 'OK';
        }
        return 'ERROR';
    }

    // Validación de los campos
    protected function validateEpisode($request,$episode=null) {
        return $request->validate(
                [
                    // si estamos actualizando, que no se queje si mantenemos el nombre original
                    'name' => 'required|'.\Illuminate\Validation\Rule::unique('episodes')->ignore($episode).'|min:3|max:255,',
                    'tvshow_id' => 'required|integer|gt:0',
                    'sinopsis' => 'nullable|max:512',
                    'season' => 'required|integer|gt:0',
                    'episode' => 'required|integer|gt:0',
                    'file' => 'nullable|image|mimes:jpg,png,jpeg'
                ]);
    }
}
