@extends('layouts.default')
@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">@lang('eng.PRODUCTS')</a>
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
                            <h4 class="card-title">@lang('eng.PRODUCTS')</h4>
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

                    {!! Form::open(['url' => 'academic','enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::select('user', $userList, null, ['class' => 'form-control','onchange'=>'selectUser(this.value)', 'id'=>'user'])!!}
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-bordered"> 
                                <thead> 
                                    <tr> 
                                        <th class="text-center">@lang('eng.SERIAL')</th> 
                                        <th class="text-center">@lang('eng.LEVEL')</th> 
                                        <th class="text-center">@lang('eng.RESULT')</th> 
                                        <th class="text-center">@lang('eng.YEAR')</th> 
                                        <th class="text-center">@lang('eng.GROUP_SUBJUCT')</th> 
                                        <th class="text-center">@lang('eng.ACTIONS')</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <tr id="1">
                                        <td class="text-center initial-serial">1</td>
                                        <td class="text-center">{!! Form::text('level[]',NULL, ['class' => 'field','placeholder' => __('eng.EX_LEVEL')])!!}</td>
                                        <td class="text-center">{!! Form::text('result',NULL, ['class' => 'field','placeholder' => __('eng.EX_RESULT')])!!}</td>
                                        <td class="text-center">{!! Form::text('year',NULL, ['class' => 'field','placeholder' => __('eng.EX_YEAR')])!!}</td>
                                        <td class="text-center">{!! Form::text('group',NULL, ['class' => 'field','placeholder' => __('eng.EX_GROUP')])!!}</td>
                                        <td class="text-center"><button type="button" class="btn btn-success add-btn">+</button></td>
                                    </tr>
                                </tbody> 

                                <tbody id="tbody">
                                    
                                </tbody>
                            </table> 
                        </div>

                        <div class="col-md-6">
                            <div class="text-right">
                                {!! Form::submit(__('eng.SAVE'), ['class' => 'btn btn-primary'] )!!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <script type='text/javascript'>
                    $(document).ready(function () {
                        //row add
                        var rowId = 1;
                        $('.add-btn').on('click', function () {
                            $('#tbody').append(`<tr id=""> 
                                <td class="row-index text-center new-serial"></td> 
                                <td class="text-center"> {!! Form::text('level[]',NULL, ['class' => 'field','placeholder' => __('eng.EX_LEVEL')])!!} </td> 
                                <td class="text-center"> {!! Form::text('result',NULL, ['class' => 'field','placeholder' => __('eng.EX_RESULT')])!!} </td> 
                                <td class="text-center"> {!! Form::text('year',NULL, ['class' => 'field','placeholder' => __('eng.EX_YEAR')])!!} </td> 
                                <td class="text-center"> {!! Form::text('group',NULL, ['class' => 'field','placeholder' => __('eng.EX_GROUP')])!!} </td> 
                                <td class="text-center"> 
                                    <button class="btn btn-danger remove"type="button">×</button>
                                </td> 
                            </tr>`);
                            slCounter();

                        });

                        //row remove
                        $(document).on('click', '.remove', function () {
                            $(this).parent().parent().remove();
                            slCounter();
                        });
                    });


                    function selectUser(val) {
                        if (val == 0) {
                            document.getElementById("products").innerHTML = "";
                        } else {
                            var userId = $('#user').val();
                            $.ajax({
                                url: '{{url("/academic/history")}}',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    userId: userId,
                                },
                                success: function (resp) {
                                    $('#tbody').html(resp.history);
                                   
                                }
                            });
                        }
                    }

                    function slCounter() {
                        var sl = 0;
                        $('.initial-serial').each(function () {
                            sl++;
                            $(this).text(sl);
                        });
                        $('.new-serial').each(function () {
                            sl++;
                            $(this).text(sl);
                        });
                    }

                </script>
            </div>
        </div>
    </div>
</div>
@endsection