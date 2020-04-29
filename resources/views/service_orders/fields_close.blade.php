<div class="form-group col-sm-12">
    {!! Form::label('tech_support_comments', 'tech_support_comments:') !!}
    {!! Form::textarea('tech_support_comments', null, ['class' => 'form-control', 'rows' => 5]) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('technical_operator_id', 'Technical Operator:') !!}
    {!! Form::select('technical_operator_id', $technical_operator_list, null, ['class' => 'form-control select2',
    'required'=> 'required']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('tech_operator_comments', 'tech_operator_comments:') !!}
    {!! Form::textarea('tech_operator_comments', null, ['class' => 'form-control', 'rows' => 5]) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('tech_operator_signature', 'tech_operator_signature:') !!}
    <div id="tech_operator_signature_canvas"></div>

    {!! Form::textarea('tech_operator_signature', null, ['class' => 'form-control', 'style' => 'display:none']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::hidden('status', "closed") !!}
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
