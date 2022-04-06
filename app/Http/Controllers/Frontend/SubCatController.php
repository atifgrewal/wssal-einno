<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySubCatRequest;
use App\Http\Requests\StoreSubCatRequest;
use App\Http\Requests\UpdateSubCatRequest;
use App\Models\ProductCategory;
use App\Models\SubCat;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SubCatController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sub_cat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCats = SubCat::with(['parent_cateory', 'media'])->get();

        $product_categories = ProductCategory::get();

        return view('frontend.subCats.index', compact('product_categories', 'subCats'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_cat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parent_cateories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.subCats.create', compact('parent_cateories'));
    }

    public function store(StoreSubCatRequest $request)
    {
        $subCat = SubCat::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $subCat->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $subCat->id]);
        }

        return redirect()->route('frontend.sub-cats.index');
    }

    public function edit(SubCat $subCat)
    {
        abort_if(Gate::denies('sub_cat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $parent_cateories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subCat->load('parent_cateory');

        return view('frontend.subCats.edit', compact('parent_cateories', 'subCat'));
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

        return redirect()->route('frontend.sub-cats.index');
    }

    public function show(SubCat $subCat)
    {
        abort_if(Gate::denies('sub_cat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCat->load('parent_cateory');

        return view('frontend.subCats.show', compact('subCat'));
    }

    public function destroy(SubCat $subCat)
    {
        abort_if(Gate::denies('sub_cat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subCat->delete();

        return back();
    }

    public function massDestroy(MassDestroySubCatRequest $request)
    {
        SubCat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sub_cat_create') && Gate::denies('sub_cat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SubCat();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
