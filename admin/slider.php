<?php
include'inc/header.php';
?>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
    Quản lý slider
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-12 text-left">  
       <button type="submit" class="btn btn-primary">
        <a href="addSlider.php" style="font-size: 18px;font-weight: bold;color: white">Thêm slider</a>
      </button>    
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
            <td></td>
            <td></td>
            <td></td>
           <td></td>
           <td></td>
          </tr>
            
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