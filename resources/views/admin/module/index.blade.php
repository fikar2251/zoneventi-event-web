@extends('layouts.app')

@section('title', 'Admin List')

@section('content')
    <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-md-4">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mt-60">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="input-group search-group">
                                <input type="text" class="form-control search-input"
                                    placeholder="Search by name, id, or email">
                                <div class="input-group-append">
                                    <button class="btn search-btn" type="button">
                                        <img src="{{ asset('assets/template/icon/Search.svg') }}" alt="Search">
                                    </button>
                                </div>
                            </div>
                            <a href="{{ route('admins-create') }}" class="btn add-club-btn" type="button">Add New
                                Admin</a>
                        </div>
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
                                    @foreach (range(1, 4) as $item)
                                        <tr>
                                            <td class="text-center">{{ sprintf('%03d', $item) }}</td>
                                            <td class="text-center">Adam Shafiq </td>
                                            <td class="text-center">Admin</td>
                                            <td class="text-center">email@gmail.com</td>
                                            <td>
                                                <button class="btn btn-block"
                                                    style="background-color: #7A5BFF">Edit</button>
                                                <button class="btn btn-block"
                                                    style="background-color: #FF5B5B">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                            <span class="option-tag">All</span>
                            <span class="option-tag">Club Owner</span>
                            <span class="option-tag selected">Admin</span>
                        </div>
                        <button id="applyFilter" class="btn btn-primary text-12 mt-3">Apply Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('scripts')
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var filterPopup = document.getElementById("filterPopup");
            var filterBtn = document.querySelector(".filter-btn");
            var applyFilterBtn = document.getElementById("applyFilter");
            var isFilterActive = false;

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
                console.log("Applying filters...");
                var selectedCity = document.querySelector('.filter-section:nth-child(2) .option-tag.selected')
                    ?.textContent;
                var selectedFollowers = document.querySelector(
                    '.filter-section:nth-child(3) .option-tag.selected')?.textContent;
                var selectedPublished = document.querySelector(
                    '.filter-section:nth-child(4) .option-tag.selected')?.textContent;

                console.log("Selected City:", selectedCity);
                console.log("Selected Followers Sort:", selectedFollowers);
                console.log("Selected Published Sort:", selectedPublished);

                hideFilterPopup();
                isFilterActive = true;
                filterBtn.classList.add('active');
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
