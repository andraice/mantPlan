<!-- Filename Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filename', 'Filename:') !!}
    {!! Form::text('filename', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('serviceOrderFiles.index') !!}" class="btn btn-default">Cancel</a>
</div>
