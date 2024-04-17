<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $categoriesQuery = Category::query();

        if ($query) {
            $categoriesQuery->where('name', 'LIKE', "%$query%");
        }

        $categories = $categoriesQuery->paginate(5);

        return view('admin.category.list', ['categories' => $categories, 'query' => $query]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
            'status' => 'required|in:0,1',
        ]);

        Category::create($validatedData);

        //return redirect()->route('admin.category.list')->with('success', 'Category created successfully!');
        return redirect('admin/categories/list')->with('success', 'Category created successfully!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            
        }

        return redirect()->route('categories.list')->with('error', 'Category deleted !');
        

    }

    public function edit($categoryId, Request $request)
    {
        $category = Category::find($categoryId);

        if (!$category) {
            return redirect()->route('categories.list')->with('error', 'Category not found!');
        }

        return view('admin.category.edit', compact('category'));
    }

    public function update($categoryId, Request $request)
    {
        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json([
                'status' => 'false',
                'notFound' => 'true',
                'message' => 'Category not found '
            ]);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $categoryId,
            'status' => 'required|in:0,1',
        ]);

        $category->update($validatedData);
        //return response ("hello! category is updated ");
        return redirect()->route('categories.list')->with('success', 'Category updated successfully!');
       // return redirect()->back()->with('message', 'Data Updated sucessfully!');
    }
}
