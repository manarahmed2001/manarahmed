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
  <input type="text" class="form-control" id="username"name="username" placeholder="user name">
  <label for="username">user name</label>
</div>
<div class="form-floating mb-3">
  <input type="email" class="form-control" id="email"name="email" placeholder="name@example.com">
  <label for="email">Email address</label>
</div> 
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="first_name"name="first_name" placeholder="first_name">
  <label for="first_name">first name</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="last_name"name="last_name" placeholder="lastname">
  <label for="last_name">last name</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="is_admin"name="is_admin" placeholder="is_admin">
  <label for="is_admin">is admin</label>
</div> 
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="is_active"name="is_active" placeholder="is_active">
  <label for="is_active">is active</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="password"name="password"placeholder="Password">
  <label for="password">Password</label>
</div>

<button type="submit" class="btn btn-primary">crate user</button>
    </form>
  </div>
  @endsection

  @section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection