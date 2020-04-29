@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Equipment
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-default">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'equipment.store', 'files' => true]) !!}

                        @include('equipment.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
