<?php
include 'inc/header.php';
?>
<?php include '../helper/format.php'
?>
<?php
  $filepath=realpath(dirname(__FILE__));
  require_once ($filepath.'/../classes/cart.php');
?>
<?php
$cart=new cart();
if(isset($_GET['shiftid']))
{
	$id=$_GET['shiftid'];
	$price=$_GET['price'];
	$order_date=$_GET['order_date'];
	$update_shifted=$cart->shifted($id,$price,$order_date);
}
?>
<?php
if(isset($_GET['delid'])){
	$id=$_GET['delid'];
	$price=$_GET['price'];
	$order_date=$_GET['order_date'];
	$del_shifted=$cart->del_shifted($id,$price,$order_date);
}
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
    Quản lý đơn đặt hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-12 text-left">
      	 <?php
            if(isset($update_shifted)){
            	echo $update_shifted;
            }
            ?>
            <?php
            if(isset($del_shifted)){
            	echo $del_shifted;
            }
         ?>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Ngày đặt</th>
            <th>Tên sách</th>
            <th>Số lượng</th>
             <th>Giá</th>
             <th>Khách hàng</th>
             <th>Trạng thái</th>
          </tr>
        </thead>
        <tbody>
        	<?php
				$cart=new cart();
				$fm=new Format();
				$getCart=$cart->get_inboxCart();
				if($getCart){
					$i=0;
					while($resultCart=$getCart->fetch_assoc()){
						$i++;
			?>
          <tr>
          	<td><?php echo $i ?></td>
          	<td><?php echo $fm->formatDate($resultCart['order_date']);?></td>
            <td><?php echo $resultCart['productName'] ?></td>
            <td><?php echo $resultCart['quantity'] ?></td>
            <td><?php echo $fm->format_currency($resultCart['price'])."VNĐ"?></td>
            <td>
              <a href="customer.php?customerid=<?php echo $resultCart['customerId']?>">Xem chi tiết</a>
            </td>
           <td>
           	<?php
				if($resultCart['status']==0){
				?>
				<a href="?shiftid=<?php echo $resultCart['id']?>&price=<?php echo $resultCart['price']?>&order_date=<?php echo $resultCart['order_date']?>">Chờ xử lý</a>
				<?php
			    }elseif($resultCart['status']==1){
			    	echo "Đã xử lý"
				?>
				<?php
		     	}elseif($resultCart['status']==2){
            echo "Khách đã nhận hàng";
				?>
				<!-- <a onclick="return confirm('Hoàn thành đơn hàng, bạn có thể xóa?');" href="?delid=<?php echo $resultCart['id']?>&price=<?php echo $resultCart['price']?>&order_date=<?php echo $resultCart['order_date']?>">Khách đã nhận</a> -->
			<?php
			  }
			?>
           </td>
          </tr>
        <?php
         } 
          }
        ?>
      </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
         <!--  <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> -->
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
  
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
<?php
include 'inc/footer.php';
?>