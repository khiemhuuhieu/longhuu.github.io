<?php
include 'inc/headertop.php';
include 'inc/headerhidden.php';
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
      {
        $insertCustomer=$customer->insert_customer($_POST);
      }
?>
<?php
   $login_check=session::get('customer_login');
   if($login_check)
   {
    header('location:order.php');
   }
?>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']))
      {
        $loginCustomer=$customer->login_customer($_POST);
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
                     <div class="col-md-8">
                        <div class="cart-content py-3 pl-3">
                          
                           <div>                
                            <div class="card">
                                  <h5>
                                <span class="label">Đăng kí tài khoản</span>     
                                  </h5>
                                <div>
                                      <?php
                                        if(isset($insertCustomer)){
                                            echo $insertCustomer;
                                        }
                                           
                                        ?>
                                        <?php
                                        include 'facebook_source.php';
                                        ?>
                                        <div class="">
                                        <form action="" method="POST">
                                            <div class="form-label-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập họ và tên" name="name" required>
                                            </div>
                                              <div class="form-label-group">
                                                <input type="password" class="form-control"
                                                    placeholder="Nhập nhập khẩu" name="password" required>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="email" class="form-control"
                                                    placeholder="Nhập email" name="email" required>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập số điện thoại" name="phone" required>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Nhập địa chỉ" name="address" required>
                                            </div>
                                        
                                              <div class="row">
                                             <div class="input ipmaxn ">
                                               <input type="submit" name="submit"  value="Đăng kí" style="background:red;box-shadow: none;color: white;">
                                             </div>
                                             <div class="clear"></div>
                                           </div>
                                        </form>
                                    </div>
                                </div><br>
                                   <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                class="fab fa-google mr-2"></i> Đăng nhập bằng Google</button>
                        <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                class="fab fa-facebook-f mr-2"></i> Đăng nhập bằng Facebook</button>
                            </div>
                            
                        </div>
                  
                        </div>
                    </div>
                       <div class="col-md-4">
                        <div>             
                            <div class="card">
                                <div>
                                    <h5>
                                         <span class="label">Đăng nhập</span>
                                    </h5>
                                </div>
                                <div>
                                   <?php
                                        if(isset($loginCustomer)){
                                            echo $loginCustomer;
                                        }
                                        ?>
                                    <div class="card-body">
                                        <form  action="" method="POST">
                                            <div class="form-label-group">
                                                <input type="email" class="form-control"
                                                    placeholder="Nhập email" name="email" required>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="password" class="form-control"
                                                    placeholder="Nhập mật khẩu" name="password" required>
                                            </div>
                                        
                                              <div class="row">
                                             <div class="input ipmaxn ">
                                               <input type="submit" name="login" value="Đăng nhập" style="background:red;box-shadow: none;color: white;">
                                             </div>
                                             <div class="clear"></div>
                                           </div>
                                        </form>
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