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
                <p class="p-weight">Log in with the details that we send to you</p>
                <div class="form-group input-register">
                    <label for="user_id">User ID*</label>
                    <input type="text" id="user_id" class="input-register" placeholder="Enter user ID" required>
                </div>
                <div class="form-group input-register">
                    <label for="email">Email Address*</label>
                    <input type="email" id="email" class="input-register" placeholder="Enter your email" required>
                </div>
                <div class="form-group password input-register">
                    <label for="password">Password*</label>
                    <input type="password" id="password" class="input-register" placeholder="Enter your password"
                        required>
                </div>
                <button type="submit" class="btn">Log In</button>
                <p>Are you a club owner? <a href="{{ url('/registration') }}" class="link">Request for club
                        account</a></p>
            </form>
        </div>
    </div>
</body>

</html>
