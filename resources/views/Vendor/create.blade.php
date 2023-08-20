@extends('cms.parent')

@section('title' , 'Create Vendor')

@section('styles')
@endsection

@section('mainTitle','Create Vendor')

@section('subTitle','create vendor')

@section('content')
<div class="container">
    <form action="{{ route('vendors.store')}}" method="post">
      @csrf
     
    <div class="form-floating mb-3">
  <label for="email">Email address</label>
  <input type="email" class="form-control" id="email"name="email" placeholder="name@example.com">
</div> 
<div class="form-floating mb-3">
  <label for="first_name">first name</label>
  <input type="text" class="form-control" id="first_name"name="first_name" placeholder="first_name">
 </div>
<div class="form-floating mb-3">
  <label for="last_name">last name</label>
  <input type="text" class="form-control" id="last_name"name="last_name" placeholder="lastname">
  </div>
<div class="form-floating mb-3">
  <label for="is_active">is active</label>
  <input type="text" class="form-control" id="is_active"name="is_active" placeholder="is_active">
</div>
<div class="form-floating mb-3">
    <label for="phone">phone</label>
    <input type="text" class="form-control" id="phone"name="phone" placeholder="phone">
  </div> 

<button type="submit" class="btn btn-primary">crate vendor</button>
    </form>
  </div>
  @endsection

  @section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection