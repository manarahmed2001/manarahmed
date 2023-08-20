@extends('cms.parent')

@section('title' , 'Index Country')

@section('styles')
@endsection

@section('mainTitle',' Index Country')

@section('subTitle','index country')

@section('content')
    <div class="container ">
        <div class="row">
        
        @foreach ($country as $countriess )
           <div class="col-md-4">
            <ul class="list-group mb-3">
              <li class="list-group-item active" aria-current="true">Id => {{ $countriess->id }}</li>
              <li class="list-group-item">name = >{{ $countriess->name }}</li>
              <li class="list-group-item"><a href= "{{ route('countries.edit' , $countriess->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('countries.destroy' , $countriess->id) }}" method="post">
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