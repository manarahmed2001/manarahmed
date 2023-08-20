@extends('cms.parent')

@section('title' , 'Index Inventory')

@section('styles')
@endsection

@section('mainTitle',' Index Inventory')

@section('subTitle','index inventory')

@section('content')
    <div class="container ">
        <div class="row">
        
        @foreach ($inventory as $inventories )
           <div class="col-md-4">
            <ul class="list-group mb-3">
              <li class="list-group-item active" aria-current="true">Id => {{ $inventories->id }}</li>
               <li class="list-group-item">Name =>{{ $inventories->name }}</li>
               <li class="list-group-item">city id = >{{ $inventories->city_id}}</li>
               <li class="list-group-item">Phone => {{ $inventories->phone }}</li>
               <li class="list-group-item">is active => {{ $inventories->is_active }}</li>
              <li class="list-group-item"><a href= "{{ route('inventories.edit' , $inventories->id) }}" class="btn btn-primary">Edit</a></li>
              {{-- <li>
                @foreach ($inventories->items as $item)
                    {{ $item->id }}@if (!$loop->last), @endif
                @endforeach
              </li> --}}
              {{-- <li class="list-group-item"><a href="{{ route('inventory.show', $item->id) }}">View Largest Inventory</a></li> --}}
                <li>
                <form action="{{ route('inventories.destroy' , $inventories->id) }}" method="post">
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