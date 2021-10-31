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
 <section class="content my-3">
        <div class="container">
            <div class="cart-page bg-white">
                <div class="row">
                     <div class="col-md-12">
                        <div class="cart-content py-3 pl-3">
                            <h6 class="header-gio-hang">Thông tin cá nhân</h6>
                            <div class="cart-list-items">
                           <div class="table-responsive">          
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>Họ và tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Cập nhật</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id=session::get('customer_id');
                                    $show_customers=$customer->show_customer($id);
                                    if($show_customers){
                                        while($result_customer=$show_customers->fetch_assoc()){
                                    ?> 
                                  <tr>
                                    <td><?php echo $result_customer['customer_name'] ?></td>
                                    <td><?php echo $result_customer['customer_phone'] ?></td>
                                    <td><?php echo $result_customer['customer_email'] ?></td>
                                    <td><?php echo $result_customer['customer_address'] ?></td>
                                 
                                    <td><a href="editprofile.php" class="btn btn-sm btn-success">Cập nhật</a></td>
                                  </tr>
                                  <?php
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
        </div>
    </section>
<?php
include 'inc/footer.php';
?>