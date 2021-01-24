<?php
include_once('./models/ProductsModel.php');
include_once('./models/UsersModel.php');
include_once('./models/BonusesModel.php');

if(!isset($_SESSION["user"])){
    header('location: login');
}elseif($_SESSION['level']>1 && !isset($_REQUEST['id'])){
    //if id is not set, redirect admins to view all users instead of a particular user
    header('location: users');
}

$play1 = new UsersModel();
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}else{
    $id = 1;
}


if(isset($_REQUEST['id'])){
    $userid = $_REQUEST['id'];
    }else{
    $userid = $id;   
    }
    
$user = $play1->getUserbyrealID($userid);
$thisuser = $user->fetch_assoc();

if (!isset($_POST['page'])){
    $page = 1;  
} else {  
    $page = $_POST['page'];  
}  

$results_per_page = 10;  
$page_first_result = ($page-1) * $results_per_page;  

$page_first_result = ($page-1) * $results_per_page;
$bonuses = new BonusesModel();
$result = $bonuses->getBonusbyID ($userid);
$number_of_result = mysqli_num_rows($result);  
$somebonuses = $bonuses->getSomeBonusesbyID($userid,$page_first_result,$results_per_page);
//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);




if(isset($_POST['submit_data'])) {
    echo  'submitted \n';
  if(isset($_POST['name'])){
    $name = $_POST['name'];
    echo  'name submitted /n';
    
    }
    if(isset($_POST['bankaccount'])){
    $bankaccount = $_POST['bankaccount'];
    echo  'bank submitted /n'. $bankaccount;
    }
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
        echo  'phone submitted /n'. $phone;
        }
    if(true){
        echo  'every is submitted /n';
           $play1 = new UsersModel();
           $id = $_SESSION['id'];
           
        if($play1->updateUserItembyID ('bankaccount','si',$bankaccount,$id)==TRUE
        && $play1->updateUserItembyID ('phone','si',$phone,$id)==TRUE
        && $play1->updateUserItembyID ('name','si',$name,$id)==TRUE
        ){
            
            $mssg = "User details updated";
            header('location: profile');
            //header('location: dashboard.php');
        }else{
            $mssg = " Something went wrong, could not update role";
        }
    }
  

}
include_once('header.php');
?>

            <div class="container-fluid">
                <h3 class="text-dark mb-4">Profile</h3>
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/dogs/image2.jpeg" width="160" height="160">
                               <!-- <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div> -->
                            </div>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary font-weight-bold m-0">Rank</h6>
                            </div>
                            <div class="card-body">
                            <h1 class = "text-warning"><?php echo $thisuser['rank']; ?></h1>
                            
                            </div>
                        </div>
                        <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Bonus Value</p>
                                    </div>
                                    
                                    <div class="card-body">
                                        <h3 class = "text-success"><?php echo $thisuser['bonusvalue']; ?></h3>
                                    </div>
                                </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row mb-3 d-none">
                            <div class="col">
                                <div class="card text-white bg-primary shadow">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <p class="m-0">Peformance</p>
                                                <p class="m-0"><strong>65.2%</strong></p>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                        </div>
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card text-white bg-success shadow">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col">
                                                <p class="m-0">Peformance</p>
                                                <p class="m-0"><strong>65.2%</strong></p>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                        </div>
                                        <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">User Details</p>
                                    </div>
                                    <div class="card-body">
                                        <form method = "POST">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="username"><strong>Name</strong></label><input class="form-control" type="text" placeholder="Fullname" value = "<?php echo $thisuser['name']; ?>" name="name"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="email"><strong>Phone</strong><br></label><input class="form-control" type="text" placeholder="Phone number" name="phone" value = "<?php if(!empty($thisuser['phone'])){  echo $thisuser['phone'];}else{ echo "";} ?>"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="first_name"><strong>Account number </strong></label><input class="form-control" type="text" placeholder="Account number" name="bankaccount" value = "<?php if(!empty($thisuser['bankaccount'])){  echo $thisuser['bankaccount'];}else{ echo "";} ?>"></div>
                                                </div>
                                               <!-- <div class="col">
                                                    <div class="form-group"><label for="last_name"><strong>Last Name</strong></label><input class="form-control" type="text" placeholder="Doe" name="last_name"></div>
                                                </div>-->
                                            </div>
                                            <div class="form-group">
                                                <div class="col">
                                                    <div class="form-group"><label for="username"><strong>username</strong></label><input class="form-control" type="text" placeholder="username" value = "<?php echo $thisuser['username']; ?>" name="username"></div>
                                                </div>
                                            </div>
                                            <input class="btn btn-primary btn-sm" name = "submit_data" value = "Update" type="submit">
                                        </form>
                                        <?php if(!empty($mssg)){
                                    echo '<div class="text-center" style="color:green">'.$mssg.'</div>';
                                    } ?>
                                        </div>
                                </div>
                                <br/>
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Bronze Value</p>
                                    </div>
                                    <div class="card-body">
                                        <h3 class = "text-success"><?php echo $thisuser['bronzevalue']; ?></h3>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-5">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Bonuses</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                    <th>id</th>
                                        <th>Name</th>
                                        <th>Transaction ID</th>
                                        <th>Bonus Value</th>
                                        <th>Description</th>
                                        <th>Bonus Type</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        while ($row = mysqli_fetch_array($somebonuses)) { 
        echo "<tr><td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>"; 
        echo "<td>".$row['transactionid']."</td>";  
        echo "<td>".$row['bonusvalue']."</td>";  
        echo "<td>".$row['description']."</td>";  
        echo "<td>".$row['bonustype']."</td>";  
        echo "<td>".$row['time']."</td></tr>";  

          
        
           }  
            ?>
                                </tbody>
                                <tfoot>
                                   
                                </tfoot>
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
<?php
include_once('footer.php');
?>