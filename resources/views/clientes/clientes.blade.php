@extends('../layouts/app')
@section('contenido')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Clientes</h2>
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
                        <h2>
                            <a href="{{route('alta_cliente')}}">
                                <button type="button" class="btn btn-success float-right">+ Registrar Cliente</button>
                            </a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>A. Paterno</th>
                                        <th>A. Materno</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Dirección</th>
                                        <th>Operaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                    <tr>
                                        <th>{{$cliente->nombre}}</th>
                                        <th>{{$cliente->apellido_paterno}}</th>
                                        <td>{{$cliente->apellido_materno}}</td>
                                        <td>{{$cliente->email}}</td>
                                        <td>{{$cliente->telefono}}</td>
                                        <td>{{$cliente->direccion}}</td>
                                        <td>
                                            <a href="{{route('detalle_cliente',$cliente->id)}}"><button type="button" class="btn btn-secondary">Ver</button></a>
                                            <a href="{{route('modificar_cliente',$cliente->id)}}"><button type="button" class="btn btn-primary">Modificar</button></a>
                                            <form action="{{route('eliminar_cliente',$cliente->id)}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}                                                
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{route('pdf_clientes')}}"><button type="button" class="btn btn-primary">Generar reporte PDF</button></a> <br>
                            <a href="{{route('clientes_export')}}"><button type="button" class="btn btn-warning">Generar reporte EXCEL</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection