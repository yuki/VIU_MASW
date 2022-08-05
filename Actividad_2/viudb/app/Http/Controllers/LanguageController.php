<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
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
            $languages = search_language($name)->paginate(env('VIEW_PAGINATE'));
            $languages->appends(['name' => $request->name]);
        } else {
            $languages = Language::orderBy('name')->paginate(env('VIEW_PAGINATE'));
        }
        return view('languages.list', ['languages' => $languages, 'name'=>$name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateLanguage($request);
        $language = new Language();
        $language->name = $request->name;
        $language->rfc_code = $request->rfc_code;
        $language->save();
        return redirect()->route('languages.index')->with('success',__('viudb.language_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        // TODO: de momento no es necesario
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        return view('languages.edit', ['language' => $language]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $this->validateLanguage($request,$language);
        $language->name = $request->name;
        $language->rfc_code = $request->rfc_code;
        $language->save();
        return redirect()->route('languages.index')->with('success',__('viudb.language_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Language $language)
    {
        if ($language != null){
            //borra las relaciones de la tabla intermedia episode_language
            $language->episodes()->detach();
            $language->delete();
            return 'OK';
        }
        return 'ERROR';
    }


    protected function validateLanguage($request,$language=null) {
        return $request->validate(
                [
                    'name' => 'required|'.\Illuminate\Validation\Rule::unique('languages')->ignore($language).'|min:3|max:255,',
                    'rfc_code' => 'required|'.\Illuminate\Validation\Rule::unique('languages')->ignore($language).'|min:3|max:8,',
                ]);
    }
}
