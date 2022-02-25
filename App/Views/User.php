<?php
use App\Controllers\UserController;
use System\Core\Form;
?>
<?php include "components/header.php" ?>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $form = new Form();
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