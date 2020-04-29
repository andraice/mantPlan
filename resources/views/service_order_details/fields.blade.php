{!! Form::hidden('service_order_id', $service_order_id) !!}

<div class="form-group col-sm-6">
    {!! Form::label('tiempo', 'Time (hours):') !!}
    {!! Form::text('tiempo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('revision_status', 'Revision Status:') !!}
    {!! Form::select('revision_status', ['Estado Optimo' =>'Estado Optimo', 'Pronta atención' =>'Pronta atención',
    'Cambio urgente'=>'Cambio urgente'], null, ['class' => 'form-control select2']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('work_status', 'Work status:') !!}
    {!! Form::select('work_status', ['Pendiente' =>'Pendiente', 'Realizado' =>'Realizado'], null, ['class' =>
    'form-control select2']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Service Order Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tech_support_comments', 'Tech support comments:') !!}
    {!! Form::textarea('tech_support_comments', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<div class="form-group col-sm-12">

    @if (isset($serviceOrderDetail))
    {!! Form::label('file-select-input', 'Imagenes:') !!}
    <ul class="users-list clearfix">
        @foreach ($serviceOrderDetail->files as $item)
        <li>
            {!! Form::hidden('service_order_file_ids[]', $item->id) !!}
            <button type="button" class="dropFile btn btn-xs btn-danger pull-right"><i class="fa fa-times"></i></button>
            <img src="{{ route('imagecache', ['img_thumbnail', $item->filename]) }}" />
            <span class="users-list-name">{{ $item->name }}</span>
        </li>
        <!-- /.item -->
        @endforeach
    </ul>
    <br />
    @endif
    <input name="file-select-input" id="file-select-input" multiple="multiple" type="file" />
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary saveServiceOrderDetail']) !!}
    <a href="{!! route('serviceOrders.serviceOrderDetails.index', $service_order_id) !!}"
        class="btn btn-default">Cancel</a>
</div>

@push('scripts')
<script type="text/javascript">
    $('#start').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    $('#end').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    $(function () {
          //Initialize Select2 Elements
          $('.select2').select2({width: '100%'})
    });
</script>
@endpush
