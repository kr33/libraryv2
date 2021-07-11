<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use Str;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $languages =  Language::paginate(15);
        return view('language.index',['languages' =>$languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:25|unique:languages,name',
        ]);
        Language::create([
            'name' => $request->name,
            'sindhi_name' => $request->sindhi_name,
            'urdu_name' => $request->urdu_name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);
        return redirect(route('languages.index'))->with('message','Language added successfully..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $language =  Language::find($id);
        return view('language.edit',['language' =>$language]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|max:25|unique:languages,name,'.$id,
        ]);
        Language::where('id',$id)->update([
            'name' => $request->name,
            'sindhi_name' => $request->sindhi_name,
            'urdu_name' => $request->urdu_name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);
        return redirect(route('languages.index'))->with('message','Language updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Language::where('id',$id)->delete();
        return redirect(route('languages.index'))->with('message','Language deleted successfully..');
    }
}
