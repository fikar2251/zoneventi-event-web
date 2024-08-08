@extends('layouts.app')

@section('title', 'Detail Club')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="header d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="back-button">
                                <a href="{{ route('clubs-index') }}">
                                    <img src="{{ asset('assets/template/icon/Back.svg') }}" alt="Back" class="nav-icon"
                                        style="width: 50px; height: 50px">
                                </a>
                            </div>
                        </div>
                        <div class="header-title">
                            <h1>Club Details</h1>
                        </div>
                        <div class="admin-edit">
                            <div class="admin-top">
                                <span style="font-size: 14px">Club admins</span> <a href="#"
                                    style="font-size: 12px">Edit</a>
                            </div>
                            <div class="admin-bottom">
                                <span style="font-size: 18px;">All Admins</span>
                            </div>
                        </div>
                    </div>

                    <!-- Club Info Section -->
                    <div class="club-info d-flex align-items-center justify-content-between mt-4">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($clubs->logo) }}" alt="Club Logo" class="club-logo">
                            <div class="club-details ml-3">
                                <h3 class="club-name">{{ $clubs->name }}</h3>
                                <div class="club-location">
                                    <p class="location-text"><img src="{{ asset('assets/template/icon/Location.svg') }}"
                                            alt="location" class="location-icon-club"> {{ $clubs->location }}</p>
                                </div>
                                <p class="club-phone">+ {{ $clubs->phone }}</p>
                            </div>
                        </div>
                        <div class="buttons d-flex">
                            <button class="btn btn-edit text-12">Edit Club Details</button>
                            <a href="{{ route('event-create', ['id' => $clubs->id]) }}" class="btn btn-add text-12">Add New
                                Event</a>
                            <button class="btn btn-delete text-12" data-url="{{ route('club-delete', $clubs->id) }}">Delete
                                Club</button>
                        </div>
                    </div>

                    <!-- Ongoing Events Section -->
                    <div class="events-container">
                        <div class="events mt-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="header-events" style="margin-left: 20px">Ongoing Events</h4>
                            </div>
                            @if (count($ongoingEvents) > 0)
                                <div class="event-cards-container {{ $ongoingEventCount > 3 ? 'scrollable' : '' }}">
                                    <div class="event-cards">
                                        @foreach ($ongoingEvents as $item)
                                            <div class="event-card">
                                                <div class="event-header">
                                                    <img src="{{ asset($item['banner']) }}" alt="Event Thumbnail"
                                                        class="event-thumbnail">
                                                </div>
                                                <div class="event-content">
                                                    <div class="event-info">
                                                        <p class="event-date-time text-spacing">
                                                            <span
                                                                class="event-date text-spacing">{{ strtoupper($item['formatted_event_date']) }}</span>
                                                            <span class="event-time text-spacing"> |
                                                                {{ $item['event_time_start'] }} -
                                                                {{ $item['event_time_end'] }}</span>
                                                        </p>
                                                        <h5 class="event-title text-spacing">{{ $item['name'] }} -
                                                            {{ $item['name'] }}</h5>
                                                        <p class="event-location text-spacing">
                                                            {{ $item['name'] }}
                                                            <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                                alt="location" class="location-icon-club">
                                                            <span
                                                                class="location-text text-spacing">{{ $item['location'] }}</span>
                                                        </p>
                                                        <div class="event-tags">
                                                            <span class="tag">Hip hop</span>
                                                            <span class="tag">Disco</span>
                                                            <span class="tag">Reggaeton</span>
                                                        </div>
                                                    </div>
                                                    <div class="edit-icon">
                                                        <button class="btn btn-edit-event"
                                                            data-event-id="{{ $item['id'] }}"
                                                            data-club-id="{{ $clubs->id }}"
                                                            data-event-name="{{ $item['name'] }}"
                                                            data-event-location="{{ $item['location'] }}"
                                                            data-event-date="{{ $item['event_date'] }}"
                                                            data-event-time-start="{{ $item['event_time_start'] }}"
                                                            data-event-time-end="{{ $item['event_time_end'] }}"
                                                            data-event-banner="{{ asset($item['banner']) }}"
                                                            data-event-details="{{ $item['description'] }}"
                                                            data-whatsapp-number="{{ $item['whatsapp_number'] }}"
                                                            data-contact-number="{{ $item['contact_number'] }}"
                                                            data-tags="{{ $item['tags'] }}" data-event-type="ongoing">
                                                            <img src="{{ asset('assets/template/icon/edit.svg') }}"
                                                                alt="Edit" class="edit-icon-button"
                                                                style="width: 40px; height: 40px">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <p class="no-data-message-event">No ongoing events available at the moment.</p>
                            @endif
                        </div>

                        <!-- Upcoming Events Section -->
                        <div class="events">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="header-events" style="margin-left: 20px">Upcoming Events</h4>
                            </div>
                            @if (count($upcomingEvents) > 0)
                                <div class="event-cards-container {{ $upcomingEventCount > 3 ? 'scrollable' : '' }}">
                                    <div class="event-cards">
                                        @foreach ($upcomingEvents as $item)
                                            <div class="event-card">
                                                <div class="event-header">
                                                    <img src="{{ asset($item['banner']) }}" alt="Event Thumbnail"
                                                        class="event-thumbnail">
                                                </div>
                                                <div class="event-content">
                                                    <div class="event-info">
                                                        <p class="event-date-time text-spacing">
                                                            <span
                                                                class="event-date text-spacing">{{ strtoupper($item['formatted_event_date']) }}</span>
                                                            <span class="event-time text-spacing"> |
                                                                {{ $item['event_time_start'] }} -
                                                                {{ $item['event_time_end'] }}</span>
                                                        </p>
                                                        <h5 class="event-title text-spacing">{{ $item['name'] }} -
                                                            {{ $item['name'] }}</h5>
                                                        <p class="event-location text-spacing">
                                                            {{ $item['name'] }}
                                                            <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                                alt="location" class="location-icon-club">
                                                            <span
                                                                class="location-text text-spacing">{{ $item['location'] }}</span>
                                                        </p>
                                                        <div class="event-tags">
                                                            <span class="tag">Hip hop</span>
                                                            <span class="tag">Disco</span>
                                                            <span class="tag">Reggaeton</span>
                                                        </div>
                                                    </div>
                                                    <div class="edit-icon">
                                                        <button class="btn btn-edit-event"
                                                            data-event-id="{{ $item['id'] }}"
                                                            data-event-name="{{ $item['name'] }}"
                                                            data-event-location="{{ $item['location'] }}"
                                                            data-event-date="{{ $item['event_date'] }}"
                                                            data-event-time-start="{{ $item['event_time_start'] }}"
                                                            data-event-time-end="{{ $item['event_time_end'] }}"
                                                            data-event-banner="{{ asset($item['banner']) }}"
                                                            data-event-details="{{ $item['description'] }}"
                                                            data-whatsapp-number="{{ $item['whatsapp_number'] }}"
                                                            data-contact-number="{{ $item['contact_number'] }}"
                                                            data-tags="{{ $item['tags'] }}" data-event-type="ongoing">
                                                            <img src="{{ asset('assets/template/icon/edit.svg') }}"
                                                                alt="Edit" class="edit-icon-button"
                                                                style="width: 40px; height: 40px">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <p class="no-data-message-event">No upcoming events available at the moment.</p>
                            @endif
                        </div>
                    </div>

                    {{-- edit modal club --}}
                    @include('modals.edit-modal-club')

                    {{-- edit modal event --}}
                    @include('modals.edit-modal-event')
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTfsR-_YaHVlZ5X0m0GjsRQd6jXNc7dsc&callback=initMap" async
        defer></script>
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
    <script>
        $('body').on('click', '.btn.btn-delete.text-12', function(e) {
            e.preventDefault();

            const url = $(this).data('url');

            Swal.fire({
                title: 'Are you sure?',
                text: "It will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                customClass: {
                    popup: 'swal2-popup',
                    confirmButton: 'swal2-confirm',
                    cancelButton: 'swal2-cancel',
                    content: 'swal2-content'
                }
            }).then(function(result) {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.code === 'success') {
                                Swal.fire('Success', response.msg, 'success').then(() => {
                                    window.location.href =
                                        '{{ route('clubs-index') }}';
                                });
                            } else {
                                Swal.fire('Oops', response.msg, 'error');
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire('Oops', 'Something went wrong! ' + xhr.responseText,
                                'error');
                        }
                    });
                }
            });
        });
    </script>
    <script>
        document.getElementById('club-logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('logo-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('file-upload').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('file-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var fileUpload = document.getElementById('file-upload');
            var filePreview = document.getElementById('file-preview');
            var defaultImage = document.getElementById('default-image');
            var cancelImage = document.getElementById('cancel-image');
            var uploadButton = document.querySelector('.file-upload-button');

            defaultImage.style.display = 'block';
            uploadButton.style.display = 'none';

            fileUpload.addEventListener('change', function(e) {
                var file = e.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        defaultImage.style.display = 'none';
                        filePreview.style.backgroundImage = 'url(' + e.target.result + ')';
                        filePreview.style.backgroundSize = 'cover';
                        filePreview.style.backgroundPosition = 'center';
                        filePreview.style.width = '100%';
                        filePreview.style.height = '120px';
                        filePreview.style.marginTop = '10px';
                        filePreview.style.borderRadius = '8px';
                        cancelImage.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                }
            });

            cancelImage.addEventListener('click', function() {
                defaultImage.style.display = 'none';
                uploadButton.style.display = 'flex';
                filePreview.style.backgroundImage = 'none';
                cancelImage.style.display = 'none';
            });
        });


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
                    preview.style.height = '120px';
                    preview.style.marginTop = '10px';
                    preview.style.borderRadius = '8px';

                    var uploadButton = document.querySelector('.file-upload-button');
                    uploadButton.style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var editModal = document.getElementById('editEventModal');
            var editModalContentEvent = editModal.querySelector('.edit-modal-content-event');
            var editBackButton = document.getElementById('editBackButtonEvent');

            function openEditModal() {
                editModal.style.display = 'block';
                document.body.classList.add('modal-open');
                setTimeout(() => {
                    editModal.classList.add('show');
                }, 10);
            }

            function closeEditModal() {
                editModal.classList.remove('show');
                document.body.classList.remove('modal-open');
                setTimeout(() => {
                    editModal.style.display = 'none';
                }, 300);
            }

            editBackButton.addEventListener('click', closeEditModal);

            editModal.addEventListener('click', function(event) {
                if (event.target === editModal) {
                    closeEditModal();
                }
            });

            editModalContentEvent.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            var editButtons = document.querySelectorAll('.btn.btn-edit-event');
            editButtons.forEach(function(button) {
                button.addEventListener('click', openEditModal);
            });

            let currentEventId, currentClubId;
            document.querySelectorAll('.btn.btn-edit-event').forEach(function(button) {
                button.addEventListener('click', function() {
                    currentEventId = this.getAttribute('data-event-id');
                    currentClubId = this.getAttribute('data-club-id');
                    var eventName = this.getAttribute('data-event-name');
                    var eventLocation = this.getAttribute('data-event-location');
                    var eventDate = this.getAttribute('data-event-date');
                    var eventTimeStart = this.getAttribute('data-event-time-start');
                    var eventTimeEnd = this.getAttribute('data-event-time-end');
                    var eventBanner = this.getAttribute('data-event-banner');
                    var eventDetails = this.getAttribute('data-event-details');
                    var whatsappNumber = this.getAttribute('data-whatsapp-number');
                    var contactNumber = this.getAttribute('data-contact-number');
                    var tags = this.getAttribute('data-tags');

                    document.getElementById('event_name').value = eventName;
                    document.getElementById('event_location').value = eventLocation;
                    document.getElementById('event_date').value = eventDate;
                    document.getElementById('event_time_start').value = eventTimeStart;
                    document.getElementById('event_time_end').value = eventTimeEnd;
                    document.getElementById('event_details').value = eventDetails;
                    document.getElementById('whats_app').value = whatsappNumber;
                    document.getElementById('contact_number').value = contactNumber;
                    document.getElementById('tags').value = tags;

                    if (document.getElementById('preview-image')) {
                        document.getElementById('preview-image').src = eventBanner;
                    }

                    openEditModal();
                });
            });

            document.getElementById('saveChangeEvent').addEventListener('click', function() {
                console.log('Current Event ID:', currentEventId);
                var formData = new FormData();
                formData.append('name', document.getElementById('event_name').value);
                formData.append('contact_number', document.getElementById('contact_number').value);
                formData.append('description', document.getElementById('event_details').value);
                formData.append('location', document.getElementById('event_location').value);
                formData.append('whatsapp_number', document.getElementById('whats_app').value);
                formData.append('event_time_start', document.getElementById('event_time_start').value);
                formData.append('event_time_end', document.getElementById('event_time_end').value);
                formData.append('event_date', document.getElementById('event_date').value);
                formData.append('latitude', document.getElementById('latitude').value);
                formData.append('longitude', document.getElementById('longitude').value);
                formData.append('tags', document.getElementById('tags').value);

                var bannerInput = document.getElementById('file-upload');
                if (bannerInput.files.length > 0) {
                    formData.append('banner', bannerInput.files[0]);
                } else {
                    var existingBanner = document.getElementById('preview-image').src;
                    formData.append('banner', existingBanner);
                }

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('_method', 'PUT');

                const url = `/clubs-detail/${currentClubId}/events-update/${currentEventId}`;
                console.log('Fetch URL:', url);

                fetch(url, {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => {
                        console.log('Response Status:', response.status);
                        return response.json();
                    })
                    .then(data => {
                        console.log('Response Data:', data);
                        if (data.success) {

                            closeEditModal();

                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });

                            setTimeout(function() {
                                window.location.reload();
                            }, 1500);
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.message
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Toast.fire({
                            icon: 'error',
                            title: 'Something went wrong!'
                        });
                    });
            });


        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editModal = document.getElementById('editClubModal');
            var editModalEventClub = editModal.querySelector('.edit-modal-content-club');
            var editBackButton = document.getElementById('editBackButtonClub');
            var saveChangesButton = document.getElementById('saveChangeClub');
            var updateClubForm = document.getElementById('updateClubForm');

            function openEditModal() {
                editModal.style.display = 'block';
                document.body.classList.add('modal-open');
                setTimeout(() => {
                    editModal.classList.add('show');
                }, 10);
            }

            function closeEditModal() {
                editModal.classList.remove('show');
                document.body.classList.remove('modal-open');
                setTimeout(() => {
                    editModal.style.display = 'none';
                }, 300);
            }

            editBackButton.addEventListener('click', closeEditModal);

            editModal.addEventListener('click', function(event) {
                if (event.target === editModal) {
                    closeEditModal();
                }
            });

            editModalEventClub.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            document.querySelector('.btn.btn-edit.text-12').addEventListener('click', function() {
                var clubName = "{{ $clubs->name }}";
                var clubLocation = "{{ $clubs->location }}";
                var clubOwner = "{{ $clubs->owner_id }}";
                var clubPhone = "{{ $clubs->phone }}";
                var clubLogo = "{{ asset($clubs->logo) }}";

                document.getElementById('club_name').value = clubName;
                document.getElementById('club_location').value = clubLocation;
                document.getElementById('club_phone').value = clubPhone;
                document.getElementById('logo-preview').src = clubLogo;

                openEditModal();

                setTimeout(function() {
                    setOwnerSelect(clubOwner);
                }, 100);
            });

            function setOwnerSelect(clubOwner) {
                var ownerSelect = document.getElementById('owner_id');
                if (ownerSelect) {
                    ownerSelect.value = clubOwner;

                    if (ownerSelect.value !== clubOwner) {
                        for (var i = 0; i < ownerSelect.options.length; i++) {
                            if (ownerSelect.options[i].value == clubOwner) {
                                ownerSelect.selectedIndex = i;
                                break;
                            }
                        }
                    }
                }
            }

            document.getElementById('saveChangeClub').addEventListener('click', function() {
                var formData = new FormData();
                formData.append('name', document.getElementById('club_name').value);
                formData.append('location', document.getElementById('club_location').value);
                formData.append('owner_id', document.getElementById('owner_id').value);
                formData.append('phone', document.getElementById('club_phone').value);

                var logoInput = document.getElementById('club-logo');
                if (logoInput.files.length > 0) {
                    formData.append('logo', logoInput.files[0]);
                }

                formData.append('_token', '{{ csrf_token() }}');
                formData.append('_method', 'PUT');

                fetch('{{ route('club-update', ['id' => $clubs->id]) }}', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.querySelector('.club-name').textContent = data.club.name;
                            document.querySelector('.location-text').textContent = data.club.location;
                            document.querySelector('.club-phone').textContent = '+ ' + data.club.phone;
                            document.querySelector('.club-logo').src = data.club.logo;

                            closeEditModal();

                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });

                            setTimeout(function() {
                                window.location.reload();
                            }, 1500);

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.message
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Toast.fire({
                            icon: 'error',
                            title: 'Something went wrong!'
                        });
                    });
            });

        });
    </script>
@endsection
