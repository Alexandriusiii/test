 <?php 
  include('dbconnect.php');
   //Code for deletion
    if(isset($_GET['delid']))
    {
      $rid=intval($_GET['delid']);
      $sql=mysqli_query($con,"delete from tblusers where ID=$rid");
      /*echo "<script>alert('Data deleted');</script>"; */
      echo "<script>window.location.href = 'index.php'</script>";     
    } 

if(isset($_POST['submit']))
  {
    
    $fname=$_POST['fname'];
   

    $query = mysqli_query($con, "insert into tblusers (TaskName) values ('$fname')");

      if($query){
        
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";

      }else{
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
      }
   }
  //code for undone
/*   if(isset($_GET['undone']))
    {
      $rid=intval($_GET['undone']);
      $sql=mysqli_query($connect,"delete from tblusers where ID=$rid");
      echo "<script>alert('Data deleted');</script>"; 
      echo "<script>window.location.href = 'index.php'</script>";     
    } */
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <title>Tasks</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="styles.css" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>   
<div class="container-xl">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
           <!--    <div class="col-sm-2">
                  <h2>User's <b>Tasks</b></h2>
              </div> -->
           <!--  Button Add New Task  -->
                  <div class="col-sm-8" align="right">
                  <form method="POST"> 
                    <div class="input-group mb-3 input-group-lg">
                       
                       
                      <input type="text" class="form-control" name="fname" placeholder="Введите задачу" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      
                      <button href="insert.php" class="btn btn-lg btn-outline-primary" name="submit">
                        <i class="material-icons">&#xE147;</i> 
                        <span>Add New Task...</span>
                      </button>
                 

                     </div>
                  </form>

                   </div>

                    <div class="col-sm-3" align="right">
                     <div class="btn-group"  role="group" aria-label="Basic mixed styles example">
                          <button type="button" class="btn btn-sm btn-danger">Активные</button>
                          <button type="button" class="btn btn-sm btn-warning">Отложенные</button>
                          <button type="button" class="btn btn-sm btn-success">Завершенные</button>
                      </div>
                    </div>
                 </div>
          </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Task's Description</th>
              <th>Date</th>                      
            </tr>
        </thead>
        <tbody>
                   
      <?php
        // if isset($_GET['']){}
          $ret = mysqli_query($con, "select * from tblusers where status = 0 group by CreationDate DESC");
          $cnt = 1;
          $row = mysqli_num_rows($ret);
          if( $row > 0 ){
            while ( $row = mysqli_fetch_array($ret) )
           {
      ?>
           <tr>
              <td class="col-sm-1"><?php echo $cnt;?></td>
              <td><?php echo $row['TaskName'];?></td>
              <td><?php echo $row['TaskDesc'];?></td>
              <td><?php echo $row['CreationDate'];?></td>
              <td>
                    <!-- DONE 1-->
                  <a href="read.php?done=<?php echo htmlentities ($row['ID']);?>" class="view" title="Done" data-toggle="tooltip">
                    <i class="material-icons">&#xe876;</i>
                  </a>
                    <!-- EDITE 1-->
                  <a href="edit.php?editid=<?php echo htmlentities ($row['ID']);?>" class="edit" title="Edit" data-toggle="tooltip">
                    <i class="material-icons">&#xE254;</i>
                  </a>                      
                     <!-- DELETE 1-->
                   <a href="index.php?delid=<?php echo ($row['ID']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');">
                      <i class="material-icons">&#xE872;</i>
                   </a>
              </td>
            </tr>
       <?php 
        $cnt = $cnt+1;
      } 
          } else {?>
          <tr>
          <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
          </tr>
          <?php } ?>                 
          
       </tbody>
     </table>

    <h5>Выполнено</h5>      
    <table class="table table-striped table-hover">
        <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>TaskDesc</th>   
              <th>Date</th>                      
            </tr>
        </thead>
        <tbody>
          <?php
           
      // if isset ($_GET['undone'])
      $ret = mysqli_query($con, "select * from tblusers where status = 1 group by CreationDate DESC");
      $cnt = 1;
      $row = mysqli_num_rows($ret);
        if( $row > 0 ){
          while ($row=mysqli_fetch_array($ret)) {
     ?>
      <tr>
          <td class="col-sm-1"><?php echo $cnt;?>   </td>
          <td><s><?php  echo $row['TaskName'];?></s></td>
          <td><s><?php  echo $row['TaskDesc']?> </s></td>
          <td>   <?php  echo $row['CreationDate']?> </td>
          <td>
            <!-- UNDONE 2-->
            <a href="read.php?done=<?php echo ($row['ID']);?>" class="view" title="view" data-toggle="tooltip">    
              <i class="material-icons">&#xe876;</i>
            </a>
            <!-- EDIT 2--> 
          <a href="edit.php?editid=<?php //echo htmlentities ($row['ID']);?>" class="edit" title="Edit" data-toggle="tooltip">
              <i class="material-icons">&#xE254;</i>
            </a>                      
                <!-- DELETE 2 -->
             <a href="index.php?delid=<?php echo ($row['ID']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');">
                <i class="material-icons">&#xE872;</i>
              </a>
               <a href="done.php?done=<?php echo ($row['ID']);?>" class="done" title="view" data-toggle="tooltip">    
              <i class="material-icons">&#xe876;</i>
            </a>
          </td>
      </tr>
 
      <?php 
        $cnt=$cnt+1;
      } } else {?>
      <tr>
      <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
  </tr>
      <?php } ?>                 
          
       </tbody>
     </table>


<?php $res = $con->query("select * from tblusers where status = 1"); 
      $countTasksDays = mysqli_fetch_assoc($res);
?>
     <div>Сегодня вы выполнили: <?php $doneTasks = 2; print_r($countTasksDays['status']); ?> задачи</div>
              </div>
          </div>
      </div> 
   </body>
</html>