<?php include 'inc/header.php';?>

<?php include '../classes/category.php'?>
<?php include '../classes/product.php'?>
<?php require_once '../helper/format.php' ?>
<?php
$pd=new product();
if(isset($_GET['delId']))
{
	 $id=$_GET['delId'];
	 $delProduct=$pd->del_product($id);	

}
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
    Quản lý danh sách sản phẩm
    </div>
    <div class="row w3-res-tb">
    </div>
    <div class="table-responsive">
    	<?php
        	if(isset($delProduct))
        	{
        		echo $delProduct;
        	}
        ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
             <th>Giá tiền</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        	<?php
				$product=new product();
				$fm=new Format();
				$productlist=$product->show_product();
				if($productlist){
					$i=0;
					while ($result=$productlist->fetch_assoc()) {
						$i++;
						
			?>
          <tr>
            <td><?php echo $i?></td>
            <td><?php echo $result['productName'] ?></td>
            <td><img src="upload/<?php echo $result['image']?>" width="100" height="100"></td>
            <td><?php echo $fm->format_currency($result['productPrice'])."VNĐ"?></td>
            <td><?php echo $result['productQuantity'] ?></td>
            <td><?php echo $result['category_name'] ?></td>
           <td>
              <a href="productedit.php?productid=<?php echo $result['productId']?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
               <a onclick="return confirm('Bạn có chắc muốn xóa hay không?')" href="?delId=<?php echo $result['productId']?>" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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
<?php include 'inc/footer.php';?>
