<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreProductRequest;
use App\Http\Requests\Dashboard\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_products');

        if ($request->ajax()){
            $data = getModelData( model: new Product(), relations: ['category' => ['id', 'name_ar', 'name_en']] );
            return response()->json($data);
        }

        $categories = Category::get();

        return view('dashboard.products.index', compact('categories'));
    }

    public function show(Product $product)
    {
        $product->load('category', 'productImages', 'features');

        return view('dashboard.products.show', compact('product'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->authorize('create_products');

        $data = $request->validated();
        $data['structure_image'] = uploadImageToDirectory( $request->file('structure_image') , "Products");
        $data['panel_image'] = uploadImageToDirectory( $request->file('panel_image') , "Products");

        $product = Product::create($data);

        foreach($data['images'] as $image)
        {
            ProductImage::create([
                'product_id' => $product->id,
                'image' => uploadImageToDirectory( $image , "Products")
            ]);
        }
        return response(["Product created successfully"]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update_products');

        $data = $request->validated();

        if($request->has('structure_image'))
            $data['structure_image'] = uploadImageToDirectory( $request->file('structure_image') , "Products");

        if($request->has('panel_image'))
            $data['panel_image'] = uploadImageToDirectory( $request->file('panel_image') , "Products");

        $product->update($data);

        return response(["Product updated successfully"]);
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete_products');

        $product->delete();

        return response(["Product deleted successfully"]);
    }

    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_products');

        Product::whereIn('id', $request->selected_items_ids)->delete();

        return response(["selected products deleted successfully"]);
    }
}
