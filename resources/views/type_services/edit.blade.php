@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Type Service
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typeService, ['route' => ['typeServices.update', $typeService->id], 'method' => 'patch']) !!}

                        @include('type_services.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection