@extends('layouts.default')
@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">@lang('eng.REGISTRATION')</a>
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
                            <h4 class="card-title">@lang('eng.REGISTRATION_FORM')</h4>
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

                    {!! Form::open(['url' => 'users','enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('name', __('eng.NAME'))!!}
                                {!! Form::text('name',NULL, ['id' => 'name','class' => 'form-control','placeholder' => __('eng.ENTER_NAME')])!!}
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('username', __('eng.USERNAME'))!!}
                                {!! Form::text('username',NULL, ['id' => 'username','class' => 'form-control','placeholder' => __('eng.ENTER_USERNAME')])!!}
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('password', __('eng.PASSWORD'))!!}
                                {!! Form::password('password', ['id' => 'password','class' => 'form-control','placeholder' => __('eng.ENTER_PASSWORD')])!!}
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                {!! Form::label('email', __('eng.EMAIL'))!!}
                                {!! Form::email('email',NULL, ['id' => 'email','class' => 'form-control','placeholder' => __('eng.ENTER_EMAIL')])!!}
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('number', __('eng.PHONE'))!!}
                                {!! Form::text('number',NULL, ['id' => 'number','class' => 'form-control','placeholder' =>__('eng.ENTER_PHONE') ])!!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('designation', __('eng.DESIGNATION'))!!}
                                {!! Form::text('designation',NULL, ['id' => 'designation','class' => 'form-control','placeholder' => __('eng.ENTER_DESIGNATION')])!!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('status', __('eng.STATUS'))!!}
                                {!! Form::select('status', $statusList , null,['id' => 'status']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('photo', __('eng.PHOTO'))!!}
                                {!! Form::file('photo',['id' => 'photo','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('address', __('eng.ADDRESS'))!!}
                                {!! Form::text('address',NULL, ['id' => 'address','class' => 'form-control','placeholder' => __('eng.ENTER_ADDRESS')])!!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                {!! Form::label('city', __('eng.CITY'))!!}
                                {!! Form::text('city',NULL, ['id' => 'city','class' => 'form-control','placeholder' => __('eng.ENTER_CITY')])!!}
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                {!! Form::label('country', __('eng.COUNTRY'))!!}
                                {!! Form::text('country',NULL, ['id' => 'country','class' => 'form-control','placeholder' => __('eng.ENTER_COUNTRY')])!!}
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                {!! Form::label('postalcode', __('eng.POSTAL_CODE'))!!}
                                {!! Form::text('postalcode',NULL, ['id' => 'postalcode','class' => 'form-control','placeholder' => __('eng.ENTER_POSTAL_CODE')])!!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                {!! Form::submit(__('eng.CREATE'), ['id' => 'userCreate','class' => 'btn btn-primary'] )!!}
                            </div>
                        </div>
                        <div class="col-md-6 text-left">
                            <a href="{{url('users')}}" class="btn btn-danger">
                                @lang('eng.BACK_USER_TABLE')
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection