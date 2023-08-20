@extends('cms.parent')

@section('title', 'Dashboard')

@section('mainTitle', 'Dashboard')

@section('subTitle', 'Welcome to the dashboard')

@section('content')
    <!-- Place your dashboard content here -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Card Header
                </div>
                <div class="card-body">
                    <!-- Dashboard content goes here -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Another Card Header
                </div>
                <div class="card-body">
                    <!-- More dashboard content goes here -->
                </div>
            </div>
        </div>
    </div>
@endsection
