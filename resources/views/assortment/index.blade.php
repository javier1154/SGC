@extends('layouts.app')
@section('titulo', 'Historial de surtido')
@section('subtitulo', '')
@section('contenido')
<br>
<table class="table">
                <thead>
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center col-md-3">Nombre</th>
                        <th class="text-center col-md-1">Cédula</th>
                        <th class="text-center col-md-1">Gerencia</th>
                        <th class="text-center col-md-1">Indicador</th>
                        <th class="text-center col-md-1">Litraje propuesto</th>
                        <th class="text-center col-md-1">Litraje surtido</th>
                        <th class="text-center col-md-2">Estado</th>
                        <th class="text-center col-md-2">Propuesto por</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach ($user_fuel_days as $user_day)
                        @php
                        $i++;
                        
                        @endphp
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="bold text-left">{{$user_day->user->name}}</td>
                            <td class="bold text-center">{{$user_day->user->ci}}</td>
                            <td class="bold text-center">{{$user_day->user->management->code}}</td>
                            <td class="bold text-center">{{$user_day->user->indicator}}</td>
                            <td class="bold text-center">{{$user_day->proposed_litre}}</td>
                            <td class="bold text-center">{{$user_day->assorted_litre}}</td>
                            <td class="bold text-center">{{$user_day->estado}}</td>
                            <td class="bold text-center">{{$user_day->permit->user->name}}</td>
                            
                            
                            
                        
                        </tr>
                    @endforeach
                    
                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9" class="opciones">
                            <center>
                                

                            </center>
                        </td>
                    </tr>
                </tfoot>
            </table>

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
            $( "ul.sidebar-menu li.assortment" ).addClass('active');

            var errors = "{{$errors->any()}}"; if(errors){ $("div.modal").modal(); }

            $('table').dataTable({
                "language": 
                { 
                "lengthMenu": '<div style="margin-left:0px;" class="opciones"><b>Ver</b> <select class="form-control">'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="50">50</option>'+
                '<option value="-1">Todos</option>'+
                '</select></div>',
                },
                "columnDefs": [ { targets: 4, sortable: false }],
            });

            $( "<div class='table-responsive'>" ).insertBefore( "table" );
                $('table').appendTo('.table-responsive');

        });
    </script>
@endsection