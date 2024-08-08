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
                        <h2 class="title">Club Details</h2>
                    </div>
                </div>
            </div>

            <div class="detail-form">
                <form class="mt-5" action="{{ route('club-action', ['id' => $club->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="action" id="action" value="accept">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="document_type" class="form-label text-12">Select the document's type*</label>
                                <input type="text" class="form-control text-12" id="document_type" placeholder="Type"
                                    value="{{ $detail->documents_type }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="document_number" class="form-label text-12">Enter document's number*</label>
                                <input type="text" class="form-control text-12" id="document_number" placeholder="Number"
                                    value="{{ $detail->document_number }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="expire_date" class="form-label text-12">Expire date*</label>
                                <input type="date" class="form-control text-12" id="expire_date" placeholder="Date"
                                    value="{{ $detail->documents_expire_date }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="club_document" class="form-label text-12">Club Document*</label>
                                <input type="text" class="form-control text-12" id="club_document"
                                    placeholder="No Documents Added" value="No Documents Added">
                            </div>
                            <div class="form-group">
                                <label for="premises_owner" class="form-label text-12">Name of Premises Owner*</label>
                                <input type="text" class="form-control text-12" id="premises_owner"
                                    placeholder="Premises Owner" value="{{ $detail->full_name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="owner_email" class="form-label text-12">Owner's email*</label>
                                <input type="text" class="form-control text-12" id="owner_email" placeholder="Email"
                                    value="{{ $detail->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label text-12">Address of Premises*</label>
                                <input type="text" class="form-control text-12" id="address" placeholder="Email"
                                    value="{{ $detail->country }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="date" class="form-label text-12">Select the date and time of the on-site
                                    visit for verifications*</label>
                                <div class="d-flex">
                                    <input type="date" class="form-control text-12 mr-2" id="date"
                                        placeholder="Date" value="{{ $detail->date_visit }}">
                                    <input type="time" class="form-control text-12" id="time" placeholder="Time"
                                        value="{{ $detail->time_visit }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name_of_authorised" class="form-label text-12">Name of Authorised Contact
                                    Person*
                                    (If Different From Owner)*</label>
                                <input type="text" class="form-control text-12" id="name_of_authorised"
                                    placeholder="Name of Authorised" value="{{ $detail->contact_person_name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="telephone_number" class="form-label text-12">Telephone Number of Contact
                                    Person* (If Different From Owner)*
                                    (If Different From Owner)*</label>
                                <input type="text" class="form-control text-12" id="telephone_number"
                                    placeholder="Telephone Number" value="{{ $detail->contact_person_phone }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="additional" class="form-label text-12">Add any additional details or
                                    pertinent notes*</label>
                                <textarea class="form-control" id="additional" rows="3" name="additional" placeholder="Empty" disabled>{{ $detail->notes }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: right">
                            <button type="submit" class="btn btn-primary mr-2 text-12"
                                onclick="document.getElementById('action').value='accept'">Accept Club</button>
                            <button type="submit" class="btn btn-danger text-12"
                                onclick="document.getElementById('action').value='decline'">Decline Club</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
