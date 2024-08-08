<div id="editClubModal" class="modal">
    <div class="modal-content edit-modal-content-club">
        <div class="modal-header">
            <button id="editBackButtonClub" class="back-btn">
                <img src="{{ asset('assets/template/icon/Back-Modal.svg') }}" alt="Back" class="back-modal-icon">
            </button>
            <h2 class="header-title">Edit Club</h2>
            <button id="saveChangeClub" class="btn btn-primary save-change-button">Save Change</button>
        </div>
        <div class="modal-body">
            <div class="row">
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
                    </div>
                    <form class="mt-3" action="{{ route('club-update', ['id', $clubs->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="club_name" class="form-label-modal text-12">Club
                                        Name</label>
                                    <input type="text" class="form-control text-12" id="club_name"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="club_location" class="form-label-modal text-12">Club
                                        Location</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control text-12" id="club_location"
                                            placeholder="Location">
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
                                    <label for="assign_owner" class="form-label-modal text-12">Assign
                                        Owner</label>
                                    <select name="owner_id" id="owner_id" class="form-control text-12">
                                        <option value="">Select option</option>
                                        @foreach ($owners as $owner)
                                            <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="club_phone" class="form-label-modal text-12">Club
                                        Phone Number</label>
                                    <input type="text" class="form-control text-12" id="club_phone"
                                        placeholder="Number">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
