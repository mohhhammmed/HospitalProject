<?php include '../sharing/header.php';
     include '../sharing/nav.php';
     include '../general/SettingsDb.php';
     include '../general/HelperFun.php';

    $selected = "SELECT fileds.name filed , doctors.id  ,doctors.name  FROM doctors JOIN fileds 
ON doctors.filedID = fileds.id";
    $doctorsData = mysqli_query($connect, $selected);
       if (isset($_GET['delete'])) {
       $id= $_GET['delete'];
       $delete = "DELETE FROM doctors WHERE id = $id";
       $del= mysqli_query($connect, $delete);
       getMessage($del, "DELETE");
   }
   auth(1);
?>

<h1 class="text-center text-primary display-1 b pt-5">Doctors</h1>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Filed ID</th>
                    <th> Action </th>
                </tr>
                <?php foreach ($doctorsData as $doctor) { ?>
                <tr>
                    <td><?php  echo $doctor['id'];?> </td>
                    <td><?php  echo $doctor['name'];?> </td>
                    <td><?php  echo $doctor['filed'];?> </td>
                    <td> <a href="AllDoctors.php?delete=<?php echo $doctor['id']?>" class="btn btn-danger">Delete </a> 
                  <a href="/hospital/doctors/AddDoctor.php?edit=<?php echo $doctor['id']?>" class="btn btn-info">Edit </a> 
                </td>
              

                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>


<?php include '../sharing/footer.php' ?>