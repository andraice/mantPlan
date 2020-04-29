@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Equipment Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($equipmentType, ['route' => ['equipmentTypes.update', $equipmentType->id], 'method' => 'patch']) !!}

                        @include('equipment_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection