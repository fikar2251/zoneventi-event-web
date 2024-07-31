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
                            <img src="{{ asset('assets/template/icon/ImgClub.svg') }}" alt="Club Logo" class="club-logo">
                            <div class="club-details ml-3">
                                <h3 class="club-name">Heaven</h3>
                                <div class="club-location">
                                    <p class="location-text"><img src="{{ asset('assets/template/icon/Location.svg') }}"
                                            alt="location" class="location-icon-club"> Teramo (TE)</p>
                                </div>
                                <p class="club-phone">+44 6281 228 2990</p>
                            </div>
                        </div>
                        <div class="buttons d-flex">
                            <button class="btn btn-edit text-12">Edit Club Details</button>
                            <a href="{{ route('event-create', ['id' => $club->id]) }}" class="btn btn-add text-12">Add New
                                Event</a>
                            <button class="btn btn-delete text-12">Delete Club</button>
                        </div>
                    </div>

                    <!-- Ongoing Events Section -->
                    <div class="events mt-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="header-events" style="margin-left: 20px">Ongoing Events</h4>
                        </div>
                        <div class="event-cards-container {{ $eventCount > 3 ? 'scrollable' : '' }}">
                            <div class="event-cards">
                                @foreach ($events as $item)
                                    <div class="event-card">
                                        <div class="event-header">
                                            <img src="{{ asset('assets/template/img/Thumbnail.jpg') }}"
                                                alt="Event Thumbnail" class="event-thumbnail">
                                        </div>
                                        <div class="event-content">
                                            <div class="event-info">
                                                <p class="event-date-time text-spacing">
                                                    <span class="event-date text-spacing">VEN 16 GIU</span>
                                                    <span class="event-time text-spacing"> | 23:59 - 05:00</span>
                                                </p>
                                                <h5 class="event-title text-spacing">La Terrazza - Hola Chica</h5>
                                                <p class="event-location text-spacing">
                                                    La Terrazza
                                                    <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                        alt="location" class="location-icon-club">
                                                    <span class="location-text text-spacing">San Benedetto (AP)</span>
                                                </p>
                                                <div class="event-tags">
                                                    <span class="tag">Hip hop</span>
                                                    <span class="tag">Disco</span>
                                                    <span class="tag">Reggaeton</span>
                                                </div>
                                            </div>
                                            <div class="edit-icon">
                                                <button class="btn btn-edit-event">
                                                    <img src="{{ asset('assets/template/icon/edit.svg') }}" alt="Edit"
                                                        class="edit-icon-button" style="width: 40px; height: 40px">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Events Section -->
                    <div class="events mt-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="header-events" style="margin-left: 20px">Ongoing Events</h4>
                        </div>
                        <div class="event-cards-container {{ $eventCount > 3 ? 'scrollable' : '' }}">
                            <div class="event-cards">
                                @foreach ($events as $item)
                                    <div class="event-card">
                                        <div class="event-header">
                                            <img src="{{ asset('assets/template/img/Event.jpg') }}" alt="Event Thumbnail"
                                                class="event-thumbnail">
                                        </div>
                                        <div class="event-content">
                                            <div class="event-info">
                                                <p class="event-date-time text-spacing"><span
                                                        class="event-date text-spacing">VEN 16
                                                        GIU</span> <span class="event-time text-spacing"> | 23:59 -
                                                        05:00</span>
                                                </p>
                                                <h5 class="event-title text-spacing">La Terrazza - Hola Chica</h5>
                                                <p class="event-location text-spacing">
                                                    La Terrazza
                                                    <img src="{{ asset('assets/template/icon/Location.svg') }}"
                                                        alt="location" class="location-icon-club">
                                                    <span class="location-text">San Benedetto (AP)</span>
                                                </p>
                                                <div class="event-tags">
                                                    <span class="tag">Hip hop</span>
                                                    <span class="tag">Disco</span>
                                                    <span class="tag">Reggaeton</span>
                                                </div>
                                            </div>
                                            <div class="edit-icon">
                                                <button class="btn btn-edit-event">
                                                    <img src="{{ asset('assets/template/icon/edit.svg') }}" alt="Edit"
                                                        class="edit-icon-button" style="width: 40px; height: 40px">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
    </div>
@endsection

@section('scripts')
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
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _method: 'DELETE',
                            submit: true,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.code == 'success') {
                                Swal.fire('Success', response.msg, 'success');
                            } else {
                                Swal.fire('Oops', response.msg, 'error');
                            }

                            if ($('.dataTable').length) {
                                $('.dataTable').DataTable().draw(false);
                            } else {
                                window.location.reload();
                            }
                        },
                        error: function() {
                            Swal.fire('Oops', 'Something went wrong!', 'error');
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
                uploadButton.style.display = 'flex'; // Changed from block to flex
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
            var editModalContent = editModal.querySelector('.edit-modal-content');
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

            editModalContent.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            var editButtons = document.querySelectorAll('.btn.btn-edit-event');
            editButtons.forEach(function(button) {
                button.addEventListener('click', openEditModal);
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editModal = document.getElementById('editClubModal');
            var editModalContent = editModal.querySelector('.edit-modal-content');
            var editBackButton = document.getElementById('editBackButtonClub');

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

            editModalContent.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            document.querySelector('.btn.btn-edit.text-12').addEventListener('click', openEditModal);
        });
    </script>
@endsection
