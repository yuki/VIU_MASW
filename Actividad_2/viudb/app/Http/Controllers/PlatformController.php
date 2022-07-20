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
        return redirect()->route('platforms.index')->with('success',__('viudb.platform_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function show(Platform $platform)
    {
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
        // si el nombre anterior y el actualizado es el mismo, no hacemos nada
        if ($platform->name != $request->name){
            $this->validatePlatform($request);
            $platform->name = $request->name;
            $platform->save();
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
        //
    }

    protected function validatePlatform($request) {
        return $request->validate(
                [
                    'name' => 'required|unique:platforms|min:3|max:255'
                ]);
    }
}
