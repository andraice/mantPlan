{!! Form::open(['route' => ['serviceOrderDetails.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <button type="button" data-src="{{ route('serviceOrderDetails.edit', $id) }}" class='btn btn-default btn-xs editServiceOrderDetail'>
        <i class="glyphicon glyphicon-edit">Editar</i>
    </button>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
    'type' => 'submit',
    'class' => 'btn btn-danger btn-xs deleteServiceOrderDetail',
    'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
</div>
{!! Form::close() !!}
