<?php 
  include '../sharing/header.php';
     include '../sharing/nav.php';
     include '../general/SettingsDb.php';
     include '../general/HelperFun.php';


 
//////////////Authunticate//////////////
if (isset($_POST['login'])) {
    $name=   $_POST['name'];
    $password=   $_POST['password'];
    $selected= "SELECT * from `admin` WHERE name = '$name' AND password = '$password' ";
    $AdminData = mysqli_query($connect, $selected);
    $rowAdmin = mysqli_fetch_assoc($AdminData);
    $nummber = mysqli_num_rows($AdminData);
    if ($nummber > 0) {
        $_SESSION['admin'] =  $name;
        $_SESSION['role']=  $rowAdmin['role'];
       header("location:/hospital/");
    } else {
        echo "<h1 class='text-center text-danger  b pt-5'> Enter Correct Data</h1>";
    }
}




?>
<h1 class="text-center text-primary display-2 b pt-5">Login Page</h1>

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
                <button name="login" class="btn btn-primary m-3 mx-auto w-50 btn-block"> Login</button>

            </form>
        </div>
    </div>
</div>
<?php include '../sharing/footer.php' ?>