<?php 
   
  require 'conn.php';
  
  extract($_POST);
  
  $sql = " UPDATE items SET name = '$name', details = '$details' WHERE id = '$id'";

  if($conn->query($sql)) {
    echo "
      <script>
        window.location = 'index.php';
      </script>
    ";
  } else {
    echo "Error : " . $conn ->error;
  }