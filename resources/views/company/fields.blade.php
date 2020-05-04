<div class="col-sm-8">
    <!-- Name Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Account Type Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('account_type', 'Account Type:') !!}
        {!! Form::select('account_type', ['RUC' =>'RUC', 'DNI' =>'DNI'], null, ['class' => 'form-control select2']) !!}
    </div>

    <!-- Account Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('account_number', 'Account Number:') !!}
        {!! Form::text('account_number', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Address Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('address', 'Address:') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('state', 'State:') !!}
        {!! Form::text('state', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Company Type Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('company_type_id', 'Company Type Id:') !!}
        {!! Form::select('company_type_id', $company_type_list, null, ['class' => 'form-control select2']) !!}
    </div>

    <!-- Status Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('status', 'Status:') !!}
        <div class="clearfix"></div>
        <label class="radio-inline">
            {!! Form::radio('status', "A", null) !!} A
        </label>

        <label class="radio-inline">
            {!! Form::radio('status', "I", null) !!} I
        </label>
    </div>
</div>
<div class="col-sm-4">
    <!-- Image Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('image', 'Image:') !!}
        @if (isset($company))
        <img class="img-thumbnail" style="max-width: 100%; max-height: 400px"
            src="{{ asset('storage/'.$company->image) }}" />
        @endif
        {!! Form::file('image') !!}
    </div>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.index') !!}" class="btn btn-default">Cancel</a>
</div>


@push('scripts')
<script type="text/javascript">
    $(function () {
          //Initialize Select2 Elements
          $('.select2').select2({width: '100%'});
    });

</script>
@endpush
