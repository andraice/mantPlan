<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $serviceOrderDetail->id !!}</p>
</div>

<!-- Start Field -->
<div class="form-group">
    {!! Form::label('start', 'Start:') !!}
    <p>{!! $serviceOrderDetail->start !!}</p>
</div>

<!-- End Field -->
<div class="form-group">
    {!! Form::label('end', 'End:') !!}
    <p>{!! $serviceOrderDetail->end !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $serviceOrderDetail->description !!}</p>
</div>

<!-- Service Order Id Field -->
<div class="form-group">
    {!! Form::label('service_order_id', 'Service Order Id:') !!}
    <p>{!! $serviceOrderDetail->service_order_id !!}</p>
</div>

