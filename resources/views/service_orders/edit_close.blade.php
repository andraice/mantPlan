@extends('layouts.app_ajax')

@section('content')
    <section class="content-header">
        <h1>
            Close Service Order
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($serviceOrder, ['route' => ['serviceOrders.statusUpdate', $serviceOrder->id], 'method' => 'post']) !!}

                        @include('service_orders.fields_close')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
