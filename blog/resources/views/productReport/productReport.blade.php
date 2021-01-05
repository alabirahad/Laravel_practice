@extends('layouts.default')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title">@lang('eng.PRODUCT_REPORT')</h4>
                        </div>
                        <div class="col-md-1 text-right" >
                            <a class="btn btn-primary" href="{{ URL::to('/productreport?file=pdf') }}">@lang('eng.PDF')</a>
                        </div>
                        <div class="col-md-1 text-right" >
                            <a href="{{ URL::to('/productreport?file=xls') }}" class="btn btn-primary">@lang('eng.XLS')</a>
                        </div>
                        <div class="col-md-1 text-right" >
                            <a href="{{ URL::to('/productreport?file=print') }}" target="_blank" class="btn btn-primary">@lang('eng.PRINT')</a>
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
                        <table class="table products-table">

                            <thead class=" text-primary">
                                <tr>
                                    <th>@lang('eng.SERIAL')</th>
                                    <th>@lang('eng.NAME')</th>
                                    <th>@lang('eng.PRODUCTS')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sl = 1; ?>
                                @foreach ($userList as $user) 
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td> {{$user->name}} </td>
                                    <td> 
                                        <table class="products-list">
                                            <?php
                                            foreach ($prosuctList as $product) {
                                                if ($user->id == $product->user_id) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            echo $product->product_name;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection