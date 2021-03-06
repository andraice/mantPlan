@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Service Order Detail
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('service_order_details.show_fields')
                    <a href="{!! route('serviceOrderDetails.index') !!}" class="btn btn-default">@lang('crud.back')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
