<?php
include 'security.php';
include 'include/header.php';
include 'include/sidebar.php';
include 'include/Navbar.php';
include '../db/config.php';
?>
   <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="">
    <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 ">Admin</h1>
   <div class="" style="height:50px;">
        <?php
        
        if(isset($_SESSION['_msg']) && $_SESSION['_msg']!='')
        {
            ?>
            <div class="alert alert-primary" role="alert">
                <?= $_SESSION['_msg'] ?>
        </div>
            <?php
            unset($_SESSION['_msg']);
        }
        
        ?>
</div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S no.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>S no.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $query="select * from admin_user";
                        $run_query=mysqli_query($conn,$query);
                       if(mysqli_num_rows($run_query)>0)
                       {
                           $i=1;
                        while($row=mysqli_fetch_assoc($run_query))
                        {

                            ?>
                             <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <form action="update_admin?id=<?=$row['id']  ?>" method="post">
                                    <button class="btn btn-secondary btn-sm">  Update <i class="fa fa-pen-to-square"></i></button>
                                </form>
                            </td>
                            <td>
                            <form action="code/d_admin" method="post">
                                <input type="hidden" name="dlt" value="<?=$row['id']  ?>" >
                                    <button name="dltBtn" class="btn btn-danger btn-sm">Delete  <i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                    </tr>
                            <?php
                            $i++;
                        }
                       }
                        ?>
                   
                    
                </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
    </div>

   
    <?php

include 'include/Footer.php';

?>