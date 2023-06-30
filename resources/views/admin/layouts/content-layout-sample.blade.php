{{-- Just use this for sample then delete this --}}

@extends('admin.layouts.app')

@section('content')
    <main id="js-page-content" role="main" class="page-content">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class="subheader-icon fal fa-"></i> Registration Page
                <sup class="badge badge-primary fw-500">ADDON</sup>
            </h1>
            <div class="subheader-block">Register to create your account</div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>Establishment Details</h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <!-- Main content starts here -->
                        <!-- Main content ends here -->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    @routes
    <script>
        $(document).ready((e) => {
            // Edit model show
            // $("body").on("click", ".edit-user", function(e) {
            // e.preventDefault();
            // var id = $(this).attr("data-id");

            // console.log('ID : ' + id);
            // $.ajax({
            //     type: 'get',
            //     url: route('exporter.details', id),
            //     success: function(data) {
            //         console.log(data);
            //     },
            //     error: function(error) {
            //         console.log(error)
            //     }
            // });
            // });
        });
    </script>
@endsection
