@extends('dashboard')
@section('content')
<style type="text/css">
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
    }

    .card .card-header {
        font-weight: 500;
        padding: 1rem 1.35rem;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .form-control {
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #6c757d;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>
<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="{{URL::asset('images/avatar')}}/{{ $user->image }}">
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Name</label>
                                <input class="form-control form-control-lg" id="inputUsername" type="text" placeholder="Enter your name" value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control form-control-lg" id="inputEmailAddress" type="email" placeholder="Enter your email" value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputAddress">Address</label>
                                <input class="form-control form-control-lg" id="inputAddress" type="text" placeholder="Enter your address" value="{{ $user->address }}">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control form-control-lg" id="inputFirstName" type="text" placeholder="Enter your first name" value="{{ $user->first_name }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control form-control-lg" id="inputLastName" type="text" placeholder="Enter your last name" value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control form-control-lg" id="inputPhone" type="tel" placeholder="Enter your phone number" value="{{ $user->phone }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputSex">Sex</label>
                                    <select class="form-control form-control-lg" id="inputSex" name="sex">
                                        <option value="Male" @if($user->sex == 'Male') selected @endif>Male</option>
                                        <option value="Female" @if($user->sex == 'Female') selected @endif>Female</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg" type="button">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"></script>
@endsection