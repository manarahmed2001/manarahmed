@extends('cms.parent')

@section('title' , 'Create Brand')

@section('styles')
@endsection

@section('mainTitle','Create Brand')

@section('subTitle','create brand')

@section('content')
<div class="container">
    <form action="{{ route('brands.store')}}" method="post">
      @csrf
    <div class="form-floating mb-3">
  <label for="name">name</label>
  <input type="string" class="form-control" id="name"name="name" placeholder="name">
</div> 
<div class="form-floating mb-3">
  <label for="notes">notes</label>
  <input type="text" class="form-control" id="notes"name="notes" placeholder="notes">
 </div>
<div class="form-floating mb-3">
  <label for="icon">icon</label>
  <input type="file" class="form-control" id="icon"name="icon" placeholder="icon">
  </div>
 
<button type="submit" class="btn btn-primary">crate brand</button>
    </form>
  </div>
  @endsection

  @section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection