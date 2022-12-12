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
<form action="{{ route('Estudiante.xRegistrar')}}" method="post" class="d-grid pag-2">
   @csrf
   @error('codEst')
      <div class="alert alert-danger">
           El codigo es requerido
      </div>
   @enderror

  <input type="text" name="idSeg" placeholder="Código de seguimiento" value="{{ old('codEst')}}" class="form-control mb-2"> 
  <input type="text" name="idEst" placeholder="Código de Estado" value="{{ old('nomEst')}}" class="form-control mb-2">
  <input type="text" name="traAct" placeholder="Trabajo Actual" value="{{ old('apeEst')}}" class="form-control mb-2">
  <input type="text" name="ofiAct" placeholder="Oficio Actual" value="{{ old('apeEst')}}" class="form-control mb-2">
  <input type="text" name="satEst" placeholder="Satisfacción Estudiantil" value="{{ old('fnaEst')}}" class="form-control mb-2">
  <input type="text" name="fecEst" placeholder="Fecha de seguimiento" value="{{ old('fnaEst')}}" class="form-control mb-2">
  <input type="text" name="estSeg" placeholder="Estado de seguimiento" value="{{ old('fnaEst')}}" class="form-control mb-2">
  <select name="turMat" class="form-control mb-2">
      <option value="">Seleccione</option>
      <option value="1">Turno Dia</option>
      <option value="2">Turno Noche</option>
      <option value="3">Turno Tarde</option>
  </select>
  <select name="semMat" class="form-control mb-2">
      <option value="">Seleccione..</option>
      @for($i=1; $i < 7; $i++)
      <option value="{{$i}}">Semestre {{$i}}</option>
      @endfor
  </select>
  <select name="estMat" class="form-control mb-2">
    <option value="">Seleccione..</option>
    <option value="0">Inactivo</option>
    <option value="1">Activo</option>   
  </select>
  <button class="btn btn-primary" type="submit" style="font-weight:bolder">Agregar</button>
  </form>

  <hr>
  <center><h3 style="color:#ff2d00; font-weight:bolder">Lista de Alumnos</h3></center>
        <table class="table">
        <thead class="table-dark">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Codigo</th>
            <th scope="col">Apellidos y Nombres</th>
            <th scope="col">Semestre</th>
            <th scope="col">Editar</th>
            </tr>
        </thead>
        <tbody>
        @foreach($xAlumnos as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->codEst }}</td>
                <td>
                    <a href="{{ route('Estudiante.xDetalle',$item->id) }}">
                    {{ $item->apeEst }} , {{ $item->nomEst }}
                    </a>
                </td>
                <td>{{ $item->semMat }}</td>  
                <td>

                    <form action="{{ route('Estudiante.xEliminar',$item->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>

                    <a  class="btn btn-warning btn-sm" href="{{ route('Estudiante.xActualizar',$item->id) }}">
                    A
                    </a>
                    </td>
            </tr>

            @endforeach
        </tbody>
        </table>

{{ $xAlumnos->links() }}    

@endsection
