@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Show Training</div>

                <div class="card-body">
                    
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $training->title }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="title">Description</label>
                            <textarea name="description" cols="20" rows="10" class="form-control" readonly>{{ $training->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="title">Trainer</label>
                            <input type="text" class="form-control" name="trainer" value="{{ $training->trainer }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="title">Attachment</label>
                            <a href="{{ env('APP_URL')}}/storage/{{ $training->attachment }}" target="_blank">Open Attachment</a>
                        </div>
                        <div class="form-group">
                            
                            <a href="{{ route('training:index') }}" class="btn btn-link">Back to Training Index</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection