<?php

namespace App\Http\Controllers;

use App\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
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
            $platforms = Platform::where('name','like','%'.$name.'%')->orderBy('name')->paginate(env('VIEW_PAGINATE'));
            $platforms->appends(['name' => $request->name]);
        } else {
            $platforms = Platform::orderBy('name')->paginate(env('VIEW_PAGINATE'));
        }
        return view('platforms.list', ['platforms' => $platforms, 'name'=>$name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('platforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatePlatform($request);
        $platform = new Platform();
        $platform->name = $request->name;
        $platform->save();
        // si viene con imagen, la guardamos
        if (isset($request->file)) {
            saveImage($request,$platform->id,'platform');
        }
        return redirect()->route('platforms.index')->with('success',__('viudb.platform_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function show(Platform $platform)
    {;
        return view('platforms.show', ['platform' => $platform]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function edit(Platform $platform)
    {
        return view('platforms.edit', ['platform' => $platform]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Platform $platform)
    {
        $this->validatePlatform($request,$platform);
        $platform->name = $request->name;
        $platform->save();
        // si viene con imagen, la guardamos
        if (isset($request->file)) {
            saveImage($request,$platform->id,'platform');
        }
        return redirect()->route('platforms.index')->with('success',__('viudb.platform_updated'));
    }


    // Devuelve información de dependencias antes de ser borrado
    public function info(Platform $platform)
    {
        return count($platform->tvshows);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Platform $platform)
    {
        if ($platform != null){
            $platform->delete();
            foreach ($platform->tvshows as $tvshow) {
                foreach ($tvshow->episodes as $episode) {
                    $episode->delete();
                }
                $tvshow->delete();
            }
            return 'OK';
            // return redirect()->route('platforms.index')->with('success',__('viudb.platform_deleted'));
        }
        return 'ERROR';
        // return redirect()->route('platforms.index')->with('error',__('viudb.platform_deleted_error'));
    }


    // Validación de los campos
    protected function validatePlatform($request,$platform=null) {
        return $request->validate(
                [
                    // si estamos actualizando, que no se queje si mantenemos el nombre original
                    'name' => 'required|'.\Illuminate\Validation\Rule::unique('platforms')->ignore($platform).'|min:3|max:255,',
                    'file' => 'nullable|image|mimes:jpg,png,jpeg'
                ]);
    }
}
