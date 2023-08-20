@extends('cms.parent')

@section('title' , 'Create Inventory')

@section('styles')
@endsection

@section('mainTitle','Create Inventory')

@section('subTitle','create inventories')

@section('content')
<div class="container">
    <form action="{{route('inventories.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-floating mb-3">
        <label for="name">name</label>
        <input type="text" class="form-control" id="name"name="name" placeholder="name">
       </div>
       <div class="form-group col-md-12">
        <label>City id</label>
        <select  @class(['form-control','is-invalid' => $errors->has('city_id')]) name="city_id" id="city_id"  style="width: 100%;">
         @foreach ($city as  $cities)
         <option  value="{{ $cities->id }}">{{$cities->id}}</option>
         @endforeach
        </select>
        @error('city_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div> 
    <div class="form-floating mb-3">
        <label for="phone">phone</label>
        <input type="text" class="form-control" id="phone"name="phone" placeholder="phone">
      </div> 
    <div class="form-floating mb-3">
        <label for="is_active">is active</label>
        <input type="text" class="form-control" id="is_active"name="is_active" placeholder="is_active">
      </div>
     
      <button type="submit" class="btn btn-primary">crate inventory</button>
          </form>
        </div>
        @endsection
      
        @section('script')
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      @endsection