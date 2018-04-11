<!DOCTYPE html>
<html >
  <head> 
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>CSS/Custom/style.css"> 
  </head>

  <body>

    <div class="login-form">
     <h1><img src="<?php echo base_url(); ?>images/DRA-604x270.png" width="200" alt=""/></h1>
     <?php echo validation_errors(); ?>
     <?php echo form_open('password/ResetPassword'); ?>
     <div class="form-group ">
       <input type="text" name="email" id="txtEmail" tabindex="1" class="form-control" placeholder="Email Address" value="" autocomplete="off">
       <i class="fa fa-user"></i>
     </div>
     <span class="alert">Invalid Credentials</span>
     <a class="link" href="<?php echo site_url('welcome/index'); ?>">login</a>
     <input type="submit" name="btnLogin" id="btnLogin" tabindex="4" class="log-btn" value="Submit"> 
     </form>
    
   </div>
    <script src="<?php echo base_url(); ?>JS/jquery-3.1.0.min.js"></script>
    
  </body>
</html>