<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyVariationRequest;
use App\Http\Requests\StoreVariationRequest;
use App\Http\Requests\UpdateVariationRequest;
use App\Models\Variation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VariationController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('variation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variations = Variation::all();

        return view('frontend.variations.index', compact('variations'));
    }

    public function create()
    {
        abort_if(Gate::denies('variation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.variations.create');
    }

    public function store(StoreVariationRequest $request)
    {
        $variation = Variation::create($request->all());

        return redirect()->route('frontend.variations.index');
    }

    public function edit(Variation $variation)
    {
        abort_if(Gate::denies('variation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.variations.edit', compact('variation'));
    }

    public function update(UpdateVariationRequest $request, Variation $variation)
    {
        $variation->update($request->all());

        return redirect()->route('frontend.variations.index');
    }

    public function show(Variation $variation)
    {
        abort_if(Gate::denies('variation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.variations.show', compact('variation'));
    }

    public function destroy(Variation $variation)
    {
        abort_if(Gate::denies('variation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $variation->delete();

        return back();
    }

    public function massDestroy(MassDestroyVariationRequest $request)
    {
        Variation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
