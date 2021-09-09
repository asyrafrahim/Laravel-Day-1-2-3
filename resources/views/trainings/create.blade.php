@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Create Training</div>

                <div class="card-body">
                    <form action="{{ route('training:store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea name="description" cols="20" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="title">Trainer</label>
                            <input type="text" class="form-control" name="trainer">
                        </div>
                        <div class="form-group">
                            <label for="title">Attachment</label>
                            <input type="file" class="form-control" name="attachment">
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Create New Training</button>
                            <a href="{{ route('training:index') }}" class="btn btn-link">Cancel</a>
                        </div>
                        
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>


@endsection