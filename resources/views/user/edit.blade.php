@extends('app')

@section('title')
  Edit profile
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Edit profile</div>
        <div class="panel-body">
          
          <div class="row">
            <div class="col-md-4 col-md-offset-4">
              <div class="avatar center-block" style="background-image: url('{{ Auth::user()->image }}');"></div>
            </div>
          </div>

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          
          <div class="row">
            {!! Form::model(Auth::user(), ['route' => 'post.edit.user', 'files' => true, 'class' => 'form-horizontal']) !!}

              <!-- Avatar -->
              <div class="form-group">
                {!! Form::label('avatar', 'Avatar', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::file('avatar', ['class' => 'form-control']) !!}
                </div>
              </div>

              <!-- Full name -->
              <div class="form-group">
                {!! Form::label('name', 'Full name', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Optional']) !!}
                </div>
              </div>

              <!-- Location -->
              <div class="form-group">
                {!! Form::label('location', 'Location', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('location', Input::old('location'), ['class' => 'form-control', 'placeholder' => 'Optional']) !!}
                </div>
              </div>

              <!-- Website -->
              <div class="form-group">
                {!! Form::label('website', 'Website', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('website', Input::old('website'), ['class' => 'form-control', 'placeholder' => 'Optional']) !!}
                </div>
              </div>

              <!-- Description -->
              <div class="form-group">
                {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::text('description', Input::old('description'), ['class' => 'form-control', 'placeholder' => 'Optional']) !!}
                </div>
              </div>

              <!-- Currency -->
              <div class="form-group">
                {!! Form::label('currency', 'Currency', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  {!! Form::select('currency', [
                    'EUR' => '&euro; - Euro', 
                    'USD' => '&#36; - United States Dollar', 
                    'GBP' => '&pound; - Great Britain Pound'
                  ], Auth::user()->currency, ['class' => 'form-control']) !!}
                </div>
              </div>

              <!-- Submit -->
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  {!! Form::submit('Update Profile', array('class' => 'btn btn-md btn-primary pull-right')) !!}
                </div>
              </div>
            {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection