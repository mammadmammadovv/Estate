<?php include 'header.php'; ?>


<div role="main" class="main">
  <div class="container">
    <div class="row mt-5 d-block">

    
      <form id="demo-form2" action="control/netting/executer.php"  method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
           
        <div class="d-flex ">
          
          <div class="col-md-6 col-xs-6 col-lg-6">
            
            <div class="form-group">
            
              <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Əmlak adı <span class="red">* <small></small></span></label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" id="esName" name="estate_name" class="form-control required  col-xs-12" value="<?php if( isset($_SESSION['estate_name_val']) ){
                                                                             echo $_SESSION['estate_name_val'];
                                                                             unset($_SESSION['estate_name_val']);} ?>">
                <span style="font-size:13px;" class="text-danger"><?php  if( isset($_SESSION['name_err']) ){
                                                                             echo $_SESSION['name_err'];
                                                                             unset($_SESSION['name_err']);} ?>
                </span> 
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Əmlak şəkil <span class="red">* <small></small></span>
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="file" id="files" name="estate_image[]" multiple class="form-control required  col-xs-12">
                <span style="font-size:13px;" class="text-danger"><?php  if( isset($_SESSION['image_err']) ){
                                                                             echo $_SESSION['image_err'];
                                                                             unset($_SESSION['image_err']);} ?>
                </span> 
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Əmlak qiyməti <span class="red">* <small></small></span>
              </label>
              <div class="col-md-4 col-sm-4 col-xs-4 d-flex">
                <input type="text" id="esPrice" name="estate_price" class="form-control required  col-xs-12"  value="<?php if( isset($_SESSION['estate_price_val']) ){
                                                                             echo $_SESSION['estate_price_val'];unset($_SESSION['estate_price_val']);
                                                                             } ?>"> <span style="position: absolute;right: -25px;top: 8px;font-size: 17px;">AZN</span>
                <div class="row">
                <span style="font-size:13px;" class="text-danger"><?php  if( isset($_SESSION['price_err']) ){
                                                                             echo $_SESSION['price_err'];
                                                                             unset($_SESSION['price_err']);} ?>
                </span> 
                </div>
                
              </div>
               
            </div>
            <div class="form-group">
              <label class="control-label col-md-12 col-sm-12 col-xs-12" for="last-name">Əmlak haqqında məlumat <span class="red">* <small></small></span>
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <textarea rows="10" cols="67" class=" required" id="editor" name="estate_description"><?php if( isset($_SESSION['estate_desc_val']) ){echo $_SESSION['estate_desc_val'];unset($_SESSION['estate_desc_val']);} ?></textarea>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-xs-6 col-lg-6">
            <div class="form-group">
              <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Əmlak adresi <span class="red">* <small></small></span>
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" id="first-name" name="estate_adress" class="form-control required  col-xs-12" value="<?php if( isset($_SESSION['estate_adress_val']) ){
                                                                             echo $_SESSION['estate_adress_val'];
                                                                             unset($_SESSION['estate_adress_val']);} ?>">
                <span style="font-size:13px;" class="text-danger"><?php  if( isset($_SESSION['adress_err']) ){
                                                                             echo $_SESSION['adress_err'];
                                                                             unset($_SESSION['adress_err']);} ?>
                </span> 
                              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-12 col-sm-12 col-xs-12" for="last-name">Əmlak satılma növü
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <select id="heard" class="form-control " name="estate_sale">
                  <option value="Satılır">Satılır</option>
                  <option value="Kirayə">Kirayə</option>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-12 col-sm-12 col-xs-12" for="last-name">Şəhər
              </label>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <select id="heard" class="form-control " name="estate_city">
                  <option value="">Şəhər seç</option>
                  <?php $cityquery = $db->prepare("SELECT * FROM cities");
                  $cityquery->execute();
                  while ($citypull = $cityquery->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $citypull['city_id'] ?>"><?php echo $citypull['city_name'] ?></option>
                  <?php  }
                  ?>
                </select>
                <span style="font-size:13px;" class="text-danger"><?php  if( isset($_SESSION['city_err']) ){
                                                                             echo $_SESSION['city_err'];
                                                                             unset($_SESSION['city_err']);} ?>
                </span> 
                              </div>
            </div>

            <div style="margin-top: 66px;" class="contact-user ">
              <span style="text-align: center;">
                <h4>Əlaqə </h4>
              </span>
              <div class="form-group">
                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Əlaqədar şəxs <span class="red">* <small></small></span>
                </label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input type="text" id="esOwnerName" name="estate_owner_name" class="form-control required col-xs-12" value="<?php if( isset($_SESSION['owner_name_val']) ){
                                                                             echo $_SESSION['owner_name_val'];
                                                                             unset($_SESSION['owner_name_val']);} ?>">
                  <span style="font-size:13px;" class="text-danger"><?php  if( isset($_SESSION['owner_name_err']) ){
                                                                             echo $_SESSION['owner_name_err'];
                                                                             unset($_SESSION['owner_name_err']);} ?>
                </span>                
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">Telefon <span class="red">* <small></small></span>
                </label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input type="text" id="phone" name="estate_owner_phone" class="form-control required col-xs-12" value="<?php if( isset($_SESSION['owner_phone_val']) ){
                                                                             echo $_SESSION['owner_phone_val'];
                                                                             unset($_SESSION['owner_phone_val']);} ?>">
                  <span style="font-size:13px;" class="text-danger"><?php  if( isset($_SESSION['owner_phone_err']) ){
                                                                             echo $_SESSION['owner_phone_err'];
                                                                             unset($_SESSION['owner_phone_err']);} ?>
                </span>  
                </div>
              </div>

              <div class="form-group">

                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">E-mail <span class="red">* <small style="font-size: 12px;"></small></span>
                </label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input type="text" id="first-name" name="estate_owner_mail" class="form-control required col-xs-12" value="<?php if( isset($_SESSION['owner_mail_val']) ){
                                                                             echo $_SESSION['owner_mail_val'];
                                                                             unset($_SESSION['owner_mail_val']);} ?>">
                  <span style="font-size:13px;" class="text-danger"><?php  if( isset($_SESSION['owner_mail_err']) ){
                                                                             echo $_SESSION['owner_mail_err'];
                                                                             unset($_SESSION['owner_mail_err']);} ?>
                </span> 
                </div>
              </div>

            </div>
          </div>
        </div>






        <div class="ln_solid"></div>
        <div style="float: right;" class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button style="padding: 10px 45px;" type="submit" name="estateadduser" class="btn btn-success">Əlavə et</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

</div>


<?php include 'footer.php'; ?>