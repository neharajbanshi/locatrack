<?php namespace App\Services\Location;

use App\Repositories\Location\LocationInterface;
use Illuminate\Http\Request;

class LocationService
{
    protected LocationInterface $locationInterface;

    public function __construct(LocationInterface $locationInterface)
    {
        $this->locationInterface = $locationInterface;
    }

    public function all()
    {
        return $this->locationInterface->all();
    }

    public function find($id)
    {
        return $this->locationInterface->find($id);
    }

    public function getNearestLocationsByLocationId($locationId)
    {
        return $this->locationInterface->getNearestLocationsByLocationId($locationId);
    }

    public function getLocationsByFilter(Request $request)
    {
        return $this->locationInterface->searchByFilters($request);
    }

}
