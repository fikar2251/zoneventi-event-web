@extends('layouts.app')

@section('title', 'Add New Club')

@section('content')
    <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="container">
                <div class="header d-flex align-items-center justify-content-between flex-wrap">
                    <div class="d-flex align-items-center w-100">
                        <div class="back-button">
                            <a href="{{ route('clubs-index') }}">
                                <img src="{{ asset('assets/template/icon/Back.svg') }}" alt="Back" class="nav-icon"
                                    style="width: 50px; height: 50px">
                            </a>
                        </div>
                        <h2 class="title mx-auto">Add New Club</h2>
                    </div>
                </div>
            </div>

            <div class="form-container" style="max-width: 800px">
                <div class="text-center">
                    <div class="upload-logo-container">
                        <input type="file" id="club-logo" class="d-none" accept="image/*">
                        <label for="club-logo" class="upload-logo-label">
                            <div class="upload-logo-circle" id="logo-preview">
                                <img src="{{ asset('assets/template/icon/Vector.svg') }}" alt="upload-icon"
                                    class="upload-icon">
                                <span class="upload-logo-text">Upload Logo</span>
                                <small class="upload-logo-small">Upload the thumb of the event</small>
                            </div>
                        </label>
                    </div>
                </div>
                <form class="mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="club_name" class="form-label text-12">Club Name</label>
                                <input type="text" class="form-control text-12" id="club_name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="club_location" class="form-label text-12">Club Location</label>
                                <div class="input-group">
                                    <input type="text" class="form-control text-12" id="club_location"
                                        placeholder="Location">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <img src="{{ asset('assets/template/icon/Location-Form.svg') }}" alt="Location"
                                                width="20" height="20">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label text-12">Email</label>
                                <input type="text" class="form-control text-12" id="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="assign_owner" class="form-label text-12">Assign Owner</label>
                                <input type="text" class="form-control text-12" id="assign_owner"
                                    placeholder="Owner email">
                            </div>
                            <div class="form-group">
                                <label for="club_phone" class="form-label text-12">Club Phone Number</label>
                                <input type="number" class="form-control text-12" id="club_phone" placeholder="Number">
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label text-12">Password</label>
                                <input type="password" class="form-control text-12" id="password"
                                    placeholder="Enter password">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-sm px-4 text-12">Add Club</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('club-logo').addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var preview = document.getElementById('logo-preview');
                    preview.style.backgroundImage = 'url(' + e.target.result + ')';
                    preview.style.backgroundSize = 'cover';
                    preview.style.backgroundPosition = 'center';

                    preview.querySelector('.upload-icon').style.display = 'none';
                    preview.querySelector('.upload-logo-text').style.display = 'none';
                    preview.querySelector('.upload-logo-small').style.display = 'none';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
