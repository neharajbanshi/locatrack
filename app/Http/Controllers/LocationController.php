<?php

namespace App\Http\Controllers;

use App\Services\Location\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected LocationService $locationService;

    public function __construct(LocationService $locationService) {
        $this->locationService = $locationService;
    }

    public function index(Request $request){
        if($request->ajax()){
            $locations = $this->locationService->getLocationsByFilter($request);
            if ($locations) {
                return response()
                    ->json(
                        [
                            'success' => true,
                            'message' => 'Successfully listed.',
                            'data'    => $locations,
                        ]
                    );
            } else {
                return response()
                    ->json(
                        [
                            'error'   => true,
                            'message' => 'Unable to fetch list.'
                        ]
                    );
            }
        }
        $locations = $this->locationService->all();

        return view('location.index', compact('locations'));
    }

    public function getNearestLocation($locationId)
    {
        $location = $this->locationService->find($locationId);
        $nearestLocations = $this->locationService->getNearestLocationsByLocationId($locationId);

        return view('location.view', compact('nearestLocations', 'location'));
    }
}
