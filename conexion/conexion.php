<?php


	$conn = odbc_connect('trust','','');
	
if( $conn === false )
{
     echo "Disculpe nuestros servidores estan saturados. En breve estara disponible todo el contenido </br> </br>";
     die();
}
?>