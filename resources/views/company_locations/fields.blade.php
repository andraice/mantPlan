<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/companyLocations.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location_address', __('models/companyLocations.fields.location_address').':') !!}
    {!! Form::text('location_address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('company_id', __('models/companyLocations.fields.company_id').':') !!}
    {!! Form::select('company_id', $company_list, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('manager_id', __('models/companyLocations.fields.manager_id').':') !!}
    {!! Form::select('manager_id', $manager_list, null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', __('models/companyLocations.fields.status').':') !!}
    <div class="clearfix"></div>
    <label class="radio-inline">
        {!! Form::radio('status', "A", null) !!} Activo
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "I", null) !!} Inactivo
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companyLocations.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
