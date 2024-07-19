<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/login/css/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/login/image/logo.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="image-container">
            <img src="{{ asset('assets/login/image/event-image.jpeg') }}" alt="Event Image">
        </div>
        <div class="form-container">
            <form class="login-form">
                <h2 class="form-title">Log In to Zoneventi</h2>
                <p class="p-weight" style="font-size: 13px">Log in with the details that we send to you</p>
                <div class="form-group input-register">
                    <label for="user_id" style="font-size: 12px;">User ID*</label>
                    <input type="text" id="user_id" class="input-register" placeholder="Enter user ID" required>
                </div>
                <div class="form-group input-register">
                    <label for="email" style="font-size: 12px;">Email Address*</label>
                    <input type="email" id="email" class="input-register" placeholder="Enter your email" required>
                </div>
                <div class="form-group password input-register">
                    <label for="password" style="font-size: 12px;">Password*</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" class="input-register"
                            placeholder="Enter your password">
                        <img src="{{ asset('assets/template/icon/Frame.svg') }}" alt="Toggle Password Visibility"
                            class="eye-icon" id="togglePassword" onclick="togglePasswordVisibility()">
                    </div>
                </div>

                <button type="submit" class="btn">Log In</button>
                <p style="font-size: 12px">Are you a club owner? <a href="{{ url('/registration') }}"
                        class="link">Request for club
                        account</a></p>
            </form>
        </div>
    </div>

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
