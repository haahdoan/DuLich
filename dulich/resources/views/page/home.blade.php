<!DOCTYPE html>
<html lang="en">
<head>
  <title>home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    @if(Auth::user())
      <li><a href="nguoidung"><span class="glyphicon glyphicon-user"></span> <?php $user=Auth::user(); echo ($user->name); ?> </a></li>
      <li><a href="dang-xuat"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    @else
      <li><a href="dang-ki"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="dang-nhap"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    @endif
    </ul>
  </div>
</nav>
</body>
</html>
