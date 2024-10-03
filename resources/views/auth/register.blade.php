<!-- @extends('layouts.pop')
@section('titulo', 'Registrar usuario')
@section('contenido')
<div class="row">
    <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
        <br>
        <div class="text-center">
            <img src="{!! asset('img/logo-login.png') !!}" style="width: 200px;">
            <br>
            <h1><b>Registrar Usuario</b></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        @include('layouts.validacion')
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            @captcha
                            <div class="row datos">Datos del Usuario</div>
                            <div class="row" style="border: 1px solid #434343; background-color: #FFF">
                                <br>
								<input type="hidden" name="retorno" value="">
								<div class="form-group col-md-4 {{ $errors->has('cedula') ? ' has-error' : '' }}">
									<label class="control-label">Cédula</label>
									<input type="text" name="cedula" value="{{old('cedula')}}" class="form-control" required>
								</div>

								<div class="form-group col-md-8 {{ $errors->has('nombres') ? ' has-error' : '' }}">
									<label class="control-label">Nombres y apellidos</label>
									
									<input type="text" name="nombres" value="{{old('nombres')}}" class="form-control" required>
								</div>

								<div class="form-group col-md-4 {{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
									<label class="control-label">Fecha de nacimiento</label>
									<div class="input-group date">
										<input type="text" name="fecha_nacimiento" id="datepicker" value="{{old('fecha_nacimiento') }}" required="" readonly="" class="form-control">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
									</div>
								</div>

								<div class="form-group col-md-4 {{ $errors->has('telefono') ? ' has-error' : '' }}">
									<label class="control-label">Teléfono</label>
									
									<input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" required>
								</div>
								<div class="form-group col-md-4 {{ $errors->has('telefono_dos') ? ' has-error' : '' }}">
									<label class="control-label">Teléfono opcional</label>
									
									<input type="text" name="telefono_dos" value="{{old('telefono_dos')}}" class="form-control">
								</div>

							</div>

							<div class="row datos">Datos de Ubicación</div>
                            <div class="row" style="border: 1px solid #434343; background-color: #FFF">
                            <br>
                                <div class="form-group col-md-4 {{ $errors->has('estado') ? ' has-error' : '' }}">
                                    <label class="control-label">Estado</label>
                                    
                                    <select name="estado" id="estado" class="form-control" required>
                                        <option value="">Seleccione</option>
                                        @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{!!$estado->estado!!}</option>
                                        @endforeach
                                    </select>
                                </div>
								<div class="form-group col-md-4 {{ $errors->has('municipio') ? ' has-error' : '' }}">
									<label class="control-label">Municipio</label>
									
									<select name="municipio" id="municipio" class="form-control" required disabled>
										<option value="">Seleccione</option>
									</select>
								</div>
								<div class="form-group col-md-4 {{ $errors->has('id_parroquia') ? ' has-error' : '' }}">
									<label class="control-label">Parroquia</label>
									
									<select name="id_parroquia" id="parroquia" class="form-control" required disabled>
										<option value="">Seleccione</option>
									</select>
								</div>

								<div class="form-group col-md-12 {{ $errors->has('direccion') ? ' has-error' : '' }}">
									<label class="control-label">Dirección</label>
									<textarea name="direccion" required class="form-control">{{old('direccion')}}</textarea>
								</div>

                            </div>
                            <div class="row datos">Datos de acceso al sistema</div>
                            <div class="row" style="border: 1px solid #434343; background-color: #FFF">
                            <br>

                                <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="control-label">Correo electrónico</label>
                                    
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control" required>
                                </div>

                                <div class="form-group col-md-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="control-label">Contraseña</label>
                                    
                                    <input type="password" name="password" value="" class="form-control" required>
                                </div>
                                <div class="form-group col-md-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="control-label">Confirmar contraseña</label>
                                    
                                    <input type="password" name="password_confirmation" value="" class="form-control" required>
                                </div>

                            </div>
    
                            
    
                            <div class="form-group row mb-0 text-center">
                                <br>
                                <div class="col-md-12">
                                    <a href="{{route('welcome')}}" style="margin-right: 20px" class="btn btn-default btn-flat bold" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</a>
							        <button type="submit" class="btn btn-primary btn-flat bold"><i class="fa fa-save"></i> Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>


@endsection

@section('css')
    <style>
        section.content-header{
            display: none;
        }

        .control-label{
            text-align: left !important;
        }

        .btn-primary {
        background-color: #333 !important;
        border-color: #333 !important;
        }

        .btn-primary.focus, .btn-primary:focus {
        background-color: #444 !important;
        }

        .btn-primary:hover {
        background-color: #444 !important;
        }
    </style>
	<link href="{!! asset('plugins/datepicker/datepicker3.min.css'); !!}" rel="stylesheet">
@endsection
@section('js')
	<script src="{!! asset('plugins/input-mask/jquery.inputmask.js'); !!}"></script>
    <script src="{!! asset('plugins/datepicker/bootstrap-datepicker.js'); !!}"></script>
    <script>
        $(document).ready(function() {
    
            $('#datepicker').datepicker({endDate: '-18y', startView: 'decade'});
    
            telefono("input[name='telefono']");
            telefono("input[name='telefono_dos']");
            cedula("input[name='cedula']");
    
            $("select[name='estado'], select[name='municipio'], select[name='id_parroquia']").css('width', '100%');
             
            $('#estado').change(function(){
                $('#estado option[value=""]').remove();
                $("#estado option:selected").each(function () {
                    $("#municipio, #parroquia").empty();
                    id_estado = $("#estado").val();
                    $.get("{!! url('/') !!}/municipios/"+id_estado, function(response){
                        if (response) {
                              $('#select2-municipio-container, #select2-parroquia-container').html("Seleccione");
                            function cargar(){
                                  for(i=0; i<response.length; i++){
                                      $("#municipio").append("<option value="+response[i].id+">"+response[i].municipio+"</option>");
                                  }
                              }
                            $("#municipio").html(cargar());
                        }
                    });            
                });
                $("#municipio").removeAttr('disabled');
            });

            $('#municipio').change(function(){
                $('#municipio option[value=""]').remove();
                $("#municipio option:selected").each(function () {
                    $("#parroquia").empty();
                    id_municipio = $("#municipio").val();
                    $.get("{!! url('/') !!}/parroquias/"+id_municipio, function(response){
                        if (response) {
                              $('#select2-parroquia-container').html("Seleccione");
                            function cargar(){
                                  for(i=0; i<response.length; i++){
                                      $("#parroquia").append("<option value="+response[i].id+">"+response[i].parroquia+"</option>");
                                  }
                              }
                            $("#parroquia").html(cargar());
                        }
                    });            
                });
                $("#parroquia").removeAttr('disabled');
            });
    
        });
        </script>
@endsection -->