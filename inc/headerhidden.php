 <style type="text/css">
 .nav_css{
    height: 40px;
    width: 100%;

   }
   .nav_css ul li{
    float: left;
    line-height: 40px;
    padding: 0px 10px;
   }
 .nav_css ul{
        height: 40px;
        float: left;
        list-style: none;

     }
.nav_css ul li a{
        color: white;
        text-decoration: none;
        font-weight: bold;
        padding-bottom: 10px;
     }

 </style>
<link rel="stylesheet" href="css/gio-hang.css">
 <!-- thanh "danh muc sach" đã được ẩn bên trong + hotline + ho tro truc tuyen -->
    <section class="duoinavbar">
        <div class="container text-white">
            <div class="row justify">
                <div class="col-lg-3 col-md-5">
                    <div class="categoryheader">
                        <div class="noidungheader text-white">
                            <i class="fa fa-bars"></i>
                            <span class="text-uppercase font-weight-bold ml-1">Danh mục sách</span>
                        </div>
                        <!-- CATEGORIES -->
                        <div class="categorycontent">
                            <ul><?php
                                $show_category=$cate->show_cate_fe();
                                if($show_category){
                                while ($result=$show_category->fetch_assoc()) {
                                    
                                ?>
                                <li> <a href="showProductByCate.php?categoryId=<?php echo $result['category_id']?>"><?php echo $result['category_name'] ?></a>
                                </li>
                                <?php
                            }
                        }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="nav_css">
                        <ul>
                           <?php
                                  $customer_id=session::get('customer_id');
                                  $check_order=$cart->check_session_order($customer_id);
                                  if($check_order==true)
                                  {
                                    echo '<li><a href="orderdetails.php">ĐƠN HÀNG</a></li>';
                                  }
                                  else{
                                    echo '';
                                  }
                                  ?>
                                <?php
                                      $login_check=session::get('customer_login');
                                      if($login_check==true){
                                        echo '<li><a href="like.php">YÊU THÍCH</a></li>';
                                      }
                                      else{
                                        echo '';
                                      }
                              ?>
                       </ul>
                    </div>
                </div>
                <div class="col-md-3 ml-auto contact d-none d-md-block">
                    <div class="benphai float-right">
                        <div class="hotline">
                            <i class="fa fa-phone"></i>
                            <span>Hotline:<b>0398202124</b> </span>
                        </div>
                        <i class="fas fa-comments-dollar"></i>
                        <a href="#">Hỗ trợ trực tuyến </a>
                    </div>
                </div>
            </div>
        </div>
    </section>