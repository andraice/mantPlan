<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/company_location.fields.id').':') !!}
    <p>{{ $companyLocation->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/company_location.fields.name').':') !!}
    <p>{{ $companyLocation->name }}</p>
</div>

<!-- Location Address Field -->
<div class="form-group">
    {!! Form::label('location_address', __('models/company_location.fields.location_address').':') !!}
    <p>{{ $companyLocation->location_address }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/company_location.fields.status').':') !!}
    <p>{{ $companyLocation->status }}</p>
</div>

<!-- Manager Id Field -->
<div class="form-group">
    {!! Form::label('manager_id', __('models/company_location.fields.manager_id').':') !!}
    <p>{{ $companyLocation->manager_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/company_location.fields.created_at').':') !!}
    <p>{{ $companyLocation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/company_location.fields.updated_at').':') !!}
    <p>{{ $companyLocation->updated_at }}</p>
</div>

