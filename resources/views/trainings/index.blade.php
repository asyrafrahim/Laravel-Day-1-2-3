@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Training Index
                    <div class="float-end">
                        <form class="d-none d-md-inline-block form-inline ms-auto mr-0 mr-md-3 my-2 my-md-0"
                            method="GET" action="{{ route('training:index') }}">
                        <div class="input-group">
                            <input
                                class="form-control"
                                type="text" placeholder="Search for..."
                                aria-label="Search" aria-describedly="basic-addon2"
                                name="keyword"
                                value="{{ request()->get('keyword') }}"/>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </form>
                    <a href="{{ route('training:create') }}" class="btn btn-primary">+ Create New Training </a>
                    </div>
                </div>
        
                <div class="card-body">

                    <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Actions</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainings as $training)
                        <tr>
                            <td>{{ $training->id}}</td>
                            <td>{{ $training->title}}</td>
                            
                            <td>{{ $training->user->name}}</td>
                            <td>
                                <a href="{{ route('training:show',$training) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('training:edit',$training) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('training:delete',$training) }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach

                        @if (session()->has('alert'))
                        <div class="alert {{ session()->get('alert-type')}}">
                            {{session()->get('alert')}}
                        </div>
                        @endif
                    </tbody>
                </table>
                {{-- {{ $trainings->links()}} --}}
                {{ $trainings->appends(['keyword' =>request()->get('keyword')])->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection