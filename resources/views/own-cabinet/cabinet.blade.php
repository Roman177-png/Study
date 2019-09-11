@extends('layouts.main')
@section('content')
    <main role="main" class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">Featured post</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Design</strong>
                        <h3 class="mb-0">Post title</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div>
                </div>
            </div>
        </div>



    </main><!-- /.container -->

@stop
@extends('admin.layouts.admin-main')
@section('title', 'Admin')
@section('content')
    <main role="main" class="container">
        <div class="row">
            <aside class="col-md-4 blog-sidebar card pt-3">
                <div class="text-center">
                    <img class="rounded-circle" src="{{asset('/images/user-thumb-lg.png')}}" alt="Generic placeholder image" width="140" height="140">
                    <h2>{{$user->first_name}}</h2>
                    <p>Unique ID: {{$user->id}}</p>
                </div>
                @foreach($informations as $information)
                <div class="modal-body text-left">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">first name: {{$user->first_name}}</li>
                        <li class="list-group-item">last name: {{$user->last_name}}</li>
                        <li class="list-group-item">email: {{$user->email}}</li>
                        <li class="list-group-item">phone: {{$user->phone}}</li>
                        <li class="list-group-item">date of birth: {{$user->date_of_birth}}</li>
                        <li class="list-group-item">nationality: {{$user->nationality}}</li>
                        <li class="list-group-item">address line 1: {{$user->address_line1}}</li>
                        <li class="list-group-item">address line 1: {{$user->address_line1}}</li>
                        <li class="list-group-item">city of residence: {{$user->city_of_residence}}</li>
                        <li class="list-group-item">zip code: {{$user->zip_code}}</li>
                        <li class="list-group-item">telegram: {{$user->telegram}}</li>
                        <li class="list-group-item">role: {{$user->role}}</li>
                    </ul>
                    <nav class="blog-pagination text-center pt-5">
                        @if($user->kyc_status == $user::PROCESSED)
                            <a href="{{route('admin-approve',$user)}}" class="btn btn-sm btn-info">
                                <i class="fa fa-check-square-o" aria-hidden="true"></i> approve
                            </a>
                        @endif
                        <a href="{{route('admin-user-login',[$kycStatus,$user])}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-user" aria-hidden="true"></i> login
                        </a>
                        <a href="{{route('admin-user-edit',[$kycStatus,$user])}}" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit
                        </a>
                        <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#myModal-{{$user->id}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        @include('admin.layouts.confirmation-modal',['name'=>'admin-user-delete', 'user'=>$user,'kycStatus' => $kycStatus])
                    </nav>
                </div>
                    @endforeach
            </aside><!-- /.blog-sidebar -->
            <div class="col-md-8 blog-main">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            @foreach($tabs as $key=>$value)
                                <li class="nav-item">
                                    <a class="nav-link {{$key == $tab ? 'active' : ''}}" href="{{route('admin-user-view',[$kycStatus,$key,$user])}}">{{$key}} <span class="badge badge-warning">{{$value}}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        @if(isset($transactions) && $transactions)
                            <div class="page-header">
                                <h3>{{ucfirst($tab)}} History</h3>
                            </div>
                            <div class="float-left">
                                Find <b>{{$transactions->total()}}</b> Page <b>{{$transactions->currentPage()}} / {{$transactions->lastPage()}}</b>
                            </div>
                            <div class="float-right">
                                {!! $transactions->links(); !!}
                            </div>
                            @if($transactions->total() != 0)
                                <table class="table table-center table-brd a-color">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Type</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{$transaction->id}}</td>
                                            <td>{{$transaction->date}}</td>
                                            <td>{{$transaction->type}}</td>
                                            <td class="text-right">
                                                <button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#info-transaction-{{$transaction->id}}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> view
                                                </button>
                                                @include('admin.layouts.info-transaction-modal',['transaction' => $transaction, 'id' => "info-transaction-$transaction->id"])
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <div class="float-right">
                                {!! $transactions->links(); !!}
                            </div>
                        @endif
                        @if(isset($verifications) && $verifications)
                            <div class="page-header">
                                <h3>{{ucfirst($tab)}} History</h3>
                            </div>
                            <div class="float-left">
                                Find <b>{{$verifications->total()}}</b> Page <b>{{$verifications->currentPage()}} / {{$verifications->lastPage()}}</b>
                            </div>
                            <div class="float-right">
                                {!! $verifications->links(); !!}
                            </div>
                            @if($verifications->total() != 0)
                                <table class="table table-center table-brd a-color">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Admin</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Message</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($verifications as $verification)
                                        <tr>
                                            <td>{{$verification->id}}</td>
                                            <td>{{$verification->admin()->first_name}}({{$verification->admin()->id}})</td>
                                            <td>
                                                @if($verification->status == $user::REJECTED )
                                                    <span class="badge badge-danger">Blocked</span>
                                                @elseif($verification->status == $user::VERIFIED)
                                                    <span class="badge badge-success">Success</span>
                                                @endif
                                            </td>
                                            <td>{{$verification->message}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                            <div class="float-right">
                                {!! $verifications->links(); !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div><!-- /.blog-main -->
        </div><!-- /.row -->
    </main><!-- /.container -->
@stop
@section('javascript')
    @parent
    <script>
    </script>
@stop