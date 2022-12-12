@extends('pagPlantilla')

@section('titulo')
  <h1 class="display-4">Pagina Actualizar Seguimiento</h1>
@endsection

@section('seccion')

  <h3> Detalle </h3>
  @if(session('msj'))
       <div class="alert alert-success">
           {{ session('msj')}}
    </div>
    @endif
<form action="{{ route('Seguimiento.xSegUpdate', $xActSegAlumnos->id)}}" method="post" class="d-grid pag-2">
   @method('PUT')
   @csrf
   @error('idSeg')
      <div class="alert alert-danger">
           El codigo es requerido
      </div>
   @enderror

  <p>Codigo Seguimiento: </p><input type="text" name="idSeg" placeholder="Codigo Seguimiento" value="{{ $xActSegAlumnos->idSeg }}" class="form-control mb-2"> 
  <p>Codigo Estudiante: </p><input type="text" name="idEst" placeholder="Codigo Estudiante" value="{{ $xActSegAlumnos->idEst}}" class="form-control mb-2">
 
  <p>Trabajo Actual </p><select name="traAct" class="form-control mb-2">
      <option value="">Seleccione</option>
      <option value="1"@if ($xActSegAlumnos->traAct == 1) {{ "SELECTED" }} @endif) >SI (1)</option>
      <option value="2"@if ($xActSegAlumnos->traAct == 2) {{ "SELECTED" }} @endif) >NO (2)</option>
     
  </select>

  <p>Oficio Actual</p><input type="text" name="ofiAct" placeholder="Oficio Actual" value="{{ $xActSegAlumnos->ofiAct}}" class="form-control mb-2">

  <p>Satisfaccion Estudiantil </p><select name="satEst" class="form-control mb-2">
      <option value="">Seleccione</option>
      <option value="0"@if ($xActSegAlumnos->traAct == 0) {{ "SELECTED" }} @endif) >0 (Nada Satisfecho)</option>
      <option value="1"@if ($xActSegAlumnos->traAct == 1) {{ "SELECTED" }} @endif) >1 (Poco Satisfecho)</option>
      <option value="2"@if ($xActSegAlumnos->traAct == 2) {{ "SELECTED" }} @endif) >2 (Satisfecho)</option>
      <option value="3"@if ($xActSegAlumnos->traAct == 3) {{ "SELECTED" }} @endif) >3 (Muy satisfecho)</option>
     
  </select>


  <p>Fecha de Seguimiento: </p><input type="text" name="fecSeg" placeholder="Fecha de Seguimiento" value="{{ $xActSegAlumnos->fecSeg}}" class="form-control mb-2">
  


  <p>Estado de Seguimiento: </p><select name="estSeg" class="form-control mb-2">
    <option value="">Seleccione..</option>
    <option value="1"@if ($xActSegAlumnos->estSeg == 1){{ "SELECTED" }} @endif) >Activo</option>
    <option value="0"@if ($xActSegAlumnos->estSeg == 0){{ "SELECTED" }} @endif) >Inactivo</option>   
  </select>
  <button class="btn btn-warning" type="submit">Actualizar</button>
  </form>

    

@endsection
