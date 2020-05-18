@extends('layouts.app', ['activePage' => 'cupos', 'titlePage' => __('ver cupo')])

@section('content')

<br><br>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title mt-0"> Cupo</h4>
                        <p class="card-category"> Esta tabla muestra el cupo seleccionado</p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">

                                <thead class="">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Estado
                                    </th>

                                 </thead>

                                 <tbody>
                                    <tr>
                                        <td>{{$cupos->id}}</td>
                                        <td>{{$cupos->nombre}}</td>
                                        <td>{{$cupos->estado}}</td>
                                    
                                    </tr>
                                </tbody>

                            </table>
                            <a href="{{route('cupos.index')}}"><button class="btn btn-info">Atras</button>
                        </div>
                    </div>
                </div>
            </div>    
        </div> 
    </div>
</div>
@endsection