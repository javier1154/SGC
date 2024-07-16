<table class="modules">
    @foreach ($registros as $usuario)
        <tr>
            <td style="text-align: center; border: 1px solid #000000;">{{$usuario->cedula}}</td>
        </tr>
    @endforeach
</table>