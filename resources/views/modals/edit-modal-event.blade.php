<div id="editEventModal" class="modal">
    <div class="modal-content edit-modal-content">
        <div class="modal-header">
            <button id="editBackButtonEvent" class="back-btn">
                <img src="{{ asset('assets/template/icon/Back-Modal.svg') }}" alt="Back" class="back-modal-icon">
            </button>
            <h2 class="header-title">Edit Event</h2>
            <button id="saveChanges" class="btn btn-primary save-change-button">Save Change</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group input-register file-upload text-center">
                        <label for="file-upload" class="file-upload-button">
                            <img src="{{ asset('assets/template/icon/Vector.svg') }}" alt="upload-icon"
                                class="upload-icon">
                            <span style="font-size: 14px" class="upload-text">Upload Image or
                                Video</span>
                            <span class="upload-info">Upload the thumb of the event</span>
                        </label>
                        <input type="file" id="file-upload" style="display: none;" accept="image/*,video/*">
                        <div id="file-preview" class="file-preview mt-3">
                            <div id="default-image" style="position: relative;">
                                <img src="{{ asset('assets/template/img/Thumbnail.jpg') }}" alt="Event Thumbnail"
                                    class="event-thumbnail"
                                    style="width: 100%; height: 120px; object-fit: cover; border-radius: 8px;">
                                <button id="cancel-image"
                                    style="position: absolute; top: 5px; right: 5px; background: none; border: none; cursor: pointer;">
                                    <img src="{{ asset('assets/template/icon/Back-Modal.svg') }}" alt="Back"
                                        style="width: 30px; height: 30px;">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="event_name" class="form-label-modal text-12">Event Name</label>
                        <input type="text" class="form-control text-12" id="event_name" placeholder="Name"
                            value="The Club Party">
                    </div>
                    <div class="form-group">
                        <label for="club_location" class="form-label-modal text-12">Event
                            Location</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-12" id="club_location"
                                placeholder="Uk Street, London (Default)" value="London street, UK">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <img src="{{ asset('assets/template/icon/Location-Form.svg') }}" alt="Location"
                                        width="20" height="20">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event_details" class="form-label-modal text-12">Event
                            Details</label>
                        <textarea class="form-control text-12" id="event_details" rows="3" placeholder="Type Details"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="whats_app" class="form-label-modal text-12">What’s App
                            Number</label>
                        <input type="text" class="form-control text-12" id="whats_app" placeholder="Number"
                            value="+440 2829 293 992">
                    </div>
                    <div class="form-group">
                        <label for="contact_number" class="form-label-modal text-12">Contact
                            Number</label>
                        <input type="text" class="form-control text-12" id="contact_number" placeholder="Number"
                            value="+440 2829 293 992">
                    </div>
                    <div class="form-group">
                        <label for="event_date" class="form-label-modal text-12">Event Date</label>
                        <input type="date" class="form-control text-12" id="event_date" placeholder="Date"
                            value="2024-03-23">
                    </div>
                    <div class="form-group">
                        <label for="event_time" class="form-label-modal text-12">Event Time</label>
                        <input type="time" class="form-control text-12" id="event_time" placeholder="Time"
                            value="11:00">
                    </div>
                    <div class="form-group">
                        <label for="tags" class="form-label-modal text-12">Tags (5 Max)</label>
                        <input type="text" class="form-control text-12" id="tags" placeholder="Enter Tag"
                            value="Concert, Party, Dance">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
