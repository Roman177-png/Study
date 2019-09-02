@extends('layouts.main')
@section('content')
    <main role="main" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="text-muted">{{$offer->title}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="text-muted">{{$offer->prise}} {{$offer->currency}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="text-muted">{{$offer->title}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="text-muted">{{$user->name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="text-muted">{{$category->name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-condensed">
                            <span class="text-success">{{$offer->description}}</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 order-md-1" style="margin-right: -40%;margin-left: 20%;">
                    <img src="http://nhoffmanandco.com/blog/blog/wp-content/uploads/2017/04/Awesome-blue-building-cool-house-Favim_com-124117.jpg" width="400px" height="480px">
                </div>
            </div>
        </div>
    </main>

@stop

