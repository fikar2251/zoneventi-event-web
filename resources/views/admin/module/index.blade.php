@extends('layouts.app')

@section('title', 'Admin List')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mt-60">
                    <div class="col-md-12">
                        <form action="{{ route('admins-list') }}" method="GET"
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
                            <a href="{{ route('admins-create') }}" class="btn add-club-btn" type="button">Add New Admin</a>
                        </form>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="mb-3 header-all-users">All Users</div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Admin Name</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center">No data available in table</td>
                                        </tr>
                                    @else
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $user->name }}</td>
                                                <td class="text-center">{{ $user->role }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td>
                                                    <button class="btn btn-block edit-btn" style="background-color: #7A5BFF"
                                                        data-id="{{ $user['id'] }}" data-name="{{ $user->name }}"
                                                        data-dob="{{ explode(' ', $user->birthdate)[0] }}"
                                                        data-gender="{{ $user->gender }}"
                                                        data-email="{{ $user->email }}">Edit</button>
                                                    <button class="btn btn-block btn-delete"
                                                        data-url="{{ route('admins-delete', $user->id) }}"
                                                        style="background-color: #FF5B5B">Delete</button>
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
                </div>
            </div>

            <!-- Filter Edit Modal -->
            @include('modals.edit-modal-admin')

            <button class="btn filter-btn" type="button">
                <img src="{{ asset('assets/template/icon/Filter.svg') }}" alt="Filter">
            </button>

            <!-- Filter Modal -->
            <div id="filterPopup" class="filter-popup">
                <div class="filter-popup-content">
                    <h2 class="filter-header-popup">Filter</h2>
                    <div class="filter-section">
                        <h3>Sort By</h3>
                    </div>
                    <div class="scrollable-options">
                        <span class="option-tag" data-role="all">All</span>
                        <span class="option-tag" data-role="owner">Club Owner</span>
                        <span class="option-tag" data-role="admin">Admin</span>
                    </div>
                    <button id="applyFilter" class="btn btn-primary text-12 mt-3">Apply Filter</button>
                </div>
            </div>

            <div class="loading-overlay" id="loadingOverlay">
                <img src="{{ asset('assets/template/animation/loading.gif') }}" alt="Loading" width="50">
            </div>
        </div>
        </div>
    </main>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('body').on('click', '.btn-delete', function(e) {
            e.preventDefault();

            const url = $(this).data('url');

            Swal.fire({
                title: 'Are you sure?',
                text: "It will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                customClass: {
                    popup: 'swal2-popup',
                    confirmButton: 'swal2-confirm',
                    cancelButton: 'swal2-cancel',
                    content: 'swal2-content'
                }
            }).then(function(result) {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.code === 'success') {
                                Swal.fire('Success', response.msg, 'success').then(() => {
                                    window.location.href =
                                        '{{ route('admins-list') }}';
                                });
                            } else {
                                Swal.fire('Oops', response.msg, 'error');
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire('Oops', 'Something went wrong! ' + xhr.responseText,
                                'error');
                        }
                    });
                }
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var filterPopup = document.getElementById("filterPopup");
            var filterBtn = document.querySelector(".filter-btn");
            var applyFilterBtn = document.getElementById("applyFilter");
            var loadingOverlay = document.getElementById('loadingOverlay');
            var isFilterActive = false;

            var selectedRole = new URLSearchParams(window.location.search).get('role');

            if (selectedRole) {
                document.querySelectorAll('.scrollable-options .option-tag').forEach(item => {
                    if (item.dataset.role === selectedRole) {
                        item.classList.add('selected');
                    }
                });
            }

            filterBtn.onclick = function(event) {
                event.stopPropagation();
                isFilterActive = !isFilterActive;

                if (isFilterActive) {
                    filterBtn.classList.add('active');
                    showFilterPopup();
                } else {
                    filterBtn.classList.remove('active');
                    hideFilterPopup();
                }
            }

            function showFilterPopup() {
                var rect = filterBtn.getBoundingClientRect();
                filterPopup.style.bottom = (rect.height + 10) + 'px';
                filterPopup.style.right = '25px';
                setTimeout(() => {
                    filterPopup.style.display = "block";
                }, 10);
            }

            function hideFilterPopup() {
                filterPopup.style.display = "none";
            }

            applyFilterBtn.onclick = function() {
                var selectedRole = document.querySelector('.scrollable-options .option-tag.selected')?.dataset
                    .role;

                loadingOverlay.style.display = 'flex'; // Show the loading overlay

                if (selectedRole) {
                    window.location.href = "?role=" + encodeURIComponent(selectedRole);
                } else {
                    window.location.href = window.location.pathname; // Reload without any filters
                }
            }

            window.onclick = function(event) {
                if (!filterPopup.contains(event.target) && event.target !== filterBtn) {
                    hideFilterPopup();
                    isFilterActive = false;
                    filterBtn.classList.remove('active');
                }
            }

            document.querySelectorAll('.option-tag').forEach(item => {
                item.addEventListener('click', function() {
                    this.parentNode.querySelectorAll('.option-tag').forEach(sibling => {
                        sibling.classList.remove('selected');
                    });
                    this.classList.add('selected');
                });
            });
        });
    </script>
@endsection
