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
            <form class="login-form" action="{{ route('registration.step1') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h2 class="form-title">Request For Club Account</h2>
                <p class="p-weight" style="font-size: 13px">You can request for an club account or claim an existing
                    club ownership</p>
                <div class="form-group input-register">
                    <label for="document_type" style="font-size: 12px;">Select the document's type*</label>
                    <select name="document_type" id="document_type" class="form-control">
                        <option value="" style="font-size: 12px">Select Option</option>
                        <option value="lease_agreement"
                            {{ old('document_type') == 'lease_agreement' ? 'selected' : '' }}>Lease Agreement</option>
                        <option value="property_agreement"
                            {{ old('document_type') == 'property_agreement' ? 'selected' : '' }}>Property Agreement
                        </option>
                        <option value="business_license"
                            {{ old('document_type') == 'business_license' ? 'selected' : '' }}>Business License</option>
                        <option value="others" {{ old('document_type') == 'others' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>
                <div class="form-group input-register">
                    <label for="document_number" style="font-size: 12px;">Enter document's number*</label>
                    <input type="text" name="document_number" id="document_number"
                        class="form-control input-register" placeholder="VAT Code" value="{{ old('document_number') }}">
                </div>
                <div class="form-group input-register">
                    <label for="expire_date" style="font-size: 12px;">Expire date*</label>
                    <input type="date" name="expire_date" id="expire_date" class="form-control input-register"
                        placeholder="Enter date" value="{{ old('expire_date') }}">
                </div>
                <div class="form-group input-register file-upload">
                    <label for="document_file" style="font-size: 12px;">Club Document*</label>
                    <label for="document_file" class="file-upload-button">
                        <i class="fa fa-upload"></i>
                        <span style="font-size: 14px">Upload Club Documents</span>
                        <span class="upload-info">Upload your NID for proof</span>
                    </label>
                    <input type="file" name="document_file" id="document_file" style="display: none;">
                    <div id="file-info" class="file-info"></div>
                </div>
                <button type="submit" class="btn">Next</button>
                <p style="font-size: 12px">Already have club Account? <a href="{{ url('/login') }}" class="link">Log
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

        document.getElementById('document_file').addEventListener('change', function(e) {
            const fileName = e.target.files[0].name;
            const fileInfo = document.getElementById('file-info');
            fileInfo.textContent = 'selected file: ' + fileName;
        })
    </script>

</body>

</html>
