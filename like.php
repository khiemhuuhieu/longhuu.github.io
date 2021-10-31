<?php
include 'inc/headertop.php';
include 'inc/headerhidden.php';
?>
<?php
if(isset($_GET['proid'])){
	$customer_id=session::get('customer_id');
	$proid=$_GET['proid'];
	$del_like=$product->del_like($customer_id,$proid);
}
?>
<section class="content my-3">
        <div class="container">
            <div class="cart-page bg-white">
                <div class="row">
                     <div class="col-md-12">
                        <div class="cart-content">
                            <h5>Danh sách sản phẩm yêu thích</h5>
                             <div class="cart-list-items">
                           <div class="table-responsive">          
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  	<?php
										$customer_id=session::get('customer_id');
										$show_like =$product->show_like($customer_id) ;
										if($show_like){
											$i=0;
											while($result_like=$show_like->fetch_assoc()){
												$i++;
									  ?>
                                 <tr>
                                    <td><?php echo $i?></td>
                                    <td><?php echo $result_like['productName'] ?></td>
                                    <td><img class="card-img-top anh" src="admin/upload/<?php echo $result_like['image']?>" height="100px" width="80px"></td>
                                    <td><?php echo $fm->format_currency($result_like['price'])."VNĐ";?>
                                    </td>
                                    <td><a href="ProductDetails.php?proid=<?php  echo $result_like['productId']?>">Đặt hàng</a>| <a href="?proid=<?php echo $result_like['productId']?>">Xóa</a></td>
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