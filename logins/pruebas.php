<?php
$pass = crypt('mipassworg','tadditec');
echo $pass; // dejar que el salt se genera automáticamente

/* Se deben pasar todos los resultados de crypt() como el salt para la comparación de una
   contraseña, para evitar problemas cuando diferentes algoritmos hash son utilizados. (Como
   se dice arriba, el hash estándar basado en DES utiliza un salt de 2 
   caracteres, pero el hash basado en MD5 utiliza 12.) */
if (hash_equals($pass, crypt('mipassword', $pass))) {
   echo "¡Contraseña verificada!";
}

phpinfo();
?>