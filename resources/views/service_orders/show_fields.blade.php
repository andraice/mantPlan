<div class="col-sm-8">
    <!-- Id Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('id', 'Id:') !!}
        <span class="label label-info">{!! $serviceOrder->id !!}</span>
    </div>
    <!-- Type Service Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('type_service', 'Type Service:') !!}
        <span class="label label-danger">{!! $serviceOrder->typeService->name !!}</span>
    </div>
    <!-- Priority Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('priority', 'Priority:') !!}
        @switch($serviceOrder->priority)
        @case('high')
        <span class="badge bg-red">{!! $serviceOrder->priority !!}</span>
        @break

        @case('medium')
        <span class="badge bg-yellow">{!! $serviceOrder->priority !!}</span>
        @break

        @case('low')
        <span class="badge bg-default">{!! $serviceOrder->priority !!}</span>
        @break

        @default

        @endswitch
    </div>
    <!-- Status Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('status', 'Status:') !!}
        @switch($serviceOrder->status)
        @case('required')
        <span class="badge bg-red">{!! $serviceOrder->status !!}</span>
        @break

        @case('open')
        <span class="badge bg-green">{!! $serviceOrder->status !!}</span>
        @break

        @case('closed')
        <span class="badge bg-default">{!! $serviceOrder->status !!}</span>
        @break

        @default
        @endswitch
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('description', 'Description of SO:') !!}
        <p>{!! $serviceOrder->description !!}</p>
    </div>

    <!-- Equipment Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('equipment_id', 'Equipment:') !!}
        <p>{!! $serviceOrder->equipment->name_sn !!}</p>
    </div>

    <!-- Technical Support Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('technical_support_id', 'Technical Support:') !!}
        <p>{!! $serviceOrder->technicalSupport->name !!}</p>
    </div>

    <!-- Company Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('company_id', 'Company:') !!}
        <p>{!! $serviceOrder->company->name !!}</p>
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('requestor', 'Requestor:') !!}
        <p>{!! $serviceOrder->requestor->name !!}</p>
    </div>

    <div class="form-group col-sm-8">
        {!! Form::label('deadline', 'Start - Deadline:') !!}
        <p>{!! $serviceOrder->start !!} - {!! $serviceOrder->deadline !!}</p>
    </div>

    <!-- User Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('user_id', 'User:') !!}
        <p>{!! $serviceOrder->user->name !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('created_at', 'Created At:') !!}
        <p>{!! $serviceOrder->created_at !!}</p>
    </div>

    <!-- Updated At Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('updated_at', 'Updated At:') !!}
        <p>{!! $serviceOrder->updated_at !!}</p>
    </div>
</div>
<div class="col-sm-4">
    @if (isset($serviceOrder->company))
    {!! Form::label('CompanyImage', 'Company Image:') !!}
    <div class="clearfix"></div>
    <img class="img-thumbnail" style="max-width: 100%; max-height: 200px"
        src="{{ asset('storage/'.$serviceOrder->company->image) }}" />
    @endif
    @if (isset($serviceOrder->equipment))
    {!! Form::label('EquipmentImage', 'Equipment Image:') !!}
    <div class="clearfix"></div>
    <img class="img-thumbnail " style="max-width: 100%; max-height: 200px"
        src="{{ asset('storage/'.$serviceOrder->equipment->image) }}" />
    @endif
</div>
