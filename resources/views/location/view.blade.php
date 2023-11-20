@extends('layouts.main')
<?php $i=0 ?>

@section('content')
    <div class="container">
        <h3>Chosen Location Details:</h3>

        <dl class="row">
            <dt class="col-sm-2">State</dt>
            <dd class="col-sm-10">{{$location->state}}</dd>

            <dt class="col-sm-2">City</dt>
            <dd class="col-sm-10">{{$location->city}}</dd>

            <dt class="col-sm-2">Address</dt>
            <dd class="col-sm-10">{{$location->address}}</dd>

            <dt class="col-sm-2">Zip</dt>
            <dd class="col-sm-10">{{$location->zip}}</dd>

            <dt class="col-sm-2">Latitude</dt>
            <dd class="col-sm-10">{{$location->latitude}}</dd>

            <dt class="col-sm-2">Longitude</dt>
            <dd class="col-sm-10">{{$location->longitude}}</dd>
        </dl>


    <h5>Nearest Location Lists:</h5>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-advance table-hover table-head-bg tablesorter">
            <thead>
            <tr>
                <th width="6%">S.N</th>
                <th>State</th>
                <th>City</th>
                <th>Address</th>
                <th>Zip</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Total Distance Apart</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($nearestLocations)>0)
                @foreach($nearestLocations as $index => $nearestLocation)
                    @if($location->id != $nearestLocation->id)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$nearestLocation->state}}</td>
                            <td>{{$nearestLocation->city}}</td>
                            <td>{{$nearestLocation->address}}</td>
                            <td>{{$nearestLocation->zip}}</td>
                            <td>{{$nearestLocation->latitude}}</td>
                            <td>{{$nearestLocation->longitude}}</td>
                            <td>{{$nearestLocation->distance}}</td>
                            <td class="inline-blocked text-center">
                                <a href="{{route('location.nearest', [$nearestLocation->id])}}">
                                    <button class="btn btn-primary btn-xs">View Nearest Location</button>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    </div>
@endsection
