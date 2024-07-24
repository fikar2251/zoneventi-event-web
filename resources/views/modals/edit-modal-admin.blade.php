<div id="editConfirmModal" class="modal">
    <div class="modal-content edit-modal-content">
        <div class="modal-header">
            <button id="editBackButton" class="back-btn">
                <img src="{{ asset('assets/template/icon/Back-Modal.svg') }}" alt="Back" class="back-modal-icon">
            </button>
            <h2 class="header-title">Admin Details</h2>
            <button id="saveChanges" class="btn btn-primary save-change-button">Save Change</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="user-info-section">
                        <img src="{{ asset('assets/template/img/ProfileShow.jpg') }}" alt="Profile"
                            class="profile-image">
                        <div class="user-details">
                            <p><span class="label">Name:</span> <span class="value">Andreina
                                    Tuccella</span></p>
                            <p><span class="label">DOB:</span> <span class="value">01/11/2000</span>
                            </p>
                            <p><span class="label">Gender:</span> <span class="value">Female</span>
                            </p>
                            <p><span class="label">Email:</span> <span class="value">email@gmail.com</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="edit-form">
                        <div class="form-group">
                            <label for="editStatus" class="form-label-modal">Status</label>
                            <select id="editStatus" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Owner">Owner</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editAssignClub" class="form-label-modal">Assign Club</label>
                            <select id="editAssignClub" class="form-control">
                                <option value="Non">Non</option>
                                <!-- Add other club options here -->
                            </select>
                        </div>
                        <div class="action-buttons">
                            <button class="btn btn-danger text-12">Block User</button>
                            <button class="btn btn-danger text-12">Delete User</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
