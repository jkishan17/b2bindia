<?php

namespace App\Http\Controllers\Jpanel\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasPermission = hasPermission('category',2);
        if($hasPermission){
            $categories = Category::all();
            return view('jpanel.catalog.category', compact('categories'));
        }
        else
            abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hasPermission = hasPermission('category',1);
        if($hasPermission){
            $categories = Category::whereNull('parent_id')->get();
            return view('jpanel.catalog.createCategory', compact('categories'));
        }
        else
            abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cname' => 'required|unique:categories,name'
        ]);
        $category=new Category;
        $category->name=$request->cname;
        $category->parent_id=$request->parent_id;
        $category->save();
        if ($category) {
            return redirect('jpanel/category/add')->with('success', 'Category has been created successfully!');
        } else {
            return redirect('jpanel/category/add')->with('error', 'Something went wrong. Try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category)
    {
        //
        $hasPermission = hasPermission('category',3);
        if($hasPermission){
            $id = $request->id;
            $categories = Category::whereNull('parent_id')->get();
            $category = Category::find($id);
            return view('jpanel.catalog.editCategory', compact('categories','category'));
        }
        else
            abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'cname' => 'required|unique:categories,name,'.$request->id,
        ]);
        
        $category = Category::where('id', $request->id)->update(['name' => $request->cname, 'parent_id' => $request->parent_id]);
        if ($category) 
            return redirect('jpanel/category/edit/'.$request->id)->with('success', 'Category has been updated!');
        else 
            return redirect('jpanel/category/edit'.$request->id)->with('error', 'Something went wrong. Try again.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        $categories = Category::where('parent_id', $request->category_id)->get();
       $category = Category::where('id', $request->category_id)->delete();
        if ($category) 
            return response()->json(['status'=>'success','message' => 'Category has been deleted successfully!','categories'=>$categories]);
        else
            return response()->json(['status'=>'error','message' => 'Something went wrong. Try again.']);
    }


    /**
     * Status update the specified resource in storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(Request $request)
    {
        //
        $category = Category::find($request->category_id);
        $category->status = $request->status;
        $category->save();
        return response()->json(['status'=>'success','message' => 'Status has been changed successfully!']);
    }
    
}
