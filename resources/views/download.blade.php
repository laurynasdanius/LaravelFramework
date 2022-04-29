@extends('DI.note.layout')

@section('content')
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Rodomas pavadinimas</th>
      <th scope="col">Failo kelias</th>
      <th scope="col">Parsisiūsti</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($files as $file)    
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$file->rodomas_pavadinimas}}</td>
      <td><a href="{{'public/'.$file->path}}"   download>{{'public/'.$file->path}}</a></td>
      <td><a href="get/{{$file->koduotas_pavadinimas}}">Parsisiusti</a></td>
      
    </tr>
    
    @endforeach
  </tbody>
</table>     
 

@endsection 