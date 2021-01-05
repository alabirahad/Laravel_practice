<table class="table table-bordered table-striped" border='0' width='100%'>
    <thead>
        <tr>
            <th></th>
            <th>@lang('eng.NAME')</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $key => $product)
        <tr>
            <td>{{Form::checkbox('check[]', $product['id'],array_key_exists($product->id,$data) ? true : false)}}</td>
            <td> {{$product['name']}} </td>
        </tr>
        @endforeach
    </tbody>


</table> 