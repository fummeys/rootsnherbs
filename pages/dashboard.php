<?php
//session_start();
include_once('./models/ProductsModel.php');
include_once('./models/ManagersModel.php');



if (!isset($_POST['page'])){
    $page = 1;  
} else {  
    $page = $_POST['page'];  
}  

$results_per_page = 10;  
$page_first_result = ($page-1) * $results_per_page;  

$page_first_result = ($page-1) * $results_per_page;
$managers = new ManagersModel();
$result = $managers-> getAllManagers();
$number_of_result = mysqli_num_rows($result);  
$somemanagers = $managers->getSomeManagers($page_first_result,$results_per_page);
//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);

if (!isset($_POST['ppage'])){
    $ppage = 1;  
} else {  
    $ppage = $_POST['ppage'];  
}  

$presults_per_page = 5;  
$ppage_first_result = ($ppage-1) * $presults_per_page;  

$ppage_first_result = ($ppage-1) * $presults_per_page;
$products = new ProductsModel();
$presult = $products-> getAllProducts();
$pnumber_of_result = mysqli_num_rows($presult);  
$someproducts = $products->getSomeProducts($ppage_first_result,$presults_per_page);
//determine the total number of pages available  
$pnumber_of_page = ceil ($pnumber_of_result / $presults_per_page);



if(isset( $_POST['submit_1']) ) {

if(isset($_POST['productname'])){
    $productname = $_POST['productname'];
    }
    if(isset($_POST['bronzevalue'])){
    $bronzevalue = $_POST['bronzevalue'];
    }
    if(isset($_POST['description'])){
    $description = $_POST['description'];
    }
    if(!empty($productname)&&!empty($bronzevalue)&&!empty($description)){
        
        $play = new ProductsModel();
        if($play->addProduct($productname,$bronzevalue,$description)==TRUE){
            
            //header('location: login.php');
            $mssg = " Product added";
        }else{
            $mssg = " Something went wrong, could not add products";
        }
    }
   

}
if(isset($_POST['submit_2'])) {
    
  if(isset($_POST['uid'])){
    $id = $_POST['uid'];
    
    }
    if(isset($_POST['urole'])){
    $role = $_POST['urole'];
    
    }
    if(!empty($id)&&!empty($role)){
           $play1 = new ManagersModel();
        if($play1->updateRolebyID($id,$role)==TRUE){
            
            $mssg1 = "Role updated";
        }else{
            $mssg1 = " Something went wrong, could not update role";
        }
    }
  

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard -  Roots & Herbs</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>roots &amp; herbs</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="dashboard"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profile"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="issuebv"><i class="fas fa-table"></i><span>Issue Bronze Value</span></a><a class="nav-link" href="rank"><i class="fas fa-table"></i><span>Rank</span></a><a class="nav-link" href="bonuses"><i class="fas fa-table"></i><span>Bonuses</span></a></li>
                    <li
                        class="nav-item" role="presentation"><a class="nav-link" href="login"><i class="far fa-user-circle"></i><span>Login</span></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="register"><i class="fas fa-user-circle"></i><span>Register</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in" role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="dropdown-list-image mr-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="font-weight-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="text-center dropdown-item small text-gray-500" href="#">Show All Alerts</a></div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION["user"]; ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a
                                            class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="login"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard</h3></div>
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>PRODUCTS AND BRONZE VALUE</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"></div>
                                    </div>
                                    
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>USERS AND ROLES</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-xl-8">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Bronze Value &amp; Product</h4>
                                <h6 class="text-muted card-subtitle mb-2">Assign BV to product</h6>
                                <form method = "POST">                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Product Name</span></div><input class="form-control" type="text" name = "productname">
                                    <div class="input-group-append"></div>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Bronze Value</span></div><input class="form-control" type="text" name = "bronzevalue">
                                    <div class="input-group-append"></div>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Description</span></div><input class="form-control" type="text" name = "description">
                                    <div class="input-group-append"><input class="btn btn-primary" type="submit" name = "submit_1" value = "Go!"></div>
                                </div>
                                <?php if(!empty($mssg)){
                                    echo '<div class="text-center" style="color:green">'.$mssg.'</div>';
                                    } ?>
                                </form>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Users and Roles</h4>
                                <h6 class="text-muted card-subtitle mb-2">Assign role to user</h6>
                                <form method = "POST">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">userID</span></div><input class="form-control" type="text" name = "uid">
                                    <div class="input-group-append"></div>
                                </div>
  <div class="form-group">
    <label >Role: </label>
     <select name = "urole" class="form-control" >
         <option  value ="3">User</option>
         <option  value ="4">Admin</option>
         <option value ="5">SuperAdmin</option>
         
      </select>

  </div>
  <input class="btn btn-primary" type="submit" name = "submit_2" value = "GO!"> </form>

<?php if(!empty($mssg1)){
                                    echo '<div class="text-center" style="color:green">'.$mssg1.'</div>';
                                    } ?>
                                <div class="input-group">
                                    <div class="input-group-prepend"></div>
                                    <div class="input-group-append"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="text-primary font-weight-bold m-0">Products and&nbsp; BVs</h6>
                                
                            </div>
                            <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Product Name</th>
                                            <th>Bronze Value</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php
                                        while ($row = mysqli_fetch_array($someproducts)) { 
        echo "<tr><td>".$row['id']."</td>";
        echo "<td>".$row['productname']."</td>"; 
        echo "<td>".$row['bronzevalue']."</td>";  
        echo "<td>".$row['description']."</td></tr>";  
          
        
           }  
            ?>
                                       
                                    </tbody>
                                    
                                </table>
                            </div>
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <form method = "POST">
                                            <select name = "ppage" class="form-control" >
         
         
         
                                            <?php
                                            for($ppage = 1; $ppage<= $pnumber_of_page; $ppage++) {  
    echo '<option value ="'.$ppage.'">' . $ppage . ' </option>'; } 
    ?>
    </select>
    <input class="btn btn-primary" type="submit" name = "submit_1" value = "Go!">
                                                        </form>
                                            
                                    </nav>
                               </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Users and Roles</h4>
                            <h6 class="text-muted card-subtitle mb-2">Dsplay all users and their roles</h6>
                        </div>
                        <div class="card-body">
                            <!--<div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>-->
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                             <th>Description</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php
                                        while ($row = mysqli_fetch_array($somemanagers)) { 

        echo "<tr><td>".$row['id']."</td>"; 
        echo "<td>".$row['name']."</td>";  
        echo "<td>".$row['description']."</td>";  
        echo "<td>".$row['role']."</td></tr>";  
        
            }  ?>
                                       
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <!--<p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p> -->
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <form method = "POST">
                                            <select name = "page" class="form-control" >
         
         
         
                                            <?php
                                            for($page = 1; $page<= $number_of_page; $page++) {  
    echo '<option value ="'.$page.'">' . $page . ' </option>'; } 
    ?>
    </select>
    <input class="btn btn-primary" type="submit" name = "submit_1" value = "Go!">
                                                        </form>
                                            
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Roots and Herbs 2021</span></div>
        </div>
    </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>