@extends('layouts.app')

@section('title', 'Settings')

@section('content')
    <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
        <div class="settings-container">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center mt-5 mb-4">
                    <div class="flex-grow-1 text-center">
                        <h2 class="title text-white m-0">Settings</h2>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-lg px-4 py-2">Save Change</button>
                    </div>
                </div>


                <div class="row mt-5">
                    <div class="col-md-12">
                        <h5 class="card-title text-white mb-4">Terms and Conditions</h5>
                        <div class="card mb-4 card-bg">
                            <div class="card-body">
                                <div class="card-text text-muted">
                                    <p>
                                        We at Wasai LLC respect the privacy of your personal information and, as such, make
                                        every effort to ensure your information is protected and remains private. As the
                                        owner
                                        and operator of
                                        loremipsum.io (the "Website") hereafter referred to in this Privacy Policy as "Lorem
                                        Ipsum", "us",
                                        "our" or "we", we have provided this Privacy Policy to explain how we collect, use,
                                        share and protect
                                        information about the users of our Website (hereafter referred to as "user", "you"
                                        or
                                        "your"). For
                                        the purposes of this Agreement, any use of the terms "Lorem Ipsum", "us", "our" or
                                        "we"
                                        includes
                                        Wasai LLC, without limitation. We will not use or share your personal information
                                        with
                                        anyone
                                        except as described in this Privacy Policy.
                                    </p>
                                    <p>
                                        Lorem Ipsum does not knowingly collect personally identifiable information (PII)
                                        from
                                        persons under the age of 13. If you are under the age of 13, please do not provide
                                        us
                                        with information
                                        of any kind whatsoever. If you have reason to believe that we may have accidentally
                                        received
                                        information from a child under the age of 13, please contact us immediately at
                                        legal@wasai.co. If we become
                                        aware that we have inadvertently received Personal Information from a person under
                                        the
                                        age of 13,
                                        we will delete such information from our records.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title text-white m-0">FAQ</h5>
                            <button class="btn btn-outline-danger" style="border: none" id="btn-add-faq">Add New
                                FAQ</button>
                        </div>

                        <div class="form-faq mb-4" style="display: none;" id="form-faq">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="question" class="form-label text-white mb-1">Questions</label>
                                        <input type="text" id="question" name="question" class="form-control text-white"
                                            placeholder="Type here">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="answer" class="form-label text-white mb-1">Answer</label>
                                        <textarea id="answer" name="answer" class="form-control text-white" rows="3" placeholder="Type here"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-start mt-4">
                                    <button class="btn btn-primary w-100">Add to FAQ</button>
                                </div>
                            </div>
                        </div>

                        <div class="faq-list">
                            <div class="faq-card">
                                <div class="faq-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 text-white">How can I post an event?</h6>
                                    <button class="btn btn-link text-white p-0" type="button" data-toggle="collapse"
                                        data-target="#faq1" aria-expanded="false">
                                        <i class="fas fa-chevron-up fa-sm"></i>
                                    </button>
                                </div>
                                <hr class="faq-divider">
                                <div id="faq1" class="collapse">
                                    <div class="card-body text-muted">
                                        We at Wasai LLC respect the privacy of your personal information and, as such, make
                                        every effort to ensure your information is protected and remains private. As the
                                        owner and operator of loremipsum.
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <div class="faq-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 text-white">How can I join an event?</h6>
                                    <button class="btn btn-link text-white p-0" type="button" data-toggle="collapse"
                                        data-target="#faq2" aria-expanded="false">
                                        <i class="fas fa-chevron-up fa-sm"></i>
                                    </button>
                                </div>
                                <hr class="faq-divider">
                                <div id="faq2" class="collapse">
                                    <div class="card-body text-muted">
                                        Answer for how to join an event goes here.
                                    </div>
                                </div>
                            </div>

                            <div class="faq-card">
                                <div class="faq-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 text-white">What are the event guidelines?</h6>
                                    <button class="btn btn-link text-white p-0" type="button" data-toggle="collapse"
                                        data-target="#faq3" aria-expanded="false">
                                        <i class="fas fa-chevron-up fa-sm"></i>
                                    </button>
                                </div>
                                <hr class="faq-divider">
                                <div id="faq3" class="collapse">
                                    <div class="card-body text-muted">
                                        Answer for event guidelines goes here.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addFaqBtn = document.getElementById('btn-add-faq');
            const faqForm = document.getElementById('form-faq');

            addFaqBtn.addEventListener('click', function() {
                if (faqForm.style.display === 'none') {
                    faqForm.style.display = 'block';
                } else {
                    faqForm.style.display = 'none';
                }
            });
        });
    </script>
@endsection
