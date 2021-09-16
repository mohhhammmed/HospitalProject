<?php include '../sharing/header.php';
     include '../sharing/nav.php';
     include '../general/SettingsDb.php';
     include '../general/HelperFun.php';

     if (isset($_POST['send'])) {
         $name = $_POST['name'];
         $filed = $_POST['filed'];

         $insert ="INSERT INTO `doctors` VALUES (NULL , '$name' , $filed)";
         $ins =  mysqli_query($connect, $insert);
         getMessage($ins, "Insert");
     }
//  Fileds Table
$selected = "SELECT * FROM fileds";
$fileds_data =  mysqli_query($connect, $selected);

// Edit
$edit = false;
$name ="";
$filedId='';
if (isset($_GET['edit'])) {
    $edit =true;
    $id = $_GET['edit'];
    $selected = "SELECT * FROM doctors where id = $id";
    $doctorData =  mysqli_query($connect, $selected);
    $DoctorRow = mysqli_fetch_assoc($doctorData);
    $name = $DoctorRow['name'];
    $filedId=$DoctorRow['filedId'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $filed = $_POST['filed'];

        $update ="UPDATE `doctors` SET name= '$name' , filedID = $filed  where id = $id";
        $up =  mysqli_query($connect, $update);
        getMessage($up, "Updated");
    }
}
auth(1);

?>
<?php  if ($edit) :?>
<h1 class="text-center text-info display-2 b pt-5"> Edit Doctor : <?php echo $name?> </h1>
<?php else:?>
<h1 class="text-center text-primary display-2 b pt-5"> Add Doctor</h1>
<?php endif; ?>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="from-group">

                    <label for="">Doctor Name </label>
                    <input name="name" value="<?php echo $name?>" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="from-group">
                    <label>Filed ID </label>
                    <select name="filed" class="form-control">
                        <?php  foreach ($fileds_data as $filed) { ?>
                        <option <?php  if ($edit && $filed['id']== $filedId): ?>selected <?php endif; ?>  value="<?php echo $filed['id']?>"> <?php echo $filed['name']?> </option>
                        <?php }?>
                    </select>
                </div>
                <?php  if ($edit) :?>
                <button name="update" class="btn btn-danger m-3 mx-auto w-50 btn-block"> Update</button>
                <?php else: ?>
                <button name="send" class="btn btn-info m-3 mx-auto w-50 btn-block"> Send Data </button>
                <?php endif;?>
            </form>
        </div>
    </div>
</div>

<?php include '../sharing/footer.php' ?>