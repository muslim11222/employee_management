<?php 
   include("connection.php");
?>
  
<!-- Search area start here -->

<?php 

     if (isset($_POST['Searchdata'])) {
          $search = $_POST['Search'];

          
          $query = "SELECT * FROM emp_info WHERE id = '$search'";
          $results = mysqli_query($connection, $query);

          
          if ($results && mysqli_num_rows($results) > 0) {
          $data = mysqli_fetch_assoc($results); 
          } else {
          $data = null; 
          }
     }



?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Employee Management </title>
     <link rel="stylesheet" href="/employee_management/style.css">
</head>
<body>





     <div class="center">

          <form action="#" method="POST">
             <h1> Employee Management </h1>

             
               <div class="form">
                    <input type="text" name="Search" class="textfield" placeholder="Search ID" value="<?php 
                         if (isset($data) && $data) { 
                              echo $data['id']; 
                         } else { 
                              echo ''; 
                         } 
                    ?>">

                    <input type="text" name="name" class="textfield" placeholder="Employee name" value="<?php 
                         if (isset($data) && $data) { 
                              echo $data['emp_name']; 
                         } else { 
                              echo ''; 
                         } 
                    ?>">

                    <select class="textfield" name="gender">
                         <option value="Not selected"> Select Gender </option>
                         <option value="Male" <?php if(isset($data['emp_gender']) && $data['emp_gender'] == 'Male') {echo 'selected';} ?>>Male</option>
                         <option value="Female" <?php if(isset($data['emp_gender']) && $data['emp_gender'] == 'Female') {echo 'selected';} ?>> Female </option>
                         <option value="Others" <?php if(isset($data['emp_gender']) && $data['emp_gender'] == 'Others') {echo 'selected';} ?>> Others </option>
                    </select>

                    <input type="text" name="email" class="textfield" placeholder="Email Adress" value="<?php 
                         if (isset($data) && $data) { 
                              echo $data['emp_email']; 
                         } else { 
                              echo ''; 
                         } 
                    ?>">

                    <select class="textfield" name="department">
                         <option value="Not selected"> Select Department </option>
                         <option value="IT" <?php if(isset($data['emp_department']) && $data['emp_department'] == 'IT') {echo 'selected';} ?>> IT </option>
                         <option value="accounts" <?php if(isset($data['emp_department']) && $data['emp_department'] == 'accounts') {echo 'selected';} ?>> Accounts </option>
                         <option value="Sales" <?php if(isset($data['emp_department']) && $data['emp_department'] == 'Sales') {echo 'selected';} ?>> Sales </option>
                         <option value="HR" <?php if(isset($data['emp_department']) && $data['emp_department'] == 'HR') {echo 'selected';} ?>> HR </option>
                         <option value="Business Development" <?php if(isset($data['emp_department']) && $data['emp_department'] == 'Business Development') {echo 'selected';} ?>> Business Development </option>
                         <option value="Marketing" <?php if(isset($data['emp_department']) && $data['emp_department'] == 'Marketing') {echo 'selected';} ?>> Marketing </option>
                    </select>

                    <textarea  placeholder="Address"  name="address"> <?php 
                         if (isset($data) && $data) { 
                              echo $data['emp_address']; 
                         } else { 
                              echo ''; 
                         } 
                    ?></textarea>

                    <input type="submit" name="Searchdata" value="Search" class="btn">
                    <input type="submit" name="save" value="Save" class="btn" style="background-color: green">
                    <input type="submit" name="update" value="Update" class="btn" style="background-color: orange">
                    <input type="submit" name="delete" onclick="return checkdelete();" value="Delete" class="btn" style="background-color: red">
                    <input type="reset" name="" value="Clear" class="btn" style="background-color: blue">

               </div>

          </form>
     </div>
     
</body>
</html>

<script>
     function checkdelete() {
          return confirm("Are you sure you want to delete");
     }
</script>


<?php 

     if(isset($_POST['save'])) {
          $name = $_POST['name'];
          $gender = $_POST['gender'];
          $email = $_POST['email'];
          $department = $_POST['department'];
          $address = $_POST['address'];


          $query = "INSERT INTO emp_info (emp_name, emp_gender, emp_email, emp_department, emp_address) 
          VALUES ('$name', '$gender', '$email', '$department', '$address')";

          $result = mysqli_query($connection, $query);

          if($result== true) {
               echo "<script> alert('save successfully') </script>";
          } else {
               echo 'save failed';
          }
     }

?>







<!-- Delete option area -->
<?php 


  if(isset($_POST['delete'])) {
     $id = $_POST['Search'];

    $query = "DELETE FROM emp_info WHERE id = '$id'";
    $data = mysqli_query($connection, $query);


    if($data) {
     echo '';
    } else {
     echo 'data not deleted successfully';
    }
  }

?>

<?php 
 

    if(isset($_POST['update'])) {
          $id         = $_POST['Search'];
          $name       = $_POST['name'];
          $gender     = $_POST['gender'];
          $email      = $_POST['email'];
          $department = $_POST['department'];
          $address    = $_POST['address'];

          $query = "UPDATE emp_info SET emp_name= '$name', emp_gender= '$gender', emp_email= '$email', emp_department= '$department', emp_address= '$address' WHERE id= '$id'";
          $result = mysqli_query($connection, $query);

          if (!$result) {
               echo "Error: " . mysqli_error($connection);
           }
     }

?>




