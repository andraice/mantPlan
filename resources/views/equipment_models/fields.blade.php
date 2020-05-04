<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', "A", ['required' => 'required']) !!} A
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "I", ['required' => 'required']) !!} I
    </label>

</div>

<!-- Equipment Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipment_brand_id', 'Equipment Brand:') !!}
    {!! Form::select('equipment_brand_id', $equipment_brand_list, null, ['class' => 'form-control', 'required' =>
    'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('equipmentModels.index') !!}" class="btn btn-default">Cancel</a>
</div>
