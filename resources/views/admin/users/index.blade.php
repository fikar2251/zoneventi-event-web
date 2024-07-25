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
                                <input type="text" class="form-control search-input"
                                    placeholder="Search by name, id or email">
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
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">User Info</th>
                                        <th class="text-center">Email/Phone</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-center">{{ $user['id'] }}</td>
                                            <td class="text-center">
                                                <p>Name: {{ $user['name'] }}</p>
                                                <p>DOB: {{ $user['dob'] }}</p>
                                                <p>Gender: {{ $user['gender'] }}</p>
                                            </td>
                                            <td class="text-center">{{ $user['email'] }}</td>
                                            <td>
                                                <div>
                                                    <button class="btn btn-block"
                                                        style="background-color: #7A5BFF">Edit</button>
                                                    <button class="btn btn-block block-btn"
                                                        style="background-color: #FF5B5B"
                                                        data-name="Andreina Tuccella">Block</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Links -->
                        <div class="pagination-container">
                            {{ $users->links('vendor.pagination.custom') }}
                        </div>
                    </div>

                    {{-- edit modal club --}}
                    @include('modals.edit-modal-user')

                    {{-- edit modal block --}}
                    @include('modals.edit-modal-block')

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

            function openModal(userName) {
                document.getElementById('userName').textContent = userName;
                modal.style.display = 'block';
                document.body.classList.add('modal-open');
                setTimeout(() => {
                    modal.classList.add('show');
                }, 10);
            }

            function closeModal() {
                modal.classList.remove('show');
                document.body.classList.remove('modal-open');
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 300);
            }

            backButton.addEventListener('click', closeModal);
            cancelButton.addEventListener('click', closeModal);
            confirmButton.addEventListener('click', function() {
                closeModal();
            });

            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeModal();
                }
            });

            modalContent.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            document.querySelectorAll('.block-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var userName = this.getAttribute('data-name');
                    openModal(userName);
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var editModal = document.getElementById('editConfirmModal');
            var editModalContent = editModal.querySelector('.edit-modal-content');
            var editBackButton = document.getElementById('editBackButton');
            // var saveChangesButton = document.getElementById('saveChanges');

            function openEditModal() {
                editModal.style.display = 'block';
                document.body.classList.add('modal-open');
                setTimeout(() => {
                    editModal.classList.add('show');
                }, 10);
            }

            function closeEditModal() {
                editModal.classList.remove('show');
                document.body.classList.remove('modal-open');
                setTimeout(() => {
                    editModal.style.display = 'none';
                }, 300);
            }

            editBackButton.addEventListener('click', closeEditModal);
            // saveChangesButton.addEventListener('click', function() {
            //     // Handle save changes logic here
            //     closeEditModal();
            // });

            editModal.addEventListener('click', function(event) {
                if (event.target === editModal) {
                    closeEditModal();
                }
            });

            editModalContent.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            document.querySelectorAll('.btn-block[style*="background-color: #7A5BFF"]').forEach(function(btn) {
                btn.addEventListener('click', openEditModal);
            });
        });
    </script>
@endsection
