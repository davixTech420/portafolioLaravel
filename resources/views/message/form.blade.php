<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name_sender') }}
            {{ Form::text('name_sender', $message->name_sender, ['class' => 'form-control' . ($errors->has('name_sender') ? ' is-invalid' : ''), 'placeholder' => 'Name Sender']) }}
            {!! $errors->first('name_sender', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mail_sender') }}
            {{ Form::text('mail_sender', $message->mail_sender, ['class' => 'form-control' . ($errors->has('mail_sender') ? ' is-invalid' : ''), 'placeholder' => 'Mail Sender']) }}
            {!! $errors->first('mail_sender', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('body_sender') }}
            {{ Form::text('body_sender', $message->body_sender, ['class' => 'form-control' . ($errors->has('body_sender') ? ' is-invalid' : ''), 'placeholder' => 'Body Sender']) }}
            {!! $errors->first('body_sender', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', $message->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>