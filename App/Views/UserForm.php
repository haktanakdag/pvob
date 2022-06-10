<div class="card">
    <?php

        $userObjects=["name"=>$adsoyad,"eposta"=>$eposta];
        $user->SetData(1,$userObjects);
    ?>
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
    $UserEmail = ['id'=> "eposta",'name'=> "eposta",'value'=> "EPosta",'type'=> "text",'class'=>"form-control",'placeholder'=>"EPosta"]; 
    $form->doInput($UserEmail); 
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