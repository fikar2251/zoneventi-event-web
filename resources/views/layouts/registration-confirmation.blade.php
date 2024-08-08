<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/login/css/style.css') }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/login/image/logo.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;700&display=swap" rel="stylesheet">
    <!-- Include Selectize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.default.min.css"
        rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Selectize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>

</head>

<body>

    <div class="wrapper">
        <div class="image-container">
            <img src="{{ asset('assets/login/image/event-image.jpeg') }}" alt="Event Image">
        </div>
        <div class="form-container">
            <form class="login-form" action="{{ route('registration.step2') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h2 class="form-title">Request For Club Account</h2>
                <p style="font-size: 13px">You can request for an club account or claim an existing club ownership</p>
                <div class="form-group input-register user-id">
                    <label for="user_id" style="font-size: 12px;">User ID*</label>
                    <input type="text" id="user_id" name="user_id" class="form-control input-register"
                        placeholder="Enter User ID">
                </div>
                <div class="form-group input-register password">
                    <label for="password" style="font-size: 12px;">Password*</label>
                    <input type="password" id="password" name="password" class="form-control input-register"
                        placeholder="Enter your password">
                </div>
                <div class="form-group input-register owner-name">
                    <label for="owner_name" style="font-size: 12px;">Name of Premises Owner*</label>
                    <input type="text" id="owner_name" name="owner_name" class="form-control input-register"
                        placeholder="Enter full name of premises owner">
                </div>
                <div class="form-group input-register owner-phone">
                    <label for="owner_phone" style="font-size: 12px;">Owner’s Phone number*</label>
                    <input type="number" id="owner_phone" name="owner_phone" class="form-control input-register"
                        placeholder="Enter the telephone number of the owner of the premises">
                </div>
                <div class="form-group input-register owner-email">
                    <label for="owner_email" style="font-size: 12px;">Owner’s email*</label>
                    <input type="email" id="owner_email" name="owner_email" class="form-control input-register"
                        placeholder="Enter the email address of the owner of the venue">
                </div>
                <div class="form-group input-register country">
                    <label for="country" style="font-size: 12px;">Country</label>
                    <input type="text" id="country" name="country" placeholder="Country name"
                        class="form-control input-register" value="Italy">
                </div>
                <div class="form-group-row">
                    <div class="form-group input-register half-width">
                        <label for="city" style="font-size: 12px;">City</label>
                        <select name="city" id="city" class="form-control input-register">
                            <option value="">City</option>
                        </select>
                    </div>
                    <div class="form-group input-register half-width">
                        <label for="postal_code" style="font-size: 12px;">Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" class="form-control input-register"
                            placeholder="Postal code">
                    </div>
                </div>
                <div class="form-group input-register form-group-date-time">
                    <label style="font-size: 12px;">Select the date and time of the on-site visit for
                        verifications*</label>
                    <div class="form-group-row">
                        <div class="form-group half-width date-group">
                            <input type="date" id="date" name="date">
                        </div>
                        <div class="form-group half-width time-group">
                            <input type="time" id="time" name="time">
                        </div>
                    </div>
                </div>
                <div class="form-group input-register name-authorize">
                    <label style="font-size: 12px;">Name of Authorised Contact Person* (If Different From
                        Owner)</label>
                    <input type="text" name="name_authorize" id="name_authorize"
                        placeholder="Enter the nae of authorised contact person, if different from owner"
                        class="form-control input-register">
                </div>
                <div class="form-group input-register telephone">
                    <label style="font-size: 12px;">Telephone Number of Contact Person* (If Different From
                        Owner)</label>
                    <input type="text" name="telephone_number" id="telephone_number"
                        placeholder="Enter the number" class="form-control input-register">
                </div>
                <div class="form-group input-register additional-details">
                    <label style="font-size: 12px;">Add any additional details or pertinent notes*</label>
                    <textarea name="additional_details" id="additional_details" rows="4" placeholder="Enter text"
                        class="form-control input-register"></textarea>
                </div>
                <div class="form-group input-register termini-condition">
                    <input type="checkbox" name="termini_condition" id="termini_condition" class="custom-checkbox">
                    <label for="termini_condition" class="custom-checkbox-label" style="font-size: 12px;">Accetta i
                        termini e
                        condizioni</label>
                </div>
                <button type="submit" class="btn">Next</button>
                <p style="font-size: 12px">Already have club Account? <a href="{{ url('/login') }}"
                        class="link">Log
                        In Now</a></p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Initialize Selectize
            var $select = $('#city').selectize({
                valueField: 'name',
                labelField: 'name',
                searchField: ['name'],
                maxOptions: 10000,
                create: false,
                render: {
                    option: function(item, escape) {
                        return '<div>' + escape(item.name) + '</div>';
                    }
                }
            });

            var selectize = $select[0].selectize;

            // Fetch cities
            fetch('https://countriesnow.space/api/v0.1/countries/cities', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        country: 'Italy'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        console.error('Error fetching cities:', data.error);
                        return;
                    }

                    var cities = data.data || [];
                    cities.forEach(function(city) {
                        selectize.addOption({
                            name: city
                        });
                    });
                    selectize.refreshOptions(false);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if ($errors->any())
            Toast.fire({
                icon: 'error',
                title: '{{ $errors->first() }}'
            });
        @endif

        @if (session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif
    </script>

</body>

</html>
