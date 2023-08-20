@extends('cms.parent')

@section('title' , 'Edit User')

@section('styles')
@endsection

@section('mainTitle','Edit User')

@section('subTitle','edit user')


@section('content')
<div class="container">
  <form action="{{ route('users.update', $user->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-floating mb-3">
        <label for="username">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
            name="username" value="{{ $user->username }}">
        @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <label for="email">Email address</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            value="{{ $user->email }}">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
            name="first_name" value="{{ $user->first_name }}">
        @error('first_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
            name="last_name" value="{{ $user->last_name }}">
        @error('last_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <label for="is_admin">Is Admin</label>
        <input type="text" class="form-control @error('is_admin') is-invalid @enderror" id="is_admin"
            name="is_admin" value="{{ $user->is_admin }}">
        @error('is_admin')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <label for="is_active">Is Active</label>
        <input type="text" class="form-control @error('is_active') is-invalid @enderror" id="is_active"
            name="is_active" value="{{ $user->is_active }}">
        @error('is_active')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
            name="password" placeholder="Leave blank to keep current password">
        @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
            id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
        @error('password_confirmation')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Edit User</button>
</form>
</div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection