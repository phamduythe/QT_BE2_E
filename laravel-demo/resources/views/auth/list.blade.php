@extends('dashboard')
@section('content')
<div class="container">
    @if (!auth()->check())
    <div class="container">
        <h1 class="text-center mb-5" style="color: white;">Bạn chưa đăng nhập</h1>
        <div>
            @else
            <div class="container">
                @if(session('message'))
                <div id="message" class="alert alert-primary" role="alert">{{ session('message') }}</div>
                @endif
                <h1 class="text-center mb-5" style="color: white;">User List</h1>
                <table class="table table-striped table-bordered" style="color: white; font-size: 20px;">
                    <thead>
                        <tr>
                            <th class="text-center">Avatar</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center"><img src="{{URL::asset('images/avatar')}}/{{ $user->image }}" alt="" style="width: 50px; height: 50px;"></td>
                            <td class="text-center" style="color: white; font-size: 20px;">{{ $user->name }}</td>
                            <td class="text-center" style="color: white; font-size: 20px;">{{ $user->email }}</td>
                            <td class="text-center" style="color: white; font-size: 20px;">
                                <a href="{{ route('viewprofie',$user->id) }}" class="btn btn-danger btn-block">View</a>
                                <button class="btn btn-danger btn-block" onclick="confirmDelete({{ $user->id }})">Delete</button>
                                <a href="{{ route('update',$user->id) }}" class="btn btn-danger btn-block">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</div>
<script>
    function confirmDelete(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = "{{ route('destroy',':userId') }}".replace(':userId', userId);
        }
    }
    // Ẩn thông báo sau 10 giây
    setTimeout(function() {
        document.getElementById('message').style.display = 'none';
    }, 10000); // 10 giây (10000 miligiây)
</script>
@endsection