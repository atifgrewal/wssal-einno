<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Http\Resources\Admin\VendorResource;
use App\Models\Vendor;
use App\Models\User;

use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VendorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VendorResource(Vendor::all());
    }

    public function store(StoreVendorRequest $request)
    {
        return "sdfsdf";
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->roles()->attach(3); // Simple user role

        // return response()->json($user->id);
        $vendor = Vendor::create($request->all());
        $vendor->user_id=$user->id;
        $vendor->save();

        if ($request->input('image', false)) {
            $vendor->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($request->input('cnic_image', false)) {
            $vendor->addMedia(storage_path('tmp/uploads/' . basename($request->input('cnic_image'))))->toMediaCollection('cnic_image');
        }

        return (new VendorResource($vendor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VendorResource($vendor);
    }

    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        $vendor->update($request->all());

        if ($request->input('image', false)) {
            if (!$vendor->image || $request->input('image') !== $vendor->image->file_name) {
                if ($vendor->image) {
                    $vendor->image->delete();
                }
                $vendor->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($vendor->image) {
            $vendor->image->delete();
        }

        if ($request->input('cnic_image', false)) {
            if (!$vendor->cnic_image || $request->input('cnic_image') !== $vendor->cnic_image->file_name) {
                if ($vendor->cnic_image) {
                    $vendor->cnic_image->delete();
                }
                $vendor->addMedia(storage_path('tmp/uploads/' . basename($request->input('cnic_image'))))->toMediaCollection('cnic_image');
            }
        } elseif ($vendor->cnic_image) {
            $vendor->cnic_image->delete();
        }

        return (new VendorResource($vendor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vendor $vendor)
    {
    
        abort_if(Gate::denies('vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
