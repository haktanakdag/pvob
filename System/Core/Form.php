<?php
   namespace System\Core;

   class Form{
        public function doGrid ($basliklar,$degerler,$veriler,$dumeler="",$style){
            $satirlar="";
            $baslik="";
            $sonuc="";
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

   }

?>