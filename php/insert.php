<?php  
   
  require 'conn.php';

  extract($_POST);
   
  $sql = "INSERT INTO items (name, details) VALUES ('$name', '$details')";

  if($conn->query($sql)) {
    
    echo "
        <script type='text/javascript'>
          window.location = 'profile.php?id=$conn->insert_id';
        </script>
      ";
  } else {
    echo "Error : " . $conn ->error;
  }
