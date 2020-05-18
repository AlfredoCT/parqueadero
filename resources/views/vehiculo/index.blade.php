@extends('layouts.app', ['activePage' => 'vehiculos', 'titlePage' => __('Vehiculos')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('vehiculo.store') }}" autocomplete="off" class="form-horizontal">
            @csrf


            @if ($message = Session::get('exito'))
                  <div class="alert alert success">
                  <p style="color:#1cc35e"> {{$message}}</p>
                  </div>
            @endif

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Agregar Vehiculo') }}</h4>
                <p class="card-category">{{ __('información del vehiculo') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Cliente') }}</label>
                  <div class="col-sm-7">
                    <div class="input-field">
                      <select name="idcliente" type="text" value="" required="true">
                        <option value="" disabled selected>Seleccionar Cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Cupo') }}</label>
                  <div class="col-sm-7">
                    <div class="input-field">
                      <select name="idcupo" type="text" value="" required="true">
                        <option value="" disabled selected>Seleccionar Cupo</option>
                        @foreach ($cupos as $cupo)
                            <option value="{{$cupo->id}}">{{$cupo->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Placa') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="placa" id="input-name" type="text" placeholder="{{ __('Placa') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tipo de Vehiculo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="tipovehiculo" id="input-name" type="text" placeholder="{{ __('MOTO/CARRO') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Hora de Entrada') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="horaentrada" id="input-name" type="text" placeholder="{{ __('Hora de Entrada') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row"> <!--importante-->
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Vehiculos Parqueados</h4>
                  <p class="card-category"> Esta tabla es para ver a los vehiculos en el parqueadero</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="">
                        <th>
                          ID
                        </th>
                        <th>
                          Cupos
                        </th>
                        <th>
                          Clientes
                        </th>
                        <th>
                          Placa
                        </th>
                        <th>
                          Tipo de Vehiculo
                        </th>
                        <th>
                          Hora de entrada
                        </th>
                        <th>
                          Acciones
                        </th>
                      </thead>
                      <tbody>
                        @foreach ($vehiculo as $vehiculo)
                        <tr>
                          <td>{{$vehiculo -> id}}</td>
                          <td>{{$vehiculo -> idcupo}}</td>
                          <td>{{$vehiculo -> idcliente}}</td>
                          <td>{{$vehiculo -> placa}}</td>
                          <td>{{$vehiculo -> tipovehiculo}}</td>
                          <td>{{$vehiculo -> horaentrada}}</td>
                          <td>
                            <form action="{{route('vehiculo.destroy', $vehiculo->id)}}" method="post">
                              <a href="{{route('vehiculo.show', $vehiculo->id)}}" class="btn btn-info">Ver</a>
                              <a href="{{route('vehiculo.edit', $vehiculo->id)}}" class="btn btn-primary">Editar</a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection