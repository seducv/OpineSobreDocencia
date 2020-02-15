@extends('layouts.dashboard')
@section('content')
<div class="container register">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 size-p">
            <h3 class="text-center">Configurar Encuesta</h3>
            <p class="text-center">
                Introduzca los datos necesarios para la configuración de la encuesta
            </p>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/dashboard/editar-encuesta') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="semester" class="control-label raleway-semibold">Período lectivo</label>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <input id="semester" type="text" class="form-control" name="semester" value="{{ $semesters->name }}">
                            @if ($errors->has('semester'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('semester') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> 
                </div>
                
                @foreach($semesters->survey as $semester)
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label raleway-semibold">Nombre</label>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $semester->name }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> 
                </div>
                <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }} ">
                    <label for="rol" class="control-label raleway-semibold">Estatus</label>
                    <div class="row">
                        <div class="col-xs-12">
                            <select name="status" id="status"  value="{{ old('status') }}" size="1" maxlength="1" class="form-control" required="required">
                                <option value="">Seleccione..</option>  
                                <option value="1">Activa</option>
                                <option value="0">Inactiva</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rol') }}</strong>
                                </span>
                            @endif
                            <div id="error-msg">
                                {!! Session::has('msg') ? Session::get("msg") : '' !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="form-group{{ $errors->has('forma-pago') ? ' has-error' : '' }} ">
                    <label for="phone_code" class="control-label raleway-semibold text-center">¿Desea editar la fecha de realización de la encuesta? </label>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <label for="">Si</label>
                            @if(old('edit-date') == "si")
                                <input type="radio" name="edit-date"  value="si" id="edit-si" class="edit-date" checked="checked">
                            @else
                                <input type="radio" name="edit-date"  value="si" id="edit-si" class="edit-date" checked="checked">
                            @endif
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <label for="">No</label>
                            @if(old('edit-date') == "no")
                                <input type="radio" name="edit-date" value="no" class="edit-date">
                            @else
                                <input type="radio" name="edit-date" value="no" class="edit-date">
                            @endif
                        </div>
                        <div class="col-xs-12 col-md-6">
                            @if ($errors->has('edit-date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('edit-date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row dates">
                    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                        <label for="start_date" class="control-label raleway-semibold">Fecha de Inicio</label>
                        <input id="start_date" type="text" class="form-control date" name="start_date" value="{{ old('start_date') }}" autocomplete="off">
                        @if ($errors->has('start_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('start_date') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                        <label for="end_date" class="control-label raleway-semibold">Fecha de Finalización</label>
                        <input id="end_date" type="text" class="form-control date" name="end_date" value="{{ old('end_date') }}" autocomplete="off">
                        @if ($errors->has('end_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('end_date') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
               
                {{ Form::hidden('id', $semesters->id) }}

                <div class="form-group row buttons">
                    <div class="col-xs-12 text-center">
                        <a href= "{{ url('/dashboard/mostrar-encuestas') }}">
                            <button class="btn btn-primary button-form" type="button">Cancelar</button>
                        </a>
                        <button type="submit" class="btn btn-primary btn-register button-form">
                            <i class="fa fa-btn fa-user"></i> Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection