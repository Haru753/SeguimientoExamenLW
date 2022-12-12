@extends('pagPlantilla')

@section('titulo')
@endsection

@section('seccion')

  <center><h3 style="color:#ff2d00; font-weight:bolder"> Detalle del Seguimiento</h3></center>
   <p style = "font-weight:bolder">Id: {{ $xDetSegAlumnos -> id }}</p>
   <p style = "font-weight:bolder">Código Seguimiento: {{ $xDetSegAlumnos -> idSeg }}</p>
   <p style = "font-weight:bolder">Codigo Estudiante: {{ $xDetSegAlumnos -> idEst }}</p>
   <p style = "font-weight:bolder">Trabajo Actual: {{ $xDetSegAlumnos -> traAct }}</p>
   <p style = "font-weight:bolder">Oficio Actual: {{ $xDetSegAlumnos -> ofiAct }}</p>
   <p style = "font-weight:bolder">Satisfaccion Estudiantil: {{ $xDetSegAlumnos -> satEst }}</p>
   <p style = "font-weight:bolder">Fecha de seguimiento: {{ $xDetSegAlumnos -> fecSeg }}</p>
   <p style = "font-weight:bolder">Estado de seguimiento: {{ $xDetSegAlumnos -> estSeg }}</p>

    

@endsection
