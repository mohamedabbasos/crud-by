<?php 
   
  require 'conn.php';

  $id = $_GET['id'];

  $sql = "DELETE FROM items WHERE id = '$id'";

  if($conn->query($sql)){
    echo "
      <script>
        window.location = 'index.php';
      </script>
    ";
  }
  else{
    echo "Error : " . $conn ->error;
  }