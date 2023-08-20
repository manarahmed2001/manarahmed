@extends('cms.parent')

@section('title' , 'Index Brand')

@section('styles')
@endsection

@section('mainTitle',' Index Brand')

@section('subTitle','index brand')

@section('content')
    <div class="container ">
        <div class="row">
        
        @foreach ($brand as $brands )
           <div class="col-md-4">
            <ul class="list-group mb-3">
              <li class="list-group-item active" aria-current="true">Id => {{ $brands->id }}</li>
              <li class="list-group-item">name = >{{ $brands->name }}</li>
              <li class="list-group-item">notes =>{{ $brands->notes }}</li>
              <li class="list-group-item">icon => {{ $brands->icon }}</li>
             <li class="list-group-item"><a href= "{{ route('brands.edit' , $brands->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('brands.destroy' , $brands->id) }}" method="post">
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