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
                <div class="box-body">
                    <form name="search" action="#" method="GET">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-search"></i></span>
                            <input type="text" class="form-control" name="criterio" placeholder="Ingresa un Criterio de Búsqueda...">
                            <span class="input-group-btn">
                                <input type="submit" class="pull-right btn btn-info" value="Buscar Ahora">
                            </span>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2><a href="{{route('alta_empleado')}}"><button type="button" class="btn btn-success float-right">+ Registrar empleado</button></a></h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="table table-striped table-bordered" style="width:100%">
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
                                    @foreach ($empleados as $empleado)
                                    <tr>
                                        <th>{{$empleado->id}}</th>
                                        <th>{{$empleado->nombre}}</th>
                                        <th>{{$empleado->apellido_paterno}}</th>
                                        <td>{{$empleado->apellido_materno}}</td>
                                        <td>{{$empleado->telefono}}</td>
                                        <td>{{$empleado->direccion}}</td>
                                        <td>
                                            <a href="{{route('detalle_empleado',$empleado->id)}}"><button type="button" class="btn btn-secondary">Ver</button></a>
                                            <a href="#"><button type="button" class="btn btn-primary">Modificar</button></a>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="#"><button type="button" class="btn btn-primary">Generar reporte PDF</button></a>
                            <a href="#"><button type="button" class="btn btn-warning">Generar reporte EXCEL</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection