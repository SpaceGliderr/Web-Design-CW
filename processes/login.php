<?php

  if (isset($_POST['btn-login']))
  {
    $UName = $_POST['UserName'];
    $Pass = $_POST['Password'];

    if(empty($UName)|| empty($Pass))
    {
      echo 'Please Fill in the section';
    }
    else
    {
      $query = " select * from users where UName = '$UName'";
      $result = mysqli_query($con, $query);

      if($row=mysqli_fetch_assoc($result))
      {
          $db_password = $row['Password'];

          if(md5($Pass)== $db_password)
          {
            header("location:admin.php");
          }
          else
          {
            echo ' Incorrect Password';
          }
      }
      else
      {
          echo 'Please Check your query';
      }
    }
  }


?>
