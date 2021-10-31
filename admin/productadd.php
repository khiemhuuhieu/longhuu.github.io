<?php include 'inc/header.php';?>
<?php include '../classes/category.php'?>
<?php include '../classes/product.php'?>
<?php
$pd= new product();
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
      {

       $insertProduct =$pd->insert_product($_POST,$_FILES);

      }
?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm<br>
                        </header>
                        <div class="panel-body">
                             <?php
                                if(isset($insertProduct)){
                                    echo $insertProduct;
                                }
                            ?>
                            <div class="position-center">
                            <form role="form" method="POST" action="" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label for="exampleInputCategory">Tên sách</label>
                                    <input type="text" class="form-control" name="productName" id="slug" onkeyup="ChangeToSlug();" placeholder="Thêm sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSlug">Slug</label>
                                    <input type="text" class="form-control" id="convert_slug" placeholder="Slug" name="productSlug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDecs">Giá tiền</label>
                                    <input type="text" class="form-control" id="exampleInputDecs" placeholder="Desc" name="productPrice">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDecs">Số lượng</label>
                                    <input type="number" min="1" class="form-control" id="exampleInputDecs" placeholder="Số lượng" name="productQuantity">
                                </div>  
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh đại diện</label>
                                    <input type="file" class="form-control" name="image" placeholder="Tải ảnh đại diện..">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả chi tiết</label>
                                     <textarea style="resize: none;" rows="6" class="form-control" name="productDesc" id="exampleInputEmail1" name="editor1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputOption">Danh mục</label>
                                   <select name="category_id" id="idcategory" class="form-control input-sm m-bot15">
                                     
                                       <option>-------Select Category------</option>
                                            <?php
                                            $cate=new category();
                                            $catelist=$cate->show_category();
                                            if($catelist)
                                            {
                                             while($result=$catelist->fetch_assoc()){

                                            ?>
                                        <option value="<?php echo $result['category_id']?>"><?php echo $result['category_name']; ?></option>
                                        <?php
                                        }
                                          }
                                        ?>
                                   </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputOption">Sắp xếp hiển thị</label>
                                   <select name="orderbydisplay" id="idcategory" class="form-control input-sm m-bot15">
                                     
                                       <option value="0">Sách tuyển chọn</option>
                                       <option value="1">Sách giảm giá</option>
                                       <option value="2">Sách sắp phát hành</option>
                                       <option value="3">Sách hay nên đọc</option>
                                   </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-info">Thêm</button>
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>

<?php include 'inc/footer.php';?>


