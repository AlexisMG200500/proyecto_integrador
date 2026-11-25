@extends('../layouts/app')

@section('contenido')

  <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Productos</h2>
                        
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
                               <h2><a href="{{route('alta_producto')}}"><button type="button" class="btn btn-success float-right">+ Registrar Producto</button></a></h2>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Serie</th>
                                                <th>Caracteristica</th>
                                                <th>Falla</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($productos as $producto)
        
    
                                            <tr>
                                              <th>{{$producto->producto}}</th>
                                               <th>{{$producto->serie}}</th>
                                            <th>{{$producto->caracteristicas}}</th>
                                            <th>{{$producto->falla}}</th>
                                            <td>{{$producto->cantidad}}</td>
                                            <td>{{$producto->precio}}</td>
                                             <td>
    
        

            <a href="#"><button type="button" class="btn btn-secondary">Ver</button></a>
          <a href="#"><button type="button" class="btn btn-primary">Modificar</button></a>
            <button type="submit" class="btn btn-danger">Eliminar</button>
            
          </td>
                                        
                                             </tr>
                                              @endforeach
                                        </tbody>
                                    </table><br>
            <a href="#"><button type="button" class="btn btn-primary">Generar reporte PDF</button></a>
            <a href="#"><button type="button" class="btn btn-warning">Generar reporte EXCEL</button></a>
				</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

  
@endsection