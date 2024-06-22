<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCategoryRequest;
use App\Http\Requests\Dashboard\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_categories');

        if ($request->ajax()){
            $data = getModelData( model: new Category() );
            return response()->json($data);
        }

        return view('dashboard.categories.index');
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->authorize('create_categories');

        Category::create($request->validated());

        return response(["Category created successfully"]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->authorize('update_categories');

        $category->update($request->validated());

        return response(["Category updated successfully"]);
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete_categories');

        $category->delete();

        return response(["Category deleted successfully"]);
    }

    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_categories');

        Category::whereIn('id', $request->selected_items_ids)->delete();

        return response(["selected categories deleted successfully"]);
    }
}
