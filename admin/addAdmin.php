<?php
  include '../sharing/header.php';
     include '../sharing/nav.php';
     include '../general/SettingsDb.php';
     include '../general/HelperFun.php';
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $insert = "INSERT INTO `admin` VALUES (NULL, '$name', '$password' , $role) ";
    $ins = mysqli_query($connect, $insert);
    header("location:/hospital/admin/login.php");
}
auth(0);
?>
<h1 class="text-center text-primary display-2 b pt-5">Registration Page</h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="from-group">
                 <label for=""> Admin Name</label>
                 <input type="text" name="name" class="form-control">
                </div>
                <div class="from-group">
                 <label for=""> Admin Password</label>
                 <input type="text" name="password" class="form-control">
                </div>
                <div class="from-group">
                 <label for=""> Admin Role</label>
                <select name="role"  class="form-control">
                    <option value="0"> All Access</option>
                    <option value="1"> ALL Access Without admin</option>
                    <option value="2">Simi Access</option>
                </select>
                </div>
                <button name="register" class="btn btn-danger m-3 mx-auto w-50 btn-block"> Add</button>

            </form>
        </div>
    </div>
</div>


 <?php
 include '../sharing/footer.php';?>