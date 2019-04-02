@extends('admin')
@section('content')
<title> Редактирование пользователя</title>
  <div class="container">
    @if (session('message'))
    <div class="alert alert-success">
      {{session('message')}}
    </div>
    @endif

    @if(count($errors)>0)
                <div class="container">
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                      <li>{{$error}} </li>
                    @endforeach
                  </ul>
          </div>
        </div>
      </div>
    </div>
      @endif
    <h3>Edit users № - {{$myData->id}}</h3>
  <div class="row">
    <div class="col-md-12">

      {!! Form::open(['route' =>['units.updateProfil',$myData->id], 'method'=>'PUT'])!!}
              <h2 align="center" class="form-signin-heading">Добро пожаловать , {{$myData->name}} </h2>
      <table border="0">
                <tr>
                  <td> Ваше имя: </td>
            <td>  <input type="text" id="name" name="name" class=""  value="{{$myData->name}}"  ></td>
        </tr>
        <tr>
          <td>  Ваш email: </td>
        <td>      <input type="email" id="email" name="email" value="{{$myData->email}}"  ></td>
      </tr>
      <tr>
        <td>Роль пользователя:</td>
        <td>{{$myData->role->role}}</td>
      </tr>
      <tr>
        @if($myData->role->role != 'admin')
        <td>Изменить роль: </td>
        <td>  <select name="id_roles">
            @foreach($myRole as $role)
            <option value="{{$role->id_roles}}">{{$role->role}}</option>
            @endforeach
            </select></td>
        @else
        <td>  <select hidden name="id_roles">
            @foreach($myRole as $role)
            <option value="{{$role->id_roles}}">{{$role->role}}</option>
            @endforeach
            </select></td>
        @endif
      </tr>
      <tr>
        <td> Пароль</td>
        <td> <div class="b-container"><a class="" href="javascript:PopUpShow()">Изменить пароль</a> </div></td>
      </tr>
      <tr> <td><button type="submit" class="btn btn-info"> Изменить </button><td> </tr>
        <tr>
          <td> </td>
          <td> <input type="hidden" id="password" name="password" value="{{$myData->password}}" ></td>
        </tr>
        <tr>
          <td> </td>
          <td> <input type="hidden" id="password" name="password_confirmation" value="{{$myData->password}}" ></td>
        </tr>
      </table><br>
      {!! Form::close() !!}

      {!! Form::open(['route' =>['units.update_pass',$myData->id], 'method'=>'PUT'])!!}
      <div class="b-popup" id="popup1">
          <div class="b-popup-content">
            <center>Изменение пароля</center>
          <table border="0">
            <tr>
              <td> Ваш пароль:</td>
              <td> <input type="password" id="password" name="password" value="" ></td>
            </tr>
            <tr>
              <td> Подтвердите пароль:</td>
              <td> <input type="password" id="password_confirmation" name="password_confirmation" value="" ></td>
            </tr>
            <tr> <td><button type="submit" class="btn btn-info"> Изменить </button><td>
            <tb> <a class="btn btn-info" id="a" href="javascript:PopUpHide()">Отмена</a></tb></tr>
            <tr>
              <td>  </td>
        <td>  <input type="hidden" id="name" name="name" class=""  value="{{$myData->name}}"  ></td>
      </tr>
      <tr>
      <td>  </td>
      <td>      <input type="hidden" id="email" name="email" value="{{$myData->email}}"  ></td>
      </tr>
      <tr>
        <td><input type="hidden" id="role" name="id_roles" value="{{$myData->id_roles}}" readonly ></td>
      </tr>
          </table>


          </div>
      </div>
      {!! Form::close() !!}

          </div>

      @endsection
