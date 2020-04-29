@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Service Order
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($serviceOrder, ['route' => ['serviceOrders.update', $serviceOrder->id], 'method' => 'patch']) !!}

                        @include('service_orders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
