<?php
include 'inc/headertop.php';
include 'inc/headerhidden.php';
?>
<?php
   $login_check=session::get('customer_login');
   if($login_check==false)
   {
   	header('location:login.php');
   }
?>
<?php
if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['save']))

{
    $id=session::get('customer_id');
    $updateCustomer=$customer->update_customers($_POST,$id);
}
?>
<link rel="stylesheet" href="css/product-item.css">
<style type="text/css">
	.css_label{
		color: #0387c3;
		font-weight: bold;
	}
	input[type=submit] {
    padding:5px 15px; 
    background:#ccc; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 

}
</style>
<section class="content my-3">
        <div class="container">
            <div class="cart-page bg-white">
                <div class="row">
                     <div class="col-md-12">
                        <div class="cart-content py-3 pl-3">
                          
                           <div>                
                            <div class="card">
                                  <h5>
                                <span class="label">Cập nhật thông tin</span>     
                                  </h5>
                                <div>  <?php
						                   if(isset($updateCustomer)){
						                    echo $updateCustomer;                   
						                    } 
						                 ?>
                                        <div class="">
                                        	 <?php
									    		$id=session::get('customer_id');
									    		$show_customers=$customer->show_customer($id);
									    		if($show_customers){
									    			while($result_cus=$show_customers->fetch_assoc()){
									    		?>
                                        <form action="" method="POST">
                                            <div class="form-label-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập họ và tên" name="name" required value="<?php echo $result_cus['customer_name'] ?>">
                                            </div>
                                            <div class="form-label-group">
                                                <input type="email" class="form-control"
                                                    placeholder="Nhập email" value="<?php echo $result_cus['customer_email'] ?>" name="email" required>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập số điện thoại" name="phone" value="<?php echo $result_cus['customer_phone'] ?>" required>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập địa chỉ" name="address" value="<?php echo $result_cus['customer_address'] ?>" required>
                                            </div>
                                        
                                              <div class="row">
                                             <div class="input ipmaxn ">
                                               <input type="submit" name="save"  value="Cập nhật" style="background:red;box-shadow: none;color: white;">
                                             </div>
                                             <div class="clear"></div>
                                           </div>
                                        </form>
                                        <?php
		                                    }
		                                }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include 'inc/footer.php';
?>