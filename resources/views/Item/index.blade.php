@extends('cms.parent')

@section('title' , 'Index Item')

@section('styles')
@endsection

@section('mainTitle',' Index Item')

@section('subTitle','index item')

@section('content')
    <div class="container ">
        <div class="row">
        
        @foreach ($item as $items )
           <div class="col-md-4">
            <ul class="list-group mb-3">
              <img src="{{asset('storage/uploads/' . $items->image) }}" class="card-img-top" alt=",,,,">
              <li class="list-group-item active" aria-current="true">Id => {{ $items->id }}</li>
              <li class="list-group-item">name = >{{ $items->name }}</li>
              <li class="list-group-item">price =>{{ $items->price }}</li>
              <li class="list-group-item">brand_id =>{{ $items->brand_id }}</li>

              <li class="list-group-item"><a href= "{{ route('items.edit' , $items->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('items.destroy' , $items->id) }}" method="post">
                    @csrf()
                    @method('delete')
                    <button type="submit" class="btn btn-danger mt-3">Delete</button>
                    <li class="btn-holder"><a href="{{ route('add.to.cart', $items->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </li>
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