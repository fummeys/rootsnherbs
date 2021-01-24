<?php
//session_start();
include_once('./models/ProductsModel.php');
include_once('./models/ManagersModel.php');
include_once('./models/BonusesModel.php');
include_once('./models/UsersModel.php');


if(!isset($_SESSION["user"])){
    header('location: login');
}elseif($_SESSION['level']<4){
    header('location: nopermission');
}


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

$presults_per_page = 10;  
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
            
            header('location: dashboard');
            $mssg = " Product added";
        }else{
            $mssg = " Something went wrong, could not add products";
        }
    }
   

}
if(isset( $_POST['bonus_submit']) ) {

    if(isset($_POST['bonusuid'])){
        $bonusuid = $_POST['bonusuid'];
        }
        if(isset($_POST['bonusvalue'])){
        $bonusvalue = $_POST['bonusvalue'];
        }
        if(isset($_POST['bdescription'])){
        $bdescription = $_POST['bdescription'];
        }
        if(!empty($bonusuid)&&!empty($bonusvalue)){
            $userModel = new UsersModel();
            $bonusmaker = new BonusesModel();
            $user = $userModel->getUserbyrealID($bonusuid);
            $userdetail = $user->fetch_assoc();
            $transactionid  = 10;
            if($bonusmaker->addBonus($userdetail['name'],$userdetail['id'],-$bonusvalue, $transactionid,$bdescription,'Bonus Paid')==TRUE){
                $userModel->updateUserItembyID ('bonusvalue','si',$userdetail['bonusvalue']-$bonusvalue,$bonusuid);
                header('location: dashboard');
                $mssg2 = " Product added";
            }else{
                $mssg2 = " Something went wrong, could not pay bonus";
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
            header('location: dashboard');
        }else{
            $mssg1 = " Something went wrong, could not update role";
        }
    }
  

}
include_once('header.php');
?>

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
         <option  value ="2">User</option>
         <option  value ="3">Admin</option>
         <option value ="4">SuperAdmin</option>
         
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
                            <div class="card-body">
                                <h4 class="card-title">PAY BONUS</h4>
                                <h6 class="text-muted card-subtitle mb-2">Pay bonus to user</h6>
                                <form method = "POST">                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">User ID</span></div><input class="form-control" type="text" name = "bonusuid">
                                    <div class="input-group-append"></div>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Bonus Value</span></div><input class="form-control" type="text" name = "bonusvalue">
                                    <div class="input-group-append"></div>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text">Description</span></div><input class="form-control" type="text" name = "bdescription">
                                    <div class="input-group-append"><input class="btn btn-primary" type="submit" name = "bonus_submit" value = "Go!"></div>
                                </div>
                                <?php if(!empty($mssg2)){
                                    echo '<div class="text-center" style="color:green">'.$mssg2.'</div>';
                                    } ?>
                                </form>
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
<?php
include_once('footer.php');
?>