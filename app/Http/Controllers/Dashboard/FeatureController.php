<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreFeatureRequest;
use App\Http\Requests\Dashboard\UpdateFeatureRequest;
use App\Models\Feature;
use App\Models\Product;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_features');

        if ($request->ajax()){
            $data = getModelData( model: new Feature(), relations: ['product' => ['id', 'name_ar', 'name_en', 'description_ar', 'description_en']] );
            return response()->json($data);
        }

        $products = Product::get();

        return view('dashboard.features.index', compact('products'));
    }

    public function store(StoreFeatureRequest $request)
    {
        $this->authorize('create_features');

        $data = $request->validated();
        $data['icon'] = uploadImageToDirectory( $request->file('icon') , "Features");

        Feature::create($data);

        return response(["Feature created successfully"]);
    }

    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $this->authorize('update_features');

        $data = $request->validated();
        if($request->has('icon'))
            $data['icon'] = uploadImageToDirectory( $request->file('icon') , "Features");
        $feature->update($data);

        return response(["Feature updated successfully"]);
    }

    public function destroy(Feature $feature)
    {
        $this->authorize('delete_features');

        $feature->delete();

        return response(["Feature deleted successfully"]);
    }

    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_features');

        Feature::whereIn('id', $request->selected_items_ids)->delete();

        return response(["selected features deleted successfully"]);
    }
}
