<?php include '../sharing/header.php';
     include '../sharing/nav.php';
     include '../general/SettingsDb.php';
     include '../general/HelperFun.php';

     $selected = "SELECT * FROM fileds";
     $AllFileds =  mysqli_query($connect, $selected);

   if (isset($_GET['delete'])) {
       $id= $_GET['delete'];
       $delete = "DELETE FROM fileds WHERE id = $id";
       $d= mysqli_query($connect, $delete);
       getMessage($d, "DELETE");
   }
   auth(1 , 2);
?>
<h1 class="text-center text-primary display-1 b pt-5"> Liss Doctors</h1>


<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>

                    <th> Action </th>
                </tr>
                <?php foreach ($AllFileds as $filed) { ?>
                <tr>
                    <td><?php  echo $filed['id'];?> </td>
                    <td><?php  echo $filed['name'];?> </td>
                    <td> <a href="listFiled.php?delete=<?php echo $filed['id']?>" class="btn btn-danger">Delete </a>
                        <a href="addFiled.php?edit=<?php echo $filed['id']?>" class="btn btn-info">Edit </a>
                    </td>

                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>


<?php include '../sharing/footer.php' ?>