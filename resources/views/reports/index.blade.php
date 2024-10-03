@extends('layouts.app')
@section('titulo', 'Reportes')
@section('subtitulo', '')
@section('contenido')
<br>
<div class="row">
    <div class="col-md-2">
        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalUser">Reporte General de Usuarios</a>
    </div>
    <div class="modal fade" id="generalUser" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reporte General de Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="{{route('users.pdf')}}" target="_blank" class="btn btn-danger btn-block">EXPORTAR A PDF</a>
                    <form class="form-horizontal" action="{{route('reports.users')}}" target="_blank" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" value="" name="tipo">
                        <button type="button" data-tipo="Excel" class="btn btn-success btn-block btn-export">EXPORTAR A EXCEL</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        
        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalRecep">Reporte General de Recepciones <br> de Combustible</button>
    </div>
    <div class="modal fade" id="generalRecep" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reporte General de Recepciones de Combustible</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="{{route('reports.cisterns.pdf')}}" target="_blank" class="btn btn-danger btn-block">EXPORTAR A PDF</a>
                    <a href="{{route('reports.test3')}}" target="_blank" class="btn btn-success btn-block">EXPORTAR A CSV</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalRecep1">Reporte de Vehículos
    </div>
    <div class="modal fade" id="generalRecep1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reporte de Vehículos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="{{route('vehicles.pdf')}}" target="_blank" class="btn btn-danger btn-block">EXPORTAR A PDF</a>
                    <a href="{{route('reports.test4')}}" target="_blank" class="btn btn-success btn-block">EXPORTAE A CSV</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#generalRecep2">Reporte de Gerencias
    </div>
    <div class="modal fade" id="generalRecep2" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reporte de Gerencias</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a href="{{route('managements.pdf')}}" target="_blank" class="btn btn-danger btn-block">EXPORTAR A PDF</a>
                    <a href="{{route('reports.test5')}}" target="_blank" class="btn btn-success btn-block">EXPORTAE A CSV</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="{!! asset('plugins/datatables/jquery.dataTables.min.css'); !!}" rel="stylesheet">
    <link href="{!! asset('plugins/datatables/dataTables.bootstrap.min.css'); !!}" rel="stylesheet">
@endsection
@section('js')
    <script src="{!! asset('plugins/datatables/jquery.dataTables.min.js'); !!}"></script>
    <script src="{!! asset('plugins/datatables/dataTables.bootstrap.min.js'); !!}"></script>
    <script>
        $(document).ready(function(){
            $( "ul.sidebar-menu li.reports" ).addClass('active');

            var errors = "{{$errors->any()}}"; if(errors){ $("div.modal").modal(); }

             $(".btn-export").click(function(){
			    var tipo = $(this).data('tipo');
			    var form = $(this).parent("form");
			    $("input[name='tipo']", form).val(tipo);
			    form.submit();
		    });
            
        });
    </script>
@endsection