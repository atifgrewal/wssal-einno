<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributedetailRequest;
use App\Http\Requests\UpdateAttributedetailRequest;
use App\Http\Resources\Admin\AttributedetailResource;
use App\Models\Attributedetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AttributedetailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('attributedetail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AttributedetailResource(Attributedetail::with(['attributes'])->get());
    }

    public function store(StoreAttributedetailRequest $request)
    {
        $attributedetail = Attributedetail::create($request->all());
        $attributedetail->attributes()->sync($request->input('attributes', []));

        return (new AttributedetailResource($attributedetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Attributedetail $attributedetail)
    {
        abort_if(Gate::denies('attributedetail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AttributedetailResource($attributedetail->load(['attributes']));
    }

    public function update(UpdateAttributedetailRequest $request, Attributedetail $attributedetail)
    {
        $attributedetail->update($request->all());
        $attributedetail->attributes()->sync($request->input('attributes', []));

        return (new AttributedetailResource($attributedetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Attributedetail $attributedetail)
    {
        abort_if(Gate::denies('attributedetail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attributedetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
