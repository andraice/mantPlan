<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required'=> 'required']) !!}
</div>

<!-- Type Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_service_id', 'Type Service:') !!}
    {!! Form::select('type_service_id', $type_service_list, null, ['class' => 'form-control select2',
    'required'=> 'required']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('task_table', 'List of tasks:') !!}
    <table id="task_table" class="table table-hover">
        <thead>
            <tr>
                <th style="width: 20px"></th>
                <th>DESCRIPTION</th>
                <th style="width: 40px">(action)</th>
            </tr>
        </thead>
        <tbody>
            @isset($taskGroup)
            @foreach ($taskGroup->tasks as $k => $task)
            <tr>
                <td>{!! Form::hidden('tasks[' . $k .'][orden]', 0, ['class' => 'form-control orden']) !!}
                    <i class="fa fa-bars"></i></td>
                <td>{!! Form::text('tasks[' . $k .'][description]', $task->description, ['class' => 'form-control']) !!}
                </td>
                <td>{!! Form::hidden('tasks[' . $k .'][id]', $task->id) !!}
                    <button class="btn btn-default remove_task" type="button">Remove</button></td>
            </tr>
            @endforeach
            @endisset
        </tbody>
    </table>
    <button id="add_task" type="button" class="btn btn-primary">Add task</button>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('taskGroups.index') }}" class="btn btn-default">Cancel</a>
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
<script>
    $(function() {
        $('.select2').select2();

        let $task_table = $('#task_table');
        let $template = '<tr>'+
'                <td>{!! Form::hidden('tasks[__row__][orden]', 0, ['class' => 'form-control orden']) !!}'+
'                    <i class="fa fa-bars"></i></td>'+
'                <td>{!! Form::text('tasks[__row__][description]', null, ['class' => 'form-control', 'required'=>'required']) !!}</td>'+
'                <td>{!! Form::hidden('tasks[__row__][id]', null) !!}'+
'                    <button class="btn btn-default remove_task" type="button">Remove</button></td>'+
'            </tr>';
        let $add_task = $('#add_task');
        let $remove_task = '.remove_task';

        $task_table.find('tbody').sortable({
            stop: function( event, ui ) {
                update_order_row();
            }
        });

        $add_task.on('click', function () {
            let html = $template.replace(/__row__/gim, $task_table.find('tbody > tr').length);
            $task_table.find('tbody').append(html);
        });

        $task_table.on('click', $remove_task, function () {
            $(this).parent().parent().remove();
            update_order_row();
        });
        let update_order_row = function(){
            $task_table.find('tbody > tr').each(function(i){
                $(this).find('input').each(function (ix, ex) {
                    ex.setAttribute('name', ex.getAttribute('name').replace(/\[\d+\]/gim, '['+i+']'));
                });
                $(this).find('.orden').val(i);
            });
        }
        @if(!isset($taskGroup))
        $add_task.trigger('click');
        @endif

    });
</script>
@endpush
