<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware('can:admin')->except(['store']);
    }


    public function index()
    {
        return view('category.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.category_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {

        $category= $request->validated();

        Category::create($category);
        return redirect(route('categories.index'))->with('success','Category created Successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view('category.edit', ['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryCreateRequest $request,Category $category)
    {
//        dd($category);

        $data= $request->validated();
        $category->update($data);
        return redirect('categories')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('categories.index'))->with('success','Category Deleted Successfully');

    }
}
