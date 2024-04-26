@extends('dashboard')

@section('content')
<div class="container" style="color: white;">
    <h1 class="mb-5" style="color: white;">View user</h1>
    <table class="table table-striped table-bordered" style="color: white; font-size: 20px;">
        <thead>
            <tr>
                <th class="text-center">Avatar</th>
                <th class="text-center">Name</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><img src="{{URL::asset('images/avatar')}}/{{ $userData->image }}" alt="" style="width: 50px; height: 50px;"></td>
                <td class="text-center" style="color: white; font-size: 20px;">{{ $userData->name }}</td>
                <td class="text-center" style="color: white; font-size: 20px;">{{ $userData->phone }}</td>
                <td class="text-center" style="color: white; font-size: 20px;">{{ $userData->email }}</td>
            </tr>
        </tbody>
    </table>
    
</div>
@endsection