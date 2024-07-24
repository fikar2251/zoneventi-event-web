@extends('layouts.app')

@section('title', 'Payment')

@section('content')
    <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <div class="row">
            <div class="container">
                <div class="header d-flex align-items-center justify-content-between flex-wrap">
                    <div class="d-flex align-items-center w-100">
                        <div class="back-button">
                            <a href="">
                                <img src="{{ asset('assets/template/icon/Back.svg') }}" alt="Back" class="nav-icon"
                                    style="width: 50px; height: 50px">
                            </a>
                        </div>
                        <h2 class="title mx-auto">Payment</h2>
                    </div>
                </div>
            </div>

            <div class="detail-form">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="pay-with-title">Pay With</h4>
                        <div class="payment-options d-flex">
                            <button type="button" class="btn btn-card-primary payment-option mr-2" data-payment="credit">
                                <img src="{{ asset('assets/template/icon/Credit.svg') }}" alt="Credit Card"
                                    class="payment-icon">
                                Credit Card
                            </button>
                            <button type="button" class="btn btn-card-secondary payment-option" data-payment="paypal">
                                <img src="{{ asset('assets/template/icon/PayPal.svg') }}" alt="PayPal"
                                    class="payment-icon">
                                PayPal
                            </button>
                        </div>
                        <form class="payment-form mt-4">
                            <div id="credit-card-fields">
                                <div class="form-group">
                                    <label for="card_number" class="form-label">Card Number</label>
                                    <input type="text" class="form-control" id="card_number"
                                        placeholder="000 000 000 0000">
                                </div>
                                <div class="form-group">
                                    <label for="holder_name" class="form-label">Holder name</label>
                                    <input type="text" class="form-control" id="holder_name" placeholder="Name">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="expiration_date" class="form-label">Expiration Date</label>
                                        <input type="month" class="form-control" id="expiration_date"
                                            placeholder="MM / YY">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cvc" class="form-label">CVC</label>
                                        <input type="text" class="form-control" id="cvc" placeholder="Code">
                                    </div>
                                </div>
                                <div class="form-group input-register termini-condition">
                                    <input type="checkbox" name="termini_condition" id="termini_condition"
                                        class="custom-checkbox">
                                    <label for="termini_condition" class="custom-checkbox-label form-label"
                                        style="font-size: 12px;">Save Card</label>
                                </div>
                            </div>

                            <div id="paypal-fields" style="display: none;">
                                <div class="form-group">
                                    <label for="paypal_email" class="form-label">Paypal Email</label>
                                    <input type="email" class="form-control" id="paypal_email" placeholder="Enter email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="feature_date" class="form-label">Select Feature date</label>
                                <input type="date" class="form-control" id="feature_date">
                            </div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block mt-4 text-12">Pay Now</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="header-events pay-with-title" style="margin-left: 20px">Event Details</h4>
                        </div>
                        <div class="event-card">
                            <img src="{{ asset('assets/template/img/Thumbnail.jpg') }}" alt="Event Thumbnail"
                                class="event-thumbnail">
                            <div class="event-info ">
                                <p class="event-date-time text-spacing"><span class="event-date text-spacing">VEN 16
                                        GIU</span> <span class="event-time text-spacing"> | 23:59 - 05:00</span>
                                </p>
                                <h5 class="event-title text-spacing">La Terrazza - Hola Chica</h5>
                                <p class="event-location text-spacing">
                                    La Terrazza
                                    <img src="{{ asset('assets/template/icon/Location.svg') }}" alt="location"
                                        class="location-icon-club">
                                    <span class="location-text">San Benedetto (AP)</span>
                                </p>
                                <div class="event-tags">
                                    <span class="tag">Hip hop</span>
                                    <span class="tag">Disco</span>
                                    <span class="tag">Reggaeton</span>
                                </div>
                            </div>
                            <button class="btn btn-edit">
                                <img src="{{ asset('assets/template/icon/edit.svg') }}" alt="Edit" class="edit-icon">
                            </button>
                        </div>

                        <h4 class="mt-4 pay-with-title">Select Package</h4>
                        <div class="package-options">
                            <button class="package-option">
                                <div class="package-info">
                                    <span class="package-duration">1 day</span>
                                    <span class="package-description">Your event will be feature for 1 day</span>
                                </div>
                                <span class="package-price">9,99$</span>
                            </button>
                            <button class="package-option">
                                <div class="package-info">
                                    <span class="package-duration">3 days</span>
                                    <span class="package-description">Your event will be feature for 3 days</span>
                                </div>
                                <span class="package-price">9,99$</span>
                            </button>
                            <button class="package-option active">
                                <div class="package-info">
                                    <span class="package-duration">7 days</span>
                                    <span class="package-description">Your event will be feature for 7 days</span>
                                </div>
                                <span class="package-price">9,99$</span>
                            </button>
                            <button class="package-option">
                                <div class="package-info">
                                    <span class="package-duration">10 days</span>
                                    <span class="package-description">Your event will be feature for 10 days</span>
                                </div>
                                <span class="package-price">9,99$</span>
                            </button>
                        </div>

                        <a href="#" class="show-preview mt-3">Show Preview</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const packageOptions = document.querySelectorAll('.package-option');

            packageOptions.forEach(option => {
                option.addEventListener('click', function() {
                    packageOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            const paymentOptions = document.querySelectorAll('.payment-option');
            const creditFields = document.getElementById('credit-card-fields');
            const paypalFields = document.getElementById('paypal-fields');
            paymentOptions.forEach(option => {
                option.addEventListener('click', function() {
                    paymentOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');

                    if (this.dataset.payment === 'credit') {
                        creditFields.style.display = 'block';
                        paypalFields.style.display = 'none';
                    } else if (this.dataset.payment === 'paypal') {
                        creditFields.style.display = 'none';
                        paypalFields.style.display = 'block';
                    }
                });
            });
        });
    </script>
@endsection
