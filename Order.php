<?php
include'inc/headertop.php';
include'inc/headerhidden.php';
?>
<?php
   $login_check=session::get('customer_login');
   if($login_check==false)
   {
   	header('location:login.php');
   }
?>
<?php
if(isset($_GET['orderid']) && $_GET['orderid']=='order')
{
  $customer_id=session::get('customer_id');
  $insertOrder=$cart->insertOrder($customer_id);
  $delCart=$cart->del_all_cart();
  header('location:success.php');
}
?>
 <section class="content my-3">
        <div class="container">
            <div class="cart-page bg-white">
                <div class="row">
                     <div class="col-md-8">
                        <div class="cart-content">
                            <h5>Danh sách sản phẩm đặt hàng</h5>
                             <div class="cart-list-items">
                           <div class="table-responsive">          
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $show_cart=$cart->showProductCart();
                                    if($show_cart){
                                        $subtotal=0;
                                        $qty=0;
                                        $i=0;
                                        while($result_cart=$show_cart->fetch_assoc()){
                                        	$i++;
                                    ?>
                                  <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $result_cart['productName'] ?></td>
                                    <td><?php echo $fm->format_currency($result_cart['price'])."VNĐ";?></td>
                                    <td><?php echo $result_cart['quantity'] ?></td>
                                    <td>
                                        <?php
                                        $total =$result_cart['price'] * $result_cart['quantity'];
                                        echo $fm->format_currency($total)."VNĐ";
                                        ?>
                                    </td>
                                    </tr>
                                  <?php
                                    $subtotal+=$total;
                                   $qty+=$result_cart['quantity'];
                                   }
                                }
                                  ?>
                                </tbody>
                              </table>
                              <?php
                                $check_session_cart=$cart->check_session_cart();
                                if($check_session_cart){

                                ?>
                            <table style="float: right;text-align: center; width: 40%;" class="table">
                                  <tr>
                                      <th>Tổng tiền:</th>
                                      <td>
                                          <?php
                                           echo $fm->format_currency($subtotal)."VNĐ";
                                            session::set('qty',$qty);
                                           ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>Thuế (VAT): 10%</th>
                                      <td>
                                           <?php
                                       $vat=$subtotal*0.1;
                                       echo $fm->format_currency($vat)."VNĐ";
                                       ?>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>Code giảm giá:</th>
                                      <td>Nếu có</td>
                                  </tr>
                                  <tr>
                                      <th>Thanh toán:</th>
                                      <td>
                                          <?php
                                              $gtotal=$subtotal+$vat;
                                              echo $fm->format_currency($gtotal)."VNĐ";
                                          ?>
                                      </td>

                                  </tr>
                                  <tr>
                                      <th><a href="?orderid=order" class="btn btn-sm btn-danger">ĐẶT HÀNG</a></th>
                                  </tr>
                              </table>
                                 <?php
                                    }else
                                    {
                                        echo "Vui lòng thêm sản phẩm vào giỏ hàng";
                                    }
                                ?>
                              </div>
                            </div>
                        </div>
                    </div>
                       <div class="col-md-4">
                        <div>              
                            <div class="card">
                                <div>
                                    <h5>
                                         <span class="label">Thông tin giao hàng</span>
                                    </h5>
                                </div>
                                <div>
                                	 <?php
                                    $id=session::get('customer_id');
                                    $show_customers=$customer->show_customer($id);
                                    if($show_customers){
                                        while($result_customer=$show_customers->fetch_assoc()){
                                    ?> 
                                    <div class="card-body">
                                            <div class="form-label-group">
                                                <input type="text" class="form-control"
                                              name="name" value="<?php echo $result_customer['customer_name'] ?>" readonly>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="text" class="form-control"
                                                   name="phone"  value="<?php echo $result_customer['customer_phone'] ?>" readonly>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="email" class="form-control"
                                                   name="email"  value="<?php echo $result_customer['customer_email'] ?>" readonly>
                                            </div>
                                            <div class="form-label-group">
                                                <input type="text" class="form-control"
                                                    name="address"  value="<?php echo $result_customer['customer_address'] ?>" readonly >
                                            </div>
                                              <div class="row">
                                             <div class="clear"></div>
                                           </div>
    
                                    </div>
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
    </section>
<?php
include'inc/footer.php';
?>