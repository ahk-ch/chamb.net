<div class="row">
    <div class="col-lg-12">
        <div class='form-group @if($errors->first('name')) has-error @endif'>
            <i class="fa fa-th-large"></i>
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Enter name']) !!}
            {!! $errors->first('name', '<div class="help-block col-sm-reset inline">:message</div>') !!}
        </div>
    </div>
</div>

