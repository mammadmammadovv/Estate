<?php include 'header.php';
 

if (isset($_POST['search'])) {
  $searched_s_name = $_POST['searched_s_name'];
  $searchednamelike = "%".$searched_s_name."%";
  $estatequery = $db->prepare("SELECT * FROM estates WHERE estate_name LIKE :estate_name ");
  $estatequery->bindParam(":estate_name", $searchednamelike , PDO::PARAM_STR);
                  $estatequery->execute();
                  $count = $estatequery->rowCount();
}else {
  $estatequery = $db->prepare("SELECT * FROM estates");
                  $estatequery->execute();
                  $count = $estatequery->rowCount();
}

?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Plain Page</h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <form action="" method="POST">
          <div class="input-group">
            <input type="text" class="form-control" name="searched_s_name" placeholder="Slide axtar...">
            <span class="input-group-btn">
              <button class="btn btn-default" name="search" type="submit">Axtar!</button>
            </span>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title ">
            <h2>Əmlaklar <?php if ($count>0) {?>
              <span style="color:green;margin-left:5px;font-size: 16px;"><?php echo $count ." nəticə tapıldı..."; ?></span>
            <?php }else {?>
              <span style="color:red;margin-left:5px;font-size: 16px;"><?php echo $count ." nəticə tapıldı..."; ?></span>
           <?php } ?>   <?php  if ($_GET['status'] == 'ok') { ?>
                <span style="color: green; padding-left:15px;">Əmlak əlavə olundu...</span>
              <?php } else if ($_GET['status'] == 'no') { ?>
                <span style="color: red; padding-left:15px;">Əmlak əlavə olunmadı. Xəta baş verdi...</span>
              <?php } elseif ($_GET['delete_status']=='ok') {?>
              <span style="color: green; padding-left:15px;">Əmlak silindi...</span>
             <?php }elseif ($_GET['delete_status']=='no') {?>
              <span style="color: red; padding-left:15px;">Əmlak silinmədi...</span>
             <?php }?>
            </h2>
            <a href="estate_add.php" style="position: absolute; right:0px; top:7px;" class="btn btn-success "><i class="fa fa-plus"></i> Add Əmlak</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Əmlak şəkil </th>
                    <th class="column-title text-center">Əmlak adı </th>
                    <th class="column-title text-center">Əmlak qiyməti </th>
                    <th class="column-title text-center">Əmlak aktivlik </th>
                    <th class="column-title text-center">Actions </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($estatepull = $estatequery->fetch(PDO::FETCH_ASSOC)) {
                    $estate_id = $estatepull['estate_id'];
                    $imagequery=$db->prepare("SELECT * FROM estate_image  WHERE estate_id = :estate_id");
                    $imagequery->bindParam(":estate_id",$estate_id,PDO::PARAM_INT);
                    $imagequery->execute();
                    $imagepull = $imagequery->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <tr class="even pointer">
                      <td class=" "><img width="200px;" height="100px;" src="../../<?php echo $imagepull['image_url'] ?>" alt=""></td>
                      <td class=" text-center "><?php echo $estatepull['estate_name'] ?></td>
                      <td class=" text-center "><?php echo $estatepull['estate_price'] ?></td>
                      <td class="  text-center"><?php if ($estatepull['estate_show'] == 1) {
                                      echo "Bəli";
                                    } else {
                                      echo "Xeyr";
                                    } ?></td>
                      <td class=" text-center"><a href="estate_edit.php?estate_id=<?php echo $estatepull['estate_id'] ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit</button></a>
                        <a href="../netting/executer.php?estatedelete=ok&estate_id=<?php echo $estatepull['estate_id'] ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></a>
                      </td>
                    </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<?php include 'footer.php' ?>