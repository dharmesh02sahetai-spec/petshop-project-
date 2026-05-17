<?php 
error_reporting(0);
include 'connection.php';
session_start();

if (isset($_POST['submit'])) 
{
    $contact = $_POST['contact'];
    
    $login_select = $obj->query("select * from admin where contact='$contact'");
    $rowcount = $login_select->num_rows;

    if($rowcount == 1)
    {
        $row = $login_select->fetch_object();
        $contact = $row->contact;
        $password = $row->password;

        //sms start code

        $fields = array(
                    "sender_id" => "FSTSMS",
                    "message" => "Your Password is : $password. Regards : OIBP Web Application",
                    "language" => "english",
                    "route" => "p",
                    "numbers" => "$contact",
                    "flash" => "1"
                );
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($fields),
          CURLOPT_HTTPHEADER => array(
            "authorization: qeBhj1T9c0dypOXL6fso3Rni2Il7PFAbQgDSMJ5kW8ZtxvVHwuQ2hSCvWYMFpq5U7zrIJd4LfEGjPNTl",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

                   

        if($err)
        {
           echo "<script>alert('Error!! Couldn't Send');</script>"; 
        }
        else
        {
            
            echo "<script>alert('Password is been sent to your number..');document.location='index.php';</script>";
        }

    }
    else
    {
        echo "<script>alert('Invalid Mobile Number Try Again..');</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Forgot Password</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="img/login.jpg" alt="login" class="login-card-img">
          </div> 
          <div class="col-md-7">
            <div class="card-body" >
              
              <p class="login-card-description" style="position: relative; left: 0px;">Forgot Pasword</p>
              <form action="" method="post">
                  <div class="form-group">
                    <label for="email" class="sr-only">Mobile Number</label>
                    <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Mobile Number" required="">
                  </div>
                 
                  <input name="submit" id="submit" class="btn btn-block login-btn mb-4" type="submit" value="Submit">

                </form>
                
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
