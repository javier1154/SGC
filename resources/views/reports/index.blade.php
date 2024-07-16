@extends('layouts.app')
@section('title', 'Reportes')
@section('content')
	@if (config('app.reports'))
		<div class="row">
			<div class="col-md-2">
				<button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalEnte">Reporte General<br>por Entes</a>
			</div>
			<div class="modal fade" id="generalEnte" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte General por Ente</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<a href="{{route('reports.generalEnte')}}" target="_blank" class="btn btn-danger btn-block">EXPORTAR A PDF</a>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalPV">Reporte General<br>por Presd/VP</a>
			</div>
			<div class="modal fade" id="generalPV" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte General por Presd/VP</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<a href="{{route('reports.generalPV')}}" target="_blank" class="btn btn-danger btn-block">EXPORTAR A PDF</a>
						</div>
					</div>
				</div>
			</div>

			
			<div class="col-md-2">
				<button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalOrganizacion">Reporte General<br>por Organización</a>
			</div>
			<div class="modal fade" id="generalOrganizacion" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte General por Organización</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.generalOrganizacion')}}" target="_blank" method="post">
								@csrf
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalLocalidad">Reporte General<br>por Localidad</a>
			</div>
			<div class="modal fade" id="generalLocalidad" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte General por Localidad</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.generalLocalidad')}}" target="_blank" method="post">
								@csrf
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>



			<div class="col-md-2">
				<button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalEstado">Reporte General<br>por Estado</a>
			</div>
			<div class="modal fade" id="generalEstado" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte General por Estado</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.generalEstado')}}" target="_blank" method="post">
								@csrf
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalUsuario">Reporte General<br>por Usuario</a>
			</div>
			<div class="modal fade" id="generalUsuario" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte General por Usuario</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<a href="{{route('reports.generalUsuario')}}" target="_blank" class="btn btn-success btn-block">EXPORTAR A EXCEL</a>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalUsuarioReportado">Reporte General<br>por Usuarios Reportados</a>
			</div>
			<div class="modal fade" id="generalUsuarioReportado" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte General por Usuarios Reportados</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<a href="{{route('reports.generalUsuarioReportado')}}" target="_blank" class="btn btn-success btn-block">EXPORTAR A EXCEL</a>
							<a href="{{route('reports.generalCedula')}}" target="_blank" class="btn btn-warning btn-block">EXPORTAR A EXCEL SOLO CÉDULAS</a>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#entePV">Reporte Ente<br>por Presd/VP</a>
			</div>
			<div class="modal fade" id="entePV" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Ente por Presd/VP</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.entePV')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Ente</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($entes as $ente)
												<option value="{{$ente->id}}">{{$ente->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#enteOrganizacion">Reporte Ente<br>por Organización</a>
			</div>
			<div class="modal fade" id="enteOrganizacion" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Ente por Organización</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.enteOrganizacion')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Ente</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($entes as $ente)
												<option value="{{$ente->id}}">{{$ente->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			
			<div class="col-md-2">
				<button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#enteLocalidad">Reporte Ente<br>por Localidad</a>
			</div>
			<div class="modal fade" id="enteLocalidad" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Ente por Localidad</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.enteLocalidad')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Ente</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($entes as $ente)
												<option value="{{$ente->id}}">{{$ente->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#enteEstado">Reporte Ente<br>por Estado</a>
			</div>
			<div class="modal fade" id="enteEstado" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Ente por Estado</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.enteEstado')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Ente</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($entes as $ente)
												<option value="{{$ente->id}}">{{$ente->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-secondary btn-block" data-toggle="modal" data-target="#enteUsuario">Reporte Ente<br>por Usuario</a>
			</div>
			<div class="modal fade" id="enteUsuario" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Ente por Usuario</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.enteUsuario')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Ente</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($entes as $ente)
												<option value="{{$ente->id}}">{{$ente->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-secondary btn-dark btn-block" data-toggle="modal" data-target="#pvOrganizacion">Reporte Presd/VP<br>por Organización</a>
			</div>
			<div class="modal fade" id="pvOrganizacion" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Presd/VP por Organización</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.pvOrganizacion')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Presd/VP</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($pvs as $pv)
												<option value="{{$pv->id}}">{{$pv->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-secondary btn-dark btn-block" data-toggle="modal" data-target="#pvLocalidad">Reporte Presd/VP<br>por Localidad</a>
			</div>
			<div class="modal fade" id="pvLocalidad" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Presd/VP por Localidad</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.pvLocalidad')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Presd/VP</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($pvs as $pv)
												<option value="{{$pv->id}}">{{$pv->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<button class="btn btn-secondary btn-dark btn-block" data-toggle="modal" data-target="#pvEstado">Reporte Presd/VP<br>por Estado</a>
			</div>
			<div class="modal fade" id="pvEstado" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Presd/VP por Estado</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.pvEstado')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Presd/VP</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($pvs as $pv)
												<option value="{{$pv->id}}">{{$pv->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-secondary btn-dark btn-block" data-toggle="modal" data-target="#pvUsuario">Reporte Presd/VP<br>por Usuario</a>
			</div>
			<div class="modal fade" id="pvUsuario" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Presd/VP por Usuario</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.pvUsuario')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Presd/VP</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($pvs as $pv)
												<option value="{{$pv->id}}">{{$pv->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-secondary btn-success btn-block" data-toggle="modal" data-target="#organizacionLocalidad">Reporte Organización<br>por Localidad</a>
			</div>
			<div class="modal fade" id="organizacionLocalidad" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Organización por Localidad</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.organizacionLocalidad')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Organización</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($organizaciones as $organizacion)
												<option value="{{$organizacion->id}}">{{$organizacion->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<button class="btn btn-secondary btn-success btn-block" data-toggle="modal" data-target="#organizacionEstado">Reporte Organización<br>por Estado</a>
			</div>
			<div class="modal fade" id="organizacionEstado" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Organización por Estado</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.organizacionEstado')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Organización</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($organizaciones as $organizacion)
												<option value="{{$organizacion->id}}">{{$organizacion->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<button class="btn btn-secondary btn-success btn-block" data-toggle="modal" data-target="#organizacionGerencia">Reporte Organización<br>por Gerencia</a>
			</div>
			<div class="modal fade" id="organizacionGerencia" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Organización por Gerencia</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.organizacionGerencia')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Organización</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($organizaciones as $organizacion)
												<option value="{{$organizacion->id}}">{{$organizacion->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-secondary btn-success btn-block" data-toggle="modal" data-target="#organizacionUsuario">Reporte Organización<br>por Usuario</a>
			</div>
			<div class="modal fade" id="organizacionUsuario" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Organización por Usuario</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.organizacionUsuario')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Organización</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($organizaciones as $organizacion)
												<option value="{{$organizacion->id}}">{{$organizacion->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<button class="btn btn-secondary btn-warning btn-block" data-toggle="modal" data-target="#localidadGerencia">Reporte Localidad<br>por Gerencia</a>
			</div>
			<div class="modal fade" id="localidadGerencia" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Localidad por Gerencia</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.localidadGerencia')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Localidad</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($localidades as $localidad)
												<option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<button class="btn btn-secondary btn-warning btn-block" data-toggle="modal" data-target="#localidadUsuario">Reporte Localidad<br>por Usuario</a>
			</div>
			<div class="modal fade" id="localidadUsuario" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Localidad por Usuario</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.localidadUsuario')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Localidad</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($localidades as $localidad)
												<option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>



			<div class="col-md-2">
				<button class="btn btn-info btn-block" data-toggle="modal" data-target="#estadoGerencia" style="color: #FFF">Reporte Estado<br>por Gerencia</a>
			</div>
			<div class="modal fade" id="estadoGerencia" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Estado por Gerencia</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.estadoGerencia')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Estado</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($estados as $estado)
												<option value="{{$estado->id}}">{{$estado->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<button class="btn btn-info btn-block" data-toggle="modal" data-target="#estadoMunicipio" style="color: #FFF">Reporte Estado<br>por Municipio</a>
			</div>
			<div class="modal fade" id="estadoMunicipio" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Estado por Municipio</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.estadoMunicipio')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Estado</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($estados as $estado)
												<option value="{{$estado->id}}">{{$estado->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad">EXPORTAR A PDF</button>
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			

			<div class="col-md-2">
				<button class="btn btn-info btn-block" data-toggle="modal" data-target="#estadoUsuario" style="color: #FFF">Reporte Estado<br>por Usuario</a>
			</div>
			<div class="modal fade" id="estadoUsuario" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Reporte Estado por Usuario</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="{{route('reports.estadoUsuario')}}" target="_blank" method="post">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Estado</label>
										<select name="entidad" class="form-control select-entidad" style="width: 100%" required>
											<option value="">Seleccione</option>
											@foreach ($estados as $estado)
												<option value="{{$estado->id}}">{{$estado->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<input type="hidden" value="" name="tipo">
								<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad">EXPORTAR A EXCEL</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#organizacionGerenciaUsuario">Reporte Organización Gerencia<br>por Usuario</a>
			</div>

			<div class="modal fade" id="organizacionGerenciaUsuario" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Reporte Organización Gerencia por Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="{{route('reports.organizacionGerenciaUsuario')}}" target="_blank" method="post">
							@csrf
							<div class="row">
								<div class="form-group col-md-12">
									<label>Organización</label>
									<select name="organizacion" id="OGU" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
										@foreach ($organizaciones as $organizacion)
											<option value="{{$organizacion->id}}">{{$organizacion->nombre}}</option>
										@endforeach
									</select>
								</div>
		
								<div class="form-group col-md-12">
									<label>Gerencia</label>
									<select name="gerencia" id="gerencia" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
									</select>
								</div>
							</div>
						
							<input type="hidden" value="" name="tipo">
							<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad-OGU">EXPORTAR A EXCEL</button>
						</form>
					</div>
				</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#organizacionLocalidadUsuario">Reporte Organización Localidad<br>por Usuario</a>
			</div>
			<div class="modal fade" id="organizacionLocalidadUsuario" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Reporte Organización Localidad por Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="{{route('reports.organizacionLocalidadUsuario')}}" target="_blank" method="post">
							@csrf
							<div class="row">
								<div class="form-group col-md-12">
									<label>Organización</label>
									<select name="organizacion" id="OLU" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
										@foreach ($organizaciones as $organizacion)
											<option value="{{$organizacion->id}}">{{$organizacion->nombre}}</option>
										@endforeach
									</select>
								</div>
		
								<div class="form-group col-md-12">
									<label>Localidad</label>
									<select name="localidad" id="localidad" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
									</select>
								</div>
							</div>
							<input type="hidden" value="" name="tipo">
							<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad-OLU">EXPORTAR A EXCEL</button>
						</form>
					</div>
				</div>
				</div>
			</div>



			<div class="col-md-2">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#estadoMunicipioParroquia">Reporte Estado Municipio<br>por Parroquia</a>
			</div>
			<div class="modal fade" id="estadoMunicipioParroquia" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Reporte Estado Municipio por Parroquia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="{{route('reports.estadoMunicipioParroquia')}}" target="_blank" method="post">
							@csrf
							<div class="row">
								<div class="form-group col-md-12">
									<label>Estado</label>
									<select name="estado" id="EMP" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
										@foreach ($estados as $estado)
											<option value="{{$estado->id}}">{{$estado->nombre}}</option>
										@endforeach
									</select>
								</div>
		
								<div class="form-group col-md-12">
									<label>Municipio</label>
									<select name="municipio" id="municipio" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
									</select>
								</div>
							</div>
							<input type="hidden" value="" name="tipo">
							<button type="button" data-tipo="PDF" class="btn btn-danger btn-block btn-export-entidad-EMP">EXPORTAR A PDF</button>
							<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad-EMP">EXPORTAR A EXCEL</button>
						</form>
					</div>
				</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#estadoMunicipioUsuario">Reporte Estado Municipio<br>por Usuario</a>
			</div>
			<div class="modal fade" id="estadoMunicipioUsuario" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Reporte Estado Municipio por Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="{{route('reports.estadoMunicipioUsuario')}}" target="_blank" method="post">
							@csrf
							<div class="row">
								<div class="form-group col-md-12">
									<label>Estado</label>
									<select name="estado" id="EMU" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
										@foreach ($estados as $estado)
											<option value="{{$estado->id}}">{{$estado->nombre}}</option>
										@endforeach
									</select>
								</div>
		
								<div class="form-group col-md-12">
									<label>Municipio</label>
									<select name="municipio" id="municipio" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
									</select>
								</div>
							</div>
							<input type="hidden" value="" name="tipo">
							<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad-EMU">EXPORTAR A EXCEL</button>
						</form>
					</div>
				</div>
				</div>
			</div>


			<div class="col-md-2">
				<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#estadoMunicipioParroquiaUsuario">Reporte Estado Municipio Parroquia<br>por Usuario</a>
			</div>
			<div class="modal fade" id="estadoMunicipioParroquiaUsuario" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-sm">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Reporte Estado Municipio Parroquia por Usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="{{route('reports.estadoMunicipioParroquiaUsuario')}}" target="_blank" id="EMPUForm" method="post">
							@csrf
							<div class="row">
								<div class="form-group col-md-12">
									<label>Estado</label>
									<select name="estado" id="EMPU" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
										@foreach ($estados as $estado)
											<option value="{{$estado->id}}">{{$estado->nombre}}</option>
										@endforeach
									</select>
								</div>
		
								<div class="form-group col-md-12">
									<label>Municipio</label>
									<select name="municipio" id="municipio" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
									</select>
								</div>
		
								<div class="form-group col-md-12">
									<label>Parroquia</label>
									<select name="parroquia" id="parroquia" class="form-control" style="width: 100%" required>
										<option value="">Seleccione</option>
									</select>
								</div>
							</div>
							<input type="hidden" value="" name="tipo">
							<button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export-entidad-EMPU">EXPORTAR A EXCEL</button>
						</form>
					</div>
				</div>
				</div>
			</div>
		</div>

	

	@else
		<div class="alert alert-info">Los reportes se encuentran desactivados</div>
	@endif


@endsection

@section('css')
<style>
	.modal-header{
		background-color: #ed1c24;
		color: #FFF;
	}

	.modal-header h5{
		font-size: 14px;
		font-weight: bold;
		text-transform: uppercase;
	}
	.col-md-2{
		margin-bottom: 20px;
	}

	.row .col-md-2 .btn{
		padding: 6px 10px !important;
	}
</style>
@endsection
@section('js')
    <script>
    $(document).ready(function() {
		$.noConflict();
        $("select").select2();


		$(".btn-export").click(function(){
			var tipo = $(this).data('tipo');
			var form = $(this).parent("form");
			$("input[name='tipo']", form).val(tipo);
			form.submit();
		});

		$(".btn-export-entidad").click(function(){
			var tipo = $(this).data('tipo');
			var form = $(this).parent("form");
			$("input[name='tipo']", form).val(tipo);
			var entidad = $("select.select-entidad", form).val();
			if(entidad){
				form.submit();
			}else{
				toastr.error('Seleccione una opción.');
			}
		});

		$(".btn-export-entidad-OGU").click(function(){
			var tipo = $(this).data('tipo');
			var form = $(this).parent("form");
			$("input[name='tipo']", form).val(tipo);
			var organizacion = $("select#OGU").val();
			if(organizacion){
				var gerencia = $("select#gerencia").val();
				if(gerencia){
					console.log("submit");
					form.submit();
				}else{
					toastr.error('Seleccione una gerencia.');
				}
			}else{
				toastr.error('Seleccione una organización.');
			}
		});

		$("#OGU").change(function(){
            var id_organizacion = $(this).val();
			console.log(id_organizacion);
            if(id_organizacion){
                $.get("{!! url('/') !!}/getGerenciasNegocio/"+id_organizacion, function(response){
                    if (response) {
                        $('#gerencia option[value=""]').remove();
                        $("#gerencia").empty();
                        $('#select2-gerencia-container').html("SELECCIONE");
                        $("#gerencia").append("<option value=''>SELECCIONE</option>");
                        if(response.status === 201){
                            response = response.data;
                            for(i=0; i<response.length; i++){
                                $("#gerencia").append("<option value="+response[i].id+">"+response[i].nombre+"</option>");
                            }
                        }
                    }
                });  
            }else{
                $('#gerencia option[value=""]').remove();
                $("#gerencia").empty();
                $('#select2-gerencia-container').html("SELECCIONE");
                $("#gerencia").append("<option value=''>SELECCIONE</option>");
            }
        });

		$(".btn-export-entidad-OLU").click(function(){
			var tipo = $(this).data('tipo');
			var form = $(this).parent("form");
			$("input[name='tipo']", form).val(tipo);
			var organizacion = $("select#OLU").val();
			if(organizacion){
				var gerencia = $("select#localidad").val();
				if(gerencia){
					console.log("submit");
					form.submit();
				}else{
					toastr.error('Seleccione una localidad.');
				}
			}else{
				toastr.error('Seleccione una organización.');
			}
		});

		$("#OLU").change(function(){
            var id_organizacion = $(this).val();
            if(id_organizacion){
                $.get("{!! url('/') !!}/getLocalidadesOrganizacion/"+id_organizacion, function(response){
                    if (response) {
                        $('#organizacionLocalidadUsuario #localidad option[value=""]').remove();
                        $("#organizacionLocalidadUsuario #localidad").empty();
                        $('#organizacionLocalidadUsuario #select2-localidad-container').html("SELECCIONE");
                        $("#organizacionLocalidadUsuario #localidad").append("<option value=''>SELECCIONE</option>");
                        if(response.status === 201){
                            response = response.data;
                            for(i=0; i<response.length; i++){
                                $("#organizacionLocalidadUsuario #localidad").append("<option value="+response[i].id+">"+response[i].nombre+"</option>");
                            }
                        }
                    }
                });  
            }else{
                $('#organizacionLocalidadUsuario #localidad option[value=""]').remove();
                $("#organizacionLocalidadUsuario #localidad").empty();
                $('#organizacionLocalidadUsuario #select2-localidad-container').html("SELECCIONE");
                $("#organizacionLocalidadUsuario #localidad").append("<option value=''>SELECCIONE</option>");
            }
        });


		$(".btn-export-entidad-EMP").click(function(){
			var tipo = $(this).data('tipo');
			var form = $(this).parent("form");
			$("input[name='tipo']", form).val(tipo);
			var estado = $("select#EMP").val();
			if(estado){
				var municipio = $("#estadoMunicipioParroquia select#municipio").val();
				if(municipio){
					console.log("submit");
					form.submit();
				}else{
					toastr.error('Seleccione un municipio.');
				}
			}else{
				toastr.error('Seleccione un estado.');
			}
		});


		$("#EMP").change(function(){
            var id_estado = $(this).val();
            if(id_estado){
                $.get("{!! url('/') !!}/getMunicipios/"+id_estado, function(response){
                    if (response) {
                        $('#estadoMunicipioParroquia #municipio option[value=""]').remove();
                        $("#estadoMunicipioParroquia #municipio").empty();
                        $('#estadoMunicipioParroquia #select2-municipio-container').html("SELECCIONE");
                        $("#estadoMunicipioParroquia #municipio").append("<option value=''>SELECCIONE</option>");
                        if(response.status === 201){
                            response = response.data;
                            for(i=0; i<response.length; i++){
                                $("#estadoMunicipioParroquia #municipio").append("<option value="+response[i].id+">"+response[i].nombre+"</option>");
                            }
                        }
                    }
                });  
            }else{
                $('#estadoMunicipioParroquia #municipio option[value=""]').remove();
                $("#estadoMunicipioParroquia #municipio").empty();
                $('#estadoMunicipioParroquia #select2-municipio-container').html("SELECCIONE");
                $("#estadoMunicipioParroquia #municipio").append("<option value=''>SELECCIONE</option>");
            }
        });


		$(".btn-export-entidad-EMU").click(function(){
			var tipo = $(this).data('tipo');
			var form = $(this).parent("form");
			$("input[name='tipo']", form).val(tipo);
			var estado = $("select#EMU").val();
			if(estado){
				var municipio = $("#estadoMunicipioUsuario select#municipio").val();
				if(municipio){
					console.log("submit");
					form.submit();
				}else{
					toastr.error('Seleccione un municipio.');
				}
			}else{
				toastr.error('Seleccione un estado.');
			}
		});

		$("#EMU").change(function(){
            var id_estado = $(this).val();
            if(id_estado){
                $.get("{!! url('/') !!}/getMunicipios/"+id_estado, function(response){
                    if (response) {
                        $('#estadoMunicipioUsuario #municipio option[value=""]').remove();
                        $("#estadoMunicipioUsuario #municipio").empty();
                        $('#estadoMunicipioUsuario #select2-municipio-container').html("SELECCIONE");
                        $("#estadoMunicipioUsuario #municipio").append("<option value=''>SELECCIONE</option>");
                        if(response.status === 201){
                            response = response.data;
                            for(i=0; i<response.length; i++){
                                $("#estadoMunicipioUsuario #municipio").append("<option value="+response[i].id+">"+response[i].nombre+"</option>");
                            }
                        }
                    }
                });  
            }else{
                $('#estadoMunicipioUsuario #municipio option[value=""]').remove();
                $("#estadoMunicipioUsuario #municipio").empty();
                $('#estadoMunicipioUsuario #select2-municipio-container').html("SELECCIONE");
                $("#estadoMunicipioUsuario #municipio").append("<option value=''>SELECCIONE</option>");
            }
        });

		$(".btn-export-entidad-EMPU").click(function(){
			var tipo = $(this).data('tipo');
			var form = $(this).parent("form");
			$("input[name='tipo']", form).val(tipo);
			var estado = $("select#EMPU").val();
			if(estado){
				var municipio = $("#estadoMunicipioParroquiaUsuario select#municipio").val();
				if(municipio){
					var parroquia = $("#estadoMunicipioParroquiaUsuario select#parroquia").val();
					if(parroquia){
						form.submit();
					}else{
						toastr.error('Seleccione una parroquia.');
					}
				}else{
					toastr.error('Seleccione un municipio.');
				}
			}else{
				toastr.error('Seleccione un estado.');
			}
		});

		$("#EMPU").change(function(){
            var id_estado = $(this).val();
            if(id_estado){
                $.get("{!! url('/') !!}/getMunicipios/"+id_estado, function(response){
                    if (response) {
                        $('#estadoMunicipioParroquiaUsuario #municipio option[value=""], #estadoMunicipioParroquiaUsuario #parroquia option[value=""]').remove();
                        $("#estadoMunicipioParroquiaUsuario #municipio, #estadoMunicipioParroquiaUsuario #parroquia").empty();
                        $('#estadoMunicipioParroquiaUsuario #select2-municipio-container, #estadoMunicipioParroquiaUsuario #select2-parroquia-container').html("SELECCIONE");
                        $("#estadoMunicipioParroquiaUsuario #municipio, #estadoMunicipioParroquiaUsuario #parroquia").append("<option value=''>SELECCIONE</option>");
                        if(response.status === 201){
                            response = response.data;
                            for(i=0; i<response.length; i++){
                                $("#estadoMunicipioParroquiaUsuario #municipio").append("<option value="+response[i].id+">"+response[i].nombre+"</option>");
                            }
                        }
                    }
                });  
            }else{
                $('#estadoMunicipioParroquiaUsuario #municipio option[value=""], #estadoMunicipioParroquiaUsuario #parroquia option[value=""]').remove();
                $("#estadoMunicipioParroquiaUsuario #municipio, #estadoMunicipioParroquiaUsuario #parroquia").empty();
                $('#estadoMunicipioParroquiaUsuario #select2-municipio-container, #estadoMunicipioParroquiaUsuario #select2-parroquia-container').html("SELECCIONE");
                $("#estadoMunicipioParroquiaUsuario #municipio, #estadoMunicipioParroquiaUsuario #parroquia").append("<option value=''>SELECCIONE</option>");
            }
        });

		$("#estadoMunicipioParroquiaUsuario #municipio").change(function(){
            var id_municipio = $(this).val();
            var id_localidad = $("#estadoMunicipioParroquiaUsuario #EMPU").val();
            if(id_localidad){
                $.get("{!! url('/') !!}/getParroquias/"+id_localidad+"/"+id_municipio, function(response){
                    if (response) {
                        $('#estadoMunicipioParroquiaUsuario #parroquia option[value=""]').remove();
                        $("#estadoMunicipioParroquiaUsuario #parroquia").empty();
                        $('#estadoMunicipioParroquiaUsuario #select2-parroquia-container').html("SELECCIONE");
                        $("#estadoMunicipioParroquiaUsuario #parroquia").append("<option value=''>SELECCIONE</option>");
                        if(response.status === 201){
                            response = response.data;
                            for(i=0; i<response.length; i++){
                                $("#estadoMunicipioParroquiaUsuario #parroquia").append("<option value="+response[i].id+">"+response[i].nombre+"</option>");
                            }
                        }
                    }
                });  
            }else{
                $('#estadoMunicipioParroquiaUsuario #parroquia option[value=""]').remove();
                $("#estadoMunicipioParroquiaUsuario #parroquia").empty();
                $('#estadoMunicipioParroquiaUsuario #select2-parroquia-container').html("SELECCIONE");
                $("#estadoMunicipioParroquiaUsuario #parroquia").append("<option value=''>SELECCIONE</option>");
            }
        });

		

		
    });
    </script>
@endsection
