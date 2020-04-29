@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Service Order
        @switch($serviceOrder->status)
        @case('required')
        {!! Form::model($serviceOrder, ['route' => ['serviceOrders.statusUpdate', $serviceOrder->id], 'method' =>
        'post', 'class' => 'pull-right']) !!}
        {!! Form::hidden('status', "open") !!}
        <button type="button" class="btn btn-sm btn-primary pull-right openServiceOrder">
            <span class="fa fa-play"></span>
            OPEN
        </button>
        {!! Form::close() !!}
        @break

        @case('open')
        <button type="button" class="btn btn-sm btn-success pull-right closeServiceOrder">
            <span class="fa fa-check"></span>
            CLOSE
        </button>
        @break

        @case('closed')
        <span class="badge bg-default pull-right">{!! $serviceOrder->status !!}</span>
        @break
        @default
        @endswitch
    </h1>
</section>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row" style="padding-left: 20px">
                        @include('service_orders.show_fields')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">List of work done</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-bordered" id="dataTableBuilder" width="100%">
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    @if ($serviceOrder->status == 'open')
                    <button type="button" class="btn btn-info pull-right addServiceOrderDetail">ADD</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Comments</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <h5>tech support comments - {{ $serviceOrder->technicalSupport->name }}</h5>
                        <pre>{!! $serviceOrder->tech_support_comments !!}</pre>
                    </div>
                    <div class="col-md-6">
                        <h5>tech operator comments - @isset($serviceOrder->technicalOperator)
                            {{ $serviceOrder->technicalOperator->name }}
                        @endisset </h5>
                        <pre>{!! $serviceOrder->tech_operator_comments !!}</pre>
                    </div>
                    <div class="col-md-12">
                        <h5>Firma de operador</h5> <img src="{!! $serviceOrder->tech_operator_signature !!}" />
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <a href="{!! route('serviceOrders.index') !!}" class="btn btn-default">Back</a>
        </div>
    </div>
</div>
@endsection
@section('css')
@include('layouts.datatables_css')
@endsection
@push('scripts')
@include('layouts.datatables_js')
<script src="https://datatables.yajrabox.com/js/handlebars.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="{{ asset('vendor/jsignature/flashcanvas.js') }}"></script>
<![endif]-->
<script src="{{ asset('vendor/jsignature/jSignature.min.js') }}"></script>
<script id="details-template" type="text/x-handlebars-template">
    <table class="table">
        <tr>
            <td>Description:</td>
            <td>{!!  "{" . "{description}" . "}" !!}</td>
        </tr>
        <tr>
            <td>Tech_support_comments:</td>
            <td>{!! "{" . "{tech_support_comments}" . "}" !!}</td>
        </tr>
    </table>
</script>
<script type="text/javascript">
    let datatable;
    $(function() {
        let template = Handlebars.compile($("#details-template").html());
        datatable = $('#dataTableBuilder').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url     :   '{{ route('data.serviceOrderDetail', $serviceOrder->id) }}',
            },
            columns:
                [
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "searchable":     false,
                        "data":           null,
                        "defaultContent": '<span class="fa fa-plus"></span>'
                    },
                    {"name":"id","data":"id","title":"id","orderable":true,"searchable":true},
                    {"name":"user_id","data":"user.name","title":"Technical Support","orderable":true,"searchable":true},
                    {"name":"tiempo","data":"tiempo","title":"Duration (hours)","orderable":true,"searchable":true},
                    {"name":"work_status","data":"work_status","title":"Work Status","orderable":true,"searchable":true},
                    {"name":"revision_status","data":"revision_status","title":"Revision Status","orderable":true,"searchable":true},
                    {"name":"created_at","data":"created_at","title":"created_at","orderable":true,"searchable":true},
                    @if($serviceOrder->status == 'open')
                    {"name":"action","data":"action","title":"action","orderable":true,"searchable":true},
                    @endif
                ]
        });
        $('#dataTableBuilder tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = datatable.row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( template(row.data()) ).show();
                tr.addClass('shown');
            }
        });

        $('.openServiceOrder').click(function(){
            // AJAX request
            $.ajax({
                url: '{{ route('serviceOrders.formOpen', $serviceOrder->id) }}',
                success: function(response){
                    // Add response in Modal body
                    $('.modal-body').html(response);
                    // Display Modal
                    $('#empModal').modal('show');
                }
            });
        });

        $('.closeServiceOrder').click(function(){
            // AJAX request
            $.ajax({
                url: '{{ route('serviceOrders.formClose', $serviceOrder->id) }}',
                success: function(response){
                    // Add response in Modal body
                    $('.modal-body').html(response);

                    $('.select2').select2({width: '100%'});

                    // Display Modal
                    $('#empModal').modal('show');

                    setTimeout(function(){
                        var $canvas = $("#tech_operator_signature_canvas");
                        $canvas.jSignature();

                        let $data_signature = document.getElementById('tech_operator_signature').innerHTML;

                        if($data_signature !== "")
                            $canvas.jSignature("setData", $data_signature);

                        $canvas.bind('change', function(e){
                            var datapair = $canvas.jSignature("getData", "image");
                            document.getElementById('tech_operator_signature').innerHTML = "data:" + datapair[0] + "," + datapair[1];
                        });
                        var $resetButton = $('<input type="button" value="Borrar firma" class="btn btn-xs btn-danger" style="position:absolute;margin:0 !important;top:auto" />').appendTo("#tech_operator_signature_canvas div:eq(1)");
                        var buttonWidth = $resetButton.width();
							$resetButton.css(
								'left'
								, Math.round(( $canvas.width() - buttonWidth - 10 ))
							).bind('click', function(){
                                $canvas.jSignature('reset');
                            });
                    }, 400);

                }
            });
        });

        $('.addServiceOrderDetail').click(function(){
            // AJAX request
            $.ajax({
                url: '{{ route('serviceOrders.serviceOrderDetails.create', $serviceOrder->id) }}',
                success: function(response){
                    // Add response in Modal body
                    $('.modal-body').html(response);

                    // Display Modal
                    $('#empModal').modal('show');
                }
            });
        });

        $(document).on('click', '.editServiceOrderDetail', function(e){
            e.preventDefault();

            let $url = $(this).data('src');
            // AJAX request
            $.ajax({
                url: $url,
                success: function(response){
                    // Add response in Modal body
                    $('.modal-body').html(response);

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

                    // Display Modal
                    $('#empModal').modal('show');
                }
            });
        });

        $(document).on('click', '.dropFile', function(e){
            e.preventDefault();
            if(confirm('Esta seguro que desea quitar la imagen?')){
                $(this).parent().remove();
            }
        });

        $(document).on('click', '.saveServiceOrderDetail', function(e){
            e.preventDefault();

            //let serialize_form = $("#empModal form").serialize();
            let $form = $("#empModal form");
            let serialize_form = $form.serializeArray();

            var fileSelect = document.getElementById('file-select-input');
            var files = fileSelect.files;
            var formData = new FormData();
            for(var i = 0; i < files.length; i++){
                var file = files[i];

                // Check the file type
                if (!/image.*/.test(file.type)) {
                    return;
                }

                // Add the file to the form's data
                formData.append('myfiles[]', file, file.name);
            }
            $.each(serialize_form, function(i,e){
                formData.append(e.name, e.value)
            });

            $.ajax({
                url: $form.attr('action'),
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'text',
                beforeSend: function() {
                    $('.saveServiceOrderDetail').attr({'disabled':true});
                    $('#empModal').modal('hide');
                },
                complete: function() {
                    $('.saveServiceOrderDetail').attr({'disabled':false});
                },
                success: function(response) {
                    datatable.ajax.reload();
                    toastr.success(response);
                },
                error: function(response) {
                    toastr.error(response);
                }
            });
        });

        $(document).on('click', '.deleteServiceOrderDetail', function(e){
            e.preventDefault();
            let form = $(e.target).parent().parent();
            let serialize_form = form.serialize();

            $.ajax({
                url: form.attr('action'),
                type: 'delete',
                data: serialize_form,
                dataType: 'text',
                beforeSend: function() {
                    $(this).attr({'disabled':true});
                },
                complete: function() {
                    $(this).attr({'disabled':false});
                },
                success: function(response) {
                    datatable.ajax.reload();
                    toastr.success(response);
                },
                error: function(response) {
                    toastr.error(response);
                }
            });
        });

    });

</script>
@endpush
