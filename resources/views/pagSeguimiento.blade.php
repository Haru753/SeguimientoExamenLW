@extends('pagPlantilla')

@section('titulo')
  <center><h1 class="display-4" style="font-weight:bolder">Ingresar:</h1><center>
@endsection

@section('seccion')

@if(session('msj'))
       <div class="alert alert-success">
           {{ session('msj')}}
    </div>
    @endif
<form action="{{ route('Seguimiento.xSegRegistrar')}}" method="post" class="d-grid pag-2">
   @csrf
   @error('idSeg')
      <div class="alert alert-danger">
           El codigo de Seguimiento es requerido
      </div>
   @enderror

   @error('idEst')
      <div class="alert alert-danger">
           El codigo del Estudiante tambien es requerido
      </div>
   @enderror

   @error('traAct')
      <div class="alert alert-danger">
           Falta inresar Trabajo Actual
      </div>
   @enderror

   @error('ofiAct')
      <div class="alert alert-danger">
           Falta ingresar Oficio Actual
      </div>
   @enderror

   @error('satEst')
      <div class="alert alert-danger">
           Falta ingresar Satisfacción Estudiantil
      </div>
   @enderror

   @error('fecSeg')
      <div class="alert alert-danger">
           Falta ingresar Fecha de Seguimiento
      </div>
   @enderror

   @error('estSeg')
      <div class="alert alert-danger">
           Falta ingresar el estado de Seguimiento
      </div>
   @enderror




  <input type="int" name="idSeg" placeholder="Codigo de seguimiento" value="{{ old('idSeg')}}" class="form-control mb-2"> 
  <input type="int" name="idEst" placeholder="Codigo del Estudiante" value="{{ old('idEst')}}" class="form-control mb-2">

  <select name="traAct" class="form-control mb-2">
      <option value="">Trabaja Actualmente</option>
      <option value="Si">Si</option>
      <option value="No">No</option>
  </select>

  <input type="text" name="ofiAct" placeholder="Oficio Actual" value="{{ old('ofiAct')}}" class="form-control mb-2">

  <select name="satEst" class="form-control mb-2">
      <option value="">Satisfacción Estudiantil</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
  </select>

  <input type="date" name="fecSeg" placeholder="Fecha de Seguimiento" value="{{ old('fecSeg')}}" class="form-control mb-2">



  <select name="estSeg" class="form-control mb-2">
    <option value="">Seleccione Estado</option>
    <option value="0">Inactivo</option>
    <option value="1">Activo</option>   
  </select>

  <button class="btn btn-primary" type="submit" style="font-weight:bolder">Agregar</button>
  </form>

  <hr>
  <center><h3 style="color:#ff2d00; font-weight:bolder">Lista de Seguimiento</h3></center>
        <table class="table">
        <thead class="table-dark">
            <tr>
            <th scope="col">Id </th>
            <th scope="col">Codigo de Seguimiento</th>
            <th scope="col">Codigo del Estudiante</th>
            <th scope="col">Trabaja Actualmente</th>
            <th scope="col">Oficio Actual</th>
            <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($xSegAlumnos as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>

                <td>{{ $item->idSeg }}</td>

                <td>
                    <a href="{{ route('Seguimiento.xSegDetalle',$item->id) }}">
                    {{ $item->idEst }}
                    </a>
                </td>
                <td>{{ $item->traAct }}</td>
                
                <td>{{ $item->ofiAct}}</td>
                
                
                <td>

                    <form action="{{ route('Seguimiento.xSegEliminar',$item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>

                    <a  class="btn btn-warning btn-sm" href="{{ route('Seguimiento.xSegActualizar',$item->id) }}">
                    A
                    </a>
                </td>

            </tr>

            @endforeach
        </tbody>
        </table>

{{ $xSegAlumnos->links() }}    

@endsection
