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
                <form class="mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="document_type" class="form-label text-12">Select the document's type*</label>
                                <input type="text" class="form-control text-12" id="document_type" placeholder="Type"
                                    value="Lease Agreement">
                            </div>
                            <div class="form-group">
                                <label for="document_number" class="form-label text-12">Enter document's number*</label>
                                <input type="text" class="form-control text-12" id="document_number" placeholder="Number"
                                    value="23456">
                            </div>
                            <div class="form-group">
                                <label for="expire_date" class="form-label text-12">Expire date*</label>
                                <input type="date" class="form-control text-12" id="expire_date" placeholder="Date"
                                    value="2024-01-01">
                            </div>
                            <div class="form-group">
                                <label for="club_document" class="form-label text-12">Club Document*</label>
                                <input type="text" class="form-control text-12" id="club_document"
                                    placeholder="No Documents Added" value="No Documents Added">
                            </div>
                            <div class="form-group">
                                <label for="premises_owner" class="form-label text-12">Name of Premises Owner*</label>
                                <input type="text" class="form-control text-12" id="premises_owner"
                                    placeholder="Premises Owner" value="Admon Shafi">
                            </div>
                            <div class="form-group">
                                <label for="owner_email" class="form-label text-12">Owner's email*</label>
                                <input type="text" class="form-control text-12" id="owner_email" placeholder="Email"
                                    value="email@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label text-12">Address of Premises*</label>
                                <input type="text" class="form-control text-12" id="address" placeholder="Email"
                                    value="London Street, Uk">
                            </div>
                            <div class="form-group">
                                <label for="date" class="form-label text-12">Select the date and time of the on-site
                                    visit for verifications*</label>
                                <div class="d-flex">
                                    <input type="date" class="form-control text-12 mr-2" id="date"
                                        placeholder="Date" value="2024-01-01">
                                    <input type="time" class="form-control text-12" id="time" placeholder="Time"
                                        value="12:00">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label text-12">Address of Premises*</label>
                                <input type="text" class="form-control text-12" id="address" placeholder="Email"
                                    value="London Street, Uk">
                            </div>
                            <div class="form-group">
                                <label for="name_of_authorised" class="form-label text-12">Name of Authorised Contact
                                    Person*
                                    (If Different From Owner)*</label>
                                <input type="text" class="form-control text-12" id="name_of_authorised"
                                    placeholder="Name of Authorised" value="Mike Willaim">
                            </div>
                            <div class="form-group">
                                <label for="telephone_number" class="form-label text-12">Telephone Number of Contact
                                    Person* (If Different From Owner)*
                                    (If Different From Owner)*</label>
                                <input type="text" class="form-control text-12" id="telephone_number"
                                    placeholder="Telephone Number" value="+44 2938 283948 77">
                            </div>
                            <div class="form-group">
                                <label for="additional" class="form-label text-12">Add any additional details or
                                    pertinent notes*</label>
                                <textarea class="form-control" id="additional" rows="3" name="additional" placeholder="Empty"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: right"> <!-- Added d-flex and align-items-start -->
                            <button type="submit" class="btn btn-primary mr-2 text-12">Accept Club</button>
                            <!-- Changed to btn-lg -->
                            <button type="submit" class="btn btn-danger text-12">Denied</button>
                            <!-- Changed to btn-lg -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
