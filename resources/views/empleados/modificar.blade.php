@extends('../layouts/app')
@section('contenido')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title"> Modifica Empleado</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Modifica Empleado</h5>
                    <div class="card-body">
                        <form action="{{route('empleado_editado')}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}                                 
                            <input type="text" required="" placeholder="Ingresa tu Nombre"  name="id" class="form-control" value="{{$empleado->id}}">
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Nombre</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" placeholder="Ingresa tu Nombre"  name="nombre" class="form-control" value="{{$empleado->nombre}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">A. Paterno</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" placeholder="Ingresa el Apellido Paterno"  name="apellido_paterno" class="form-control" value="{{$empleado->apellido_paterno}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">A. Materno</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" placeholder="Ingresa el Apellido Materno"  name="apellido_materno" class="form-control" value="{{$empleado->apellido_materno}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Telefono</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" placeholder="Ingresa el Telefono"  name="telefono" class="form-control" value="{{$empleado->telefono}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right">Direccion</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input type="text" required="" placeholder="Ingresa la Direccion"  name="direccion" class="form-control" value="{{$empleado->direccion}}">
                                </div>
                            </div>
                            <div class="form-group row text-right">
                                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                    <button type="submit" class="btn btn-space btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('empleados') }}"><button class="btn btn-space btn-secondary">Cancelar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection