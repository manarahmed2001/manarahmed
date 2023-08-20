@extends('cms.parent')

@section('title', 'Index User')

@section('styles')
@endsection

@section('mainTitle', 'Index User')

@section('subTitle', 'index user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <form action="{{ route('users.index') }}" method="get">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="col-md-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="col-md-3">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </div>
            </div>
        </form>

            <ul class="list-group mb-3">
                @forelse ($users as $user)
                <li class="list-group-item active" aria-current="true">Id => {{ $user->id }}</li>
                <li class="list-group-item">User Name => {{ $user->username }}</li>
                <li class="list-group-item">Email => {{ $user->email }}</li>
                <li class="list-group-item">First Name => {{ $user->first_name }}</li>
                <li class="list-group-item">Last Name => {{ $user->last_name }}</li>
                <li class="list-group-item">User Type => {{ $user->is_admin }}</li>
                <li class="list-group-item">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post"
                        onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذا المستخدم؟');">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger mt-3">Delete</button>
                    </form>
                </li>
                @empty
                <li class="list-group-item">No users found.</li>
                @endforelse
            </ul>
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection
