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
                {!! Form::model($serviceOrderDetail, ['route' => ['serviceOrderDetails.update', $serviceOrderDetail->id], 'method' => 'patch']) !!}

                @include('service_order_details.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
