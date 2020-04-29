<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $serviceOrderFile->id !!}</p>
</div>

<!-- Filename Field -->
<div class="form-group">
    {!! Form::label('filename', 'Filename:') !!}
    <p>{!! $serviceOrderFile->filename !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $serviceOrderFile->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $serviceOrderFile->updated_at !!}</p>
</div>

