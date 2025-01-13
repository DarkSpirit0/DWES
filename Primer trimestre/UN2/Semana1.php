<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semana 1</title>
    </head>
    <body>
        <h1>Resumen Semena 1</h1>
        <h2>1 - Instalación entorno PHP</h2>

      <p> Los pasos a segir son:</p>
       <p><mark> - Descargar PHP </mark></p>

Visita el sitio oficial de PHP y descarga la versión más reciente y compatible con tu sistema operativo.

      <p><mark> - Descomprimir el archivo </mark></p>
       
Una vez descargado el archivo ZIP, descomprimelo en una carpeta de tu elección.

       <p><mark>- Configuramos la variable de entorno </mark></p>
       
Añade la ruta de la carpeta PHP a las variables de entorno del sistema para que puedas ejecutar comandos PHP desde cualquier terminal.

       <p><mark>- Configurar el servidor web </mark></p>
       
Si utilizas Apache, edita el archivo httpd.conf para incluir el módulo de PHP. Si prefieres usar el servidor web integrado de PHP, simplemente ejecuta php -S localhost:8000 desde la terminal.

       <p><mark>- Verificar la instalación </mark></p>
       
Crea un archivo index.php con el siguiente contenido y colócalo en la carpeta raíz de tu servidor web:PHP

<pre><code>&lt;?php
   phpinfo();
?&gt;
</code></pre>


<h1>Temario Básico de PHP con Ejemplos</h1>

<h2>Básico 1</h2>
<ul>
    <li><strong>Sintaxis básica de PHP</strong></li>
    <pre><code>&lt;?php
echo "¡Hola, mundo!";
?&gt;
    </code></pre>

    <li><strong>Ámbitos de las variables</strong></li>
    <pre><code>&lt;?php
$variableGlobal = "Soy global";

function prueba() {
$variableLocal = "Soy local";
echo $variableLocal; // Accede a la variable local
}

prueba();
echo $variableGlobal; // Accede a la variable global
?&gt;
    </code></pre>
</ul>

<h2>Básico 2</h2>
<ul>
    <li><strong>Mostrando información por pantalla</strong></li>
    <pre><code>&lt;?php
echo "Este es un mensaje con echo";
print "Este es un mensaje con print";
?&gt;
    </code></pre>

    <li><strong>Funciones especiales de PHP</strong></li>
    <pre><code>&lt;?php
// Obtener la fecha actual
echo "Hoy es " . date("Y-m-d");

// Mostrar información sobre PHP
phpinfo();
?&gt;
    </code></pre>
</ul>

<h2>Básico 3</h2>
<ul>
    <li><strong>Estructuras de control de flujo</strong></li>
    <pre><code>&lt;?php
$edad = 20;

if ($edad >= 18) {
echo "Eres mayor de edad";
} else {
echo "Eres menor de edad";
}

for ($i = 0; $i < 5; $i++) {
echo "Número: $i ";
}
?&gt;
    </code></pre>

    <li><strong>Funciones</strong></li>
    <pre><code>&lt;?php
function suma($a, $b) {
return $a + $b;
}

echo suma(3, 4); // Resultado: 7
?&gt;
    </code></pre>

    <li><strong>Arrays</strong></li>
    <pre><code>&lt;?php
$frutas = array("manzana", "naranja", "plátano");

foreach ($frutas as $fruta) {
echo $fruta . " ";
}
?&gt;
    </code></pre>
</ul>

    </body>
</html>