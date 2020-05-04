{!! Form::open(['route' => ['serviceOrders.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('serviceOrders.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i> Revisar
    </a>
    @if ($status == 'required')
    <a href="{{ route('serviceOrders.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
    @endif
</div>
{!! Form::close() !!}
