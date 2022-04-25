<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Attribute;
use App\Models\Attributedetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\SubCat;
use App\Models\Unit;
// use App\Models\Variation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $products=Product::all();
        $products = Product:: with(['category', 'tags', 'attributes','attribute_values','sub_category', 'attribute_values',  'unit', 'media',])->get();
        //  dd($products['category']);
        // dd($products);
        // dd($products);
        //(['category', 'sub_category', 'tags', 'attributes', 'attribute_values',  'unit', 'media'])->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {


        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = SubCat::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = ProductTag::pluck('name', 'id');

        $attributes = Attribute::pluck('name', 'id');

        $attribute_values = Attributedetail::pluck('value', 'id');

        // $variations = Variation::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = Unit::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.create', compact('attribute_values', 'attributes', 'categories', 'sub_categories', 'tags', 'units'));
    }

    public function store(StoreProductRequest $request)
    {

        //   dd($request->all());
        //  $product=new Product;
        $product=Product::create($request->all());

        // dd($product->tags);
        // $product=Product::latest();
// dd($product);
//
       $product->tags()->sync($request->input('tags',[]));
    //    ($request->input('tags', []));

        // dd($user);
        $product->attributes()->sync($request->input('attributes', []));
        $product->attribute_values()->sync($request->input('attribute_values', []));
        if ($request->input('fetaured_image', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('fetaured_image'))))->toMediaCollection('fetaured_image');
        }


        foreach ($request->input('image', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }
        // $product->save();
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = ProductCategory::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sub_categories = SubCat::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tags = ProductTag::pluck('name', 'id');

        $attributes = Attribute::pluck('name', 'id');

        $attribute_values = Attributedetail::pluck('value', 'id');

        // $variations = Variation::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $units = Unit::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('category', 'sub_category', 'tags', 'attributes', 'attribute_values',  'unit');

        return view('admin.products.edit', compact('attribute_values', 'attributes', 'categories', 'product', 'sub_categories', 'tags', 'units'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->tags()->sync($request->input('tags', []));
        $product->attributes()->sync($request->input('attributes', []));
        $product->attribute_values()->sync($request->input('attribute_values', []));
        if ($request->input('fetaured_image', false)) {
            if (!$product->fetaured_image || $request->input('fetaured_image') !== $product->fetaured_image->file_name) {
                if ($product->fetaured_image) {
                    $product->fetaured_image->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('fetaured_image'))))->toMediaCollection('fetaured_image');
            }
        } elseif ($product->fetaured_image) {
            $product->fetaured_image->delete();
        }

        if (count($product->image) > 0) {
            foreach ($product->image as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $product->image->pluck('file_name')->toArray();
        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('image');
            }
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('category', 'sub_category', 'tags', 'attributes', 'attribute_values', 'unit');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
    public function dependent(Request $request)
    {
        // return($request);
        $parent_id = $request->cat_id;
        //   return($parent_id);


        $subcategories = SubCat::where('parent_cateory_id',$parent_id)
        ->get();

         return($subcategories);

        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
    public function dependentatt(Request $request)
    {
        // return($request);
        $parent_id = $request->cat_id;
          return($parent_id);


        $subcategories = Attributedetail::where('attributedetail_id',$parent_id)
        ->get();

         return($subcategories);

        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
}
