<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="./style/mystyle.css" />
</head>

<body style=" background-color: #E8E8E8;">
  <div class="sidebar">
    <a href="index.html">Home</a>
    <a class="active" href="Approved-unapproved.php">Approved-unapproved</a>
    <a href="receiver-details.html">Receiver-details</a>
    <a href="donor-details.html">Donors-details</a>
    <a href="availability.html">availability</a>
    <a href="../index.html">Goto website</a>

  </div>
  <div class="content">
    <h2>Receiver list</h2>
        <?php
        include 'connection.php';

        $sql = " SELECT * FROM receiver WHERE status = 'pending' ORDER BY id ASC";
        $result = $mysqli->query($sql);
        $mysqli->close();

        ?>
	<section class="receiver-table" id="receiver-table">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr class="success">
            <th>Name</th>
            <th>Course</th>
            <th>Specialization</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Blood group</th>
            <th>Collage ID</th>
            <th>Date of Request</th>

            <th>Status</th>
          </tr>
        </thead>
			<?php
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
          <td><?php echo $rows['fname'];?></td>
          <td><?php echo $rows['cname'];?></td>
          <td><?php echo $rows['branch'];?></td>
          <td><?php echo $rows['phone'];?></td>
          <td><?php echo $rows['email'];?></td>
          <td><?php echo $rows['bgroup'];?></td>
          <td><img style="height: 53px; width: 53px;" alt="Invalid Image" src="../image/<?php echo $rows['student_id']; ?>"></td>
          <td><?php echo $rows['date'];?></td>

          <td>
            <form action="Approved-unapproved.php" method="POST" >
            <input type="hidden" name="id" value="<?php echo $rows['id'];?>" />
            <input type="submit" value="Approve"  name="approve"  class=" btn btn-success"/>
            &nbsp;&nbsp;&nbsp;
            <input type="submit" value="Deny" name="deny" class=" btn btn-danger"/>
            </form>
          </td>
      </tr>
      </tr>
      <?php
          } 
       ?>
		</table>
    </div>
	</section>



  <h2>Donor list</h2>
        <?php
        include 'connection.php';
        $sql = " SELECT * FROM donor WHERE status = 'pending' ORDER BY id ASC";
        $result = $mysqli->query($sql);
        ?>
	<section class="donor-table" id="donor-table">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr class="danger">
            <th>Name</th>
            <th>Course</th>
            <th>Specialization</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Blood group</th>
            <th>Weight</th>
            <th>Date of donation</th>
            <th>Status</th>
          </tr>
        </thead>
			<?php
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
          <td><?php echo $rows['fname'];?></td>
          <td><?php echo $rows['cname'];?></td>
          <td><?php echo $rows['branch'];?></td>
          <td><?php echo $rows['phone'];?></td>
          <td><?php echo $rows['email'];?></td>
          <td><?php echo $rows['bgroup'];?></td>
          <td><?php echo $rows['weight'];?></td>
          <td><?php echo $rows['date'];?></td>
          <td>
            <form action="Approved-unapproved.php" method="POST" >
            <input type="hidden" name="id" value="<?php echo $rows['id'];?>" />
              
            <input type="submit" value="Approve" name="approve" class=" btn btn-success"/>
            &nbsp;&nbsp;&nbsp;
            <input type="submit" value="Deny" name="deny" class=" btn btn-danger"/>
            </form>
          </td>
      </tr>
      </tr>
      <?php
          } 
       ?>

		</table>
    </div>
	</section>

</div>

<?php
if(isset($_POST['approve']))
{
  $id = $_POST['id'];

  $select = "UPDATE receiver SET status = 'approve' WHERE id = '$id'"; 
  $result = $mysqli->query($select);

  echo '<script type="text/javascript">';
  echo 'alert("Request approved")';
  echo 'windrow.location.href = "Approved-unapproved.php"';
  echo '</script>';
}


if(isset($_POST['deny']))
{
  $id = $_POST['id'];

  $select = "DELETE FROM receiver WHERE id = '$id'"; 
  $result = $mysqli->query($select);

  echo '<script type="text/javascript">';
  echo 'alert("Request Deny")';
  echo 'windrow.location.href = "Approved-unapproved.php"';
  echo '</script>';
}

if(isset($_POST['approve']))
{
  $id = $_POST['id'];

  $select = "UPDATE donor SET status = 'approve' WHERE id = '$id'"; 
  $result = $mysqli->query($select);

  echo '<script type="text/javascript">';
  echo 'alert("Request approved")';
  echo 'windrow.location.href = "Approved-unapproved.php"';
  echo '</script>';
}

if(isset($_POST['deny']))
{
  $id = $_POST['id'];

  $select = "DELETE FROM donor WHERE id = '$id'"; 
  $result = $mysqli->query($select);

  echo '<script type="text/javascript">';
  echo 'alert("Request Deny")';
  echo 'windrow.location.href = "Approved-unapproved.php"';
  echo '</script>';
  $mysqli->close();
}

?>

</body>

</html>
