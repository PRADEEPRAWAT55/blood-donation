<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
    <!-- <script type="text/javascript" src="./js/custom.js"></script> -->
</head>
<style>
    h5 {
        color: white;
    }

    p {
        color: white;
        font-size: 14px;
    }
</style>

<body style=" background-color: #E8E8E8;">
    <header id=" navbar">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">DONATE BLOOD<i class="fa fa-droplet text-danger" style="padding-left: 20px;"></i></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">HOME</a></li>
                        <li class=""><a href="contact.html">CONTACT US</a></li>
                        <li  class="active"><a href="Reciver-doner-info.php">BLOOD INFO</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">REQUIREMENT
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-content">
                                <li><button type="button" class="btn" data-toggle="modal"
                                        data-target="#myModal2">DONATER</button></li>
                                <li><button type="button" class="btn" data-toggle="modal"
                                        data-target="#myModal1">RECEIVER</button></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a type="button" data-toggle="modal" data-target="#register"><span
                                    class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;SIGH-UP</a>
                        </li>
                        <li><a type="button" data-toggle="modal" data-target="#login"><span
                                    class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;LOGIN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<div class="container">
     <H3 class="myheading">Requests</H3>
    
  <input class="myheading form-control" id="myInput" type="text" placeholder="Search in this table for receiver details...">
            <?php
              include 'config.php';
                $sql = " SELECT * FROM receiver WHERE status = 'approve' ORDER BY id ASC";
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
            <th>Date of request</th>
          </tr>
        </thead>
        <tbody id="myTable">
			<?php
				while($rows=$result->fetch_assoc())
				{
			?>
		<tr>
          <td><?php echo $rows['fname'];?></td>
          <td><?php echo $rows['cname'];?></td>
          <td><?php echo $rows['branch'];?></td>
          <td><a style="color: #389100; cursor: pointer; font-weight:bold;" href="https://wa.me/91<?php echo $rows['phone'];?>" target="_blank"><?php echo $rows['phone'];?> &nbsp;&nbsp;&nbsp; <i class="fa-brands text-success fa-whatsapp"></i></a></td>
          <td><?php echo $rows['email'];?></td>
          <td><?php echo $rows['bgroup'];?></td>
          <td><?php echo $rows['date'];?></td>
        </tr>
        <?php
            } 
        ?>
        </tbody>
		</table>
    </div>
	</section>


 <section class="donor-table" id="donor-table">
 <H3 class="myheading">DONATOR</H3>
  <input class=" myheading form-control" id="myInput2" type="text" placeholder="Search in this table for Donator details...">
        <?php
        include 'config.php';

        $sql = " SELECT * FROM donor WHERE status = 'approve' ORDER BY id ASC";
        $result = $mysqli->query($sql);
        ?>
     <div class="table-responsive">
      <table class="table table-bordered">
         <thead>
          <tr class="danger">
            <th>Name</th>
            <th>Course</th>
            <th>Specialization</th>
            <th>Email</th>
            <th>Blood group</th>
            <th>Donation of date</th>
          </tr>
         </thead>
         <tbody id="myTable2">
			   <?php
				while($rows=$result->fetch_assoc())
				{
			    ?>
                <tr>
                <td><?php echo $rows['fname'];?></td>
                <td><?php echo $rows['cname'];?></td>
                <td><?php echo $rows['branch'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['bgroup'];?></td>
                <td><?php echo $rows['date'];?></td>
                    </tr>
                <?php
                    } 
                ?>
                </tbody>
		</table>
      </div>
	</section>
</div>

  
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 myfooter">
                    <h4> all &copy; reserved by pradeep rawat</h4>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">RECEIVER DETAILS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body ">
          <div class="backgrund-img">
            <form method="POST" action="insert.php" enctype="multipart/form-data">
              <!------name-------------->
              <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Username" name="fname" required />
              </div>
              <!-------course-------------->
              <div class="input-container">
                <i class="fa fa-user-graduate icon"></i>
                <input class="input-field" type="text" placeholder="Course Name" name="cname" required />
              </div>
              <!-------section-------------->
              <div class="input-container">
                <i class="fa fa-people-group icon"></i>
                <select class="input-field" name="branch" required>
                  <option selected disabled>Branch</option>
                  <option>C.S.E</option>
                  <option>CIVIL</option>
                  <option>IT</option>
                  <option>MECHANICAL</option>
                </select>
              </div>
              <!-------phone-------------->
              <!-------course-------------->
              <div class="input-container">
                <i class="fa fa-mobile icon"></i>
                <input class="input-field" type="text" placeholder="Mobile Number" name="phone" required />
              </div>
              <!-------phone-------------->
              <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input class="input-field" type="email" placeholder="Email" name="email" required />
              </div>
              <!-------blood group-------------->
              <div class="input-container">
                <i class="fa fa-droplet icon"></i>
                <select class="input-field" name="bgroup" required >
                  <option selected disabled> Required Blood group</option>
                  <option>A+</option>
                  <option>A-</option>
                  <option>B+</option>
                  <option>B-</option>
                  <option>O+</option>
                  <option>O-</option>
                  <option>AB-</option>
                </select>
              </div>
              <!-------phone-------------->
              <div class="input-container">
                <i class="fa fa-certificate icon"></i>
                <input class="input-field" type="file" id="img" name="id" style="display:none;" required />
                <label for="img">Click me to upload Collage ID</label>
              </div>
              <input type="submit" value="submit" name="submit" class="btn btn-block btn-dark">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">DONATOR DETAILS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="backgrund-img">
          <form method="POST" action="insert.php" enctype="multipart/form-data">
              <!------name-------------->
              <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Username" name="fname" required />
              </div>
              <!-------course-------------->
              <div class="input-container">
                <i class="fa fa-user-graduate icon"></i>
                <input class="input-field" type="text" placeholder="Course Name" name="cname" required />
              </div>
              <!-------section-------------->
              <div class="input-container">
                <i class="fa fa-people-group icon"></i>
                <select class="input-field" name="branch" required>
                  <option selected disabled>Branch</option>
                  <option>C.S.E</option>
                  <option>CIVIL</option>
                  <option>IT</option>
                  <option>MECHANICAL</option>
                </select>
              </div>
              <!-------phone-------------->
              <div class="input-container">
                <i class="fa fa-mobile icon"></i>
                <input class="input-field" type="text" placeholder="Mobile Number" name="phone" required />
              </div>
              <!-------Email-------------->
              <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input class="input-field" type="email" placeholder="Email" name="email" required />
              </div>
              <!-------blood group-------------->
              <div class="input-container">
                <i class="fa fa-droplet icon"></i>
                <select class="input-field" name="bgroup" required>
                  <option value="" selected disabled> Required Blood group</option>
                  <option>A+</option>
                  <option>A-</option>
                  <option>B+</option>
                  <option>B-</option>
                  <option>O+</option>
                  <option>O-</option>
                  <option>AB-</option>
                </select>
              </div>
              <div class="input-container">
                <i class="fa fa-weight-scale icon"></i>
                <input class="input-field" type="number" placeholder="Enter Your Weight" name="weight" required />
              </div>
              <input type="submit" name="save" value="submit" class="btn btn-block btn-dark" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="login">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">LOGIN DETAILS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="backgrund-img">
            <form class="box" action="" method="POST">
              <h3>LOGIN</h3>
              <input type="text" placeholder="email" required="" name="email" />
              <input type="password" placeholder=" Password" required="" name="pass1" />
              <input type="submit" name="sub" value="Login" />
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <P class="text-info">New Here ? <a type="button" data-toggle="modal" data-target="#register"
              data-dismiss="modal">sign up</a>
          </P>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="register">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">REGISTRATION DETAILS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="backgrund-img">
            <form>
              <!------name-------------->
              <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Username" name="usrnm" required />
              </div>
              <!-------phone-------------->
              <div class="input-container">
                <i class="fa fa-mobile icon"></i>
                <input class="input-field" type="text" placeholder="Mobile Number" name="usrnm" required />
              </div>
              <!-------Email-------------->
              <div class="input-container">
                <i class="fa fa-envelope icon"></i>
                <input class="input-field" type="text" placeholder="Email" name="usrnm" required />
              </div>
              <!-------course-------------->
              <div class="input-container">
                <i class="fa fa-book icon"></i>
                <input class="input-field" type="text" placeholder="course" name="usrnm" required />
              </div>
              <div class="form-row">
                <div class="input-container form-group">
                  <i class="fa fa-key icon"></i>
                  <input class="input-field" type="text" placeholder="password" name="usrnm" required />
                </div>
                <div class="form-group input-container">
                  <i class="fa fa-key icon"></i>
                  <input class="input-field" type="text" placeholder="Confirm Password" name="usrnm" required />
                </div>
              </div>
              <button type="submit" class="btn btn-block btn-dark">Submit</button>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <P class="">New Here ? <a type="button" id="abc" data-toggle="modal" data-target="#login"
              data-dismiss="modal">login In</a>
          </P>
        </div>
      </div>
    </div>
  </div>
<script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

<script>
  $(document).ready(function(){
    $("#myInput2").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable2 tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
</body>
</html>