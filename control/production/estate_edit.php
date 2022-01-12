<?php include 'header.php';
include '../netting/executer.php';

$estate_id = $_GET['estate_id'];
$estatequery = $db->prepare("SELECT * FROM estates WHERE estate_id=:estate_id");
$estatequery->bindParam(':estate_id', $estate_id, PDO::PARAM_INT);
$estatequery->execute();
$estatepull = $estatequery->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Əmlak dəyişdirilməsi paneli</h3>
      </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Əmlak ayarları <?php if ($_GET['status'] == 'ok') { ?>
                <span style="color: green; padding-left:15px;">Dəyişikliklər qeyd olundu...</span>
              <?php } else if ($_GET['status'] == 'no') { ?>
                <span style="color: red; padding-left:15px;">Dəyişikliklər qeyd olunmadı...</span>
              <?php } ?>
            </h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form action="../netting/executer.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <input type="hidden" name="estate_id" value="<?php echo $estatepull['estate_id'] ?>">
              <input type="hidden" name="estate_image" value="<?php echo $estatepull['estate_image'] ?>">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş şəkil<span class="required">*</span>
                </label>
                <div class="row">

                <div style="display: grid; grid-template-columns:repeat(4,1fr);" class=" col-md-6 col-sm-6 col-xs-12">
                  <?php
                  $imagequery = $db->prepare("SELECT * FROM estate_image WHERE estate_id=:estate_id");
                  $imagequery->bindParam(":estate_id",$estate_id,PDO::PARAM_INT);
                  $imagequery->execute();

                  while ($imagepull = $imagequery->fetch(PDO::FETCH_ASSOC)) { ?>
                  <div>
                  <img  style="margin-bottom:10px;margin-right:10px;width: 130px; height:130px;" src="../../<?php echo $imagepull['image_url'] ?>" alt="">

                  </div>
                  <?php } ?>

                </div>
                
                
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Əmlak adı
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="estate_name" value="<?php echo $estatepull['estate_name'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Əmlak şəkil<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name" name="estate_image" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Əmlak qiyməti<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="estate_price" value="<?php echo $estatepull['estate_price'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Əmlak haqqında məlumat <span class="required">*</span>
                </label>
                <div class="col-md-8 col-sm-8 col-xs-12">
                  <textarea class="ckeditor" id="editor" name="estate_description"><?php echo $estatepull['estate_description'] ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Əmlak adresi
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="estate_adress" value="<?php echo $estatepull['estate_adress'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Əmlak aktivlik<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="heard" class="form-control col-md-7 col-xs-12" name="estate_sale" required>
                    <?php if ($estatepull['estate_sale'] == 'Satılır') { ?>
                      <option value="Satılır">Satılır</option>
                      <option value="Kirayə">Kirayə</option>
                    <?php } else { ?>
                      <option value="Kirayə">Kirayə</option>
                      <option value="Satılır">Satılır</option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Əmlak aktivlik<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="heard" class="form-control col-md-7 col-xs-12" name="estate_show" required>
                    <?php if ($estatepull['estate_show'] == '1') { ?>
                      <option value="1">Bəli</option>
                      <option value="0">Xeyr</option>
                    <?php } else { ?>
                      <option value="0">Xeyr</option>
                      <option value="1">Bəli</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="estateupdate" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<?php include 'footer.php' ?>