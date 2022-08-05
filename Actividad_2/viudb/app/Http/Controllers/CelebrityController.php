<?php

namespace App\Http\Controllers;

use App\Celebrity;
use App\Episode;
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
            $celebrities = search_celebrity($name)->paginate(env('VIEW_PAGINATE'));
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
    public function show(Request $request,Celebrity $celebrity)
    {
        if ($request->has('episode_id') && $request->has('funcion') && $request->funcion != '0') {
            if (count($celebrity->episodes()->where('episode_id','=',$request->episode_id)->wherePivot('perform_as',$request->funcion)->get())==0){
                $celebrity->episodes()->attach($request->episode_id,['perform_as' => $request->funcion]);
            }
        }
        $episodes = $celebrity->episodes()->orderBy('name')->paginate(env('VIEW_PAGINATE'));
        $all_episodes = Episode::orderBy('name')->get();
        $performances = celebrity_episode_performances();
        return view('celebrities.show', ['celebrity' => $celebrity, 'episodes' => $episodes, 'all_episodes'=>$all_episodes,'performances'=> $performances]);
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
    public function destroy(Request $request, Celebrity $celebrity)
    {
        if ($celebrity != null){
            // borra los datos de la tabla intermedia celebrity_episode
            $celebrity->episodes()->detach();
            $celebrity->delete();
            return 'OK';
        }
        return 'ERROR';
    }

    protected function validateCelebrity($request,$celebrity=null) {
        if ($celebrity){
            return $request->validate(
                [
                    // validación conjunta de nombre y apellidos
                    // 'name' => 'unique:table,field,NULL,id,field1,value1,field2,value2,field3,value3'
                    'surname' => 'required|min:3|max:255,',
                    'name' => 'required|unique:celebrities,name,'.$celebrity->id.',id,name,'.$request->name.',surname,'.$request->surname,
                    'file' => 'nullable|image|mimes:jpg,png,jpeg'
                ]);
        } else {
            return $request->validate(
                [
                    // validación conjunta de nombre y apellidos
                    // 'name' => 'unique:table,field,NULL,id,field1,value1,field2,value2,field3,value3'
                    'surname' => 'required|min:3|max:255,',
                    'name' => 'required|unique:celebrities,name,NULL,id,name,'.$request->name.',surname,'.$request->surname,
                    'file' => 'nullable|image|mimes:jpg,png,jpeg'
                ]);
        }

    }
}
