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
           El codigo es requerido
      </div>
   @enderror

  <input type="text" name="idSeg" placeholder="Código de seguimiento" value="{{ old('idSeg')}}" class="form-control mb-2"> 
  <input type="text" name="idEst" placeholder="Código de Estado" value="{{ old('idEst')}}" class="form-control mb-2">

  <select name="traAct" class="form-control mb-2">
      <option value="">Seleccione Trabajo Actual</option>
      <option value="1">Si</option>
      <option value="2">NO</option>
  </select>

  <input type="text" name="ofiAct" placeholder="Oficio Actual" value="{{ old('ofiAct')}}" class="form-control mb-2">

  <select name="satEst" class="form-control mb-2">
      <option value="">Seleccione Satisfacción Estudiantil</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
  </select>

  <input type="text" name="fecSeg" placeholder="Fecha de Seguimiento" value="{{ old('fecSeg')}}" class="form-control mb-2">



  <select name="estSeg" class="form-control mb-2">
    <option value="">Seleccione..</option>
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
            <th scope="col">Codigo Seguimiento</th>
            <th scope="col">Codigo  Estudiante</th>
            <th scope="col">Trabajo Actual</th>
            <th scope="col">Oficio Actual</th>
            <th scope="col">Editar $ Eliminar</th>
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
