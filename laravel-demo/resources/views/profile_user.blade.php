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
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px, rgb(51, 51, 51) 0px 0px 0px 3px;
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

    button {
        border: none;
        outline: none;
        background-color: #6c5ce7;
        padding: 10px 20px;
        font-size: 12px;
        font-weight: 700;
        color: #fff;
        border-radius: 5px;
        transition: all ease 0.1s;
        box-shadow: 0px 5px 0px 0px #a29bfe;
    }

    button:active {
        transform: translateY(5px);
        box-shadow: 0px 0px 0px 0px #a29bfe;
    }
</style>
@if (auth()->check())
<div class="container-xl px-4 mt-4">
    <nav class="nav nav-tabs nav-fill">
        <h3 class="nav-item nav-link active">Profile</h3>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row mb-4">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header"><h4>Profile Picture</h4></div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="{{URL::asset('images/avatar')}}/{{ $user->image }}">
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
            <div class="card my-4 mb-xl-1">
                <div class="card-header">
                    <h4>Favorite</h4>
                    <form id="saveFavoritesForm" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="form-group">
                            <label>Select favorites:</label><br>
                            @foreach($allFavorites as $favorite)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="favorites[]" value="{{ $favorite->favorite_id }}" id="favorite{{ $favorite->favorite_id }}" {{ in_array($favorite->favorite_id, $favorites) ? 'checked' : '' }}>
                                <label class="form-check-label" for="favorite{{ $favorite->favorite_id }}">
                                    {{ $favorite->favorite_name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit" class="button">Save favorites</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header"><h4>Account Details</h4></div>
                <div class="card-body p-4 border">
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputName">Username:</label>
                            <input class="form-control" id="inputName" type="text" placeholder="Enter your first name" value="{{ $user->name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputEmail">Email:</label>
                            <input class="form-control" id="inputEmail" type="text" placeholder="Enter your last name" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputPhone">Phone number:</label>
                        <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="{{ $user->phone }}">
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputAddress">Address</label>
                        <input class="form-control form-control-lg" id="inputAddress" type="text" placeholder="Enter your address" value="{{ $user->address }}">
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">First name</label>
                            <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="{{ $user->first_name }}">
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Last name</label>
                            <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="{{ $user->last_name }}">
                        </div>
                        <div class="col-md-6 pt-3">
                            <label class="small mb-1" for="inputSex">Sex</label>
                            <select class="form-control" id="inputSex" name="sex">
                                <option value="Male" @if($user->sex == 'Male') selected @endif>Male</option>
                                <option value="Female" @if($user->sex == 'Female') selected @endif>Female</option>
                            </select>
                        </div>
                    </div>
                    <button class="button" type="button">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-0 m-4">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header">Posts</div>
                <div class="card-body p-4 border">
                    <div class="mb-3">
                        <label class="small mb-1" style="font-size: larger;" for="inputFavorite">Post:</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="section__intro u-s-m-b-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__text-wrap">
                    <h1 class="section__heading" style="color: #fff;">BẠN CHƯA ĐĂNG NHẬP</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#saveFavoritesForm').submit(function(e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định của form
            // Lấy dữ liệu từ form và biến thành chuỗi dữ liệu có thể gửi đi
            var formData = $(this).serialize();
            // Gửi yêu cầu AJAX
            $.ajax({
                url: '{{ route("add-favorites") }}', // Địa chỉ URL mà yêu cầu sẽ gửi đến
                method: 'POST', // Phương thức HTTP sử dụng
                data: formData, // Dữ liệu gửi đi
                success: function(response) { // Xử lý kết quả nếu thành công
                    // Hiển thị thông báo hoặc thực hiện các thao tác khác nếu cần
                    alert('Favorites have been saved successfully.');
                },
                error: function(xhr, status, error) { // Xử lý lỗi nếu có
                    console.error(xhr.responseText); // Log lỗi ra console
                    alert('An error occurred. Please try again later.');
                }
            });
        });
    });
</script>
@endsection