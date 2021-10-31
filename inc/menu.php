 <!-- noi dung danh muc sach(categories) + banner slider -->
    <section class="header bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="margin-right: -15px;">
                    <!-- CATEGORIES -->
                    <div class="categorycontent">
                        <ul><?php
                                $show_category=$cate->show_cate_fe();
                                if($show_category){
                                while ($result=$show_category->fetch_assoc()) {
                                    
                                ?>
                            <li><a href="showProductByCate.php?categoryId=<?php echo $result['category_id']?>"><?php echo $result['category_name'] ?></a>  
                            </li>
                            <?php
                              }
                            }
                            ?>
                        </ul>
                    </div>
                </div>