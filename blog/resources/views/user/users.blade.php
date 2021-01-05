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
                            <a href="{{url('/users/create')}}" class="btn btn-primary">
                                @lang('eng.CREATE_NEW_USER')
                                <i class="now-ui-icons users_single-02"></i>
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

                    {!! Form::open(['url' => 'users/filter','enctype' => 'multipart/form-data']) !!}
                    @csrf
                    
                     
                    <div class="user-filter">
                        <div class="row">
                            <div class="col-md-4 filter-options">
                                <div class="form-group">
                                    {!! Form::select('course', $courseList, Request::get('course'), ['class' => 'form-control','placeholder' =>  __('eng.PICK_COURSE')])!!}
                                    <span class="text-danger">{{ $errors->first('course') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 filter-options">
                                <div class="form-group">
                                    {!! Form::select('userGroup', $userGroupList, Request::get('userGroup'), ['class' => 'form-control','placeholder' =>  __('eng.PICK_USER_GROUP')])!!}
                                    <span class="text-danger">{{ $errors->first('userGroup') }}</span>
                                </div>
                            </div>

                            <div class="col-md-4 filter-options">
                                <div class="form-group">
                                    {!! Form::text('name',Request::get('name'), ['class' => 'form-control','placeholder' => __('eng.FILTER_BY_NAME')])!!}
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 filter-options">
                                <div class="form-group">
                                    {!! Form::text('phone',Request::get('phone'), ['class' => 'form-control','placeholder' => __('eng.FILTER_BY_PHONE')])!!}
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 filter-options">
                                <div class="text-left">
                                    {!! Form::submit(__('eng.FILTER'), ['class' => 'btn btn-primary'] )!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}



                    <div class="modal fade"  id="empModal" role="dialog">
                        <div class="modal-dialog" style="margin-left: 150px;" >
                            <div id="modalShow">


                            </div>
                        </div>
                    </div>


                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>@lang('eng.SERIAL')</th>
                                    <th>@lang('eng.USER_GROUP')</th>
                                    <th>@lang('eng.NAME')</th>
                                    <th>@lang('eng.EMAIL')</th>
                                    <th>@lang('eng.PHONE')</th>
                                    <th>@lang('eng.COURSE')</th>
                                    <th>@lang('eng.DESIGNATION')</th>
                                    <th>@lang('eng.PHOTO')</th>
                                    <th>@lang('eng.ADDRESS')</th>
                                    <th>@lang('eng.CITY')</th>
                                    <th>@lang('eng.COUNTRY')</th>
                                    <th>@lang('eng.POSTAL_CODE')</th>
                                    <th>@lang('eng.STATUS')</th>
                                    <th>@lang('eng.ACTIONS')</th>
                                </tr></thead>
                            <tbody>
                                <?php $sl = 1; ?>
                                @foreach ($users as $user) 
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td> {{$user->user_group_name}}</td>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}} </td>
                                    <td>{{$user->number}}</td>
                                    <td>{{$user->course->name??0}}</td>
                                    <td>{{$user->designation}}</td>
                                    <td><img src="{{ URL::to(asset('public/uploads/users/'.$user->photo)) }}"></td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->city}}</td>
                                    <td>{{$user->country}}</td>
                                    <td>{{$user->postalcode}}</td>
                                    <td>
                                        @if($user->status == '1')
                                        @lang('eng.ACTIVE')
                                        @elseif($user->status == '2')
                                        @lang('eng.INACTIVE')
                                        @endif
                                    </td>
                                    <td><button type="button" data-id="{{$user->id}}" class="btn btn-success userinfo" data-toggle="modal" href="#empModal" id="edit-item" data-item-id="1">@lang('eng.DETAILS')</button></td>
                                    <td><a href ="{{URL::to('users/'.$user->id.'/edit')}}" class="btn btn-primary">@lang('eng.EDIT')</a></td>
                                    <td>
                                        {!! Form::open(['url' => 'users/'.$user->id]) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        <button class="btn btn-danger remove"  type="submit">@lang('eng.DELETE')</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">{{ $users->appends($data)->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function () {
        $('.userinfo').click(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var userid = $(this).data('id');
            $.ajax({
                url: "{{URL::to('users/details')}}",
                type: 'post',
                data: {userid: userid},
                success: function (response) {
                    $('#modalShow').html(response.msg);
//                    $('#empModal').modal('show');
                }
            });
        });
    });
</script>
@endsection