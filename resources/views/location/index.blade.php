@extends('layouts.main')

@section('content')
            <div>
                Search By:
                <label for="address">Address</label><input type="text" id="address">
                <input type="button" value="Search" id="searchBtn">
            </div>
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
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="location-details">
                        @if(count($locations)>0)
                            @foreach($locations as $index => $location)
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td>{{$location->state}}</td>
                                    <td>{{$location->city}}</td>
                                    <td>{{$location->address}}</td>
                                    <td>{{$location->zip}}</td>
                                    <td>{{$location->latitude}}</td>
                                    <td>{{$location->longitude}}</td>
                                    <td class="inline-blocked text-center">
                                        <a href="{{route('location.nearest', [$location->id])}}">
                                            <button class="btn btn-primary btn-xs">View Nearest Location</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                </table>
            </div>

           <p id="paginated"> {{ $locations->links() }}</p>

@endsection

@section('scripts')
    <script>
        $('#searchBtn').on('click',function(){
            $.ajax({
                type: 'GET',
                url: '{{ route('location.index') }}',
                data: {
                    'address': $('#address').val()
                },
                success: function (response) {
                    let locationContent = $(".location-details");
                    locationContent.html('');
                    $("#paginated").hide();
                    $.each(response.data, function (key, value) {
                        locationContent.append(`
                                    <tr>
                                        <td>${key}</td>
                                        <td>${value.state}</td>
                                        <td>${value.city}</td>
                                        <td>${value.address}</td>
                                        <td>${value.zip}</td>
                                        <td>${value.latitude}</td>
                                        <td>${value.longitude}</td>
                                        <td class="inline-blocked text-center">
                                            <a href="locations/${value.id}">
                                                <button class="btn btn-primary btn-xs">View Nearest Location</button>
                                            </a>
                                        </td>
                                    </tr>
                                `);
                    });
                }
            });
        })
    </script>
@endsection
