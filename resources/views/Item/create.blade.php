@extends('cms.parent')

@section('title' , 'Create Item')

@section('styles')
@endsection

@section('mainTitle','Create Item')

@section('subTitle','create item')

@section('content')
<div class="container">
    <form action="{{ route('items.store')}}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="form-floating mb-3">
  <label for="name">name</label>
  <input type="string" class="form-control" id="name"name="name" placeholder="name">
</div> 
<div class="form-floating mb-3">
  <label for="image">image</label>
  <input type="file" class="form-control" id="image"name="image" placeholder="image">
  </div>
  <div class="form-floating mb-3">
    <label for="brand_id">brand id</label>
    <input type="string" class="form-control" id="brand_id"name="brand_id" placeholder="brand id">
    </div>
    <div class="form-floating mb-3">
        <label for="is_active">is active</label>
        <input type="text" class="form-control" id="is_active"name="is_active" placeholder="is_active">
      </div>
      <div class="form-floating mb-3">
        <label for="price">pricee</label>
        <input type="text" class="form-control" id="price"name="price" placeholder="price">
      </div>
      <button type="submit" class="btn btn-primary">crate item</button>
    </form>
  </div>
  @endsection

  @section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection