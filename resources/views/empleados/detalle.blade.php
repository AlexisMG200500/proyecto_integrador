@extends('../layouts/app')
@section('contenido')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Empleados</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><a href="{{ route('alta_empleado') }}"><button type="button" class="btn btn-success float-right">+ Registrar Empleado</button></a></h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>A. Paterno</th>
                                        <th>A. Materno</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>{{$empleado->id}}</th>
                                        <th>{{$empleado->nombre}}</th>
                                        <th>{{$empleado->apellido_paterno}}</th>
                                        <td>{{$empleado->apellido_materno}}</td>
                                        <td>{{$empleado->telefono}}</td>
                                        <td>{{$empleado->direccion}}</td>
                                        <td>
                                            <a href="{{route('editar_empleado',$empleado->id)}}"><button type="button" class="btn btn-primary">Modificar</button></a>
                                            <form action="{{route('eliminar_empleado',$empleado->id)}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-header">
                                <h2><a href="{{ route('empleados') }}"><button type="button" class="btn btn-danger float-right">Regresar</button></a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection