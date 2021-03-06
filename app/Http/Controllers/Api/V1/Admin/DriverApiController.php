<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Http\Resources\Admin\DriverResource;
use App\Models\Driver;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DriverApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('driver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DriverResource(Driver::all());
    }

    public function store(StoreDriverRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required||unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->roles()->attach(4); 
        $driver = Driver::create($request->all());
        $driver->user_id=$user->id;
        $driver->save();
        

        if ($request->input('profile', false)) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile'))))->toMediaCollection('profile');
        }

        foreach ($request->input('transport_image', []) as $file) {
            $driver->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('transport_image');
        }

        return (new DriverResource($driver))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Driver $driver)
    {
        abort_if(Gate::denies('driver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DriverResource($driver);
    }

    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        $driver->update($request->all());

        if ($request->input('profile', false)) {
            if (!$driver->profile || $request->input('profile') !== $driver->profile->file_name) {
                if ($driver->profile) {
                    $driver->profile->delete();
                }
                $driver->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile'))))->toMediaCollection('profile');
            }
        } elseif ($driver->profile) {
            $driver->profile->delete();
        }

        if (count($driver->transport_image) > 0) {
            foreach ($driver->transport_image as $media) {
                if (!in_array($media->file_name, $request->input('transport_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $driver->transport_image->pluck('file_name')->toArray();
        foreach ($request->input('transport_image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $driver->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('transport_image');
            }
        }

        return (new DriverResource($driver))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Driver $driver)
    {
        abort_if(Gate::denies('driver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driver->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
