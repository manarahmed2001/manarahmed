@extends('cms.parent')

@section('title' , 'Create Country')

@section('styles')
@endsection

@section('mainTitle','Create Country')

@section('subTitle','create country')

@section('content')
<div class="container">
    <form action="{{ route('countries.store')}}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="form-floating mb-3">
  <label for="name">name</label>
  <input type="string" class="form-control" id="name"name="name" placeholder="name">
</div> 
 <button type="submit" class="btn btn-primary">crate country</button>
    </form>
  </div>
  @endsection

  @section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection