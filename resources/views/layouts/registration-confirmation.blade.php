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
                    <input type="text" id="user_id" name="user_id" class="input-register"
                        placeholder="Enter User ID" required>
                </div>
                <div class="form-group input-register password">
                    <label for="password" style="font-size: 12px;">Password*</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" class="input-register"
                            placeholder="Enter your password">
                        <img src="{{ asset('assets/template/icon/Frame.svg') }}" alt="Toggle Password Visibility"
                            class="eye-icon" id="togglePassword" onclick="togglePasswordVisibility()">
                    </div>
                </div>
                <div class="form-group input-register owner-name">
                    <label for="owner_name" style="font-size: 12px;">Name of Premises Owner*</label>
                    <input type="text" id="owner_name" name="owner_name" class="input-register"
                        placeholder="Enter full name of premises owner" required>
                </div>
                <div class="form-group input-register owner-phone">
                    <label for="owner_phone" style="font-size: 12px;">Owner’s Phone number*</label>
                    <input type="number" id="owner_phone" name="owner_phone" class="input-register"
                        placeholder="Enter the telephone number of the owner of the premises" required>
                </div>
                <div class="form-group input-register owner-email">
                    <label for="owner_email" style="font-size: 12px;">Owner’s email*</label>
                    <input type="email" id="owner_email" name="owner_email" class="input-register"
                        placeholder="Enter the email address of the owner of the venue" required>
                </div>
                <div class="form-group input-register country">
                    <label for="country" style="font-size: 12px;">Country</label>
                    <input type="text" id="country" name="country" placeholder="Country name"
                        class="input-register" required>
                </div>
                <div class="form-group-row">
                    <div class="form-group input-register half-width">
                        <label for="city" style="font-size: 12px;">City</label>
                        <select name="city" id="city">
                            <option value="">City</option>
                            <option value="Acate">Acate</option>
                        </select>
                    </div>
                    <div class="form-group input-register half-width">
                        <label for="postal_code" style="font-size: 12px;">Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" class="input-register"
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
                        class="input-register">
                </div>
                <div class="form-group input-register telephone">
                    <label style="font-size: 12px;">Telephone Number of Contact Person* (If Different From
                        Owner)</label>
                    <input type="text" name="telephone_number" id="telephone_number"
                        placeholder="Enter the number" class="input-register">
                </div>
                <div class="form-group input-register additional-details">
                    <label style="font-size: 12px;">Add any additional details or pertinent notes*</label>
                    <textarea name="additional_details" id="additional_details" rows="4" placeholder="Enter text"
                        class="input-register"></textarea>
                </div>
                <div class="form-group input-register termini-condition">
                    <input type="checkbox" name="termini_condition" id="termini_condition" class="custom-checkbox">
                    <label for="termini_condition" class="custom-checkbox-label" style="font-size: 12px;">Accetta i
                        termini e
                        condizioni</label>
                </div>
                {{-- <button type="submit" class="btn" onclick="location.href='{{ url('/login') }}'">Next</button> --}}
                <button type="submit" class="btn">Next</button>
                <p style="font-size: 12px">Already have club Account? <a href="{{ url('/login') }}"
                        class="link">Log
                        In Now</a></p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');
            const passwordFieldType = passwordField.getAttribute('type');

            if (passwordFieldType === 'password') {
                passwordField.setAttribute('type', 'text');
                togglePassword.src = '{{ asset('assets/template/icon/Show.svg') }}';
            } else {
                passwordField.setAttribute('type', 'password');
                togglePassword.src = '{{ asset('assets/template/icon/Frame.svg') }}';
            }

            togglePassword.style.width = '20px';
            togglePassword.style.height = '20px';
        }
    </script>

</body>

</html>
