<?php
include 'connection.php';
if(isset($_POST['submit']))
{
     $status = 0;
     $fname = $_POST['fname'];
     $cname = $_POST['cname'];
     $branch = $_POST['branch'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $bgroup = $_POST['bgroup'];
     $student_id = $_FILES["id"]["name"];
     $tempname = $_FILES["id"]["tmp_name"];
     $folder = "./image/" . $student_id;
     $query = "INSERT INTO receiver (fname,cname,branch,phone,email,bgroup,student_id,status)
      VALUES ('$fname','$cname','$branch','$phone','$email','$bgroup','$student_id','pending')";
          if (mysqli_query($conn, $query) & move_uploaded_file($tempname, $folder))
          {
               echo '<script type="text/javascript">';
               echo 'windrow.location.href = "insert.php"';
               echo 'alert("Your Request submitted successfully")';
               echo '</script>';
          }
          else
          {
               echo "Error: " . $query . ":-" . mysqli_error($conn);
          }
       mysqli_close($conn);
}
if(isset($_POST['save']))
{
     $fname = $_POST['fname'];
     $cname = $_POST['cname'];
     $branch = $_POST['branch'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $bgroup = $_POST['bgroup'];
     $weight = $_POST['weight'];
     $query = "INSERT INTO donor (fname,cname,branch,phone,email,bgroup,weight,status) 
      VALUES ('$fname','$cname','$branch','$phone','$email','$bgroup','$weight','pending')";
          if (mysqli_query($conn, $query))
          {
               echo '<script type="text/javascript">';
               echo 'windrow.location.href = "insert.php"';
               echo 'alert("Your Request submitted successfully")';
               echo '</script>';
          }
          else
          {
               echo "Error: " . $query . ":-" . mysqli_error($conn);
          }
       mysqli_close($conn);
}

if(isset($_POST['register']))
{
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $cname = $_POST['cname'];
     $password = $_POST['password'];
     $cpassword = $_POST['cpassword'];

   $pass1 =  password_hash($password, 
          PASSWORD_DEFAULT);
   $pass2 =  password_hash($cpassword, 
          PASSWORD_DEFAULT);

        if($password != $cpassword)
        {
                   echo '<script type="text/javascript">';
                   echo 'alert("Password Mismatched")';
                   echo '</script>';
        }
        else
       {
          $select = "SELECT * FROM register where email = '$email'";
          $result = mysqli_query($conn,$select);
               if(mysqli_num_rows($result) > 0)
               {
                    echo '<script type="text/javascript">';
                    echo 'alert("Email is already taken")';
                    echo '</script>';
               }
               else{
                    $query = "INSERT INTO register (name,phone,email,cname,password,cpassword,status) 
                    VALUES ('$name','$phone','$email','$cname','$pass1','$pass2','pending')";
                    if (mysqli_query($conn, $query))
                    {
                         echo '<script type="text/javascript">';
                         echo 'alert("Your Registration is going for review")';
                         echo '</script>';
                    }
                    else
                    {
                         echo "Error: " . $query . ":-" . mysqli_error($conn);
                    }
               }
          }
       mysqli_close($conn);
}

     if(isset($_POST['login']))
     {
          $email = $_POST['email'];
          $password = $_POST['password'];

          $select = mysqli_query($conn,"SELECT * FROM register WHERE email = '$email' AND password = '$password'");
          $row = mysqli_fetch_array($select);

          $status = $row['status'];

          $select2 = mysqli_query($conn, "SELECT * FROM register WHERE email = '$email' AND password = '$password'");
          $check_user = mysqli_num_rows($select2);

          if ($check_user == 1) {
          $_SESSION["status"] = $row['status'];
          $_SESSION["email"] = $row['email'];
          $_SESSION["password"] = $row['password'];
                    if($status == "approve")
                    {
                         echo '<script type="text/javascript">';
                         echo 'alert("Login Successfully")';
                         // echo 'window.location.href = index.html';
                         echo '</script>';
                    }
                    else if($status == "pending")
                    {
                         echo '<script type="text/javascript">';
                         echo 'alert("your account is pending for Approval")'; 
                         echo '</script>';
                    }
                    else
                    {
                         echo '<script type="text/javascript">';
                         echo 'alert("your account is pending for Approval")'; 
                         echo '</script>';
                    }
          }
          mysqli_close($conn);
     }

?>
