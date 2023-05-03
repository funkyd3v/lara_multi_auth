@extends('admin.dashboard')
@section('content')
<div class="page-content">
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div>
                            <img class="wd-100 rounded-circle"
                                src="{{ !empty($userData->photo) ? url('upload/admin_images/'.$userData->photo) : url('upload/no_image.jpg') }}"
                                alt="profile">
                            <span class="h5 ms-3">{{ $userData->username }}</span>
                        </div>

                    </div>
                    <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of
                        Social.</p>
                    {{-- <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                        <p class="text-muted">November 15, 2015</p>
                    </div> --}}
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                        <p class="text-muted">{{ $userData->address }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                        <p class="text-muted">{{ $userData->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{ $userData->phone }}</p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Admin Profile Update</h6>

                            <form class="forms-sample">
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Username</label>
                                    <input type="text" class="form-control"
                                    name="username" 
                                    id="exampleInputUsername1" value="{{ $userData->username }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Name</label>
                                    <input type="text" class="form-control"
                                    name="name" 
                                    id="exampleInputUsername1" value="{{ $userData->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control"
                                    name="email" id="exampleInputEmail1"
                                        value="{{ $userData->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Phone</label>
                                    <input type="text" class="form-control"
                                    name="phone" 
                                    id="exampleInputUsername1" value="{{ $userData->phone }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Address</label>
                                    <input type="text" class="form-control"
                                    name="address" 
                                    id="exampleInputUsername1" value="{{ $userData->address }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Photo</label>
                                    <input type="file" class="formFile" name="photo" id="image">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label"></label>
                                    <img class="wd-80 rounded-circle" id="showImage"
                                src="{{ !empty($userData->photo) ? url('upload/admin_images/'.$userData->photo) : url('upload/no_image.jpg') }}"
                                alt="profile">
                                </div>
                                
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection