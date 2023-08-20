@extends('cms.parent')

@section('title' , 'Edit Item')

@section('styles')
@endsection

@section('mainTitle','Edit Item')

@section('subTitle','edit item')


@section('content')
<div class="container">
    <form action="{{ route('items.update' , $item->id)}}" method="post">
      @csrf
      @method('put')
   
<div class="form-floating mb-3">
  <label for="name">name</label>
  <input type="string" class="form-control" id="name"name="name" value="{{$item->name}}">
 </div> 
<div class="form-floating mb-3">
  <label for="image">image</label>
  <img src="{{asset('storage/uploads/' . $item->image) }}" class="card-img-top" alt=",,,,">
  <input type="file" class="form-control" id="image"name="image" value="{{$item->image}}">
  </div>
  <div class="form-floating mb-3">
    <label for="brand_id">brand id</label>
    <input type="string" class="form-control" id="brand_id"name="brand_id" value="{{$item->brand_id}}">
    </div>
    <div class="form-floating mb-3">
        <label for="is_active">is active</label>
        <input type="text" class="form-control" id="is_active"name="is_active" value="{{$item->is_active}}">
        </div>
        <div class="form-floating mb-3">
          <label for="price">price</label>
          <input type="text" class="form-control" id="price"name="price" value="{{$item->price}}">
          </div>
<button type="submit" class="btn btn-primary">edit item</button>
    </form>
</div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection