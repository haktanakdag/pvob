<?php
   namespace System\Core;

   class Form{
        public function doGrid ($basliklar,$degerler,$veriler,$dumeler="",$style){
            $satirlar="";
            $baslik="";
            $sonuc="";
            $kolonlar="";
            $baslik = "<div class='card'><div class='card-header'><strong class='card-title'>Kullanıcılar</strong></div><div class='card-body'>";
            $baslik = $baslik ."<table id='bootstrap-data-table-export' class='table table-striped table-bordered'>";
            $baslik = $baslik."<thead><tr>";
            foreach($basliklar as $b){
                $kolonlar.="<th width='$b[1]'>$b[0]</th>";
            }
            if ($dumeler){$kolonlar.= "<th width='20%'>Opsiyon</th>";}
            $baslik .=$kolonlar."</tr><tbody>";
            echo $baslik;
            $kolonsayisi =count($degerler);
            if($veriler){
                foreach ($veriler as $veri){
                    echo "<tr>";
                        foreach($degerler as $d){
                            echo "<td>".$veri->$d."</td>";
                        }
                    if ($dumeler<>""){
                        echo "<td>";
                        foreach($dumeler as $dume){
                                            if($dume[3]){
                                                $onclick="onclick="."'".$dume[3]."'";
                                                $konum = strpos($onclick, "#");
                                                if($konum==true){
                                                $oncl = explode("#",$onclick);
                                                $onclick=$oncl[0].$veri->id.$oncl[1];
                                                }
                                            }else{
                                                $onclick="";
                                            }
                        //if($dume[0]=="duzenle" or $dume[0]=="yeniekle" ) $onclick = str_replace("/", '"',"onclick=/return hs.htmlExpand(this, { objectType: 'ajax' } )/");
                            echo "<a class='btn btn-primary' href='$dume[1]&$dume[0]=$veri->id' role='button' $onclick>$dume[2]</a>";
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                }
            }
            echo "</tbody></table>";
        }

        public function doTable ($basliklar,$degerler,$veriler,$dumeler="",$style,$link=""){
            $satirlar="";
            $baslik="";
            $sonuc="";
            $baslik = "<table border ='1' class='$style'><tr class='header'>";
            foreach($basliklar as $b){
                $kolonlar.="<th width='$b[1]'>$b[0]</th>";
            }
            if ($dumeler){$kolonlar.= "<th width='20%'>Opsiyon</th>";}
            $baslik .=$kolonlar."</tr>";
            echo $baslik;
            $kolonsayisi =count($degerler);
            if($veriler){
                foreach ($veriler as $veri){
                    echo "<tr>";
                        foreach($degerler as $d){
                            echo "<td>".$veri->$d."</td>";
                        }
                    if ($dumeler<>""){
                        echo "<td>";
                        foreach($dumeler as $dume){
                                            if($dume[3]){
                                                $onclick="onclick="."'".$dume[3]."'";
                                                $konum = strpos($onclick, "#");
                                                if($konum==true){
                                                $oncl = explode("#",$onclick);
                                                $onclickic ='"'.$veri->$link.'"';
                                                $onclick=$oncl[0].ltrim($onclickic).$oncl[1];
                                                }
                                            }else{
                                                $onclick="";
                                            }
                        //if($dume[0]=="duzenle" or $dume[0]=="yeniekle" ) $onclick = str_replace("/", '"',"onclick=/return hs.htmlExpand(this, { objectType: 'ajax' } )/");
                                            echo "<a href='$dume[1]&$dume[0]=".$veri->$link."' class='btn' $onclick> $dume[2] </a>";
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                }
            }
            echo "</table>";
        }
        
        public function doPager($satirsayisi,$sayfano,$kayitsayisi,$sayfaadi){
        echo "Sayfa(lar): ";
        $deger= ceil($kayitsayisi/$satirsayisi);
            echo "<ul class='pagination'>";
          for($i=1;$i<=$deger;$i++){
            echo "<li><a href='$sayfaadi&sayfano=$i'>$i</a></li>";
         }
            echo "</ul>";
        echo " (Toplam $kayitsayisi)";
        if (!$sayfano){$sayfano=1;}
        $bassat=($satirsayisi*$sayfano)-$satirsayisi;
        $pagerString ="limit $bassat , $satirsayisi";
        return $pagerString;
        }
        
        public function doSearch($aranacakAlanlar,$aranacakDeger){
            $aramaString =" WHERE (";
            foreach ($aranacakAlanlar as $aA){
                $aramaString .=" $aA LIKE '%$aranacakDeger%' or ";
            }
            $aramaString=$aramaString.")";
            if ($aramaString =="WHERE"){$aramaString =" WHERE 1=1 ";}
            else{$aramaString =substr_replace($aramaString,'',-4); }
            $aramaString=$aramaString.")";
            return $aramaString;
        }
        public function doForm($islem,$ozellikler){
            if ($islem =="basla")
            {
                $name=$ozellikler['name'];
                $id=$ozellikler['id'];
                $value=@$ozellikler['value'];
                $class=$ozellikler['class'];
                $action=$ozellikler['action'];
                $method=$ozellikler['method'];
                echo "<form action='$action' id='$name' name='$name' method='$method' class='$class'>";
            }
            if ($islem=="bitir")
            {
                echo "</form>";
            }
        }
        public function doInput($ozellikler){
            $name=$ozellikler['name'];
            $id=$ozellikler['id'];
            $value=$ozellikler['value'];
            $type=$ozellikler['type'];
            $class=$ozellikler['class'];
            $placeholder =$ozellikler['placeholder'];
        echo "<div class='form-group'><label for='$name' class='$class-label'>$value</label><input type='$type' id='$name' name='$name' placeholder='$placeholder' class='$class'></div>";
        //if($ozellikler[2]=='req'){ $reg ='required';}
        //echo"<input type='text' name='$ozellikler[0]' id='$ozellikler[0]' value='$ozellikler[1]' class ='input' $reg>";
        }
        public function doDateInput($ozellikler){
            echo "<input type='date' name='$ozellikler[0]' id='$ozellikler[0]' value='$ozellikler[1]' class ='$class' placeholder='$ozellikler[3]' >";
        }
        //<script>$(function(){$( "#basacilistarih" ).datepicker();});</script>
        public function doInputP($ozellikler)
            {
            if($ozellikler[2]=='req'){ $reg ='required';}
        echo"<input type='password' name='$ozellikler[0]' id='$ozellikler[0]' value='$ozellikler[1]' class ='input' $reg>";
            }
            
        public function doInputFile($ozellikler){
            echo "<div class='form-group'><input type='File' name='$ozellikler[0]' id='$ozellikler[0]' value='$ozellikler[1]' class ='form-control'></div>";
        }
        public function doTextAreaInput($ozellikler){
        if ($ozellikler[2]==""){$class='form-control';} else {$class=$ozellikler[2];}
        if ($ozellikler[2]==""){ $divbaslangic="<div class='col-xs-4'>";} else { $divbaslangic="";}
        if ($ozellikler[2]==""){ $divbitis="</div>";} else { $divbitis="";}
            echo "$divbaslangic<textarea name='$ozellikler[0]' id='$ozellikler[0]'  class='$class' rows='3' cols='5'>$ozellikler[1]</textarea>$divbitis";
        }
            public function doTextAreaCKEditor($ozellikler){
            echo"<script>CKEDITOR.disableAutoInline = true;";
            echo "$( document ).ready( function() {";
            echo "$( '#$ozellikler[0]' ).ckeditor();";
            echo "} );";
            echo "function setValue() { $( '#$ozellikler[0]' ).val( $( 'input#val' ).val() ); }";
            echo "</script>";
            
        echo "<textarea cols='80' id='$ozellikler[0]' name='$ozellikler[0]' rows='10'>$ozellikler[1]</textarea>";
        }
        
        public function doResetButton($ozellikler){
            //print_r($ozellikler);
            $formname=$ozellikler['formname'];
            $value="Reset Form";
            $type="button";
            $class="btn btn-danger btn-sm";
            echo "<input type='$type' class='$class' onclick="."javascript:document.getElementById('$formname').reset()"." value='$value'>";
        }


        public function doButton($ozellikler){
            //print_r($ozellikler);
            $name=$ozellikler['name'];
            $id=$ozellikler['id'];
            $value=$ozellikler['value'];
            $type=$ozellikler['type'];
            $class=$ozellikler['class'];
            $action =$ozellikler['action'];
            //$href = $_SERVER['REQUEST_URI']."&".$ozellikler['href'];
            $href = $ozellikler['href'];
            
            /*$exphref = explode("&",$href);
            if(count($exphref)>2){  
                $href =$exphref[0]."&". $name;
            }else{
                $exphref = explode("?",$href);
                $href ="?".$exphref[1];
            }*/
            
            if($action=="modal"){
                $modaltype =$ozellikler['modaltype'];
                $modaltoggle = "data-toggle='modal'";

                if($modaltype =="mediumModal"){
                    echo "<button type='$type' name='$name' id='$id' class='$class' $modaltoggle data-target='#$modaltype'>$value</button>";
                }
            }
            if($action=="include"){
                $adres = $_SERVER['REQUEST_URI'];
                echo "<a class='$class' href='".$adres."&islem=$href' role='$type'>$value</a>";
            }
            if($action=="newpage"){
                echo "<button type='$type' name='$name' id='$id' class='$class'>$value</button>";
            }
            //echo "<input type='submit' name='$ozellikler[0]' id='$ozellikler[0]' value='$ozellikler[1]' class='btn'>";
        }

        public function doSubmit($ozellikler){
            //print_r($ozellikler);
            $name=$ozellikler['name'];
            $id=$ozellikler['Id'];
            $value=$ozellikler['value'];
            $type=$ozellikler['type'];
            $class=$ozellikler['class'];
            $iclass=$ozellikler['iclass'];
            echo "<button type='$type' name='$name' id='$name' class='$class'><i class='$iclass'></i> $value</button>";
            //echo "<input type='submit' name='$ozellikler[0]' id='$ozellikler[0]' value='$ozellikler[1]' class='btn'>";
        }
            
        public function doBaglanti($ozellikler){
            //0->link name
            //1->link açıklama
            //2->link bağlantı(href)
            //3->link css
            //4->link target
        if($ozellikler[3]==""){
            $class="btn";
        }
        else {
            $class=$ozellikler[3];
        }
        if($ozellikler[4]==""){
            $target ="";
        }
        else {
            $target ="target='$ozellikler[4]'";
        }
            if($ozellikler[5]==""){
            $onclick ="";
        }
            else {
            $onclick ="onclick='$ozellikler[5]'";
        }
        //$onclick = str_replace("/", '"',"onclick=/return hs.htmlExpand(this, { objectType: 'ajax', allowWidthReduction: true}  )/");
        echo "<a href='$ozellikler[2]' class='$class' name='$ozellikler[0]' $target  $onclick >$ozellikler[1]</a>";
        }
        public function doHidden($ozellikler){
            echo "<input type='hidden' id='$ozellikler[0]' value='$ozellikler[1]'/>";
        }
        public function doSelect($ozellikler,$data){
                echo "<select name='$ozellikler[0]' id='$ozellikler[0]' class ='select'>";
                foreach($data as $d){
                if ($d->id ==$ozellikler[2]){$selected='selected';} else {$selected="";} 		
                echo "<option value='$d->id' $selected >".$d->$ozellikler[1]."</option>"; 
                }
                echo "<select>";
        }
            
           public function doManuelSelect($ozellikler,$data){
                echo "<select name='$ozellikler[0]' id='$ozellikler[0]' class ='select'>";
                foreach($data as $d){
                echo $d['id'];
                if ($d['id'] ==$ozellikler[2]){$selected='selected';} else {$selected="";} 		
                echo "<option value='".$d['id']."' $selected >".$d[$ozellikler[1]]."</option>"; 
                }
                echo "<select>";
        }
            
            function ManuelTablo($array){
            // start table
            $html = '<table>';
            // header row
            $html .= '<tr>';
            foreach($array[0] as $key=>$value){
             $html .= '<th>' . htmlspecialchars($key) . '</th>';
            }
            $html .= '</tr>';
    
            // data rows
            foreach( $array as $key=>$value){
            $html .= '<tr>';
            foreach($value as $key2=>$value2){
             $html .= '<td>' . htmlspecialchars($value2) . '</td>';
            }
            $html .= '</tr>';
            }
    
            // finish table and return it
    
            $html .= '</table>';
            return $html;
            }
            
            public function doDinamikSelect($ozellikler,$data,$isim=""){
                echo "<select name='$ozellikler[0]' id='$ozellikler[0]' class ='select'>";
                foreach($data as $d){
                if ($d->id ==$ozellikler[2]){$selected='selected';} else {$selected="";} 	
                if($isim==""){$isim ="id";}
                echo "<option value='$d' $selected >".$d."</option>"; 
                }
                echo "<select>";
        }
        public function doCheckGroup($ozellikler){
            echo "<input type='checkbox' id='$ozellikler[0]' name='$ozellikler[1]' $ozellikler[2]> $ozellikler[3]  &nbsp;";
        }
            
        public function doRadioGroup($ozellikler){
                if($ozellikler[1]){
                    $isim=$ozellikler[1];
                }
            echo "<input type='radio' id='$ozellikler[0]' name='$ozellikler[0]' value='$ozellikler[1]'  $ozellikler[2]> $isim";
        }
        // <input type="checkbox"> Check me out

   }

?>