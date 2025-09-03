<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name'  , 'oninput' => "this.value = this.value.replace(/[^a-z]/g,'');"  ]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::email('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            @if (empty($user->profile_photo_path))
        {{ Form::file('profile_photo_path', ['class' => 'form-control' . ($errors->has('profile_photo_path') ? ' is-invalid' : ''),
        'required']) }}
        @else
        <script type="text/javascript">
            let isTableVisible = false;
            function mostrarT() 
            {                   const tabReg = document.getElementById("actua");
        const imagen = document.getElementById("img");
        tabReg.style.display = isTableVisible ? "none" : "block";
        imagen.style.display = isTableVisible ? "block" : "none";
        isTableVisible = !isTableVisible;
        }
            </script>
              <div class="container">
                <img src="{{ asset($user->profile_photo_path) }}" width="150px" id="img">
                <button id="cam" onclick="mostrarT(); event.preventDefault();">Cambiar</button>
              </div>
              <div class="form-group">
             {{ Form::file('imagNew', ['class' => 'form-control ' . ($errors->has('imagNew') ? ' is-invalid' : ''),
            'style' => 'display:none;',
            'id' => 'actua']) }} 
            </div>
        @endif
            </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $user->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('facebook_url') }}
            {{ Form::text('facebook_url', $user->facebook_url, ['class' => 'form-control' . ($errors->has('facebook_url') ? ' is-invalid' : ''), 'placeholder' => 'Facebook Url']) }}
            {!! $errors->first('facebook_url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('twitter_url') }}
            {{ Form::text('twitter_url', $user->twitter_url, ['class' => 'form-control' . ($errors->has('twitter_url') ? ' is-invalid' : ''), 'placeholder' => 'Twitter Url']) }}
            {!! $errors->first('twitter_url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dribbble_url') }}
            {{ Form::text('dribbble_url', $user->dribbble_url, ['class' => 'form-control' . ($errors->has('dribbble_url') ? ' is-invalid' : ''), 'placeholder' => 'Dribbble Url']) }}
            {!! $errors->first('dribbble_url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('linkedin_url') }}
            {{ Form::text('linkedin_url', $user->linkedin_url, ['class' => 'form-control' . ($errors->has('linkedin_url') ? ' is-invalid' : ''), 'placeholder' => 'Linkedin Url']) }}
            {!! $errors->first('linkedin_url', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('phone') }}
            {{ Form::text('phone', $user->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => 'Phone' , 'oninput' => "this.value = this.value.replace(/[^0-9]/g,'').substring(0,10);" ])   }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('address') }}
            {{ Form::text('address', $user->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('url_cv') }}
            {{ Form::text('url_cv', $user->url_cv, ['class' => 'form-control' . ($errors->has('url_cv') ? ' is-invalid' : ''), 'placeholder' => 'Url Cv']) }}
            {!! $errors->first('url_cv', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('password') }}
            {{ Form::text('password', $user->url_cv, ['class' => 'form-control' . ($errors->has('url_cv') ? ' is-invalid' : ''), 'placeholder' => 'Url Cv']) }}
            {!! $errors->first('url_cv', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>