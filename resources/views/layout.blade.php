<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<link href="pop.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="signin.css" rel="stylesheet">
  <script type="text/javascript"></script>
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
  <script>
    $(document).ready(function(){
        //Скрыть PopUp при загрузке страницы
        PopUpHide();
    });
    //Функция отображения PopUp
    function PopUpShow(){
        $("#popup1").show();
    }
    //Функция скрытия PopUp
    function PopUpHide(){
        $("#popup1").hide();
    }
</script>
<style>
a:link{
  color: black;
}
#a{
  color:white;
}
.b-container{
    width:200px;
    height:20px;
    margin:0px auto;
    padding:0px;
    font-size:18px;
    color: black;

}
.b-popup{
    width:80%;
    min-height:100%;
    background-color: rgba(10,0,0,0.5);
    overflow:hidden;
    position:fixed;
    top:-10px;
}
.b-popup .b-popup-content{
    margin:40px auto 0px auto;
    width:400px;
    height: 400px;
    padding:10px;
    background-color: #c5c5c5;
    border-radius:5px;
    box-shadow: 0px 0px 10px #000;
}
</style>
</head>
<body>
@yield('content')
<br><br><hr>
   <a href="{{route('home')}}" class="btn btn-warning">Вернуться на главную</a>
</body>
</html>
