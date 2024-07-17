@extends('layouts.app')

@section('title', 'User List')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-60">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="input-group search-group">
                            <input type="text" class="form-control search-input" placeholder="Search by name, id or email">
                            <div class="input-group-append">
                                <button class="btn search-btn" type="button">
                                    <img src="{{ asset('assets/template/icon/Search.svg') }}" alt="Search">
                                </button>
                            </div>
                        </div>
                        <button class="btn blocked-club-btn" type="button">Blocked Users</button>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h2 class="mb-3 header-all-users">All Users</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">User Info</th>
                                    <th class="text-center">Email/Phone</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (range(1, 4) as $item)
                                <tr>
                                    <td class="text-center">{{ sprintf('%03d', $item) }}</td>
                                    <td class="text-center">
                                        <p>Name: Andreina Tuccella</p>
                                        <p>DOB: 01/11/2000</p>
                                        <p>Gender: Female</p>
                                    </td>
                                    <td class="text-center">email@gmail.com</td>
                                    <td>
                                        <div>
                                            <button class="btn btn-block" style="background-color: #7A5BFF">Edit</button>
                                            <button class="btn btn-block block-btn" style="background-color: #FF5B5B" data-name="Andreina Tuccella">Block</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <button class="btn filter-btn" type="button">
                    <img src="{{ asset('assets/template/icon/Filter.svg') }}" alt="Filter">
                </button>

                <div id="blockConfirmModal" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button id="backButton" class="back-btn">
                                <img src="{{ asset('assets/template/icon/Back-Modal.svg') }}" alt="Back" class="back-modal-icon">
                            </button>
                            <h2 class="header-title">Block User</h2>
                        </div>
                        <div class="modal-body">
                            <h3 class="confirmation-text">
                                Are You Sure You Want To<br>
                                Block <span id="userName"></span>?
                            </h3>
                            <p class="info-text">If you block this user you can unblock the user again from the block list</p>
                        </div>
                        <div class="modal-buttons">
                            <button id="cancelBlock">No</button>
                            <button id="confirmBlock">Yes Sure</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('blockConfirmModal');
    var modalContent = modal.querySelector('.modal-content');
    var backButton = document.getElementById('backButton');
    var cancelButton = document.getElementById('cancelBlock');
    var confirmButton = document.getElementById('confirmBlock');

    // Function to open the modal with animation
    function openModal(userName) {
        document.getElementById('userName').textContent = userName;
        modal.style.display = 'block';
        setTimeout(() => {
            modal.classList.add('show');
        }, 10); // Small delay to ensure display: block has taken effect
    }

    // Function to close the modal with animation
    function closeModal() {
        modal.classList.remove('show');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300); // Wait for the animation to finish
    }

    // Close modal when back button is clicked
    backButton.addEventListener('click', closeModal);

    // Close modal when "No" button is clicked
    cancelButton.addEventListener('click', closeModal);

    // Handle "Yes Sure" button click
    confirmButton.addEventListener('click', function() {
        // Add your block logic here
        console.log('User blocked');
        closeModal();
    });

    // Close modal when clicking outside of it
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Prevent clicks on the modal content from closing the modal
    modalContent.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // Example: Open modal when a "Block" button is clicked
    document.querySelectorAll('.block-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var userName = this.getAttribute('data-name');
            openModal(userName);
        });
    });
});
</script>
@endsection
