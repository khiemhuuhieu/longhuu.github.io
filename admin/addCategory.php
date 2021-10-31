<?php include 'inc/header.php';
?>
<?php
include '../classes/category.php';
?>
<?php

$cat= new category();
    if($_SERVER['REQUEST_METHOD'] === 'POST')
      {
         
       $category_name=$_POST['category_name'];
       $category_slug=$_POST['category_slug'];
       $category_desc=$_POST['category_desc'];

       $insertCat = $cat->insert_category($category_name, $category_slug, $category_desc);
      }
?>
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm<br>
                        </header>
                        <div class="panel-body">
                             <?php
                                if(isset($insertCat))
                                {
                                  echo $insertCat;
                                }
                            ?>
                            <div class="position-center">
                                <form role="form" method="POST" autocomplete="off" action="">
                                <div class="form-group">
                                    <label for="exampleInputCategory">Tên danh mục</label>
                                    <input type="text" class="form-control" name="category_name" id="slug" onkeyup="ChangeToSlug();" placeholder="Thêm danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSlug">Slug</label>
                                    <input type="text" class="form-control" id="convert_slug" placeholder="Slug" name="category_slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none;" rows="6" class="form-control" name="category_desc"  placeholder="Mô ta"></textarea>
                                </div>
                                <button type="submit" name="addcategory" class="btn btn-info">Thêm</button>
                            </form>
                            </div>
                        </div>
                    </section>
            </div>
        </div>

<?php include 'inc/footer.php';?>