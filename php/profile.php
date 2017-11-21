<?php 

  require 'conn.php';

  if (isset($_POST['id'])) {
    $id = $_POST['id'];
  } 

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  $sql = "SELECT * FROM items WHERE id = '$id'";
 
  $result = $conn->query($sql);

  $item = $result ->fetch_assoc();
?>

<html>
  <head>
    <title>Item profile</title>
  </head>
  <body> 
    <a href="index.php">Items list</a>
    <br><br>
    <table border="2">
      <tr>
        <td>Name:</td>
        <td> <?php  echo $item['name']; ?></td>
      </tr>
      <tr>
        <td>Details:</td>
        <td> <?php  echo $item['details']; ?></td>
      </tr>
    </table>
    <a href="edit.php?id=<?php echo $item['id']; ?>">Edit</a>
    <a href="delete.php?id=<?php echo $item['id']; ?>">Delete</a>
  </body>
</html>