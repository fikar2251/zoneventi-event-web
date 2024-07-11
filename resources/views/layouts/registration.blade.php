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
                <h2 class="form-title">Request For Club Account</h2>
                <p class="p-weight">You can request for an club account or claim an existing club ownership</p>
                <div class="form-group">
                    <label for="document_type">Select the document's type*</label>
                    <select name="document_type" id="document_type">
                        <option value="">Select Option</option>
                        <option value="lease_agreement">Lease Agreement</option>
                        <option value="property_agreement">Property Agreement</option>
                        <option value="business_license">Business License</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="document_number">Enter document's number*</label>
                    <input type="document_number" id="document_number" class="input-register" placeholder="VAT Code"
                        required>
                </div>
                <div class="form-group">
                    <label for="expire_date">Expire date*</label>
                    <input type="expire_date" id="expire_date" class="input-register" placeholder="Enter date" required>
                </div>
                <div class="form-group file-upload">
                    <label for="expire_date">Club Document*</label>
                    <label for="file-upload" class="file-upload-button">
                        <i class="fa fa-upload"></i>
                        <span>Upload Club Documents</span>
                        <span class="upload-info">Upload your NID for proof</span>
                    </label>
                    <input type="file" id="file-upload" style="display: none;">
                </div>
                <button type="button" class="btn"
                    onclick="window.location.href='{{ url('/registration-confirmation') }}'">Next</button>
                <p>Already have club Account? <a href="{{ url('/login') }}" class="link">Log In Now</a></p>
            </form>
        </div>
    </div>

</body>

</html>
