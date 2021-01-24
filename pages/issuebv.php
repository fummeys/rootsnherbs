<?php
//session_start();
include_once('./models/TransactionsModel.php');
include_once('./models/UsersModel.php');
include_once('./models/BonusesModel.php');
include_once('./models/RanksModel.php');
include_once('./controllers/RanknBonusController.php');

require 'vendor/autoload.php';

if(!isset($_SESSION["user"])){
    header('location: login');
}elseif($_SESSION['level']<3){
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
$transactions = new TransactionsModel();
$result = $transactions-> getAllTransactions();
$number_of_result = mysqli_num_rows($result);  
$sometransactions = $transactions->getSomeTransactions($page_first_result,$results_per_page);
//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);


if(isset( $_POST['submit_bv']) ) {
if(isset($_POST['id'])){
    $id = $_POST['id'];
    }
    if(isset($_POST['bv'])){
    $bv = $_POST['bv'];
    }
    if(isset($_POST['description'])){
    $description = $_POST['description'];
    }
    if(!empty($id)&&!empty($bv)&&!empty($description)){
        $play = new TransactionsModel();
        $play1 = new UsersModel();
        $myuser = $play1-> getUserbyrealID($id)->fetch_assoc();
        $oldbv = $myuser['bronzevalue'] ;
        $newbv = $oldbv + $bv;
        $thisbv = $bv;
        $name = $myuser['name'];
        $issuer = $_SESSION['id'];
        $userid = $myuser['id'];
        $transactionid = $play->recordTransaction ($name,$issuer,$oldbv,$thisbv,$newbv,$description,$userid);
        if($transactionid!=FALSE){
            $play1->updateUserItembyID ('bronzevalue','ii',$newbv,$userid);
            $testy = new RanknBonusController();
            //grade new bv earner and ancestors
            $testy->grade($userid);
            $testy->paybonuses($userid,$newbv);
            $mssg = " BV added";
            header('location: issuebv');

        }else{
            $mssg = " Something went wrong, could not add BV";
        }
    }
}
include_once('header.php');
?>

            <div class="container-fluid">
                <h3 class="text-dark mb-4">Issue Bronze Value</h3>
                <div class="card shadow">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Give Bronze value</h4>
                            <h6 class="text-muted card-subtitle mb-2">Assign BV to user</h6>
                            <form>
        <div>
        <label >Products: </label>
        <select name = "product" id = "product" class="form-control" >
        <?php
        include_once('./models/ProductsModel.php');
        $products = new ProductsModel();
        $myp = $products->getAllProducts();
        //$productlist = $myp->fetch_assoc();
        while ($row =  $myp->fetch_assoc()) { 
            echo "<option  value ='".$row['bronzevalue']."'>".$row['productname']."</option>";
       } 
        
        
        ?>
        </select>
      </div>
    	<input type="button" class="add-row" value="Add Product">
    </form>
    <table class="table my-0" id="dataTable">
        <thead>
            <tr>
                <th>Select</th>
                <th>Products</th>
                <th>BV</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    <button type="button" class="delete-row">Delete Row</button>
  <button type="button" class="show">Use Products to assign value</button>
                            <form method = "POST">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">User ID</span></div><input class="form-control"  name = "id" type="text">
                                <div class="input-group-append"></div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Bronze Value</span></div><input class="form-control" id = "usebv" name = "bv"  type="text">
                                <div class="input-group-append"></div>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Description</span></div><input class="form-control" id = "usedesc"  name = "description" type="text">

                                <div class="input-group-append"><input class="btn btn-primary" type="submit" name = "submit_bv" value = "GO!"></div>
                            </div>
                            
                            </form>
                            <?php if(!empty($mssg)){
                                    echo '<div class="text-center" style="color:green">'.$mssg.'</div>';
                                    } ?>
                        </div>
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Bronze Value List</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label> <a href="users"><p class="text-primary m-0 font-weight-bold">View all Users</a> </p></label></div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Old BV</th>
                                        <th>ThisBV</th>
                                        <th>NewBV</th>
                                        <th>Date</th>
                                        <th>Issuer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        while ($row = mysqli_fetch_array($sometransactions)) { 
        echo "<tr><td>".$row['id']."</td>";
        echo "<td><a class='nav-item' href = 'profile?id=".$row['userid']."'>".$row['name']."</a></td>"; 
        echo "<td>".$row['description']."</td>";  
        echo "<td>".$row['oldbv']."</td>";  
        echo "<td>".$row['thisbv']."</td>";  
        echo "<td>".$row['newbv']."</td>";  
        echo "<td>".$row['transactiontime']."</td>";  
        echo "<td>".$row['issuer']."</td></tr>";  

          
        
           }  
            ?>
                                    
                                </tbody>
                                
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <!--<p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>-->
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