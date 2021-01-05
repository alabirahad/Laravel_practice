@extends('layouts.default')
@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">@lang('eng.USER_TABLE')</a>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="now-ui-icons ui-1_zoom-bold"></i>
                        </div>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <i class="now-ui-icons media-2_sound-wave"></i>
                        <p>
                            <span class="d-lg-none d-md-block"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre">
                               <i class="now-ui-icons users_single-02"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">@lang('eng.USER_TABLE')</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{url('/userGroup/create')}}" class="btn btn-primary">
                                @lang('eng.CREATE_NEW_USER_GROUP')
                                <i class="fa fa-users" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>@lang('eng.SERIAL')</th>
                                    <th>@lang('eng.NAME')</th>
                                    <th>@lang('eng.ACTIONS')</th>
                                </tr></thead>
                            <tbody>
                                <?php $sl=1;?>
                                @foreach ($userGroup as $user) 
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td> {{$user->name}} </td>
                                    <td><a href = 'userGroup/{{ $user->id }}/edit' class="btn btn-primary">@lang('eng.EDIT')</a>
                                    <!--<a href = 'userGroup/destroy/{{ $user->id }}' class="btn btn-primary">@lang('eng.DELETE')</a></td>-->
                                    <td>
                                        {!! Form::open(['url' => 'userGroup/'.$user->id]) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <button class="btn btn-danger remove"  type="submit">@lang('eng.DELETE')</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">{{ $userGroup->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection