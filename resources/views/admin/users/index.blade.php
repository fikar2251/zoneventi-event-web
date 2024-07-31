@extends('layouts.app')

@section('title', 'User List')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mt-60">
                    <div class="col-md-12">
                        <form action="{{ route('users-list') }}" method="GET"
                            class="d-flex justify-content-between align-items-center">
                            <div class="input-group search-group">
                                <input type="text" name="search" class="form-control search-input"
                                    placeholder="Search by name, id or email" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn search-btn" type="submit" id="searchButton">
                                        <img src="{{ asset('assets/template/icon/Search.svg') }}" alt="Search">
                                    </button>
                                </div>
                            </div>
                            <button class="btn blocked-club-btn" type="button">Blocked Users</button>
                        </form>
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
                                    @if ($users->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center">No data available in table</td>
                                        </tr>
                                    @else
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">
                                                    <p>Name: {{ $user->user->name }}</p>
                                                    <p>DOB: {{ explode(' ', $user->birthdate)[0] }}</p>
                                                    <p>Gender: {{ $user->gender }}</p>
                                                </td>
                                                <td class="text-center">{{ $user->user->email }}</td>
                                                <td>
                                                    <div>
                                                        <button class="btn btn-block edit-btn"
                                                            style="background-color: #7A5BFF" data-id="{{ $user['id'] }}"
                                                            data-name="{{ $user->user->name }}"
                                                            data-dob="{{ explode(' ', $user->birthdate)[0] }}"
                                                            data-gender="{{ $user->gender }}"
                                                            data-email="{{ $user->user->email }}">Edit</button>
                                                        <button class="btn btn-block block-btn"
                                                            style="background-color: #FF5B5B"
                                                            data-name="Andreina Tuccella">Block</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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

            <div class="loading-overlay" id="loadingOverlay">
                <img src="{{ asset('assets/template/animation/loading.gif') }}" alt="Loading" width="100">
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
            var searchButton = document.getElementById('searchButton');
            var searchForm = document.querySelector('form');
            var loadingOverlay = document.getElementById('loadingOverlay');

            searchButton.addEventListener('click', function() {
                loadingOverlay.style.display = 'flex';
                searchForm.submit();
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var editModal = document.getElementById('editConfirmModal');
            var editModalContent = editModal.querySelector('.edit-modal-content');
            var editBackButton = document.getElementById('editBackButton');
            var saveChangesButton = document.getElementById('saveChanges');

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

            function populateModal(user) {
                document.getElementById('modalUserName').textContent = user.name;
                document.getElementById('modalUserDOB').textContent = user.dob;
                document.getElementById('modalUserGender').textContent = user.gender;
                document.getElementById('modalUserEmail').textContent = user.email;
            }

            editBackButton.addEventListener('click', closeEditModal);

            editModal.addEventListener('click', function(event) {
                if (event.target === editModal) {
                    closeEditModal();
                }
            });

            editModalContent.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            document.querySelectorAll('.edit-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var user = {
                        id: this.dataset.id,
                        name: this.dataset.name,
                        dob: this.dataset.dob,
                        gender: this.dataset.gender,
                        email: this.dataset.email
                    };
                    populateModal(user);
                    openEditModal();
                });
            });
        });
    </script>
@endsection
