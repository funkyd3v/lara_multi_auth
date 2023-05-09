@extends('admin.dashboard')
@section('content')
<div class="page-content">
    <div class="row profile-body">
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Admin Password Change</h6>

                            <form class="forms-sample" action="{{ route('admin.profile.store') }}" method="POST">
                            @csrf
                                <div class="mb-3">
                                    <label for="old_password" class="form-label">Old Password</label>
                                    <input type="password" class="form-control @error('old_password')
                                        is-invalid
                                    @enderror"
                                    name="old_password" 
                                    id="old_password">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" class="form-control @error('new_password')
                                        is-invalid
                                    @enderror"
                                    name="new_password" 
                                    id="new_password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control"
                                    name="new_password_confirmation" 
                                    id="new_password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Update Password</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
    </div>
</div>
@endsection