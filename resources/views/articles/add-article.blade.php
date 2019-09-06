@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Article</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('submit-add-article')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @if ($errors->has('title')) is-invalid  @endif" name="title" value="{{ old('title') }}" >

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="topic_id">Categories</label>
                                <div class="col-md-6">
                                    <select class="custom-select" id="topic_id" name="topic_id">
                                        @foreach($topics as $topic)
                                            <option value="{{$topic->id}}">{{$topic->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @if ($errors->has('image')) is-invalid @endif" name="image"  >

                                    <div class="input-group">
                                        <span class="col-md-4 col-form-label text-md-right">With textarea</span>
                                        <textarea name="description" class="form-control" aria-label="With textarea"></textarea>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

