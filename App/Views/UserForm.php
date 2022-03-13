<strong>Kullanıcı</strong> Form
</div>
    <?php
    $formObjects =[
        "name"=>"userform",
        "id"=>"userform",
        "action"=>$_SERVER['REQUEST_URI'],
        "method"=>"post",
        "class"=>""
    ];
    $form->doForm("basla",$formObjects);
    ?>
    <form action="<?=$_SERVER['REQUEST_URI']?>" id="userform" method="post" class="">
    <div class="card-body card-block">
        <?php   
            $UserNameSurnameObjects = [
            'id'=> "adsoyad",
            'name'=> "adsoyad",
            'value'=> "Ad Soyad",
            'type'=> "text",
            'class'=>"form-control",
            'placeholder'=>"Ad Soyad"
            ]; 
        $form->doInput($UserNameSurnameObjects); 
        ?>
    </div>
    <div class="card-footer">
        <?php
            $SubmitButtonObjects =[
                "name"=>"kaydet",
                "Id" =>"kaydet",
                "value"=>"Kaydet",
                "type"=>"submit",
                "class"=>"btn btn-primary btn-sm",
                "iclass"=>"fa fa-dot-circle-o"
            ];
            $form->doSubmit($SubmitButtonObjects);
            ?>
            <?php
            $ResetButonObjects = [
                'formname'=>'userform',
            ];
            $form->doResetButton($ResetButonObjects);
            ?>
    </div>
    <?php $form->doForm("bitir",$formObjects);  ?>
</div>     