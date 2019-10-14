<?php 
  $title = 'Shop';
  $active = 'shop';
  
  include __DIR__ . "/../includes/header.php" ;
  
?>

<?php 
    
  include __DIR__ . "/../includes/menu.php";
    
?>

<?php 
    
  include __DIR__ . "/../includes/navbar.php";
    
?>
<!-- Shop Begin -->
<div id="content">
  <div class="container">
    <div class="col-md-12">
      <!-- Crumb Begin -->
      <ul class="breadcrumb">
        <li>
          <a href="../index.php">Home</a>
        </li>
        <li>
          Shop
        </li>
      </ul>
      <!-- Crumb Finish -->
    </div>

    <div class="col-md-3">

      <?php 
  
        include __DIR__ . "/../includes/sidebar.php";
  
      ?>

    </div>

    <div class="col-md-9">
      <?php 
                
        if(!isset($_GET['p_cat'])){  
          if(!isset($_GET['cat'])){
    
            echo "

            <div class='box'>
                <h1>Shop</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!
                </p>
            </div>
            "; 
          }  
        }        
      ?>
      <!-- Shop-Product Begin -->
      <div class="row">
        <?php 
                   
          if(!isset($_GET['p_cat'])){
              
            if(!isset($_GET['cat'])){
                
              $per_page=6; 
              
              if(isset($_GET['page'])){
                  
                $page = $_GET['page'];
                  
              }else{
                  
                $page=1;
                    
              }
              
              $start_from = ($page-1) * $per_page;
              
              $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
              
              $run_products = mysqli_query($con,$get_products);
              
              while($row_products=mysqli_fetch_array($run_products)){
                  
                $pro_id = $row_products['product_id'];

                $pro_title = $row_products['product_title'];

                $pro_price = $row_products['product_price'];

                $pro_img1 = $row_products['product_img1'];
                
                echo "
                  
                  <div class='col-md-4 col-sm-6 center-responsive'>
                  
                    <div class='product'>
                    
                      <a href='details.php?pro_id=$pro_id'>
                      
                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                      
                      </a>
                      
                      <div class='text'>
                      
                        <h3>
                        
                          <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                        
                        </h3>
                    
                        <p class='price'>

                          $$pro_price

                        </p>

                        <p class='buttons'>

                          <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            View Details

                          </a>

                          <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Add To Cart

                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                ";     
          }        
        ?>
      </div>

      <center>
        <ul class="pagination">
          <!-- pagination Begin -->
          <?php
                        
            $query = "select * from products";
                    
            $result = mysqli_query($con,$query);
                    
            $total_records = mysqli_num_rows($result);
                    
            $total_pages = ceil($total_records / $per_page);
                    
                echo "
                
                    <li>
                    
                        <a href='shop.php?page=1'> ".'First Page'." </a>
                    
                    </li>
                ";
                    
                for($i=1; $i<=$total_pages; $i++){
                    
                  echo "
                  
                    <li>
                    
                    <a href='shop.php?page=".$i."'> ".$i." </a>
                    
                    </li>
                  ";     
                };
                      
                echo "
                
                  <li>
                  
                    <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>
                  
                  </li>
                ";
            // end of 'cat' if statement  
            }
          // end of 'p_cat' if statement 
          }
        ?>
          <!-- pagination Finish -->
        </ul>
      </center>
      <?php 
        getpcatpro(); 
      ?>
    </div>
    <!-- Shop-Product Finish -->
  </div>
</div>
<!-- Shop Finish -->

<?php 
  
  include __DIR__ . "/../includes/footer.php";
  
?>