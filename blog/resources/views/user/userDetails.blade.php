


<div class="modal-content" style="width: 1100px">
    <div class="modal-header">
        <div class="text-right">
            <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
        </div>
    </div>
    <div class="modal-body">
        <table class="table table-bordered table-striped" border='0' width='100%'>
            <thead>
                <tr>
                    <th>@lang('eng.NAME')</th>
                    <th>@lang('eng.EMAIL')</th>
                    <th>@lang('eng.PHONE')</th>
                    <th>@lang('eng.STATUS')</th>
                    <th>@lang('eng.DESIGNATION')</th>
                    <th>@lang('eng.PHOTO')</th>
                    <th>@lang('eng.ADDRESS')</th>
                    <th>@lang('eng.CITY')</th>
                    <th>@lang('eng.COUNTRY')</th>
                    <th>@lang('eng.POSTAL_CODE')</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td> {{$users['name']}} </td>
                    <td> {{$users['email']}} </td>
                    <td>{{$users['number']}}</td>
                    <td>
                        @if($users['status'] == '1')
                        @lang('eng.ACTIVE')
                        @elseif($users['status'] == '2')
                        @lang('eng.INACTIVE')
                        @endif
                    </td>
                    <td>{{$users['designation']}}</td>
                    <td><img src="{{ URL::to(asset('public/uploads/users/'.$users['photo'])) }}"></td>
                    <td>{{$users['address']}}</td>
                    <td>{{$users['city']}}</td>
                    <td>{{$users['country']}}</td>
                    <td>{{$users['postalcode']}}</td>
                </tr>
            </tbody>
        </table> 

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

</div>