<?php require APPROOT . '/views/inc/header.php'; ?>
<?php echo isset($_SESSION['error']) && !isset($_SESSION['admin_id']) ? $_SESSION['error'] : ''?>
<div class="container my-2 mx2 pt-2 pb-2 text-light" style="background-color: #282A3A; border-radius: 10px; width:96%;">
<div class="row">
  <div class="col-lg-6 col-md-12">
    <img src="<?php echo URLROOT ?>img/login_image.jpg" alt="" style="width:100%; border-radius: 8px;">
  </div>
  <div class="col-lg-6 col-md-12">
    <form action="<?php echo URLROOT ?>admin/auth" class="mt-5" method="POST" id="login">
      <h2>Welcome again! Login</h2>
    <div class="form-group mt-5">
      <label for="email">Email : </label>
      <input type="email" name="email" id="email" class="form-control mt-1" placeholder="Enter your email">
      <span id="email_error" class=""></span>
    </div>

    <div class="form-group mt-4">
      <label for="password">Password : </label>
      <input type="password" name="password" id="password" class="form-control mt-1" placeholder="Enter your password">
      <span id="password_error" class=""></span>
    </div>
    <button type="submit" class="btn mt-4" style="background-color:#03C988;">Login</button>
    </form>
</div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>