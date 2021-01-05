
<?php $sl=1 ?>
@foreach ($academicHistory as $history)
<tr >
    <td class="text-center initial-serial">{{$sl+=1}}</td>
    <td class="text-center"> {!! Form::text('level[]',$history['level'], ['class' => 'field','placeholder' => __('eng.EX_LEVEL')])!!} </td> 
    <td class="text-center"> {!! Form::text('result',$history['result'], ['class' => 'field','placeholder' => __('eng.EX_RESULT')])!!} </td> 
    <td class="text-center"> {!! Form::text('year',$history['year'], ['class' => 'field','placeholder' => __('eng.EX_YEAR')])!!} </td> 
    <td class="text-center"> {!! Form::text('group',$history['subject'], ['class' => 'field','placeholder' => __('eng.EX_GROUP')])!!} </td> 
    <td class="text-center"> 
        <button class="btn btn-danger remove"type="button">×</button>
    </td> 
</tr>
@endforeach

