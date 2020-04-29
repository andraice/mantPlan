@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Equipment Model
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($equipmentModel, ['route' => ['equipmentModels.update', $equipmentModel->id], 'method' => 'patch']) !!}

                        @include('equipment_models.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection