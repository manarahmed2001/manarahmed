@extends('cms.parent')

@section('title' , 'Index Vendor')

@section('styles')
@endsection

@section('mainTitle',' Index Vendor')

@section('subTitle','index vendor')

@section('content')
    <div class="container ">
        <div class="row">
        
        @foreach ($vendor as $vendors )
           <div class="col-md-4">
            <ul class="list-group mb-3">
              <li class="list-group-item active" aria-current="true">Id => {{ $vendors->id }}</li>
              <li class="list-group-item">Email = >{{ $vendors->email }}</li>
              <li class="list-group-item">First Name =>{{ $vendors->first_name }}</li>
              <li class="list-group-item">Last Name => {{ $vendors->last_name }}</li>
              <li class="list-group-item">Phone => {{ $vendors->phone }}</li>
              <li class="list-group-item"><a href= "{{ route('vendors.edit' , $vendors->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('vendors.destroy' , $vendors->id) }}" method="post">
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