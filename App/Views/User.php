<?php
use App\Controllers\UserController;
use System\Core\Form;
ob_start();
//session_start();
extract($_GET);
extract($_POST);
ob_flush();  
$form = new Form();
$user = new UserController();
$sayfaad=".";
$sayfaadEkle=".";
$sayfaadDuzenle=".";
$sayfaadResimler=".";
?>

<?php include "components/header.php" ?>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Panel</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a class="btn btn-outline-primary" href="javascript:history.go(-1)" role="button">Geri</a></li>
                        <li><a class="btn btn-outline-primary" href="javascript:location.reload();" role="button">Yenile</a></li>
                        <li>
                        <?php 
                        $ButtonObjects = ['id'=> "yeniekle",'name'=> "yeniekle",'value'=> "Yeni Ekle",'type'=> "button",'class'=> "btn btn-secondary mb-1","action"=>"include",//modal,newpage,include,popup
                            "href"=>"yeniekle" ,//modal(mediumModal),newpage,include,popup
                            "modaltype"=>"mediumModal"
                            ];
                        $form->doButton($ButtonObjects); 
                        ?>
                        </li>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
        <?php include "components/modal.php" ?>
        <?php if($islem=="yeniekle"){ include "UserForm.php"; } ?>
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $form->doGrid(
                        array(array("No",'5%'),array("Ad Soyad",'50%'),array("Email",'50%'),)
                        ,array("id","adsoyad","email")
                        ,$data
                        ,array(array("sil",$sayfaad,"Sil"),array("duzenle",$sayfaadDuzenle,"Düzenle"),array("refid",$sayfaadResimler,"Resimler","resPopUp(#)"))
                        ,"gridTable"
                        );
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php include "components/footer.php" ?>