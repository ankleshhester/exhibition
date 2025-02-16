<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\LinkStatistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class LinkController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('link_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.link.index');
    }

    public function create()
    {
        abort_if(Gate::denies('link_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.link.create');
    }

    public function edit(Link $link)
    {
        abort_if(Gate::denies('link_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.link.edit', compact('link'));
    }

    public function show(Link $link)
    {
        abort_if(Gate::denies('link_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $link->load('linkCategory');

        return view('admin.link.show', compact('link'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['link_create', 'link_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new Link();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function download($mediaId)
    {
        $media = Media::findOrFail($mediaId); // Retrieve media from Spatie's table

        abort_if(!$media || !Storage::disk($media->disk)->exists($media->getPath()), Response::HTTP_NOT_FOUND, 'File not found');

        // Generate visitor ID if guest
        $visitorId = auth()->id() ?? session()->get('visitor_id', uniqid());

        // Store visitor ID in session
        session()->put('visitor_id', $visitorId);

        // // Track download
        // LinkStatistic::create([
        //     'link_id' => $media->model_id,
        //     'action' => 'download',
        //     'ip_address' => request()->ip(),
        //     'visitor_id' => $visitorId,
        // ]);

        // Force file download
        return response()->download($media->getPath(), $media->file_name);
    }

}
