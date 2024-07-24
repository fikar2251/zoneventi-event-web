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
            <p class="info-text">If you block this user you can unblock the user again from the block
                list</p>
        </div>
        <div class="modal-buttons">
            <button id="cancelBlock" class="text-12">No</button>
            <button id="confirmBlock" class="text-12">Yes Sure</button>
        </div>
    </div>
</div>
