<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('categories.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
        ]);

        if($request->file('picture')){
            $picture_name=str_replace(' ', '_', mb_strtolower(request('name'), 'UTF-8'));
            $picture_file = $picture_name.".".$request->file('picture')->getClientOriginalExtension();
            $picture = $request->file('picture')->move(public_path("\img"), $picture_file);
            $picture_url  = env('APP_URL')."/img/".$picture_file;
        } else {
            $picture_url = NULL;
        }
        
        $category = new Category;
        
        $category->name = request('name');
        $category->picture = $picture_url;
        $category->save();

        return redirect(route('categories-index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($request->id);

        if($request->file('picture')){
            $picture_name = str_replace(' ', '_', mb_strtolower(request('name'), 'UTF-8'));
            $picture_file = $picture_name.".".$request->file('picture')->getClientOriginalExtension();
            $picture      = $request->file('picture')->move(public_path("\img"), $picture_file);
            $picture_url  = env('APP_URL')."/img/".$picture_file;
        } else {
            $picture_url = NULL;
        }

        $category->name     = request('name');
        $category->picture  = $picture_url;
        
        //$category->update();
        if ($category->updateOrFail($category) === false) {
            return response(
                "Couldn't update the user with id {$request->id}",
                Response::HTTP_BAD_REQUEST
            );
        
        }
        return response($category);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
