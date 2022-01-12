<?php 
ob_start();
session_start();
include 'connection.php';

if (isset($_POST['generalsettingupdate'])) {
    $general_setting_update = $db -> prepare("UPDATE settings SET 
    setting_title=:title,
    setting_phone=:phone,
    setting_mail=:mail,
    setting_logo=:logo,
    setting_adress=:adress,
    setting_slider=:slider,
    setting_working_hours=:working_hours
    WHERE setting_id = 0");
    $update = $general_setting_update -> execute(array('title' => $_POST['setting_title'],  'phone' => $_POST['setting_phone'], 
    'mail' => $_POST['setting_mail'], 'logo' => $_POST['setting_logo'], 'adress' => $_POST['setting_adress'], 'working_hours'=> $_POST['setting_working_hours'], 'slider'=>$_POST['setting_slider']));

    if ($update) {
        Header("Location: ../production/general-setting.php?status=ok");
    }else{
        Header("Location: ../production/general-setting.php?status=no");
    }
    
}

if (isset($_POST['linksettingupdate'])) {
   $link_setting_update = $db ->prepare("UPDATE settings SET 
   setting_recapctha=:recapctha,
   setting_goooglemap=:googlemap,
   setting_analystic=:analystic,
   setting_facebook=:facebook,
   setting_twitter=:twitter,
   setting_youtube=:youtube,
   setting_google=:google
   WHERE setting_id=0");
   $update = $link_setting_update ->execute(array('recapctha' => $_POST['setting_recapctha'], 'googlemap' => $_POST['setting_goooglemap'], 'analystic' => $_POST['setting_analystic'],
    'facebook' => $_POST['setting_facebook'], 'twitter' => $_POST['setting_twitter'], 'youtube' => $_POST['setting_youtube'], 'google' => $_POST['setting_google'] ));

    if ($update) {
        Header("Location: ../production/link-setting.php?status=ok");
    }else {
        Header("Location: ../production/link-setting.php?status=no");
    }
}

if (isset($_POST['smtpsettingupdate'])) {
    $smtp_setting_update = $db -> prepare("UPDATE settings SET
    setting_smtphost=:smtphost,
    setting_smtpuser=:smtpuser,
    setting_smtppassword=:smtppassword,
    setting_smtpport=:smtpport
    WHERE setting_id=0");
    $update = $smtp_setting_update ->execute(array('smtphost' => $_POST['setting_smtphost'], 'smtpuser' => $_POST['setting_smtpuser'],
    'smtppassword' => $_POST['setting_smtppassword'], 'smtpport' => $_POST['setting_smtpport']));

    if ($update) {
        header("Location: ../production/smtp-setting.php?status=ok");
    }else {
        header("Location: ../production/smtp-setting.php?status=no");
    }
}

if (isset($_POST['aboutusupdate'])) {
    $aboutus_update = $db ->prepare("UPDATE aboutus SET
    aboutus_title=:title,
    aboutus_text=:desc_text,
    aboutus_video=:video,
    aboutus_vision=:vision,
    aboutus_mision=:mision
    WHERE aboutus_id=0");
    $update= $aboutus_update ->execute(array('title'=>$_POST['aboutus_title'], 'desc_text'=>$_POST['aboutus_text'], 'video'=>$_POST['aboutus_video'], 
    'vision'=>$_POST['aboutus_vision'], 'mision'=>$_POST['aboutus_mision']));

    if ($update) {
        header("Location: ../production/about-us.php?status=ok");
    }else {
        header("Location: ../production/about-us.php?status=no");
    }
}

if (isset($_POST['slideradd'])) {

    $uploads_dir = "../../image/sliders";
    @$tmp_name = $_FILES['slider_image']["tmp_name"];
    @$name = $_FILES['slider_image']['name'];

    $unique1 = rand(1, 1000);
    $unique2 = rand(1, 1000);
    $unique3 = rand(1, 1000);
    $unique4 = rand(1, 1000);

    $unique_name = $unique1 . $unique2 . $unique3 . $unique4;

    $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");

    $slider_add = $db->prepare("INSERT INTO sliders SET
    slider_name=:s_name,
    slider_image=:s_image,
    slider_estate_name=:estate_name,
    slider_estate_price=:estate_price,
    slider_show=:s_show");

    $s_insert = $slider_add ->execute(array('s_name' => $_POST['slider_name'],  
    's_image' => $img_path, 'estate_name' => $_POST['slider_estate_name'], 'estate_price' => $_POST['slider_estate_price'], 's_show' => $_POST['slider_show'] ));

    if ($s_insert) {
        header("Location: ../production/sliders.php?status=ok");
    }else {
        header("Location: ../production/sliders.php?status=no");
    }
}

if (isset($_POST['menuadd'])) {
    if(!empty($_POST['menu_up'])) {
        $selected = $_POST['menu_up'];
        $menu_add = $db->prepare("INSERT INTO menus SET
    menu_name=:m_name,
    menu_url=:m_url,
    menu_row=:m_row,
    menu_up=:m_up");

    $insert = $menu_add ->execute(array('m_name' => $_POST['menu_name'], 'm_url' => $_POST['menu_url'],
     'm_row' => $_POST['menu_row'], 'm_up'=> $selected ));

    if ($insert) {
        header("Location: ../production/menu_list.php?status=ok");
    }else {
        header("Location: ../production/menu_list.php?status=no");
    }
    }else {
        $menu_add = $db->prepare("INSERT INTO menus SET
    menu_name=:m_name,
    menu_url=:m_url,
    menu_row=:m_row,
    menu_up=:m_up");

    $insert = $menu_add ->execute(array('m_name' => $_POST['menu_name'], 'm_url' => $_POST['menu_url'],
     'm_row' => $_POST['menu_row'], 'm_up'=> 0));

    if ($insert) {
        header("Location: ../production/menu_list.php?status=ok");
    }else {
        header("Location: ../production/menu_list.php?status=no");
    }
    }
    
}

if (isset($_POST['menuupdate'])) {
    $menu_id=$_POST['menu_id'];
    $menu_update = $db->prepare("UPDATE menus SET
    menu_name=:m_name,
    menu_url=:m_url,
    menu_row=:m_row
    WHERE menu_id=$menu_id");

    $save=$menu_update->execute(array('m_name'=>$_POST['menu_name'], 'm_url'=>$_POST['menu_url'], 'm_row'=>$_POST['menu_row']));

    if ($save) {
        header("Location: ../production/menu_list.php?update=ok");
    }else {
        header("Location: ../production/menu_list.php?update=no");
    }
}

if ($_GET['menudelete']=='ok') {
    $delete = $db ->prepare("DELETE FROM menus WHERE menu_id=:menu_id");
    $save = $delete->execute(array('menu_id'=>$_GET['menu_id']));

    
    if ($save) {
        header("Location: ../production/menu_list.php?delete_status=ok");
    }else {
        header("Location: ../production/menu_list.php?delete_status=no");
    }
}


if (isset($_POST['sliderupdate'])) {
    if ($_FILES['slider_image']['size']>0) {
        $slider_id = $_POST['slider_id'];
        $uploads_dir = "../../image/sliders";
        @$tmp_name = $_FILES['slider_image']["tmp_name"];
        @$name = $_FILES['slider_image']['name'];
        $unique1 = rand(1, 1000);
        $unique2 = rand(1, 1000);
        $unique3 = rand(1, 1000);
        $unique4 = rand(1, 1000);
        $unique_name = $unique1 . $unique2 . $unique3 . $unique4;
        $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");
    
        $slider_update = $db ->prepare("UPDATE sliders SET 
        slider_name=:s_name,
        slider_estate_name=:estate_name,
        slider_estate_price=:estate_price,
        slider_image=:s_image,
        slider_show=:s_show
        WHERE slider_id = $slider_id");
    
        $save = $slider_update ->execute(array('s_name'=>$_POST['slider_name'],'estate_name'=>$_POST['slider_estate_name'],'estate_price'=>$_POST['slider_estate_price'],
         's_image'=>$img_path, 's_show'=>$_POST['slider_show']));
    
        

        if ($save) {
            $imagedeletefolder = $_POST['slider_image'];
            unlink("../../$imagedeletefolder");
            header("Location: ../production/slider_edit.php?slider_id=$slider_id&status=ok");
        }else {
            header("Location: ../production/slider_edit.php?slider_id=$slider_id&status=no");
        }
    }else {
        $slider_id = $_POST['slider_id'];
        $slider_update = $db ->prepare("UPDATE sliders SET 
        slider_toplabel=:toplabel,
        slider_mainlabel=:mainlabel,
        slider_bottomlabel=:bottomlabel,
        slider_button=:s_button,
        slider_link=:s_link,
        slider_show=:s_show
        WHERE slider_id = $slider_id");
    
        $save = $slider_update ->execute(array('toplabel'=>$_POST['slider_toplabel'],'mainlabel'=>$_POST['slider_mainlabel'],'bottomlabel'=>$_POST['slider_bottomlabel'],
        's_button'=>$_POST['slider_button'], 's_link'=>$_POST['slider_link'], 's_show'=>$_POST['slider_show']));
    
        if ($save) {
            header("Location: ../production/slider_edit.php?slider_id=$slider_id&status=ok");
        }else {
            header("Location: ../production/slider_edit.php?slider_id=$slider_id&status=no");
        }
    }
   
}

if ($_GET['sliderdelete']=="ok") {

    $slider_delete = $db ->prepare("DELETE FROM sliders WHERE slider_id=:slider_id");

    $save= $slider_delete->execute(array('slider_id' => $_GET['slider_id']));

    if ($save) {
        header("Location: ../production/sliders.php?delete_status=ok");
    }else {
        header("Location: ../production/sliders.php?delete_status=no");
    }
}


if (isset($_POST['estateupdate'])) {
    if ($_FILES['estate_image']['size']>0) {
    $estate_id = $_POST['estate_id'];
    $uploads_dir = "../../image/estates";
    @$tmp_name = $_FILES['estate_image']["tmp_name"];
    @$name = $_FILES['estate_image']['name'];

    $unique1 = rand(1, 1000);
    $unique2 = rand(1, 1000);
    $unique3 = rand(1, 1000);
    $unique4 = rand(1, 1000);

    $unique_name = $unique1 . $unique2 . $unique3 . $unique4;

    $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");

    $estate_update = $db->prepare("UPDATE estates SET 
    estate_name=:e_name,
    estate_description=:e_desc,
    estate_price=:e_price,
    estate_adress=:e_adress,
    estate_image=:e_image,
    estate_sale=:e_sale,
    estate_show=:e_show
    WHERE estate_id=$estate_id
    ");
    $save=$estate_update->execute(array(  
    'e_name'=>$_POST['estate_name'], 
    'e_desc'=>$_POST['estate_description'], 
    'e_price'=>$_POST['estate_price'], 
    'e_image'=>$img_path,
    'e_adress'=>$_POST['estate_adress'], 
    'e_sale'=>$_POST['estate_sale'], 
    'e_show'=>$_POST['estate_show']  ));

    if ($save) {
        header("Location: ../production/estate_edit.php?estate_id=$estate_id&status=ok");
    }else {
        header("Location: ../production/estate_edit.php?estate_id=$estate_id&status=ok");
    }
}else {
    $estate_id = $_POST['estate_id'];
    $estate_update = $db->prepare("UPDATE estates SET 
    estate_name=:e_name,
    estate_description=:e_desc,
    estate_price=:e_price,
    estate_adress=:e_adress,
    estate_sale=:e_sale,
    estate_show=:e_show
    WHERE estate_id=$estate_id
    ");
    $save=$estate_update->execute(array(
    'e_name'=>$_POST['estate_name'], 
    'e_desc'=>$_POST['estate_description'], 
    'e_price'=>$_POST['estate_price'], 
    'e_adress'=>$_POST['estate_adress'], 
    'e_sale'=>$_POST['estate_sale'], 
    'e_show'=>$_POST['estate_show']  ));

    if ($save) {
        header("Location: ../production/estate_edit.php?estate_id=$estate_id&status=ok");
    }else {
        header("Location: ../production/estate_edit.php?estate_id=$estate_id&status=ok");
    }
}


}

if (isset($_POST['estateadd'])) {
    $date = date('Y-m-d H:i:s ');
    $uploads_dir = "../../image/estates";
    @$tmp_name = $_FILES['estate_image']["tmp_name"];
    @$name = $_FILES['estate_image']['name'];

    $unique1 = rand(1, 1000);
    $unique2 = rand(1, 1000);
    $unique3 = rand(1, 1000);
    $unique4 = rand(1, 1000);

    $unique_name = $unique1 . $unique2 . $unique3 . $unique4;

    $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");
    

    $news_add = $db->prepare("INSERT INTO estates SET
    estate_name=:e_name,
    estate_description=:e_desc,
    estate_price=:e_price,
    estate_adress=:e_adress,
    estate_image=:e_image,
    estate_date=:e_date,
    estate_sale=:e_sale,
    estate_show=:e_show");

    $n_insert = $news_add ->execute(array(
    'e_name'=>$_POST['estate_name'], 
    'e_desc'=>$_POST['estate_description'], 
    'e_price'=>$_POST['estate_price'], 
    'e_image'=>$img_path,
    'e_adress'=>$_POST['estate_adress'], 
    'e_date'=>$date, 
    'e_sale'=>$_POST['estate_sale'], 
    'e_show'=>$_POST['estate_show']));

    if ($n_insert) {
        header("Location: ../production/estates.php?status=ok");
    }else {
        header("Location: ../production/estates.php?status=no");
    }
}

if (isset($_POST['estateadduser'])) {
    $estate_name = $_POST['estate_name'];
    $_SESSION['estate_name_val'] = $estate_name;
    $estate_image = $_POST['estate_image'];
    $_SESSION['estate_image_val'] = $estate_image;
    $estate_description = $_POST['estate_description'];
    $_SESSION['estate_desc_val'] = $estate_description;
    $estate_price = $_POST['estate_price'];
    $_SESSION['estate_price_val'] = $estate_price;
    $estate_adress = $_POST['estate_adress'];
    $_SESSION['estate_adress_val'] = $estate_adress;
    $estate_sale = $_POST['estate_sale'];
    $estate_city = $_POST['estate_city'];
    $owner_name = $_POST['estate_owner_name'];
    $_SESSION['owner_name_val'] = $owner_name;
    $owner_phone = $_POST['estate_owner_phone'];
    $_SESSION['owner_phone_val'] = $owner_phone;
    $owner_mail = $_POST['estate_owner_mail'];
    $_SESSION['owner_mail_val'] = $owner_mail;

    

    if (empty($estate_name) || empty($estate_price) || empty($estate_adress) || empty($estate_city) || empty($owner_name) || empty($owner_phone) || empty($owner_mail)) {
        header("Location:../../estate_add.php");
        if(empty($estate_name ) ){
            $_SESSION['name_err']= "boş buraxıla bilməz";
        }else{
            if (!preg_match("/^[a-zA-Z0-9]*$/",$estate_name)) {
                $_SESSION['name_err']= "yalnız hərf və rəqəm yazılmalıdır";
                header("Location: ../../estate_add.php");
            }
        };

        if(empty($estate_image ) ){
            $_SESSION['image_err']= "boş buraxıla bilməz";
        }else{
            if ( count(array_filter($_FILES['estate_image']['name']))<4) {
                $_SESSION['image_err']= "şəkil sayı 4-dən az olmamalıdır";
                header("Location: ../../estate_add.php");

            }
        };


    
        if(empty($estate_price ) ){
            $_SESSION['price_err']= "boş buraxıla bilməz";
        }else{
            if (!preg_match("/[0-9]/",$estate_price)) {
                $_SESSION['price_err']= "yalnız rəqəm yazılmalıdır";
                                header("Location: ../../estate_add.php");

            }else{
                if ($estate_price<10) {
                    $_SESSION['price_err']= "qiymət 10AZN-dən kiçik olmamalıdır";
                                    header("Location: ../../estate_add.php");

                }
            }
            
        }
    
        if(empty($estate_adress ) ){
            $_SESSION['adress_err']= "boş buraxıla bilməz";
        }else{
            if (!preg_match("/[a-zA-Z0-9\.\,]/",$estate_adress)) {
                $_SESSION['adress_err']= "yalnız hərf və rəqəm yazılmalıdır";
                                header("Location: ../../estate_add.php");

            }
        }
    
        if (empty($estate_city)) {
            $_SESSION['city_err'] = "boş buraxıla bilməz";
        }
    
        if (empty($owner_name)) {
            $_SESSION['owner_name_err'] = "boş buraxıla bilməz";
        }else{
            if (!preg_match("/[a-zA-Z0-9]/",$owner_name)) {
                $_SESSION['owner_name_err'] = "yalnız hərf və rəqəm yazılmalıdır";
                                header("Location: ../../estate_add.php");

            }
        }
    
        if (empty($owner_phone)) {
            $_SESSION['owner_phone_err'] = "boş buraxıla bilməz";
        }else{
            if (!preg_match("/[0-9]/",$owner_phone)) {
                $_SESSION['owner_phone_err'] = "yalnız rəqəm yazılmalıdır";
                                header("Location: ../../estate_add.php");

            }
        }
    
        
    
        if (empty($owner_mail)) {
            $_SESSION['owner_mail_err'] = "boş buraxıla bilməz";
        }else{
            if (!preg_match("/([a-zA-Z0-9])+\@([a-zA-Z0-9])+\.[a-zA-Z]{2,}/",$owner_mail)) {
                $_SESSION['owner_mail_err'] = "düzgün mail qeyd edin";
                                header("Location: ../../estate_add.php");

            }
        }
        exit;

    }   else{
        $date = date('Y-m-d H:i:s ');
        $news_add = $db->prepare("INSERT INTO estates SET
        estate_name=:e_name,
        estate_description=:e_desc,
        estate_price=:e_price,
        estate_adress=:e_adress,
        estate_date=:e_date,
        estate_sale=:e_sale,
        estate_show=:e_show,
        city_id=:e_city,
        estate_owner_name=:owner_name,
        estate_owner_phone=:owner_phone,
        estate_owner_mail=:owner_mail");
    
        $n_insert = $news_add ->execute(array(
        'e_name'=>$_POST['estate_name'], 
        'e_desc'=>$_POST['estate_description'], 
        'e_price'=>$_POST['estate_price'], 
        'e_adress'=>$_POST['estate_adress'], 
        'e_date'=>$date, 
        'e_sale'=>$_POST['estate_sale'], 
        'e_show'=>'0',
        'e_city'=>$_POST['estate_city'],
        'owner_name'=>$_POST['estate_owner_name'],
        'owner_phone'=>$_POST['estate_owner_phone'],
        'owner_mail'=>$_POST['estate_owner_mail']
    ));
    
        $select_estate = $db->prepare("SELECT * from estates ORDER BY estate_date DESC");
        $select_estate->execute();
        $estate_select = $select_estate->fetch(PDO::FETCH_ASSOC);
    
        $test = $estate_select['estate_id'];
        
        foreach($_FILES['estate_image']['name'] as $key=>$val){
            $date = date('Y-m-d H:i:s');
            $uploads_dir = "../../image/estates";
            @$tmp_name = $_FILES['estate_image']["tmp_name"];
            // @$name = $_FILES['estate_image']['name'];
        
            $unique1 = rand(1, 1000);
            $unique2 = rand(1, 1000);
            $unique3 = rand(1, 1000);
            $unique4 = rand(1, 1000);
            $unique_name = $unique1 . $unique2 . $unique3 . $unique4;
        
            $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $val;
        
            echo @move_uploaded_file($tmp_name[$key], "$uploads_dir/$unique_name$val");
            
            $image_add = $db->prepare("INSERT INTO estate_image SET
        image_url=:e_image,
        estate_id=:e_id");
    
    $save = $image_add ->execute(array(
        'e_image'=>$img_path,
        'e_id'=>$test
    ));
            }
    }
    
    

   

    

    // if (empty($estate_name||$estate_price||$estate_adress||$estate_city||$owner_name||$owner_phone||$owner_mail)) {
    //     header("Location: ../../estate_add.php");
    //    return false;
    // }

    
    
        

        

    if ($n_insert) {
        header("Location: ../../estate_add.php?status=ok");
    }else {
        header("Location: ../../estate_add.php?status=no");
    }
}


if ($_GET['estatedelete']=="ok") {

    $estate_delete = $db ->prepare("DELETE FROM estates WHERE estate_id=:estate_id");

    $save= $estate_delete->execute(array('estate_id' => $_GET['estate_id']));

    if ($save) {
        header("Location: ../production/estates.php?delete_status=ok");
    }else {
        header("Location: ../production/estates.php?delete_status=no");
    }
}


if (isset($_POST['logoupdate'])) {
        $uploads_dir = "../../image/settings";
        @$tmp_name = $_FILES['setting_logo']["tmp_name"];
        @$name = $_FILES['setting_logo']['name'];
        $unique1 = rand(1, 1000);
        $unique2 = rand(1, 1000);
        $unique3 = rand(1, 1000);
        $unique4 = rand(1, 1000);
        $unique_name = $unique1 . $unique2 . $unique3 . $unique4;
        $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");
    
        $update = $db ->prepare("UPDATE settings SET 
        setting_logo =:logo
        WHERE setting_id = 0");
    
        $save = $update ->execute(array('logo'=>$img_path));

        if ($save) {
            $imagedeletefolder = $_POST['old_logo'];
            unlink("../../$imagedeletefolder");
            header("Location: ../production/general-setting.php?status=ok");
        }else {
            header("Location: ../production/general-setting.php?status=no");
        }
   
}


if (isset($_POST['loggin'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = md5($_POST['admin_password']) ;

    if ($admin_username && $admin_password) {
        $query = $db->prepare("SELECT * FROM admin_users WHERE admin_username=:a_username and admin_password=:a_password");
        $query ->execute(array(
            'a_username' => $admin_username,
            'a_password' => $admin_password
        ));
        $count = $query->rowCount();
        $save = $query->fetch(PDO::FETCH_ASSOC);

        if ($count>0) {
            $_SESSION['admin']=$admin_username;
            $_SESSION['admin_image']= $save['admin_image'];
            $_SESSION['admin_id'] = $save['admin_id'];
            $_SESSION['admin_show']=$save['admin_status'];

            header("Location: ../production/index.php");
        }else {
            header("Location: ../production/login.php?status=no");
        }

    }
}

if (isset($_POST['userupdate'])) {
    $admin_password = md5($_POST['admin_password']);
    
        $admin_id = $_POST['admin_id'];
        $admin_update = $db ->prepare("UPDATE admin_users SET 
        admin_username=:a_username,
        admin_password=:a_password,
        admin_status=:a_status
        WHERE admin_id = $admin_id");
        
    
        $save = $admin_update ->execute(array('a_username'=>$_POST['admin_username'],'a_password'=>$admin_password,
        'a_status'=>$_POST['admin_status']));
        
        if ($save) {
            header("Location: ../production/user_edit.php?admin_id=$admin_id&status=ok");
        }else {
            header("Location: ../production/user_edit.php?admin_id=$admin_id&status=no");
        }
   
}

if ($_GET['admin_users_delete']=='ok') {
    $admin_id = $_GET['admin_id'];
    $delete = $db ->prepare("DELETE FROM admin_users WHERE admin_id=:admin_id");
    $delete->bindParam(":admin_id",$admin_id,PDO::PARAM_INT);
    $save = $delete->execute();

    
    if ($save) {
        header("Location: ../production/users.php?delete_status=ok");
    }else {
        header("Location: ../production/users.php?delete_status=no");
    }
}

if (isset($_POST['userlogoupdate'])) {
    $admin_id = $_POST['admin_id'];
    $uploads_dir = "../../image/admins";
    @$tmp_name = $_FILES['admin_image']["tmp_name"];
    @$name = $_FILES['admin_image']['name'];
    $unique1 = rand(1, 1000);
    $unique2 = rand(1, 1000);
    $unique3 = rand(1, 1000);
    $unique4 = rand(1, 1000);
    $unique_name = $unique1 . $unique2 . $unique3 . $unique4;
    $img_path = substr($uploads_dir, 6) . "/" . $unique_name . $name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$unique_name$name");

    $update = $db ->prepare("UPDATE admin_users SET 
    admin_image =:a_image
    WHERE admin_id = $admin_id");

    $save = $update ->execute(array('a_image'=>$img_path));

    if ($save) {
        $imagedeletefolder = $_POST['old_image'];
        unlink("../../image/admins/$imagedeletefolder");
        header("Location: ../production/user_edit.php?admin_id=$admin_id&status=ok");
    }else {
        header("Location: ../production/user_edit.php?admin_id=$admin_id&status=no");
    }

}
