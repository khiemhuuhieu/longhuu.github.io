<?php include 'inc/header.php';?>

<?php include '../classes/category.php'?>
<?php include '../classes/product.php'?>

<?php
$pd= new product();

 if(isset($_GET['productid']) && $_GET['productid']==NULL)
{
  echo "<script>window.location='productlist.php' </script>";
}
else
{
  $id=$_GET['productid'];
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']))
{
  $productName=$_POST['productName'];
  $updateProduct=$pd->updateProduct($_POST,$_FILES,$id);
}
?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm<br>
                        </header>
                        <div class="panel-body">
                            <?php
                                if(isset($updateProduct)){
                                    echo $updateProduct;
                                }
                            ?>  
                            <?php
                            $get_product_id=$pd->getproductbyid($id);
                            if($get_product_id){
                                while ($result_pr=$get_product_id->fetch_assoc()) {
                                    
                            ?> 
                            <div class="position-center">
                                <form role="form" method="POST" autocomplete="off" action="" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="exampleInputCategory">Tên sách</label>
                                    <input type="text" class="form-control" name="productName" id="slug" onkeyup="ChangeToSlug();" placeholder="Thêm sản phẩm" value="<?php echo $result_pr['productName']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSlug">Slug</label>
                                    <input type="text" class="form-control" id="convert_slug" placeholder="Slug" name="productSlug" value="<?php echo $result_pr['productSlug']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDecs">Giá tiền</label>
                                    <input type="text" class="form-control"  placeholder="Tien" name="productPrice" value="<?php echo $result_pr['productPrice']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDecs">Số lượng</label>
                                    <input type="number" min="1" class="form-control" id="exampleInputDecs" placeholder="Số lượng" name="productQuantity" value="<?php echo $result_pr['productQuantity']?>">
                                </div>  
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh đại diện</label>
                                    <input type="file" class="form-control" name="image" placeholder="Tải ảnh đại diện..">
                                    <p><img src="upload/<?php echo $result_pr['image']?>" height="100" width="100"></p>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả chi tiết</label>
                            <textarea style="resize: none;" rows="6" class="form-control" id="ckeditor" name="productDesc" id="exampleInputEmail1"><?php echo $result_pr['productDesc']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputOption">Danh mục</label>
                                   <select name="category_id" class="form-control input-sm m-bot15">
                                     <option>-------Select Category------</option>
                                        <?php
                                        $cate=new category();
                                        $catelist=$cate->show_category();
                                        if($catelist)
                                        {
                                            while($result=$catelist->fetch_assoc()){
                                        ?>
                                        <option
                                        <?php
                                        if($result['category_id']==$result_pr['category_id'])
                                        {
                                          echo "selected";
                                        }
                                        ?> 
                                        value="<?php echo $result['category_id']?>"><?php echo $result['category_name'];?></option>
                                        <?php
                                    }
                                        } 
                                        ?> 
                                   </select>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputOption">Sắp xếp hiển thị</label>
                                   <select name="orderbydisplay" class="form-control input-sm m-bot15">
                                       <option value="0">Sách tuyển chọn</option>
                                       <option value="1">Sách giảm giá</option>
                                       <option value="2">Sách sắp phát hành</option>
                                       <option value="3">Sách hay nên đọc</option>
                                   </select>
                                </div>
                              
                                <button type="submit" name="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            <?php
                        }
                     }
                            ?>
                        </div>
                    </section>
            </div>
        </div>

<?php include 'inc/footer.php';?>


