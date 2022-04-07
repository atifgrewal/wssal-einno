<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAttributedetailRequest;
use App\Http\Requests\StoreAttributedetailRequest;
use App\Http\Requests\UpdateAttributedetailRequest;
use App\Models\Attribute;
use App\Models\Attributedetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AttributedetailController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('attributedetail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attributedetails = Attributedetail::with(['attributes'])->get();

        return view('frontend.attributedetails.index', compact('attributedetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('attributedetail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attributes = Attribute::pluck('name', 'id');

        return view('frontend.attributedetails.create', compact('attributes'));
    }

    public function store(StoreAttributedetailRequest $request)
    {
        $attributedetail = Attributedetail::create($request->all());
        $attributedetail->attributes()->sync($request->input('attributes', []));

        return redirect()->route('frontend.attributedetails.index');
    }

    public function edit(Attributedetail $attributedetail)
    {
        abort_if(Gate::denies('attributedetail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attributes = Attribute::pluck('name', 'id');

        $attributedetail->load('attributes');

        return view('frontend.attributedetails.edit', compact('attributedetail', 'attributes'));
    }

    public function update(UpdateAttributedetailRequest $request, Attributedetail $attributedetail)
    {
        $attributedetail->update($request->all());
        $attributedetail->attributes()->sync($request->input('attributes', []));

        return redirect()->route('frontend.attributedetails.index');
    }

    public function show(Attributedetail $attributedetail)
    {
        abort_if(Gate::denies('attributedetail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attributedetail->load('attributes');

        return view('frontend.attributedetails.show', compact('attributedetail'));
    }

    public function destroy(Attributedetail $attributedetail)
    {
        abort_if(Gate::denies('attributedetail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attributedetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyAttributedetailRequest $request)
    {
        Attributedetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
