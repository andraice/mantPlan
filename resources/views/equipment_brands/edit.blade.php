@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Equipment Brand
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($equipmentBrand, ['route' => ['equipmentBrands.update', $equipmentBrand->id], 'method' => 'patch']) !!}

                        @include('equipment_brands.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection