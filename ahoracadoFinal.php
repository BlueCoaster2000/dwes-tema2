<?php
$frases = [
    "IES La Encanta",
    "La vida de Brian",
    "Java es divertido",
    "Matrix es una gran pelicula",
    "Ojo con el ajo",
    "Pirineos y Alpes",
    "Comunidad Valenciana",
    "Informatica es CS en ingles",
    "Africa y Europa",
    "Asia y America",
    "Chincheta",
    "Frigorifico",
    "Chimenea",
    "Rojales",
    "Rio Segura",
    "Bachata"
   
    
];
$fallo = 1;
$fraseCompleta = false;
$arrayFallo = array(

   1 =>  "   
       ____
      |    |
      |    
      |   
      |   
      |
     ---
      
      ",
    2=> "   
       ____
      |    |
      |    O
      |   
      |   
      |
     ---
      
      ",
    3=>"   
      ____
     |    |
     |    O
     |    |
     |   
     |
    ---
     
     ",
    4=>"  
      ____
     |    |
     |    O
     |   /|
     |   
     |
    ---
   
   ",

    5=>"   
      ____
     |    |
     |    O
     |   /|\
     |   
     |
    ---
     
     ",
    6 => "   
      ____
     |    |
     |    O
     |   /|\
     |   / 
     |
    ---
     
     ",
    7=> "   
      ____
     |    |
     |    O
     |   /|\
     |   / \
     |
    ---
     
     "


  
);
do {

    $ocul = $frases[array_rand($frases)];

    $ocul2 = mb_str_split(mb_strtolower($ocul),1,"UTF-8");

    //Array en el que vamos a buscar si el valor que nos da el Usuario existe 
    $buscar = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","ñ","o","p","q","r","s","t","u","v","w","x","y","z"];   

    $cond = false;
    $cont3 = 0;
    $resul = $ocul2;

    foreach ($resul as $ch) {
        if ($resul[$cont3] != " "){
            $resul[$cont3] = "_";
            $cont3++;
        }else{
            $resul[$cont3] = " ";
            $cont3++;  
        }
    } 
    
    
    while($fraseCompleta == false && $fallo <= 6){
        echo $arrayFallo[$fallo];
        print_r($fraseCompleta);
        $letraUsu = readline(" Dime una letra:" . "\n");
          

    $cont2 = 0;
    if (!in_array($letraUsu,$ocul2)){
        $fallo++;   
       }


        foreach ($ocul2 as $value) {
            
            if(in_array($value,$buscar) ||  in_array(mb_strtolower($value),$buscar) ){
                if($value == $letraUsu || mb_strtolower($value) == $letraUsu){

                    $resul[$cont2] = "$letraUsu";
                    $cont2++;

                }else{

                    $cont2++;    
                    
                }
            }
            else{
                $cont2++;
            }
        }

    
            foreach ($resul as $char) {
                
                echo $char;
            }

            //Si el array que vamos a mostrar esta completado por el usuario ponemos frasecompleta a true y nos saca del bucle, pues hemos ganado
            $omero=array_diff($ocul2,$resul);

            if (empty($omero)){
            $cond=true;
            $fraseCompleta=true;
            }
        
        }

} while ($fallo <= 6  && $fraseCompleta==false);


 // Determinar si ha ganado 
 print_r($arrayFallo[$fallo]);
 if($fraseCompleta==true){
     
     echo "\n ¡Felicidades saliste del videojuego!";
     
    }else{
    echo "Cagaste Jak & Daxter, no la adivinaste";

}
