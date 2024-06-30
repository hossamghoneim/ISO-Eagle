<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreVideoRequest;
use App\Http\Requests\Dashboard\UpdateVideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_videos');
        if($request->ajax())
            return response(getModelData( model: new Video()));
        else
            return view('dashboard.videos.index');
    }

    public function store(StoreVideoRequest $request)
    {
        $data = $request->validated();
        $data['cover'] = uploadImageToDirectory( $request->file('cover') , "Videos");

        Video::create($data);

        return response(["Video created successfully"]);
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        $data = $request->validated();
        if($request->has('cover'))
            $data['cover'] = uploadImageToDirectory( $request->file('cover') , "Videos");

        $video->update($data);

        return response(["Video updated successfully"]);
    }

    public function destroy(Video $video)
    {
        $this->authorize('delete_videos');

        $video->delete();

        return response(["Video deleted successfully"]);
    }

    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_videos');

        Video::whereIn('id', $request->selected_items_ids)->delete();

        return response(["selected videos deleted successfully"]);
    }
}
