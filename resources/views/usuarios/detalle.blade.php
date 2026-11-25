@extends('../layouts/app')
<!--Principal-->
@section('contenido')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Usuarios</h2>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- data table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h2><a href="{{ route('alta_usuario') }}"><button type="button" class="btn btn-success float-right">+ Registrar Usuario</button></a></h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>{{$usuario->nombre}}</th>
                                        <th>{{$usuario->usuario}}</th>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->password}}</td>
                                        <td>
                                            <a href="{{route('editar_usuario', $usuario->id)}}"><button type="button" class="btn btn-primary">Modificar</button></a>
                                            <form action="{{route('eliminar_usuario',$usuario->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="card-header">
                                <h2><a href="{{ route('usuarios') }}"><button type="button" class="btn btn-danger float-right">Regresar</button></a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end data table  -->
            <!-- ============================================================== -->
        </div>
    </div>
@endsection