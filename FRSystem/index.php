<?php include('server.php');?>
<?php
  if(isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "select * from info where id = $id");

    if(mysqli_num_rows($record) == 1)
    {
      $n = mysqli_fetch_array($record);
      $name = $n['name'];
      $contact = $n['contact'];
      $email = $n['email'];
      $address = $n['address'];
      $dateFlight = $n['dateFlight'];
      $destination = $n['destination'];
      $class = $n['class'];
      $totalPrice = $n['totalPrice'];
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel = "stylesheet" href = "css/indexStyle.css">
</head>
<body>
  <div class = "header">
    <img src="img/logo.png" alt="" id="logo">
    <h2>Flight Reservation System</h2>
  </div>

  <?php $results = mysqli_query($db, "select * from info");?>

  <div class = "container">
    <form action="server.php" method = "post">
    <input type="hidden" name = "id" value = "<?php echo $id; ?>">
      <div class = "left">
        <label for="">Name</label>
        <input type="text" name = "name" value = "<?php echo $name; ?>">
        <label for="">Contact</label>
        <input type="text" name = "contact" value = "<?php echo $contact; ?>">
        <label for="">Email</label>
        <input type="text" name = "email" value = "<?php echo $email; ?>">
        <label for="">Address</label>
        <input type="text" name = "address" value = "<?php echo $address; ?>">
      </div>
      <div class="right">
        <label for="">Date of Flight</label>
        <input type="text" name = "dateFlight" value = "<?php echo $dateFlight; ?>">
        <label for="destination">Destination</label>
        <select name="destination" id="destination" value = "" onchange="updateTotalPrice()">
            <option value="" data-price="0">Choose an option</option>
            <option value="Cavite - Manila" data-price="250">Cavite - Manila</option>
            <option value="Cavite - Tagaytay" data-price="300">Cavite - Tagaytay</option>
            <option value="Cavite - Boracay" data-price="1500">Cavite - Boracay</option>
            <option value="Cavite - Cebu" data-price="2500">Cavite - Cebu</option>
        </select>
        <label for="class">Class</label>
        <select name="class" id="class" value = "" onchange="updateTotalPrice()">
            <option value="" data-price="0">Choose an option</option>
            <option value="Economy" data-price="1500">Economy</option>
            <option value="Business" data-price="2500">Business</option>
        </select>
        <label for="totalPrice">Total Price</label>
        <input type="text" name="totalPrice" id="totalPrice" value ="<?php echo $totalPrice; ?>" readonly>
      </div>
      
      <div class="bottom">
      <?php if ($update == true): ?>
        <button type = "submit" name = "update" class = "btn">update</button>
      <?php else: ?>
        <button type = "submit" name = "save" class = "btn">save</button>
      <?php endif ?>
      </div>
    </form>
  </div>

  <div class="table">
  <table>
      <thead>
        <tr class = "head">
          <th>Name</th>
          <th>Contact</th>
          <th>Email</th>
          <th>address</th>
          <th>Date of Flight</th>
          <th>Destination</th>
          <th>Class</th>
          <th>Price</th>
          <th colspan ="2" style ="text-align: center;">Action</th>
        </tr>
      </thead>
      <?php while($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['contact']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['address']; ?></td>
          <td><?php echo $row['dateFlight']; ?></td>
          <td><?php echo $row['destination']; ?></td>
          <td><?php echo $row['class']; ?></td>
          <td><?php echo $row['totalPrice']; ?></td>
          <td>
            <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
          </td>
          <td>
            <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffff00" fill-opacity="1" d="M0,192L48,208C96,224,192,256,288,234.7C384,213,480,139,576,128C672,117,768,171,864,202.7C960,235,1056,245,1152,229.3C1248,213,1344,171,1392,149.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>

  <script>
    function updateTotalPrice() {
            var dropdown1 = document.getElementById("destination");
            var selectedOption1 = dropdown1.options[dropdown1.selectedIndex];
            var price1 = parseInt(selectedOption1.dataset.price);
            
            var dropdown2 = document.getElementById("class");
            var selectedOption2 = dropdown2.options[dropdown2.selectedIndex];
            var price2 = parseInt(selectedOption2.dataset.price);
            
            var totalPrice = price1 + price2;
            document.getElementById("totalPrice").value = totalPrice;
        }
  </script>
</body>
</html>