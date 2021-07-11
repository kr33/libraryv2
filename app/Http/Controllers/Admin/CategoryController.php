<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories =  Category::paginate(15);
        $count = Category::count();
        return view('category.index',['categories' =>$categories,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:25|unique:categories,name',
        ]);
        Category::create([
            'name' => $request->name,
            'sindhi_name' => $request->sindhi_name,
            'urdu_name' => $request->urdu_name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);
        return redirect(route('categories.index'))->with('message','Category added successfully..');
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
        $category =  Category::find($id);
        return view('category.edit',['category' =>$category]);
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
            'name' => 'required|max:25|unique:categories,name,'.$id,
        ]);
        Category::where('id',$id)->update([
            'name' => $request->name,
            'sindhi_name' => $request->sindhi_name,
            'urdu_name' => $request->urdu_name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);
        return redirect(route('categories.index'))->with('message','Category updated successfully..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Category::where('id',$id)->delete();
        return redirect(route('categories.index'))->with('message','Category deleted successfully..');
    }
    
    
    /**
     * Sort category
    */

    public function sortCategory(Request $request){
        if(!empty($request->id) && !empty($request->sort_order)){
            Category::where('id',$request->id)->update([
                'sort_order' => $request->sort_order
            ]);
            return 1;
        }else{
            return 0;
        }
    }
}
