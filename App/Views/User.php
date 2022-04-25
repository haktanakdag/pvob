<?php
use App\Controllers\UserController;
use System\Core\Form;
error_reporting(0);
ob_start();
session_start();
extract($_GET);
extract($_POST);
ob_flush();  
$form = new Form();
?>
<?php
include ("../core/libx.php");
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
                        $ButtonObjects = ['id'=> "yeniekle",'name'=> "yeniekle",'value'=> "Yeni Ekle",'type'=> "button",'class'=> "btn btn-secondary mb-1","action"=>"modal",//modal,newpage,include,popup
                            "href"=>"yeniekle" ,//modal,newpage,include,popup
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
        <div class="card">
            <div class="card-header">
                <strong>Kullanıcı</strong> Form
            </div>
            <?php
                $formObjects =["name"=>"userform","id"=>"userform","action"=>$_SERVER['REQUEST_URI'],"method"=>"post","class"=>""];
                $form->doForm("basla",$formObjects);
            ?>
            <form action="<?=$_SERVER['REQUEST_URI']?>" id="userform" method="post" class="">
            <div class="card-body card-block">
            <?php   
                $UserNameSurnameObjects = ['id'=> "adsoyad",'name'=> "adsoyad",'value'=> "Ad Soyad",'type'=> "text",'class'=>"form-control",'placeholder'=>"Ad Soyad"]; 
                $form->doInput($UserNameSurnameObjects); 
            ?>
            <?php   
                $UserNameSurnameObjects = ['id'=> "eposta",'name'=> "eposta",'value'=> "EPosta",'type'=> "text",'class'=>"form-control",'placeholder'=>"EPosta"]; 
                $form->doInput($UserNameSurnameObjects); 
            ?>
            </div>
            <div class="card-footer">
            <?php
                $SubmitButtonObjects =["name"=>"kaydet","Id" =>"kaydet","value"=>"Kaydet","type"=>"submit","class"=>"btn btn-primary btn-sm","iclass"=>"fa fa-dot-circle-o"];
                $form->doSubmit($SubmitButtonObjects);
            ?>
            <?php
                $ResetButonObjects = ['formname'=>'userform'];
                $form->doResetButton($ResetButonObjects);
            ?>
            </div>
            <?php $form->doForm("bitir",$formObjects);  ?>
        </div>
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