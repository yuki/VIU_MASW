<?php

namespace App\Http\Controllers;

use App\Celebrity;
use Illuminate\Http\Request;

class CelebrityController extends Controller
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
            $celebrities = Celebrity::where('name','like','%'.$name.'%')
                ->orWhere('surname','like','%'.$name.'%')
                ->orderBy('name')
                ->paginate(env('VIEW_PAGINATE'));
            $celebrities->appends(['name' => $request->name]);
        } else {
            $celebrities = Celebrity::orderBy('name')->paginate(env('VIEW_PAGINATE'));
        }
        return view('celebrities.list', ['celebrities' => $celebrities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('celebrities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateCelebrity($request);
        $celebrity = new Celebrity();
        $celebrity->name = $request->name;
        $celebrity->surname = $request->surname;
        $celebrity->born = $request->born;
        $celebrity->nation = $request->nation;
        $celebrity->url = $request->url;
        $celebrity->save();
        // si viene con imagen, la guardamos
        if (isset($request->file)) {
            saveImage($request,$celebrity->id,'celebrity');
        }
        return redirect()->route('celebrities.index')->with('success',__('viudb.celebrity_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function show(Celebrity $celebrity)
    {
        // TODO: hacer másc osas
        return view('celebrities.show', ['celebrity' => $celebrity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function edit(Celebrity $celebrity)
    {
        return view('celebrities.edit', ['celebrity' => $celebrity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Celebrity $celebrity)
    {
        $this->validateCelebrity($request,$celebrity);
        $celebrity->name = $request->name;
        $celebrity->surname = $request->surname;
        $celebrity->born = $request->born;
        $celebrity->nation = $request->nation;
        $celebrity->url = $request->url;
        $celebrity->save();
        // si viene con imagen, la guardamos
        if (isset($request->file)) {
            saveImage($request,$celebrity->id,'celebrity');
        }
        return redirect()->route('celebrities.index')->with('success',__('viudb.celebrity_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Celebrity $celebrity)
    {
        // TODO: hacer cosas
    }

    protected function validateCelebrity($request,$celebrity=null) {
        // dd($request->surname);
        // TODO: mejorar la validación
        return $request->validate(
                [
                    // validación conjunta de nombre y apellidos
                    // 'name' => 'unique:table,field,NULL,id,field1,value1,field2,value2,field3,value3'
                    // 'name' => 'required|min:3|max:255,',
                    'surname' => 'required|min:3|max:255,',
                    'name' => ['required', 'unique:celebrities,name,'.$celebrity.',id,surname,'.$request->surname],

                    'file' => 'nullable|image|mimes:jpg,png,jpeg'
                ]);

                // 'data.ip' => ['required', 'unique:servers,ip,'.$this->id.',NULL,id,hostname,'.$request->input('hostname')]
                // 'data.ip' => ['required', 'unique:servers,ip,'.$this->id.','.$request->input('id').',id,hostname,'.$request->input('hostname')]


    }
}
