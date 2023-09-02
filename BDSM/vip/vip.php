<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
</style>
</head>

<body>
<?php
  include 'conn.php';
    include 'session.php';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>
<div id="header">
<?php include 'vip_header.php';
?>
</div>
<h2>Blood Donor Names</h2>

        <div class="row">
          <?php
            include 'conn.php';
            $sql = "SELECT * FROM donor_details JOIN blood ON donor_details.donor_blood = blood.blood_id ORDER BY RAND() LIMIT 6";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
            while($row = mysqli_fetch_assoc($result)) {
           ?>
            <div class="col-lg-4 col-sm-6 portfolio-item" ><br>
            <div class="card" style="width:300px">
                <img class="card-img-top" src="blood_drop_logo.jpg" alt="Card image" style="width:100%;height:300px">
                <div class="card-body">
                  <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
                  <p class="card-text">
                    <b>Blood Group : </b> <b><?php echo $row['blood_group']; ?></b><br>
                    <b>Mobile No. : </b> <?php echo $row['donor_number']; ?><br>
                    <b>Gender : </b><?php echo $row['donor_gender']; ?><br>
                    <b>Age : </b> <?php echo $row['donor_age']; ?><br>
                    <b>Address : </b> <?php echo $row['donor_address']; ?><br>
                  </p>

                </div>
              </div>
        </div>
	<?php }} ?>
</div>
	
 <?php
 } else {
     echo '<div class="alert alert-danger"><b> Please Login First To Access the VIP Portal.</b></div>';
     ?>
     <form method="post" name="" action="vip_login.php" class="form-horizontal">
       <div class="form-group">
         <div class="col-sm-8 col-sm-offset-4" style="float:left">

           <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
         </div>
       </div>
     </form>
 <?php }
  ?>
<?php include('footer.php');?>
</body>
</html>
