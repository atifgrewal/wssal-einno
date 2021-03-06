<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Gate;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Attributedetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Admin\ProductResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;

class ProductApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource(Product::with(['category', 'sub_category', 'tags', 'attributes', 'attribute_values', 'variation', 'unit'])->get());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        // $product1=$request->name;
        // $product2=$request->value;
        // $data=$product1.$product2;

    //   dd($data);


        $product->tags()->sync($request->input('tags', []));
        $product->attributes()->sync($request->input('attributes', []));
        $product->attribute_values()->sync($request->input('attribute_values', []));
        if ($request->input('fetaured_image', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('fetaured_image'))))->toMediaCollection('fetaured_image');
        }

        foreach ($request->input('image', []) as $file) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('image');
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource($product->load(['category', 'sub_category', 'tags', 'attributes', 'attribute_values', 'variation', 'unit']));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        // dd($request->all());
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

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
