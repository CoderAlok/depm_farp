@extends('errors.commons.error_app_layout')

@section('error_contents')
    <div class="page-wrapper alt">
        <!-- BEGIN Page Content -->
        <!-- the #js-page-content id is needed for some plugins to initialize -->
        <main id="js-page-content" role="main" class="page-content">
            <div class="h-alt-f d-flex flex-column align-items-center justify-content-center text-center">
                <h1 class="page-error color-fusion-500">
                    ERROR <span class="text-gradient">500</span>
                    <small class="fw-500">
                        Something <u>went</u> wrong!
                    </small>
                </h1>
                <h3 class="fw-500 mb-5">
                    You have experienced a technical error. We apologize.
                </h3>
                <h4>
                    {{ __($exception->getMessage() ?: 'Server Error') }}
                </h4>
            </div>
        </main>
        <!-- END Page Content -->
        <!-- BEGIN Page Footer -->
        <footer class="page-footer" role="contentinfo">
            <div class="d-flex align-items-center flex-1 text-muted">
                <span class="hidden-md-down fw-700">2019 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com'
                        class='text-primary fw-500' title='gotbootstrap.com' target='_blank'>gotbootstrap.com</a></span>
            </div>
            <div>
                <ul class="list-table m-0">
                    <li><a href="intel_introduction.html" class="text-secondary fw-700">About</a></li>
                    <li class="pl-3"><a href="info_app_licensing.html" class="text-secondary fw-700">License</a></li>
                    <li class="pl-3"><a href="info_app_docs.html" class="text-secondary fw-700">Documentation</a></li>
                    <li class="pl-3 fs-xl"><a href="https://wrapbootstrap.com/user/MyOrange" class="text-secondary"
                            target="_blank"><i class="fal fa-question-circle" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </footer>
        <!-- END Page Footer -->
    </div>
@endsection
