<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSubCatRequest;
use App\Http\Requests\UpdateSubCatRequest;
use App\Http\Resources\Admin\SubCatResource;
use App\Models\SubCat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubCatApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_cat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubCatResource(SubCat::with(['parent_cateory'])->get());
    }

    public function store(StoreSubCatRequest $request)
    {
        $subCat = SubCat::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $subCat->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        return (new SubCatResource($subCat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SubCat $subCat)
    {
        abort_if(Gate::denies('sub_cat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubCatResource($subCat->load(['parent_cateory']));
    }

    public function update(UpdateSubCatRequest $request, SubCat $subCat)
    {
        $subCat->update($request->all());

        if (count($subCat->photo) > 0) {
            foreach ($subCat->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $subCat->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $subCat->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return (new SubCatResource($subCat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SubCat $subCat)
    {
        abort_if(Gate::denies('sub_cat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
