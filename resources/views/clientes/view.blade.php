@extends('layouts.app', ['activePage' => 'clientes', 'titlePage' => __('ver cliente')])

@section('content')

<br><br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0"> Cliente</h4>
                        <p class="card-category"> Esta tabla muestra el cliente seleccionado</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead class="">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Tipo de Documento
                                    </th>
                                    <th>
                                        Numero de Documento
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Apellido
                                    </th>
                                    <th>
                                        Telefono
                                    </th>

                                 </thead>

                                 <tbody>
                                    <tr>
                                        <td>{{$clientes->id}}</td>
                                        <td>{{$clientes->tipodocumento}}</td>
                                        <td>{{$clientes->numerodocumento}}</td>
                                        <td>{{$clientes->nombre}}</td>
                                        <td>{{$clientes->apellido}}</td>
                                        <td>{{$clientes->telefono}}</td>
                                    
                                    </tr>
                                </tbody>

                            </table>
                            <a href="{{route('clientes.index')}}"><button class="btn btn-info">Atras</button>
                        </div>
                    </div>
                </div>
            </div>    
        </div> 
    </div>
</div>
@endsection