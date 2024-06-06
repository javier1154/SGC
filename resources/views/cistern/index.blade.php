@extends('layouts.app')
@section('titulo', 'Recepción')
@section('subtitulo', '')
@section('contenido')
<br>

<div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-received" style="margin-bottom: -50px; position: relative; z-index: 1;">
                <i class="fa fa-btn fa-sign-in"></i> Registrar 
            </button>
            

            
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center col-md-1">N°</th>
                        <th class="text-center col-md-1">Descripción</th>
                        <th class="text-center col-md-2">Recepcionado por</th>
                        <th class="text-center col-md-1">Combustible</th>
                        <th class="text-center col-md-1">Litros recepcionados</th>
                        <th class="text-center col-md-1">Fecha de Creación</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($cisterns as $cistern)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="text-center bold">{{$cistern->description}}</td>
                            <td class="text-center">{{$cistern->permit->user->name}}</td>
                            <td class="text-center">{{$cistern->tank->fuel->name}}</td>
                            <td class="text-center">{{$cistern->received_litre}}</td>
                            <td class="text-center">{!! fecha($cistern->created_at) !!}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
					
				</tfoot>
            </table>
        </div>
    </div>

    <!--Modal, registrar recepcion -->
                    
    <div class="modal fade" id="modal-received">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Registrar litraje recibido</b></h4>
                            </div>
                            <form class="form-horizontal" action="{{ route('cistern.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    @include('layouts.validacion')
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Descripción</label>
                                            <input type="text" name="description" class="form-control" required value="{{old('name')}}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Combustible</label>
                                            <select name="tank_id" class="form-control" required value="" style="width:100%">
                                                @foreach($cisterns as $cistern)
                                                    <option value="{{encrypt($cistern->tank->id)}}">@if($cistern->tank->name) {{$cistern->tank->fuel->name}} [{{$cistern->tank->name}}] @else {{$cistern->tank->fuel->name}}  @endif</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Litros recepcionados</label>
                                            <input type="number" name="received_litre" class="form-control" required value="" min = 1>
                                        </div>
                                        <input type="hidden" name = "permit_id" value = "{{\Auth::user()->permit->id}}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Registrar</button>
                                </div>
                            </form>
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
            $( "ul.sidebar-menu li.users" ).addClass('active');

            var errors = "{{$errors->any()}}"; if(errors){ $("div.modal").modal(); }

            $('table').dataTable({
                "language": 
                { 
                "lengthMenu": '<div style="margin-left:120px;" class="opciones"><b>Ver</b> <select class="form-control">'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="50">50</option>'+
                '<option value="-1">Todos</option>'+
                '</select></div>',
                },
                "columnDefs": [ { targets: 4, sortable: false }],
            });

           
        });
    </script>
@endsection