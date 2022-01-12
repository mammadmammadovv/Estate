<div class="col-lg-9">
                <div class="row">
                    <div class="col">
                        <h2 class="font-weight-normal mb-2">
                            <strong class="text-color-secondary font-weight-extra-bold">Satılan</strong> <span class="font-weight-light">və ya</span> <strong class="text-color-secondary font-weight-extra-bold">Kirayə</strong> evlərin siyahısı
                        </h2>
                    </div>
                </div>
                <div id="listingLoadMoreWrapper" class=" row properties-listing sort-destination p-0" data-total-pages="2">
                    <?php
                        $page = $_GET['page'] ? $_GET['page'] : 1; //urlden gelen sayfa değeri var ise o değeri, yok ise 1 değeri veriyoruz.
                        $query = $db->prepare("SELECT * FROM estates");
                        $query ->execute();
                        $total_result = $query->rowCount();
                        $onpage = 6; //sayfalamada her sayfada gösterilecek veri sayısı
                        $total_pages = ceil($total_result/$onpage);//içerik sayısı ile limit değeri bölünüyor ve çıkan değer yuvarlanıyor. böylece sayfa sayısı diğer bir ifadeyse sonm sayfa değeri bulunuyor
                        //mesela 22 veri var. biz 4 er 4er listeliyoruz. 22 veriyi 6 sayfada gösterebiliriz. 
                        //22/4 = 5.5 sonucunu yukarı yuvarlayıp sayfa sayısını buluyoruz.
                        $limit = ($page-1)*$onpage;
                        /*
                        mesela ilk sayfa 1. sayfa gösterilecek ise 1-1 = 0 - 0*4=0, veritabanından 0.veriden itibaren veriler getirilmeye başlansın
                            2. sayfa gösterilecek ise 2-1 = 1 - 1*4=4, veritabanından 4. veriden itibaren veriler getirilmeye başlansın
                        */

                        if($total_pages >= $page){


                        $mainEstateQuery = "SELECT * FROM estates WHERE ";
                        $requestModels = array();
                        
                        if(!empty($_POST['estate_sale'])){
                            $mainEstateQuery = $mainEstateQuery." estate_sale = '".$_POST['estate_sale']."' AND ";
                        };
                        if(!empty($_POST['estate_city'])){
                            $mainEstateQuery = $mainEstateQuery." city_id = '".$_POST['estate_city']."' AND ";
                        };
                        if(!empty($_POST['estate_minPrice'])){
                            $mainEstateQuery = $mainEstateQuery." estate_price > ".$_POST['estate_minPrice']." AND ";
                        };
                        if(!empty($_POST['estate_maxPrice'])){
                            $mainEstateQuery = $mainEstateQuery." estate_price < ".$_POST['estate_maxPrice']." AND ";
                        };
                        
                        $mainEstateQuery = $mainEstateQuery." 1 = 1 ORDER BY estate_date DESC LIMIT $limit , $onpage";

                        $estatequery = $db->prepare($mainEstateQuery);
                        $estatequery->execute();
                        
                    $count = $estatequery->rowCount();
                    if ($count == 0) { ?>

                        <div class="mt-5 text-center d-block col-xs-12 col-md-12 col-lg-12 row">
                            <span style="font-size:18px; color: red;">Təəssüf ki, axtarışınıza uyğun heç bir elan tapılmadı. <br>
                                Zəhmət olmasa, daha uyğun filtrlər təyin edin. <br>
                                Və ya <a style="text-decoration: underline;" href="index.php">bütün elanların yer aldığı</a> səhifəyə keçin</span>
                        </div>
                    <?php    }

                    while ($estatepull = $estatequery->fetch(PDO::FETCH_ASSOC)) {
                        $estate_id = $estatepull['estate_id'];
                        $imagequery = $db->prepare("SELECT * FROM estate_image  WHERE estate_id = :estate_id");
                        $imagequery->bindParam(":estate_id",$estate_id,PDO::PARAM_INT);
                        $imagequery->execute();
                        $imagepull = $imagequery->fetch(PDO::FETCH_ASSOC);
                    ?>
                        <div class="col-md-6 col-lg-4 p-3 isotope-item">
                            <div class="listing-item">
                                <a href="estate_detail.php?estate_id=<?php echo $estatepull['estate_id'] ?>" class="text-decoration-none">
                                    <div class="thumb-info thumb-info-lighten">
                                        <div class="thumb-info-wrapper m-0">
                                            <img style="width:100%; height:250px;" src="<?php echo $imagepull['image_url'] ?>" class="img-fluid" alt="">
                                            <div class="thumb-info-listing-type background-color-secondary text-uppercase text-color-light font-weight-semibold p-1 pl-3 pr-3">
                                                <?php echo $estatepull['estate_sale'] ?>
                                            </div>
                                        </div>
                                        <div class="thumb-info-price background-color-primary text-color-light text-4 p-2 pl-4 pr-4">
                                            <?php echo $estatepull['estate_price'] . " ₼" ?>
                                            <i class="fas fa-caret-right text-color-secondary float-right"></i>
                                        </div>
                                        <div class="custom-thumb-info-title b-normal p-4">
                                            <div class="thumb-info-inner text-3"><?php echo $estatepull['estate_name'] ?></div>
                                            <ul class="accommodations text-uppercase font-weight-bold p-0 mb-0 text-2">

                                                <li>
                                                    <span class="accomodation-title">
                                                        <?php $date = strtotime($estatepull['estate_date']); echo date('d M Y H:i', $date) ?>
                                                    </span>
                                                    <span class="accomodation-value custom-color-1">

                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>

                    <div style="font-size:15px;position: absolute; left:35px; bottom:-30px; display:block;" class="row">
                    <?php 
                    

                    /*sayfalama buton kodları*/
if($total_result > $onpage){	//içerik sayısı, her sayfada gösterilecek içerik sayısından büyük ise sayfalama butonları aktif edilsin	 
	echo '<br><br>';
	/*
		$x = 2 olduğu durumda, aktif sayfanın önceki ve sonraki 2 sayfa gösterilir, sonrasına ... ifadesi konularak kısaltma yapılır. 
		böylelikle bütün sayfaları yazmamıza gerek kalmaz.
		örnekler:
		« Önceki 1...4 5 [6] 7 8...11 Sonraki »	  ||  [1] 2 3...11 Sonraki »	  ||   « Önceki 1...9 10 [11] 
	*/
	$x = 2; //kısaltma limiti 
	if($page > 1){	//sayfa 1 den küçük ise [Önceki] butonu oluşturulmaya uygundur	
		$prev = $page-1;	//aktif sayfanın bir önceki sayfa bulunur		
		echo '<a "pagination_btn" href="index.php?page='.$prev.'">« Geri </a>'; //link içerisine yazdırılıp [Önceki] butonu oluşturulur	  
	}		 
	if($page==1){ //sayfalamada 1. sayfada bulunuyorsak
		echo '<a class="pagination_active">1</a>'; //1. sayfayı menüde aktif olarak gösteriyoruz
	}
	else{ // bulunmuyorsak
		echo '<a "pagination_btn" href="index.php?page=1">1</a>'; //normal olarak gözüksün, aktif olmasın	
	}
	//menü kısaltma işlemi
		//bulunduğumuz sayfa yani $sayfa = 6 olduğu durumda
	if($page-$x > 2){ //6-2 > 2 değeri true döndürecek
		echo '...'; //kısaltma etiketi yazdırılacak	
		$i = $page-$x; //$i değişkenine 4 değeri atanacak	 
	}else { 			
		$i = 2; 		  
	}
	//$page = 6 olduğu durumda = sonuc çıktısı -> 1 ...
	
	for($i; $i<=$page+$x; $i++) { //$i yani 4 değeri 8 değerine ulaşasıya kadar döngü çalışsın	> 4  5  6  7  8	
		if($i==$page){ //$i değeri bulunduğumuz sayfa ile eşitse
			echo '&nbsp;<a class="pagination_active">'.$i.'</a>&nbsp;'; // aktif olarak işaretlensin ve yazdırılsın > 4  5  [6]  7  8	
		}
		else{//değil ise
			echo '<a class="pagination_btn" href="index.php?page='.$i.'">'.$i.'</a>'; //normal olarak yazdırılsın
		}
		if($i==$total_pages) break;  
	}
	//$sayfa = 6 olduğu durumda = sonuc çıktısı -> 1 ... 4  5  [6]  7  8	
	
	if($page+$x < $total_pages-1) { //6+2<11-1 ise	
		echo '...'; //kısaltma etiketi yazdırılacak				
		echo '<a class="pagination_btn" href="index.php?page='.$total_pages.'">'.$total_pages.'</a>'; //	son sayfa yazdırılacak	  
	}elseif($page+$x == $total_pages-1) { 			
		echo '<a class="pagination_btn" href="index.php?page='.$total_pages.'">'.$total_pages.'</a>'; 		 
	}
	//$page = 6 olduğu durumda = sonuc çıktısı -> 1 ... 4  5  [6]  7  8 ... 11	
	//menü kısaltma işlemi
	
	if($page < $total_pages){	//bulunduğumuz sayfa hala son sayfa değil ise	  
		$next = $page+1; //bulundğumuz sayfa değeri 1 arttırılıyor		  
		echo '<a class="pagination_btn" href="index.php?page='.$next.'"> İrəli » </a>'; //ve Sonraki butonu oluşturulup yazdırılıyor 		  
	}	
}
/*sayfalama buton kodları*/

                    ?>

<?php } ?>
                    </div>
                   
                </div>



            </div>