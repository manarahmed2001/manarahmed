@extends('cms.parent')

@section('title' , 'Create User')

@section('styles')
@endsection

@section('mainTitle','Create User')

@section('subTitle','create user')

@section('content')
<div class="container">
    <form action="{{ route('users.store')}}" method="post">
      @csrf
    <div class="form-floating mb-3">
      <label for="username">user name</label>
  <input type="text"  @class(['form-control', 'is-invalid' => $errors->has('username')]) id="username"name="username" placeholder="user name"value={{ old('username') }}>
  @error('username')
      <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>
<div class="form-floating mb-3">
  <label for="email">Email address</label>
  <input type="email"@class(['form-control', 'is-invalid' => $errors->has('email')]) id="email"name="email" placeholder="name@example.com"value={{ old('email') }}>
  @error('email')
  <div class="invalid-feedback">{{ $message }}</div>
@enderror
</div> 
<div class="form-floating mb-3">
  <label for="first_name">first name</label>
  <input type="text" @class(['form-control', 'is-invalid' => $errors->has('first_name')]) id="first_name"name="first_name" placeholder="first_name"value={{ old('first_name') }}>
  @error('first_name')
  <div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-floating mb-3">
  <label for="last_name">last name</label>
  <input type="text" @class(['form-control', 'is-invalid' => $errors->has('last_name')]) id="last_name"name="last_name" placeholder="lastname"value={{ old('last_name') }}>
  @error('last_name')
      <div class="invalid-feedback">{{ $message }}</div>
  @enderror

</div>
<div class="form-floating mb-3">
  <label for="is_admin">is admin</label>
  <input type="text"  @class(['form-control', 'is-invalid' => $errors->has('is_admin')])id="is_admin"name="is_admin" placeholder="is_admin"value={{ old('is_admin') }}>
  @error('is_admin')
  <div class="invalid-feedback">{{ $message }}</div>
@enderror
</div> 
<div class="form-floating mb-3">
  <label for="is_active">is active</label>
  <input type="text" @class(['form-control', 'is-invalid' => $errors->has('is_active')]) id="is_active"name="is_active" placeholder="is_active"value={{ old('is_active') }}>
  @error('is_active')
  <div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-floating">
  <label for="password">Password</label>
  <input type="password"  @class(['form-control', 'is-invalid' => $errors->has('password')]) id="password"name="password"placeholder="Password"value={{ old('password') }}>
  @error('password')
  <div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="form-floating">
  <label for="password_confirmation">Confirm Password</label>
  <input type="password" @class(['form-control', 'is-invalid' => $errors->has('password_confirmation')])" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"value={{ old('password_confirmation') }}>
  @error('password_confirmation')
  <div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<button type="submit" class="btn btn-primary">crate user</button>
    </form>

  </div>
  @endsection

  @section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection                                