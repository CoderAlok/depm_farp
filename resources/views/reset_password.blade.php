@extends('layouts.app')

@section('content')
    <!-- BEGIN Page Content -->
    <div class="col p-4 offset-md-3 offset-sm-4 offset-xl-2 offset-1">
        <div class="w-100">
            <div class="w-100 bg-white position-relative rounded regFormBox my-3">
                <h3 class="bg-green text-white text-center py-2 mb-2">
                    Dashboard
                </h3>
                <h5>Welcome, {{ $data->name ?? '' }}</h5>
            </div>

            <div class="container col-md-6 offset-md-3">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Old password</label>
                        <input type="password" class="form-control" name="" id=""
                            placeholder="Enter old password">
                    </div>
                    <div class="form-group">
                        <label for="">New password</label>
                        <input type="password" class="form-control" name="" id=""
                            placeholder="Enter new password">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm new password</label>
                        <input type="password" class="form-control" name="" id=""
                            placeholder="Confirm new password">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-info" name="" id="" value="Reset password">
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
