<div id="editEventModal" class="modal">
    <div class="modal-content edit-modal-content-event">
        <div class="modal-header">
            <button id="editBackButtonEvent" class="back-btn">
                <img src="{{ asset('assets/template/icon/Back-Modal.svg') }}" alt="Back" class="back-modal-icon">
            </button>
            <h2 class="header-title">Edit Event</h2>
            <button id="saveChangeEvent" class="btn btn-primary save-change-button">Save Change</button>
        </div>
        <div class="modal-body">
            <form action="{{ route('events-update', ['clubId' => $clubs->id, 'eventId' => '__EVENT_ID__']) }}"
                class="mt-3">
                <input type="hidden" id="event_id" name="event_id">
                <input type="hidden" id="club_id" name="club_id">
                <input type="hidden" id="event_type">
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
                                        class="event-thumbnail" id="preview-image"
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
                            <input type="text" class="form-control text-12" id="event_name" name="name"
                                placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="event_details" class="form-label-modal text-12">Event
                                Details</label>
                            <textarea class="form-control text-12" id="event_details" name="description" rows="3" placeholder="Type Details"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="event_location" class="form-label-modal text-12">Event
                                Location</label>
                            <div class="input-group">
                                <input type="text" class="form-control text-12" id="event_location" name="location"
                                    placeholder="Uk Street, London (Default)">
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
                            <label for="whats_app" class="form-label-modal text-12">What’s App
                                Number</label>
                            <input type="text" class="form-control text-12" id="whats_app" placeholder="Number">
                        </div>
                        <div class="form-group">
                            <label for="contact_number" class="form-label-modal text-12">Contact
                                Number</label>
                            <input type="text" class="form-control text-12" id="contact_number" name="contact_number"
                                placeholder="Number">
                        </div>
                        <div class="form-group">
                            <label for="event_date" class="form-label-modal text-12">Event Date</label>
                            <input type="date" class="form-control text-12" id="event_date" name="event_date"
                                placeholder="Date">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="event_time_start" class="form-label-modal text-12">Start Event
                                        Time</label>
                                    <input type="time" class="form-control text-12" id="event_time_start"
                                        name="event_time_start" placeholder="Time">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="event_time_end" class="form-label-modal text-12">End Event
                                        Time</label>
                                    <input type="time" class="form-control text-12" id="event_time_end"
                                        placeholder="Time">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="tags" class="form-label-modal text-12">Tags (5 Max)</label>
                            <select class="form-control text-12" id="tags">
                                <option value="Hip hop">Hip hop</option>
                                <option value="Disco">Disco</option>
                                <option value="Reggaeton">Reggaeton</option>
                                <option value="Rock">Rock</option>
                                <option value="Pop">Pop</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-8">
                        <div id="map" style="height: 300px; width: 100%; border-radius: 8px"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="longitude" class="form-label-modal text-12">Longitude</label>
                            <input type="text" class="form-control text-12" name="longitude" id="longitude"
                                placeholder="Longitude">
                        </div>
                        <div class="form-group">
                            <label for="latitude" class="form-label-modal text-12">Latitude</label>
                            <input type="text" class="form-control text-12" name="latitude" id="latitude"
                                placeholder="Latitude">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
