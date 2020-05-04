@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Task Group
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('task_groups.show_fields')
                    <a href="{{ route('taskGroups.index') }}" class="btn btn-default">@lang('crud.back')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
