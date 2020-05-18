@extends('layouts.app', ['activePage' => 'vehiculos', 'titlePage' => __('ver vehiculos')])

@section('content')

<br><br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0"> Vehiculo</h4>
                        <p class="card-category"> Esta tabla muestra el vehiculo seleccionado</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead class="">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Clientes
                                    </th>
                                    <th>
                                        Cupos
                                    </th>
                                    <th>
                                        Placa
                                    </th>
                                    <th>
                                        Tipo de Vehiculo
                                    </th>
                                    <th>
                                        Hora Entrada
                                    </th>

                                 </thead>

                                 <tbody>
                                    <tr>
                                        <td>{{$vehiculo->id}}</td>
                                        <td>{{$vehiculo->cliente}}</td>
                                        <td>{{$vehiculo->cupo}}</td>
                                        <td>{{$vehiculo->placa}}</td>
                                        <td>{{$vehiculo->tipovehiculo}}</td>
                                        <td>{{$vehiculo->horaentrada}}</td>
                                    
                                    </tr>
                                </tbody>

                            </table>
                            <a href="{{route('vehiculo.index')}}"><button class="btn btn-info">Atras</button>
                        </div>
                    </div>
                </div>
            </div>    
        </div> 
    </div>
</div>
@endsection