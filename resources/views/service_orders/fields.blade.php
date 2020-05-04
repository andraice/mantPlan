<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>
<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::select('company_id', $company_list, null, ['class' => 'form-control select2',
    'required'=> 'required']) !!}
</div>
<!-- Requestor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requestor_id', 'Requestor Id:') !!}
    {!! Form::select('requestor_id', $requestor_list, null, ['class' => 'form-control select2',
    'required'=> 'required']) !!}
</div>
<!-- Equipment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipment_id', 'Equipment Id:') !!}
    {!! Form::select('equipment_id', $equipment_list, null, ['class' => 'form-control select2',
    'required'=> 'required']) !!}
</div>
<!-- Technical Support Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('technical_support_id', 'Technical Support Id:') !!}
    {!! Form::select('technical_support_id', $technical_support_list, null, ['class' => 'form-control select2',
    'required'=> 'required']) !!}
</div>

<!-- Type Service Field -->
<div class="form-group col-sm-12">
    {!! Form::label('type_service_id', 'Type Service:') !!}
    {!! Form::select('type_service_id', $type_service_list, null, ['class' => 'form-control select2',
    'required'=> 'required']) !!}
</div>

<!-- Priority Field -->
<div class="form-group col-sm-12">
    {!! Form::label('priority', 'Priority:') !!}
    <label class="radio-inline">
        {!! Form::radio('priority', "high", null) !!} high
    </label>

    <label class="radio-inline">
        {!! Form::radio('priority', "medium", null) !!} medium
    </label>

    <label class="radio-inline">
        {!! Form::radio('priority', "low", null) !!} low
    </label>
</div>


<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start', 'Start:') !!}
    {!! Form::text('start', null, ['class' => 'form-control','id'=>'start']) !!}
</div>


<!-- deadline Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deadline', 'Deadline:') !!}
    {!! Form::text('deadline', null, ['class' => 'form-control','id'=>'deadline']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', "required", null) !!} required
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "open", null) !!} open
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "closed", null) !!} closed
    </label>

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('serviceOrders.index') !!}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
<script type="text/javascript">
    $('#start, #deadline').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        });
    $(function () {
          //Initialize Select2 Elements
          $('.select2').select2({width: '100%'})
    });
</script>
@endpush
