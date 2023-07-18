@extends('cms.parent')

@section('title' , 'Edit User')

@section('styles')
@endsection

@section('mainTitle','Edit User')

@section('subTitle','edit user')


@section('content')
<div class="container">
    <form action="{{ route('users.update' , $user->id)}}" method="post">
      @csrf
      @method('put')
    <div class="form-floating mb-3">
      <label for="username">user name</label>
  <input type="text" class="form-control" id="username"name="username" value="{{$user->username}}">
  
</div>
<div class="form-floating mb-3">
  <label for="email">Email address</label>
  <input type="email" class="form-control" id="email"name="email" value="{{$user->email}}">
 </div> 
<div class="form-floating mb-3">
  <label for="first_name">first name</label>
  <input type="text" class="form-control" id="first_name"name="first_name""value="{{$user->first_name}}>
 </div>
<div class="form-floating mb-3">
  <label for="last_name">last name</label>
  <input type="text" class="form-control" id="last_name"name="last_name" value="{{$user->last_name}}">
</div>
<div class="form-floating mb-3">
  <label for="is_admin">is admin</label>
  <input type="text" class="form-control" id="is_admin"name="is_admin"value="{{$user->is_admin}}">
</div> 
<div class="form-floating mb-3">
  <label for="is_active">is active</label>
  <input type="text" class="form-control" id="is_active"name="is_active" value="{{$user->is_active}}">
  </div>
<div class="form-floating">
 <label for="floatingPassword">Password</label>
 <input type="password" class="form-control" id="floatingPassword"name="floatingPassword">
</div>

<button type="submit" class="btn btn-primary">edit user</button>
    </form>
</div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection