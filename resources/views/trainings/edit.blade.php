@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Edit Training</div>

                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $training->title }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea name="description" cols="20" rows="10" class="form-control">{{ $training->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="title">Trainer</label>
                            <input type="text" class="form-control" name="trainer" value="{{ $training->trainer }}">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Update Training</button>
                            <a href="{{ route('training:index') }}" class="btn btn-link">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection