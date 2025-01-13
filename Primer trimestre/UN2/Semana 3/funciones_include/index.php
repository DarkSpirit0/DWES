<?php
// Archivo: index.php
// Incluir el archivo de funciones
include "funciones.inc.php";
//Varibale PHP
$precio_movil = 100;
$precio_con_iva();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>5 Funciones</title>
    <!-- Enlace al CDN de Pico CSS -->
    <!--<link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.5.6/css/pico.min.css">-->
    <!-- Enlace al archivo CSS externo -->
    <link rel="stylesheet" href="Styles.css">
</head>
<body>
    <header>
        <h1>5. Funciones</h1>
        <nav>
            <ul>
                <li><a href="#">Funciones</a></li>
                <li><a href="#">Argumentos</a></li>
                <li><a href="#">Include/Require</a></li>
                <li><a href="#">Referencia</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Creación funciones</h2>
            <p>Cuando quieres repetir la ejecución de un bloque de código, puedes utilizar un bucle. Las funciones tienen una utilidad similar: nos permiten asociar una etiqueta (el nombre de la función) con un bloque de código a ejecutar. Además, al usar funciones estamos ayudando a estructurar mejor el código. Como ya sabes, las funciones permiten crear variables locales que no serán visibles fuera del cuerpo de las mismas.</p>
            <br>
            <?php  echo funcion_test();
              
            ?>

        </section>
  

<?php
  // FUNCIONES

  echo "<section>";
  print "<h2> UD2. 5 FUNCIONES. </h2>";
    function funcion_test()
    {
        $grupo= "  ACDC";
        $disco=" <b>Highway to hell </b>";
        return " El grupo $grupo sacó el disco $disco";
    }
    print "<h2> UD2.5 FUNCIONES.  Argumentos </h2>";
   

  //6. FUNCIONES 
    
    function precio_con_iva() 
   {
        global $precio_movil;
        $precio_iva = $precio_movil * 1.21;
         
        print "<br  /> 1- El precio con IVA es ". $precio_iva;
    }
   
    $precio_movil = 350;
    precio_con_iva();

    print "<br/> **********************";



    //FUNCIONES CONDICIONAL
   
    print "<br  /> FUNCIONES CONDICIONAL <br  /> ";

    $condicional = true;
    $precio = 10;
    print "<br  /> 1- Llamada antes de condicional";
    precio_con_iva_condi();              
    // Da error, pues aquí aún no está definida la función
    //Además se para el código.
    if ($condicional) {
        function precio_con_iva_condi() {
                        global $precio; //AQUI USA LA VARIABLE GLOBAL
                        $precio_iva = $precio * 1.21;
                        print "<br> El precio con IVA es ".$precio_iva;
         }
    }
    print "<br  /> 2- Llamada después de condicional";

    precio_con_iva_condi();               // Aquí ya no da error
    
    

       print "<br /> ARGUMENTOS <br  /> ";//ARGUMENTOS
    
    function precio_iva_argumento($precio_arg) {
        return $precio_arg * 1.21;
    }

    $precio = 10;

    // OPCION 1: guardandolo en una variable
    $precio_iva = precio_iva_argumento($precio);
    print "<br /> 1 - El precio con IVA es ".$precio_iva;

    // Opcion 2: sin almacenar en variable
    print "<br /> 2 - El precio con IVA es " . precio_con_iva($precio);
    
  // Variable del programa principal
  print "<br /> 3 - La Variable del programa principal (precio=10) es " . $precio;


    print "<br/><br/>  ARGUMENTOS POR DEFECTO <br  /> ";//ARGUMENTOS POR DEFECTO
    //ARGUMENTOS POR DEFECTO

    function precio_iva_defecto($precio_arg, $iva=0.21) {
        return $precio_arg * (1 + $iva);
        }
    
    $precio = 100;


    // OPCION 1: guardandolo en una variable y enviandole un IVA nuevo   //130
    $precio_iva = precio_iva_defecto($precio, 0.30);
    print "<br /> 1 - El precio con IVA  actualizando al 30% es ".$precio_iva;

    // Opcion 2: sin almacenar en variable y Utilizando el IVA por defecto (0,21)  //121
    print "<br /> 2 - El precio con IVA es " . precio_iva_defecto($precio);



    //ARGUMENTOS POR valor y por referencia
    print "<br/><br/>  ARGUMENTOS POR valor y por referencia <br  /> ";//ARGUMENTOS POR DEFECTO
  function precio_iva_referencia (&$precio /*le pasas su direcion de memoria 100325*/, $iva=0.21) {
        $precio *= (1 + $iva); 
        // No es necesario usar ningún return
    }

    $precio = 36;  //100325
    print "<br/><br/>1- ANTES de llamar a la función:  El precio con IVA es ".$precio ;  //10

    precio_iva_referencia($precio);

    print "<br/>2- DESPUES de llamar a la función:  El precio con IVA es ". $precio ;  //121
    

    echo "<br><br><br><br><br><br><br> </section>";

?>

</main>

    <footer>
        <p>&copy; 2024 Mi Sitio Web. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
