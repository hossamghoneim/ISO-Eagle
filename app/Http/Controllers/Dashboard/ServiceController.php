<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreServiceRequest;
use App\Http\Requests\Dashboard\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_services');

        if ($request->ajax()){
            $data = getModelData( model: new Service() );
            return response()->json($data);
        }

        return view('dashboard.services.index');
    }

    public function store(StoreServiceRequest $request)
    {
        $this->authorize('create_services');

        $data = $request->validated();
        $data['icon'] = uploadImageToDirectory( $request->file('icon') , "Services");

        Service::create($data);

        return response(["Service created successfully"]);
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $this->authorize('update_services');

        $data = $request->validated();
        if($request->has('icon'))
            $data['icon'] = uploadImageToDirectory( $request->file('icon') , "Services");
        $service->update($data);

        return response(["Service updated successfully"]);
    }

    public function destroy(Service $service)
    {
        $this->authorize('delete_services');

        $service->delete();

        return response(["Service deleted successfully"]);
    }

    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_services');

        Service::whereIn('id', $request->selected_items_ids)->delete();

        return response(["selected services deleted successfully"]);
    }
}
