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
    public function index()
    {
        $platforms = Platform::orderBy('name')->paginate(5);
        return view('platforms.list', ['platforms' => $platforms]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Platform $platform)
    {
        // TODO: hacer el borrado
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
