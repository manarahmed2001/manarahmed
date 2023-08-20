@extends('cms.parent')

@section('title' , 'Index City')

@section('styles')
@endsection

@section('mainTitle',' Index City')

@section('subTitle','index city')

@section('content')
    <div class="container ">
        <div class="row">
        
        @foreach ($city as $cities )
           <div class="col-md-4">
            <ul class="list-group mb-3">
              <li class="list-group-item active" aria-current="true">Id => {{ $cities->id }}</li>
              <li class="list-group-item">name = >{{ $cities->name }}</li>
              <li class="list-group-item">country id = >{{ $cities->country_id}}</li>
              <li class="list-group-item"><a href= "{{ route('cities.edit' , $cities->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('cities.destroy' , $cities->id) }}" method="post">
                    @csrf()
                    @method('delete')
                    <button type="submit" class="btn btn-danger mt-3">Delete</button>
                </form>
            </li>
            </ul>
        </div>
        @endforeach
        
            </div>
            </div>
@endsection

@section('script')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection