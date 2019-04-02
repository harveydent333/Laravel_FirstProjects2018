@extends('layout')
@section('content')
<title> Админ панель </title>
@if (session('message'))
<div class="alert alert-success">
  {{session('message')}}
</div>
@endif

<h3 align="center"> Таблица пользователей </h3>
<a href="{{route('units.create')}}" class="btn btn-primary">Создать</a>
<table class="table">
  <thead>
    <tr>
      <th >ID_Пользователя</th>
      <th >Название</th>
      <th >E-mail</th>
      <th>ID_Роли</th>
    </tr>
  </thead>
  <tbody>
    @foreach($myData as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td >{{$data->name}}</td>
      <td>{{$data->email}}</td>
      <td >{{$data->id_roles}}</td>
      <td>
        <div class='col-xs-2'>
        <a href="{{route('units.show',$data->id)}}" class="btn btn-info">Просмотр</a>
      </div>
      <div class='col-xs-2'>
          <a href="{{route('units.edit',$data->id)}}" class="btn btn-warning">Изменить</a>
          </div>
          <div class='col-xs-2'>
            {!! Form::open(['method'=>'DELETE',
                'route'=>['units.delete',$data->id]]) !!}
            <button class="btn btn-danger">Удалить</a>
            {!! Form::close() !!}
            </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<BR><hR>
  <b><p align="left" > Таблица ролей </p></b>
  <hr>
<table width="350" border="1">
  <thead>
    <tr>
      <th>ID_Ролей</th>
      <th>Роль</th>
    </tr>
  </thead>
  <tbody>
    @foreach($myRole as $data)
    <tr>
      <th><center>{{$data->id_roles}}</center></th>
      <td>{{$data->role}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
