@extends('layouts.app')

@section('title', 'Add New Club Event')

@section('content')
    <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="header d-flex align-items-center justify-content-between flex-wrap">
                <div class="d-flex align-items-center">
                    {{-- <h2 class="title">Add New Club</h2> --}}
                </div>
            </div>

            <div class="form-container">
                <div class="text-center">
                    <div class="upload-logo-container">
                        <input type="file" id="club-logo" class="d-none" accept="image/*">
                        <label for="club-logo" class="upload-logo-label">
                            <div class="logo-preview-container">
                                <img src="{{ asset('assets/template/img/ClubModal.jpg') }}" alt="Club logo"
                                    class="logo-preview" id="logo-preview">
                            </div>
                        </label>
                        <label for="club-logo" class="club-logo-edit-button">
                            <img src="{{ asset('assets/template/icon/EditModal.svg') }}" alt="Edit"
                                class="club-logo-edit-icon">
                        </label>
                    </div>
                    <div class="header-event-club">
                        <h2 class="mb-0 title-header-event">Zodiac Club</h2>
                        <h6 class="mt-1 text-muted title-header-follower">1756 Followers</h6>
                    </div>
                </div>
                <form class="mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="club_name" class="form-label text-12">Club Name</label>
                                <input type="text" class="form-control text-12" id="club_name" placeholder="Name"
                                    value="Zoldic Club">
                            </div>
                            <div class="form-group">
                                <label for="club_location" class="form-label text-12">Club Location</label>
                                <div class="input-group">
                                    <input type="text" class="form-control text-12" id="club_location"
                                        placeholder="Location" value="London Street, UK">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <img src="{{ asset('assets/template/icon/Location-Form.svg') }}" alt="Location"
                                                width="20" height="20">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="assign_owner" class="form-label text-12">Owner Email</label>
                                <input type="text" class="form-control text-12" id="assign_owner"
                                    placeholder="Owner email" value="owner@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="club_phone" class="form-label text-12">Club Phone</label>
                                <input type="text" class="form-control text-12" id="club_phone" placeholder="Number"
                                    value="+44 2920 3839 2890 00">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="club_whatsapp" class="form-label text-12">Club Whats App Number</label>
                                <input type="text" class="form-control text-12" id="club_whatsapp" placeholder="Number"
                                    value="+44 2920 3839 2890 00">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-sm px-4 text-12">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
    </script>
@endsection
