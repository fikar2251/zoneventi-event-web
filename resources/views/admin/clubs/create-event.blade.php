@extends('layouts.app')

@section('title', 'Add New Event')

@section('content')
    <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="header d-flex align-items-center justify-content-between flex-wrap">
                        <div class="d-flex align-items-center w-100">
                            <div class="back-button">
                                <a href="{{ route('club-detail', $club->id) }}">
                                    <img src="{{ asset('assets/template/icon/Back.svg') }}" alt="Back" class="nav-icon"
                                        style="width: 50px; height: 50px">
                                </a>
                            </div>
                            <h2 class="title">Add New Event</h2>
                        </div>
                    </div>
                </div>

                <div class="form-container" style="max-width: 100%">
                    <form class="mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group input-register file-upload text-center">
                                    <label for="file-upload" class="file-upload-button">
                                        <img src="{{ asset('assets/template/icon/Vector.svg') }}" alt="upload-icon"
                                            class="upload-icon">
                                        <span style="font-size: 14px" class="upload-text">Upload Image or Video</span>
                                        <span class="upload-info">Upload the thumb of the event</span>
                                    </label>
                                    <input type="file" id="file-upload" style="display: none;" accept="image/*,video/*">
                                    <div id="file-preview" class="file-preview mt-3"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="event_name" class="form-label text-12">Event Name</label>
                                    <input type="text" class="form-control text-12" id="event_name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="event_details" class="form-label text-12">Event Details</label>
                                    <textarea class="form-control text-12" id="event_details" rows="3" placeholder="Type Details"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="club_location" class="form-label text-12">Event Location</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control text-12" id="club_location"
                                            placeholder="Uk Street, London (Default)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <img src="{{ asset('assets/template/icon/Location-Form.svg') }}"
                                                    alt="Location" width="20" height="20">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="whats_app" class="form-label text-12">What's App Number</label>
                                    <input type="number" class="form-control text-12" id="whats_app" placeholder="Number">
                                </div>
                                <div class="form-group">
                                    <label for="contact_number" class="form-label text-12">Contact Number</label>
                                    <input type="number" class="form-control text-12" id="contact_number"
                                        placeholder="Number">
                                </div>
                                <div class="form-group">
                                    <label for="event_date" class="form-label text-12">Event Date</label>
                                    <input type="date" class="form-control text-12" id="event_date" placeholder="Date">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="start_event_time" class="form-label text-12">Start Event
                                                Time</label>
                                            <input type="time" class="form-control text-12" id="start_event_time"
                                                placeholder="Start Time">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="end_event_time" class="form-label text-12">End Event Time</label>
                                            <input type="time" class="form-control text-12" id="end_event_time"
                                                placeholder="End Time">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="tags" class="form-label text-12">Tags (5 Max)</label>
                                    <input type="text" class="form-control text-12" id="tags"
                                        placeholder="Enter Tag">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-8">
                                <div id="map" style="height: 300px; width: 100%; border-radius: 8px"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="longitude" class="form-label text-12">Longitude</label>
                                    <input type="text" class="form-control text-12" id="longitude"
                                        placeholder="Longitude">
                                </div>
                                <div class="form-group">
                                    <label for="latitude" class="form-label text-12">Latitude</label>
                                    <input type="text" class="form-control text-12" id="latitude"
                                        placeholder="Latitude">
                                </div>
                            </div>
                        </div>
                        <div class="text-center
                                    mt-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-danger btn-lg mr-2 text-12">Publish as
                                    Feature Event
                                    for $4.99</button>
                                <button type="submit" class="btn btn-primary btn-lg text-12">Publish
                                    Event</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTfsR-_YaHVlZ5X0m0GjsRQd6jXNc7dsc&callback=initMap" async
        defer></script>
    <script>
        document.getElementById('file-upload').addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = document.getElementById('file-preview');
                    preview.style.backgroundImage = 'url(' + e.target.result + ')';
                    preview.style.backgroundSize = 'cover';
                    preview.style.backgroundPosition = 'center';
                    preview.style.width = '100%';
                    preview.style.height = '150px';
                    preview.style.marginTop = '10px';
                    preview.style.borderRadius = '8px';

                    var uploadButton = document.querySelector('.file-upload-button');
                    uploadButton.style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        var map;
        var marker;

        function initMap() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var currentLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map = new google.maps.Map(document.getElementById('map'), {
                        center: currentLocation,
                        zoom: 15
                    });

                    marker = new google.maps.Marker({
                        position: currentLocation,
                        map: map,
                        draggable: true
                    });

                    google.maps.event.addListener(marker, 'dragend', function(event) {
                        document.getElementById('latitude').value = event.latLng.lat();
                        document.getElementById('longitude').value = event.latLng.lng();
                    });

                    document.getElementById('latitude').value = currentLocation.lat;
                    document.getElementById('longitude').value = currentLocation.lng;

                }, function() {
                    handleLocationError(true, map.getCenter());
                });
            } else {
                handleLocationError(false, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, pos) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8
            });

            marker = new google.maps.Marker({
                position: {
                    lat: -34.397,
                    lng: 150.644
                },
                map: map,
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });
        }

        function updateMapFromFields() {
            var lat = parseFloat(document.getElementById('latitude').value);
            var lng = parseFloat(document.getElementById('longitude').value);

            if (!isNaN(lat) && !isNaN(lng)) {
                var newLocation = {
                    lat: lat,
                    lng: lng
                };
                marker.setPosition(newLocation);
                map.setCenter(newLocation);
            }
        }

        document.getElementById('latitude').addEventListener('change', updateMapFromFields);
        document.getElementById('longitude').addEventListener('change', updateMapFromFields);
    </script>
@endsection
