<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokemon App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
      body {
        background-image: url('https://i.redd.it/mnslf2y8hxab1.gif');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        height: 100vh;
        margin: 0;
      }
      .menu-fixed {
        position: fixed;
        top: 0;
        right: 0;
        max-width: 200px;
      }
      .card-custom {
        max-width: 250px;
        margin: 10px;
      }
      .modal-body input, .modal-body textarea {
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container mt-4 menu-fixed">
      <div class="card border-primary bg-white shadow-sm" style="font-family: 'Press Start 2P', cursive;">
        <div class="card-body p-2">
          <ul class="list-unstyled m-0">
            <li class="my-2 text-center" style="color: black;">POKEDEX</li>
            <li class="my-2 text-center" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="color: black;">AGREGAR</li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="container mt-4" style="max-width: 1290px;position: fixed; top: 0; left: 0;">
      <div class="card border-primary bg-white shadow-sm" style="font-family: 'Press Start 2P', cursive;">
        <div class="card-body p-2">
          <h5 class="text-center">Pokémons</h5>
          <hr>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($items as $pokemon)
            <div class="col">
                <div class="card mb-2" style="max-width: 600px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://i.pinimg.com/originals/32/eb/23/32eb230b326ee3c76e64f619a06f6ebb.png" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="card-title text-center">{{ $pokemon->name }}</h6>
                                <ul class="list-unstyled text-center">
                                    <li class="mb-2">
                                        <!-- Corregido el data-bs-target para que apunte al modal del Pokémon -->
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#Detalles{{ $pokemon->id }}">Detalles</button>
                                    </li>
                                    <li class="mb-2">
                                      <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#Editar{{$pokemon->id}}">Editar</button>                                    </li>
                                    <li class="mb-2">
                                        <button type="button" class="btn btn-sm btn-danger" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#Eliminar{{$pokemon->id}}" >Eliminar</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
          <div class="d-flex justify-content-start">
            {{$items->links()}}
          </div>
        </div>
      </div>
    </div>

    <div class="fixed-bottom">
      <div class="alert alert-secondary text-center mb-0" role="alert" style="border: 5px solid #1E90FF; border-radius: 15px; background-color: white; box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5); font-family: 'Press Start 2P', cursive;">
        ¡Bienvenido a la Pokédex, Entrenador! Explora, descubre y conoce a todos los Pokémon en tu aventura. ¡Es hora de capturarlos todos!
      </div>
    </div>

    <!-- Modificar el Pokémon -->
    @foreach ($items as $pokemon)
    <div class="modal fade" id="Editar{{ $pokemon->id }}" tabindex="-1" aria-labelledby="DetallesLabel{{ $pokemon->id }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body" style="font-family: 'Press Start 2P', cursive;">
            <form action="{{ route('update', $pokemon->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                  <label for="name" class="form-label">Nombre:</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ $pokemon->name }}" required>
              </div>
              <div class="mb-3">
                  <label for="type" class="form-label">Tipo:</label>
                  <input type="text" name="type" id="type" class="form-control" value="{{ $pokemon->type }}" required>
              </div>
              <div class="mb-1">
                  <label for="lp" class="form-label">Puntos De Vida:</label>
                  <input type="number" name="lp" id="lp" class="form-control" value="{{ $pokemon->lp }}" required>
              </div>
              <div class="mb-1">
                  <label for="evolutionPhase" class="form-label">No. De Evolución:</label>
                  <input type="number" name="evolutionPhase" id="evolutionPhase" value="{{ $pokemon->evolutionPhase }}" class="form-control" required>
              </div>
              <div class="d-grid gap-2">
                <button class="btn btn-outline-success" type="submit" style="font-family: 'Press Start 2P', cursive;">Actualizar Pokemon</button>
                <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button" style="font-family: 'Press Start 2P', cursive;">Cancelar Accion</button>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
<!-- Eliminar el Pokémon -->
@foreach ($items as $pokemon)
    <div class="modal fade" id="Eliminar{{ $pokemon->id }}" tabindex="-1" aria-labelledby="DetallesLabel{{ $pokemon->id }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <form action="{{ route('delete', $pokemon->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <h6 class="text-center" style="font-family: 'Press Start 2P', cursive;">Estas A Punto De Abandonar A <h6 style="color:blue;font-family: 'Press Start 2P', cursive;">{{$pokemon->name}}</h6> </h6>
              <div class="d-grid gap-2">
                <button class="btn btn-outline-danger" type="submit" style="font-family: 'Press Start 2P', cursive;">Abandonar Pokemon</button>
                <button class="btn btn-outline-primary" data-bs-dismiss="modal" type="button" style="font-family: 'Press Start 2P', cursive;">Cancelar Accion</button>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
<!-- Modales de Detalles de Pokémon -->
@foreach ($items as $pokemon)
<div class="modal fade" id="Detalles{{ $pokemon->id }}" tabindex="-1" aria-labelledby="DetallesLabel{{ $pokemon->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="DetallesLabel{{ $pokemon->id }}" style="font-family: 'Press Start 2P', cursive;">Estadisticas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="font-family: 'Press Start 2P', cursive;">
     <table class="table">
      <thead class="text-center">
        <tr>
          <th scope="col-2">{{$pokemon->name}}</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Tipo</th>
          <td>{{$pokemon->type}}</td>
        </tr>
        <tr>
          <th scope="row">Puntos De Vida</th>
          <td>{{$pokemon->lp}}</td>
        </tr>
        <tr>
          <th scope="row">Fase De Evolucion</th>
          <td>{{$pokemon->evolutionPhase}}</td>
        </tr>
      </tbody>
    </table>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- Crear -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body item-center" style="font-family: 'Press Start 2P', cursive;">
        <form action="{{ route('create') }}" method="POST" style="font-family: 'Press Start 2P', cursive;">
          @csrf
          @method('POST')
          <div class="mb-3">
              <label for="name" class="form-label" style="font-family: 'Press Start 2P', cursive;">Nombre:</label>
              <input type="text" name="name" id="name" class="form-control" required>
          </div>
          <div class="mb-3">
              <label for="type" class="form-label" style="font-family: 'Press Start 2P', cursive;">Tipo:</label>
              <input type="text" name="type" id="type" class="form-control" required>
          </div>
          <div class="mb-1">
              <label for="lp" class="form-label" style="font-family: 'Press Start 2P', cursive;">Puntos De Vida:</label>
              <input type="number" name="lp" id="lp" class="form-control" required>
          </div>
          <div class="mb-1">
              <label for="evolutionPhase" class="form-label" style="font-family: 'Press Start 2P', cursive;">No. Evolucion:</label>
              <input type="number" name="evolutionPhase" id="evolutionPhase" class="form-control" required>
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-outline-success" type="submit" style="font-family: 'Press Start 2P', cursive;">Añadir Pokemon</button>
            <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button" style="font-family: 'Press Start 2P', cursive;">Cancelar Accion</button>
          </div>
          
      </form>
      
      </div>
    </div>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
