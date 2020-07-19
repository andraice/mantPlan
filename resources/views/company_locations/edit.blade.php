@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/companyLocations.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companyLocation, ['route' => ['companyLocations.update', $companyLocation->id], 'method' => 'patch']) !!}

                        @include('company_locations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
