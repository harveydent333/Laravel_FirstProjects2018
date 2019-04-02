@extends('admin')
@section('content')
<title>Профиль пользователя </title>
<h3>Пользователь ID: {{$myData->id}} </h3> Name: {{$myData->name}} <br>
E-Mail: {{$myData->email}} <br> Role ID: {{$myData->id_roles}} <br>
 Name Role: {{$myData->role->role}}
@endsection
