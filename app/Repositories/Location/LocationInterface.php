<?php

namespace App\Repositories\Location;

interface LocationInterface
{
    public function all();

    public function getNearestLocationsByLocationId($locationId);

    public function find($id);

    public function searchByFilters($request);
}
