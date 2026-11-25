@extends('../layouts/app')

@section('contenido')

  <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Producto</h2>
                        
                        </div>
                    </div>
                </div>
             
                <div class="row">
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                        <div class="card">

                   
                            <div class="card-header">
                               <h2><a href="{{ route('alta_producto') }}"><button type="button" class="btn btn-success float-right">+ Registrar Producto</button></a></h2>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered" style="width:100%">
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
                                               
    
                                            <tr>
                                              
                                              <th>{{$producto->producto}}</th>
                                               <th>{{$producto->serie}}</th>
                                            <th>{{$producto->caracteristicas}}</th>
                                            <th>{{$producto->falla}}</th>
                                            <td>{{$producto->cantidad}}</td>
                                            <td>{{$producto->precio}}</td>
                                             <td>
    
         

          <a href="{{route('producto_editar',$producto->id)}}"><button type="button" class="btn btn-primary">Modificar</button></a>
          <form action="{{route('producto_eliminar',$producto->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
            
   
          </td>
                                        
                                             </tr>
                                    
                                        </tbody>
                                    </table>
                                       <div class="card-header">
                               <h2><a href="{{ route('productos') }}"><button type="button" class="btn btn-danger float-right">Regresar</button></a></h2>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

  
@endsection