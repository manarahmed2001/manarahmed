@extends('cms.parent')

@section('title' , 'Edit Country')

@section('styles')
@endsection

@section('mainTitle','Edit Country')

@section('subTitle','edit country')


@section('content')
<div class="container">
    <form action="{{ route('countries.update' , $country->id)}}" method="post">
      @csrf
      @method('put')
   
<div class="form-floating mb-3">
  <label for="name">name</label>
  <input type="string" class="form-control" id="name"name="name" value="{{$country->name}}">
 </div> 
<button type="submit" class="btn btn-primary">edit country</button>
    </form>
</div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection