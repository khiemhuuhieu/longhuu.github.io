<?php
include'inc/headertop.php';
include'inc/headerhidden.php';
?>
<?php
if(isset($_GET['cartId']))
{
    $cartid=$_GET['cartId'];
    $delCart=$cart->delCart($cartid);
}
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])) {
    $quantity=$_POST['quantity'];
    $cartId=$_POST['cartId'];
    $update_quantity_cart=$cart->update_cart($quantity,$cartId);
    if($quantity<=0){
        $delCart=$cart->delCart($cartId);
    }
}
?>
<?php
if(!isset($_GET['id']))
{
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>
<link rel="stylesheet" href="css/gio-hang.css">
<style type="text/css">
    <style>
table, td, th {
  border: 1px solid red;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th {
  height: 70px;
}
</style>
</style>
 <section class="content my-3">
        <div class="container">
            <div class="cart-page bg-white">
                <div class="row">
                     <div class="col-md-12">
                        <div class="cart-content py-3 pl-3">
                            <h6 class="header-gio-hang">GIỎ HÀNG CỦA BẠN </h6>
                            <div class="cart-list-items">
                                    <?php
                                        if(isset($update_quantity_cart)){
                                            echo $update_quantity_cart;
                                        }
                                        ?>
                                        <?php
                                        if(isset($delCart)){
                                            echo $delCart;
                                        }
                                    ?>
                           <div class="table-responsive">          
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>Tên sách</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Xóa</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $show_cart=$cart->showProductCart();
                                    if($show_cart){
                                        $subtotal=0;
                                        $qty=0;
                                        while($result_cart=$show_cart->fetch_assoc()){
                                    ?>
                                  <tr>
                                    <td><?php echo $result_cart['productName'] ?></td>
                                    <td> <img class="card-img-top anh" src="admin/upload/<?php echo $result_cart['image']?>" height="80" width="100"></td>
                                    <td><?php echo $fm->format_currency($result_cart['price'])."VNĐ";?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="cartId" min="0" value="<?php echo $result_cart['cartId']?>"/>
                                            <input style="width: 40px;" type="number" name="quantity" value="<?php echo $result_cart['quantity'] ?>">
                                            <input  type="submit" name="submit" value="Cập nhật" class="btn btn-sm btn-success">
                                        </form>
                                    </td>
                                    <td>
                                        <?php
                                        $total =$result_cart['price'] * $result_cart['quantity'];
                                        echo $fm->format_currency($total)."VNĐ";
                                        ?>
                                    </td>
                                    <td><a onclick="return confirm('Bạn có chắc muốn xóa không')" href="?cartId=<?php echo $result_cart['cartId']?>">Xóa</a></td>
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
                                      <th><a href="Order.php" class="btn btn-sm btn-danger">Đặt mua</a></th>
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
                    
                </div>
            </div>
        </div>
    </section>
<?php
include'inc/footer.php';

?>