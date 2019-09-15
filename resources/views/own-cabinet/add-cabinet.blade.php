@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('submit_add_cabinet')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="first_name" class="col-md-4 control-label">Name</label>

                                <div class="form-group row">
                                    <input id="first_name" type="text" class="form-control"  name="first_name" value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="last_name" class="col-md-4 control-label">last_name</label>

                                <div class="form-group row">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Photo</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @if ($errors->has('image')) is-invalid @endif" name="image"  >
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">phone</label>

                                <div class="form-group row">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                <label for="date_of_birth" class="col-md-4 control-label">date_of_birth</label>

                                <div class="form-group row">
                                    <input id="date_of_birth" type="text" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required autofocus>

                                    @if ($errors->has('date_of_birth'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('city_of_residence') ? ' has-error' : '' }}">
                                <label for="city_of_residence" class="col-md-4 control-label">city_of_residence</label>

                                <div class="form-group row">
                                    <input id="city_of_residence" type="text" class="form-control" name="city_of_residence" value="{{ old('city_of_residence') }}" required autofocus>

                                    @if ($errors->has('city_of_residence'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city_of_residence') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('telegram') ? ' has-error' : '' }}">
                                <label for="telegram" class="col-md-4 control-label">telegram</label>

                                <div class="form-group row">
                                    <input id="telegram" type="text" class="form-control" name="telegram" value="{{ old('telegram') }}" required autofocus>

                                    @if ($errors->has('telegram'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telegram') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="form-group row">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="input-group">
                                <span class="col-md-4 col-form-label text-md-right">About self</span>
                                <textarea name="about_self" class="form-control" aria-label="With textarea"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




