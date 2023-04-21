<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    {{-- enlace Boostrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <title>To-do list application</title>
</head>
<body>
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex p-3">
        <a class="navbar-brand" href="/">Tareas</a> 
        <i class="fa-solid fa-clipboard-list text-light"></i>
    </nav>

      <div class="contain d-flex  align-items-center justify-content-center flex-column">
        <div class="d-flex tittle">
            <h1>TO-DO LIST</h1>
            <i class="fa-solid fa-clipboard-list h1"></i>
        </div>
        <div class="tabla-contain d-flex flex-column align-items-end">
            <a href="#"><button type="button" class="btn btn-success btn-size" data-bs-toggle="modal" data-bs-target="#AddModal">
              <i class="fa-solid fa-user-plus text-light"></i></button></a>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Nombre del usuario asignado</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Fecha de vencimiento</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                        @php $id=1; @endphp
                        @foreach($usuarios as $item)
    
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->descripcion}}</td>
                          <td>{{ $item->nickname }}</td>
                          <td> {{$item->fecha_inicio}}</td>
                          <td>{{ $item->fecha_final }}</td>



                        {{-- Edit button --}}
                          
                          <td><a href="{{ url() }}""><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="fa-regular fa-pen-to-square"></i></button></a></td>
                          <td>
                              <form method="POST" action="{{ url('aplication',[row]) }} ">
                                @method("delete");
                                @csrf //te protege de ataques - genera un toker 
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal"><i class="fa-solid fa-trash-can"></i></button>

                              </form>
                          </td>

                        @endforeach

                      <!-- Modal for edit info-->
                      <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                  <label for="floatingInput">Nombre</label>
                                </div>
                                <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                  <label for="floatingInput">Descripción</label>
                                </div>
                                <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                  <label for="floatingInput">Nickname</label>
                                </div>
                                <div class="form-floating mb-3">
                                  <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
                                  <label for="floatingInput">Fecha de inicio</label>
                                </div>
                                <div class="form-floating mb-3">
                                  <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com">
                                  <label for="floatingInput">Fecha de vencimiento</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>


                       <!-- Modal for delete info-->
                      <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex flex-column align-items-center">
                                <h3>¿Está seguro de eliminar los datos?</h3>
                                <button type="button" class="btn btn-danger">Eliminar</button>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>



                      
                      <!-- Modal for Add info-->
                      
                        <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form id="frmUsuarios" action="{{ url('/aplication') }}" method="POST">
                                  @csrf 

                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="nombre" id="nombre">
                                    <label for="floatingInput">Nombre</label>
                                  </div>

                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="descripcion" id="descripcion">
                                    <label for="floatingInput">Descripción</label>
                                  </div>

                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="nickname" id="nickname">
                                    <label for="floatingInput">Nickname</label>
                                  </div>

                                  <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingInput" name="fecha_inicio" id="fecha_inicio">
                                    <label for="floatingInput">Fecha de inicio</label>
                                  </div>

                                  <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingInput" name="fecha_final" id="fecha_final">
                                    <label for="floatingInput">Fecha de vencimiento</label>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>

                      

                  </tr>
                </tbody>
              </table>
        </div>
      </div>
      

    {{-- enlaces boostrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/aaa255130f.js" crossorigin="anonymous"></script>
</body>
</html>