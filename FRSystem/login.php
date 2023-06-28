<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "css/login.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Varela+Round" />
  <title>Document</title>
</head>
<body>
  <div class = "header">
    <img src="img/logo.png" alt="" id="logo">
    <h2>Flight Reservation System</h2>
  </div>
  <div class="container">
    <form action="" class="form">
      <h1>SIGN IN</h1>
      <input type="text" name = "username" class = "box" placeholder ="Enter Username" id = "user">
      <input type="password" name = "password" class = "box" placeholder ="Enter Password" id = "pass">
      <input type="submit" value = "SIGN IN" id="submit" onclick='f1()'>
    </form>
    <div class="side">
      <!--<img src="img/side.png" alt="">-->
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,80C384,64,480,64,576,64C672,64,768,64,864,96C960,128,1056,192,1152,192C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

  <script>
    function f1()
    {
      var user = document.getElementById("user").value;
      var password = document.getElementById("pass").value;
      
      if(user == "admin" && password == "123")
      {
        alert("You have successfully log in");
        window.open("index.php");
      }
      else if(user != "admin" && password != "123")
      {
        alert("Wrong Username and Password");
      }
      else if(user != "admin")
      {
        alert("Wrong Username");
      }
      else if(password != "123")
      {
        alert("Wrong Password");
      }
      else
      {
        alert("Wrong Email/Password");
      }
    }
  </script>
</body>
</html>