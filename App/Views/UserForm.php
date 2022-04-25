<style type="text/css">
#userislemdis {
	display: none;
	border: 1px solid #ccc;
	background: #FFFFA0;
	padding: 30px;
	width: 450px;
}
</style>
<script type="text/javascript">
$(document.userislem).ready(function(){
alert("ASDASD");
$('#userislem').click(function(){
var valid = '';
var isr = ' gerekli.';
var userid=$('#userid').val();
var username=$('#username').val();

if(username=="")
{
valid += 'User Name'+isr;
}

var ozel='';
$("input:checkbox:checked").map(function()
{
ozel =  this.id;
}).get();
ozel = ozel;

if (valid!='') {	
    $("#userislemdis").fadeIn("slow");
    $("#userislemdis").html("Hata : "+valid);
}else {
    var kayitformdatastr ='username=' + username;
    $("#userislemdis").css("display", "block");
    $("#userislemdis").html("Kaydınız Yapılıyor .... ");
    $("#userislemdis").fadeIn("slow");
    var islem =''
    if(userid==0){
    islem  ='0';
    }else{
    islem  ='1';
    kayitformdatastr = kayitformdatastr + '&userid=' + userid;
    }
    kayitformdatastr = kayitformdatastr.replace(/\n/g, "<br />")
    setTimeout("userjqislem('"+kayitformdatastr+"','"+islem+"')",2000);
}
return false;
});
});
/*Form Validation Bitti*/

/*JQuery Başladı*/
function userjqislem(kayitformdatastr,islem){
	if (islem=='0'){var islemurl='../islemler/islemler.php?islem=anahtarekle'}
	else{var islemurl='../islemler/islemler.php?islem=anahtarduzenle'}
	$.ajax({	
		type: "POST",
		url: islemurl,
		data: kayitformdatastr,
		cache: false,
		success: function(html){
		$("#userislemdis").fadeIn("slow");
		$("#userislemdis").html(html);
		setTimeout('$("#userislemdis").fadeOut("slow")',2000);
	}
	});
}
/* jquery bitti */
</script>
<div id="userislemdis"></div>
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
                "name"=>"userislem",
                "Id" =>"userislem",
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
    <?php
    $form->doForm("bitir",$formObjects);  
    ?>
</div>     