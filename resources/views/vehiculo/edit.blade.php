@extends('layouts.app', ['activePage' => 'vehiculos', 'titlePage' => __('Editar Vehiculos')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{route('vehiculo.update', $vehiculo->id)}}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('PUT')


            @if ($message = Session::get('exito'))
                  <div class="alert alert success">
                  <p style="color:#1cc35e"> {{$message}}</p>
                  </div>
            @endif

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Editar Vehiculo') }}</h4>
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
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}"
                            @if ($vehiculo -> $cliente == $cliente->id)
                                selected
                            @endif>
                            {{$cliente->nombre}}</option>
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
                        @foreach ($cupos as $cupo)
                            <option value="{{$cupo->id}}"
                            @if ($vehiculo -> $cupo == $cupo->id)
                                selected
                            @endif>
                                {{$cupo->nombre}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Placa') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="placa" id="input-name" type="text" placeholder="{{ __('Placa') }}" value="{{$vehiculo->placa}}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tipo de vehiculo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="tipovehiculo" id="input-name" type="text" placeholder="{{ __('Tipo de vehiculo') }}" value="{{$vehiculo->tipovehiculo}}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="horaentrada" id="input-name" type="text" placeholder="{{ __('Hora de Entrada') }}" value="{{$vehiculo->horaentrada}}" required="true" aria-required="true"/>
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
    </div>
  </div>
@endsection