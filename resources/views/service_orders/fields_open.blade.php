<div class="form-group col-sm-12">
    {!! Form::label('task_group', 'Task Group:') !!}
    {!! Form::select('task_group', $task_group_list, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('status', "open") !!}
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
