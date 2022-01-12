<?php include 'header.php';
      include '../netting/executer.php';

$setting_id = 0;
$settingquery = $db->prepare("SELECT * FROM settings WHERE setting_id=:setting_id");
$settingquery->bindParam(":setting_id",$setting_id,PDO::PARAM_INT);
$settingquery->execute();
$settingpull = $settingquery->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Setting Panel</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>General setting <?php if ($_GET['status']=='ok') {?>
              <span style="color: green; padding-left:15px;">Dəyişikliklər qeyd olundu...</span>
            <?php }else if($_GET['status']=='no'){?>
              <span style="color: red; padding-left:15px;">Dəyişikliklər qeyd olunmadı...</span>
            <?php } ?> </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
            <div class="x_content">

            <form action="../netting/executer.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
              <input type="hidden" name="old_logo" value="<?php echo $settingpull['setting_logo'] ?>">
              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş logo<span class="required">*</span>
                        </label>
                        <div style="margin-left:10px; background-color: gray; width:350px;" class="col-md-6 col-sm-6 col-xs-12">
                        <img width="250px" height="100px" src="../../<?php echo $settingpull['setting_logo'] ?>" alt="">
                        </div>
              </div>  
              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name" name="setting_logo"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>    
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="logoupdate" class="btn btn-success">Submit</button>
                        </div>
                      </div>
            </form>
            <div class="ln_solid"></div>
              
              <form action="../netting/executer.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
               
              
              <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="setting_title" required="required" value="<?php echo $settingpull['setting_title']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="setting_phone" required="required" value="<?php echo $settingpull['setting_phone']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mail <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="setting_mail" required="required" value="<?php echo $settingpull['setting_mail']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Logo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="setting_logo" required="required" value="<?php echo $settingpull['setting_logo']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Adress <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="setting_adress" required="required" value="<?php echo $settingpull['setting_adress']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">İş saatları <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="setting_working_hours" required="required" value="<?php echo $settingpull['setting_working_hours']?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        <hr>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Slider əsas səhifədə göstərilsin<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control col-md-7 col-xs-12" name="setting_slider" required>
                            <option value="1" <?php if ($settingpull['setting_slider']=="1") { echo "selected=\"selected\"";} ?>>Bəli</option>
                            <option value="0" <?php if ($settingpull['setting_slider']=="0") { echo "selected=\"selected\"";} ?>>Xeyr</option>
                          </select>  
                        </div>
                      </div>                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="generalsettingupdate" class="btn btn-success">Submit</button>
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