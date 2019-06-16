<HTML>
    <HEAD>
        <TITLE>Prueba</TITLE>
    </HEAD>

    <BODY>
    	<?php
       
             $dat=0;
            $suma=0;
        for($i=1;$i<=30;$i++){
          
          for($d=1;$d<i;$d++){  
             if($i%$d==0){
                $suma=$suma+$d;
                 }
            }
          if($i==$suma){          
                 echo "El numero {$i} es un numero perfecto;<br>";
              }
            else
          if($i<$suma){          
                 echo "El numero {$i} es un numero abundante<br>";
              }
              else
              if($i>$suma){  
               echo "El numero {$i} es un numero deficiene<br>";
              }
        }


    ?>
    </BODY>
</HTML>