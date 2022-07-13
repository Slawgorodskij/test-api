<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalonRequest;
use App\Http\Resources\CitySalonResource;
use App\Http\Resources\SalonResource;
use App\Models\Salon;
use Illuminate\Http\Response;

class CitySalonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $city
     * @return Response
     */
    public function index($city)
    {
        $objSalon = Salon::where('city_id', $city)
            ->where('status', 1)
            ->get();

        if ($objSalon->count()) {
            return SalonResource::collection($objSalon);
        }
        return response('Салоны не найдены', Response::HTTP_NOT_FOUND);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SalonRequest $request
     * @param int $city
     * @return Response
     */
    public function store(SalonRequest $request, $city)
    {
        $data = $request->validated();

        $newSalon = Salon::create([
            'city_id' => $city,
            'name' => $data['name'],
        ]);

        if ($newSalon) {
            return new CitySalonResource($newSalon);
        }

        return response('Салон не создан.', Response::HTTP_SERVICE_UNAVAILABLE);
    }

    /**
     * Display the specified resource.
     *
     * @param int $city
     * @param int $salon
     * @return Response
     */
    public function show($city, $salon)
    {
        $objSalon = Salon::where('city_id', $city)
            ->where('status', 1)
            ->find($salon);

        if ($objSalon) {
            return new CitySalonResource($objSalon);
        }

        return response('Салон не найден', Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SalonRequest $request
     * @param int $city
     * @param int $salon
     * @return Response
     */
    public function update(SalonRequest $request, $city, $salon)
    {
        $objSalon = Salon::where('city_id', $city)
            ->where('status', 1)
            ->findOrFail($salon);

        $objSalon->update($request->validated());

        return new CitySalonResource($objSalon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $city
     * @param int $salon
     * @return Response
     */
    public function destroy($city, $salon)
    {
        $objSalon = Salon::where('city_id', $city)
            ->where('status', 1)
            ->find($salon);

        if ($objSalon) {
            $objSalon->update([
                'status' => '0',
            ]);

            return response('Салон удален', Response::HTTP_NO_CONTENT);
        }

        return response('Салон не удален', Response::HTTP_SERVICE_UNAVAILABLE);
    }
}
