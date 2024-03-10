<div class="cards">
    <p>Nombre: {{$name}}</p>
    <p>Apellido: {{$lastname}}</p>
    <p>Fecha Creado</p>
    <div>
            <a href="{{route("client.show", $id ) }}">
            Mostrar
            </a>
            <a href="{{route("client.edit", $id ) }}">
            Editar
            <form method="POST" action="{{ route("client.destroy", $id ) }}">
                @csrf
                @method("DELETE")
                <input type="submit" value="Eliminar">
            </form>
            </a>
    </div>
</div>