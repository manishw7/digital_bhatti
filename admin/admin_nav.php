<?php 
if(isset($_SESSION['admin_loggedin'])){
  $loggedin= true;
}
else{
  $loggedin = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">DB Admin Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/digital_bhatti/admin/admin_dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>';

      if(!$loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="/digital_bhatti/auth/login.php">Login</a>
      </li>';
      }
      if($loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="/digital_bhatti/admin/admin_logout.php">Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/digital_bhatti/admin/admin_orders.php">Manage Orders</a>
      </li>';
    }
       
    echo '</ul>
  </div>
</nav>';
?>