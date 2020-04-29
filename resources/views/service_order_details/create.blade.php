@extends('layouts.app_ajax')

@section('content')
<section class="content-header">
    <h1>
        Service Order Detail
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => ['serviceOrders.serviceOrderDetails.store', $service_order_id]]) !!}

                @include('service_order_details.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
