@extends('cms.parent')

@section('title' , 'Create City')

@section('styles')
@endsection

@section('mainTitle','Create City')

@section('subTitle','create city')

@section('content')
<div class="container">
    <form action="{{ route('cities.store')}}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="form-floating mb-3">
  <label for="name">name</label>
  <input type="string" class="form-control" id="name"name="name" placeholder="name">
</div> 
<div class="form-group col-md-12">
    <label>Country id</label>
    <select  @class(['form-control','is-invalid' => $errors->has('country_id')]) name="country_id" id="country_id"  style="width: 100%;">
     @foreach ($country as  $countries)
     <option  value="{{  $countries->id }}">{{  $countries->id}}</option>
     @endforeach
    </select>
    @error('country_id')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> 
 <button type="submit" class="btn btn-primary">crate city</button>
    </form>
  </div>
  @endsection

  @section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection