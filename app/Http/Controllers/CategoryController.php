<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Response;
use App\Http\Requests\CategoryRequest;
use Illuminate\Auth\Events\Validated;

class CategoryController extends Controller
{
    const NUMBER_OF_ITEMS_PER_PAGE = 25;
    public function index()
    {

        $categories = Category::paginate(self::NUMBER_OF_ITEMS_PER_PAGE);
        // return inertia()->render('Categories/Index', compact('categories'));
        return inertia()->render('Categories/Index', ['categories' => $categories]);
        
    }

    public function create()
    {
        return inertia()->render('Categories/Create');
    }

    public function store(CategoryRequest $request)
    {
        // Category::create($request->all());
        //para forzar la validacion
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return inertia('Categories/Edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       $category->delete();
       return redirect()->route('categories.index');
    }
}
