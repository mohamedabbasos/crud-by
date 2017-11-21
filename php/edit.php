<?php

  require 'conn.php'; 

  $id = $_GET['id'];

  $sql = "SELECT * FROM items WHERE id = '$id'";

  $result = $conn -> query($sql);

  $item = $result -> fetch_assoc();

?>
<html>
  <head>
    <title>Update item</title>
  </head>
  <body>
    <h1>Update item</h1>
    <form action="update.php" method="post">
      <input name="id" type="hidden" value="<?php echo $item['id']; ?>">
      
      Name: <input name="name" value="<?php echo $item['name']; ?>">  
      <br><br>
      
      Details: <input name="details"value="<?php echo $item['details']; ?>">
      <br><br>

      <input type="submit" value="Update item">
    </form>
  </body>
</html>