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
            <form class="login-form">
                <h2 class="form-title">Request For Club Account</h2>
                <p>You can request for an club account or claim an existing club ownership</p>
                <div class="form-group owner-name">
                    <label for="owner_name">Name of Premises Owner*</label>
                    <input type="number" id="owner_name" name="owner_name" class="input-register"
                        placeholder="Enter full name of premises owner" required>
                </div>
                <div class="form-group owner-phone">
                    <label for="owner_phone">Owner’s Phone number*</label>
                    <input type="number" id="owner_phone" name="owner_phone" class="input-register"
                        placeholder="Enter the telephone number of the owner of the premises" required>
                </div>
                <div class="form-group owner-email">
                    <label for="owner_email">Owner’s email*</label>
                    <input type="email" id="owner_email" name="owner_email" class="input-register"
                        placeholder="Enter the email address of the owner of the venue" required>
                </div>
                <div class="form-group country">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" placeholder="Country name"
                        class="input-register" required>
                </div>
                <div class="form-group-row">
                    <div class="form-group half-width">
                        <label for="city">City</label>
                        <select name="city" id="city">
                            <option value="">City</option>
                        </select>
                    </div>
                    <div class="form-group half-width">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" id="postal_code" class="input-register" placeholder="Postal code">
                    </div>
                </div>
                <div class="form-group form-group-date-time">
                    <label>Select the date and time of the on-site visit for verifications*</label>
                    <div class="form-group-row">
                        <div class="form-group half-width date-group">
                            <input type="date" id="date" name="date">
                        </div>
                        <div class="form-group half-width time-group">
                            <input type="time" id="time" name="time">
                        </div>
                    </div>
                </div>
                <div class="form-group name-authorize">
                    <label>Name of Authorised Contact Person* (If Different From Owner)</label>
                    <input type="text" name="name_authorize" id="name_authorize"
                        placeholder="Enter the nae of authorised contact person, if different from owner"
                        class="input-register">
                </div>
                <div class="form-group telephone">
                    <label>Telephone Number of Contact Person* (If Different From Owner)</label>
                    <input type="text" name="telephone_number" id="telephone_number" placeholder="Enter the number"
                        class="input-register">
                </div>
                <div class="form-group additional-details">
                    <label>Add any additional details or pertinent notes*</label>
                    <textarea name="additional_details" id="additional_details" rows="4" placeholder="Enter text"
                        class="input-register"></textarea>
                </div>
                <div class="form-group termini-condition">
                    <input type="checkbox" name="termini_condition" id="termini_condition" class="custom-checkbox">
                    <label for="termini_condition" class="custom-checkbox-label">Accetta i termini e condizioni</label>
                </div>
                <button type="submit" class="btn" onclick="location.href='{{ url('/login') }}'">Next</button>
                <p>Already have club Account? <a href="{{ url('/login') }}" class="link">Log In Now</a></p>
            </form>
        </div>
    </div>

</body>

</html>
