<?php include 'inc/header.php';
?>
<?php
include '../classes/product.php';
?>
<?php

$product= new product();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
      {
       $insertSlider =$product->insert_Slider($_POST,$_FILES);
      }
?>
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm slider<br>
                        </header>
                        <div class="panel-body">
                             <?php
                                if(isset($insertSlider)){
                                    echo $insertSlider;
                                }
                            ?>   
                            <div class="position-center">
                                <form role="form" method="POST" autocomplete="off" action="">
                                <div class="form-group">
                                    <label for="exampleInputCategory">Tên slider</label>
                                    <input type="text" class="form-control" name="sliderName">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSlug">Hình ảnh</label>
                                    <input type="file" class="form-control"  name="image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputOption">Hiển thị</label>
                                   <select name="staus"class="form-control input-sm m-bot15">
                                     
                                       <option value="0">Hiện</option>
                                       <option value="1">Ẩn</option>
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