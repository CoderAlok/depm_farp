<!-- BEGIN Page Footer -->
{{-- <footer class="page-footer" role="contentinfo">
    <div class="d-flex align-items-center flex-1 text-muted">
        <span class="hidden-md-down fw-700">2019 © SmartAdmin by&nbsp;<a href="https://www.gotbootstrap.com"
                class="text-primary fw-500" title="gotbootstrap.com" target="_blank">gotbootstrap.com</a></span>
    </div>
    <div>
        <ul class="list-table m-0">
            <li>
                <a href="" class="text-secondary fw-700">About</a>
            </li>
            <li class="pl-3">
                <a href="info_app_licensing.html" class="text-secondary fw-700">License</a>
            </li>
            <li class="pl-3">
                <a href="info_app_docs.html" class="text-secondary fw-700">Documentation</a>
            </li>
            <li class="pl-3 fs-xl">
                <a href="https://wrapbootstrap.com/user/MyOrange" class="text-secondary" target="_blank"><i
                        class="fal fa-question-circle" aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>
</footer> --}}
<!-- END Page Footer -->
<!-- BEGIN Shortcuts -->
<!-- modal shortcut -->
{{-- <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog"
    aria-labelledby="modal-shortcut" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="app-list w-auto h-auto p-0 text-left">
                    <li>
                        <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                            <div class="icon-stack">
                                <i class="base base-7 icon-stack-3x opacity-100 color-primary-500"></i>
                                <i class="base base-7 icon-stack-2x opacity-100 color-primary-300"></i>
                                <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                            </div>
                            <span class="app-list-name">
                                Home
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="page_inbox_general.html" class="app-list-item text-white border-0 m-0">
                            <div class="icon-stack">
                                <i class="base base-7 icon-stack-3x opacity-100 color-success-500"></i>
                                <i class="base base-7 icon-stack-2x opacity-100 color-success-300"></i>
                                <i class="ni ni-envelope icon-stack-1x text-white"></i>
                            </div>
                            <span class="app-list-name">
                                Inbox
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                            <div class="icon-stack">
                                <i class="base base-7 icon-stack-2x opacity-100 color-primary-300"></i>
                                <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
                            </div>
                            <span class="app-list-name">
                                Add More
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
<!-- END Shortcuts -->
</div>
</div>
</div>
<!-- END Page Wrapper -->
<!-- BEGIN Quick Menu -->
<!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
{{-- <nav class="shortcut-menu d-none d-sm-block">
    <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
    <label for="menu_open" class="menu-open-button">
        <span class="app-shortcut-icon d-block"></span>
    </label>
    <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
        <i class="fal fa-arrow-up"></i>
    </a>
    <a href="page_login-alt.html" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
        <i class="fal fa-sign-out"></i>
    </a>
    <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left"
        title="Full Screen">
        <i class="fal fa-expand"></i>
    </a>
    <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left"
        title="Print page">
        <i class="fal fa-print"></i>
    </a>
    <a href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left"
        title="Voice command">
        <i class="fal fa-microphone"></i>
    </a>
</nav> --}}
<!-- END Quick Menu -->

<!-- BEGIN Page Settings -->
<div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right modal-md">
        <div class="modal-content">
            <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                <h4 class="m-0 text-center color-white">
                    Layout Settings
                    <small class="mb-0 opacity-80">User Interface Settings</small>
                </h4>
                <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="settings-panel">
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">App Layout</h5>
                        </div>
                    </div>
                    <div class="list" id="fh">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                            data-class="header-function-fixed"></a>
                        <span class="onoffswitch-title">Fixed Header</span>
                        <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                    </div>
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">Mobile Menu</h5>
                        </div>
                    </div>
                    <div class="list" id="nmp">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                            data-class="nav-mobile-push"></a>
                        <span class="onoffswitch-title">Push Content</span>
                        <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                    </div>
                    <hr class="mb-0 mt-4" />
                    <div class="pl-5 pr-3 py-3 bg-faded">
                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <a href="#" class="btn btn-outline-danger fw-500 btn-block"
                                    data-action="app-reset">Reset Settings</a>
                            </div>
                            <div class="col-6 pl-1">
                                <a href="#" class="btn btn-danger fw-500 btn-block"
                                    data-action="factory-reset">Factory Reset</a>
                            </div>
                        </div>
                    </div>
                </div>
                <span id="saving"></span>
            </div>
        </div>
    </div>
</div>
<!-- END Page Settings -->
</body>

</html>

<script src="{{ asset('public/farp1_assets/js/vendors.bundle.js') }}"></script>
<script src="{{ asset('public/farp1_assets/js/app.bundle.js') }}"></script>
<script src="{{ asset('public/farp1_assets/js/notifications/toastr/toastr.js') }}"></script>
<!-- Datatables  -->
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": 500,
        "hideDuration": 100,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
<script src="{{ asset('public/farp1_assets/js/datagrid/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('public/farp1_assets/js/datagrid/datatables/datatables.export.js') }}"></script>
<script src="http://benalman.com/code/projects/jquery-throttle-debounce/jquery.ba-throttle-debounce.js"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>
    $(document).ready((e) => {
        // initialize datatable
        $('#dt-basic-example').dataTable({
            responsive: true,
            lengthChange: false,
            dom:
                /*	--- Layout Structure 
                	--- Options
                	l	-	length changing input control
                	f	-	filtering input
                	t	-	The table!
                	i	-	Table information summary
                	p	-	pagination control
                	r	-	processing display element
                	B	-	buttons
                	R	-	ColReorder
                	S	-	Select

                	--- Markup
                	< and >				- div element
                	<"class" and >		- div with a class
                	<"#id" and >		- div with an ID
                	<"#id.class" and >	- div with an ID and a class

                	--- Further reading
                	https://datatables.net/reference/option/dom
                	--------------------------------------
                 */
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                /*{
                	extend:    'colvis',
                	text:      'Column Visibility',
                	titleAttr: 'Col visibility',
                	className: 'mr-sm-3'
                },*/
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generate PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generate Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-primary btn-sm'
                }
            ]
        });
    });
</script>
@yield('scripts')


