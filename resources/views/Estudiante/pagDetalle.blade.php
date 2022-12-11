@extends('pagPlantilla')

@section('titulo')
@endsection

@section('seccion')

  <center><h3 style="color:#ff2d00; font-weight:bolder"> Detalle del Estudiante</h3></center>
   <p style = "font-weight:bolder">Id: {{ $xDetAlumnos -> id }}</p>
   <p style = "font-weight:bolder">Código: {{ $xDetAlumnos -> codEst }}</p>
   <p style = "font-weight:bolder">Apellidos y Nombres: {{ $xDetAlumnos -> apeEst }} , {{ $xDetAlumnos -> nomEst }} </p>
   <p style = "font-weight:bolder">Fecha Nacimiento: {{ $xDetAlumnos -> fnaEst }}</p>
   <p style = "font-weight:bolder">Turno: {{ $xDetAlumnos -> turMat }}</p>
   <p style = "font-weight:bolder">Semestre: {{ $xDetAlumnos -> semMat }}</p>
   <p style = "font-weight:bolder">Estado de matricula: {{ $xDetAlumnos -> estMat }}</p>

    

@endsection
