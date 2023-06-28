<?php
  $db = mysqli_connect('localhost', 'root', '','hci');

  $name = "";
  $contact = "";
  $email = "";
  $address = "";
  $dateFlight = "";
  $destination = "";
  $class = "";
  $totalPrice = "";
  $id = 0;
  $update = false;

  if(isset($_POST['save']))
  {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $dateFlight = $_POST['dateFlight'];
    $destination = $_POST['destination'];
    $class = $_POST['class'];
    $totalPrice = $_POST['totalPrice'];

    mysqli_query($db, "insert into info (name,contact,email,address,dateFlight,destination,class,totalPrice) VALUES ('$name','$contact','$email','$address','$dateFlight','$destination','$class','$totalPrice')");
    header('location:index.php');
  }

  if(isset($_POST['update']))
  {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $dateFlight = $_POST['dateFlight'];
    $destination = $_POST['destination'];
    $class = $_POST['class'];
    $totalPrice = $_POST['totalPrice'];

    mysqli_query($db, "update info SET name='$name', contact='$contact', email='$email', address='$address', dateFlight='$dateFlight', destination='$destination', class='$class', totalPrice='$totalPrice' where id=$id");
    header('location:index.php');
  }
  if(isset($_GET['del']))
	{
		$id = $_GET['del'];
		$record = mysqli_query($db, "delete from info where id = $id");
		header('location:index.php');	
	}
?>