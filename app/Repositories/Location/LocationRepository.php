<?php

namespace App\Repositories\Location;

use App\Models\Location;
use Illuminate\Support\Facades\DB;

class LocationRepository implements LocationInterface
{
    protected Location $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }


    public function all()
    {
        return $this->location->paginate(20);
    }

    public function find($id)
    {
        return $this->location->findOrFail($id);
    }

    public function getNearestLocationsByLocationId($id)
    {
        $location = $this->find($id);

        return DB::table('location')
                    ->select( DB::raw("id, address, state, city, zip, latitude, longitude, (3959 * acos (cos (radians(?))* cos(radians(latitude))* cos( radians(?) - radians(longitude) )+ sin (radians(?) )* sin(radians(latitude)))) AS distance"))
                    ->orderBy('distance', 'asc')
                    ->take(6)
                    ->setBindings([$location->latitude, $location->longitude, $location->latitude])
                    ->get();
    }

    public function searchByFilters($request)
    {
        return $this->location->where(function ($query) use ($request) {
            if (!empty($request->get('address'))) {
                $query->Where('address', 'LIKE', '%' . $request->get('address') . '%');
            }
        })->get();
    }
}
