<?php
include 'inc/headertop.php';
include 'inc/headerhidden.php';
?>
<?php
      $login_check=session::get('customer_login');
	  if($login_check==false){
	  	header('location:login.php');
	  }
?> 
<?php
if(isset($_GET['confirmid']))
{
	$id=$_GET['confirmid'];
	$price=$_GET['price'];
	$order_date=$_GET['order_date'];
	$confirm_shifted=$cart->confirm_shifted($id,$price,$order_date);
}
?>
<section class="content my-3">
        <div class="container">
            <div class="cart-page bg-white">
                <div class="row">
                     <div class="col-md-12">
                        <div class="cart-content">
                            <h5>Danh sách sản phẩm đặt hàng</h5>
                             <div class="cart-list-items">
                           <div class="table-responsive">          
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tổng tiền</th>
                                    <th>Số lượng</th>
                                    <th>Ngày đặt</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   <?php
									$customer_id=session::get('customer_id');
									$show_order=$cart->show_order($customer_id);
									if($show_order){
										$i=0;
										$qty=0;
										while($result_order=$show_order->fetch_assoc()){
											$i++;
							       ?>
                                  <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $result_order['productName'] ?></td>
                                    <td><?php echo $fm->format_currency($result_order['price'])."VNĐ";?></td>
                                    <td>
                                      <?php echo $result_order['quantity'];?>
                                    </td>
                                    <td><?php echo $result_order['order_date'];?></td>
                                    <td>
                                    	<?php
									if($result_order['status']==0)
									{
										echo 'Chờ xử lý';
									}
									elseif($result_order['status']==1){
									?>
									<span>Đang vận chuyển</span>
									<?php
								     }elseif($result_order['status']==2){
								     ?>
								     <span>Đã giao hàng</span>
								     	<?php
								     }
								     	?>
                                    </td>
                                    <?php
								if($result_order['status']=='0'){
								?>
								<td><?php echo 'N/A'?></td>
								<?php
							     }elseif($result_order['status']=='1'){
								?>
								<td><a href="?confirmid=<?php echo $result_order['customerId']?>&price=<?php echo $result_order['price']?>&order_date=<?php echo $result_order['order_date']?>">Xác nhận đã nhận hàng</a></td>
								<?php
							    }elseif($result_order['status']=='2'){
							    ?>
							    <td><?php echo "Hoàn thành";?></td>
							    <?php
							    } 
							    ?>
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