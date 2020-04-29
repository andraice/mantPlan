@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Service Order File
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'serviceOrderFiles.store']) !!}

                        @include('service_order_files.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
