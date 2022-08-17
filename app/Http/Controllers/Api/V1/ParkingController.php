<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Parking\ParkingStoreRequest;
use App\Http\Requests\Parking\ParkingUpdateRequest;
use App\Http\Resources\ParkingResource;
use App\Models\Parking;
use Illuminate\Http\Response;


/**
 *
*/
class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return ParkingResource::collection(Parking::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ParkingStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkingStoreRequest $request)
    {
        $parking = Parking::create($request->validated());

        return new ParkingResource($parking);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Parking $parking)
    {
        return new ParkingResource($parking);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param ParkingUpdateRequest $request
     * @param Parking $parking
     * @return Response
    */
    public function update(ParkingUpdateRequest $request, Parking $parking)
    {
          $parking->update($request->validated());

          return new ParkingResource($parking);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Parking $parking
     * @return Response
     * @throws \Exception
    */
    public function destroy(Parking $parking)
    {
        $parking->delete();

        return \response(null, Response::HTTP_NO_CONTENT);
    }
}
