<?php
 
// Modificar: Ubicación del archivo Log donde se guardaran
// los detalles de transferencia.
 
$logFile='C:/archivos.txt';
 
// Modificar: Ubicación del directorio donde se encuentran
// físicamente los archivos.
 
$downPath='C:/Usuarios/Irene';
 
// Modificar: Ajusta las fechas en Log a la zona especificada.
 
date_default_timezone_set('America/Venenzuela/Caracas');
 
// Inicio del Script: Para calcular la duración total
// de la transferencia.
 
$inicio=time();
 
// Obtiene un parametro o retorna cadena vacia.
 
function getParam(&$arr,$name)
{
    if(isset($arr[$name]))
        return $arr[$name];
    return '';
}
 
// Soporte de Cache: Retorna true si el recurso no fue modificado.
 
function testCache($md5,$gmt_mtime)
{
  if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])
    && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $gmt_mtime)
    return true;
  if (isset($_SERVER['HTTP_IF_NONE_MATCH'])
    && str_replace('"', '',
stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $md5)
      return true;
    return false;
}
 
// Escribe una entrada en el Log.
// Este script solo guarda una entrada al salir
// por lo que no es necesario cerrar el handle.
 
function writeLog($texto)
{
  global $logFile;
  $hora=strftime('[%d-%b-%Y %T]');
  if ($handle = @fopen($logFile, 'ab'))
    fwrite($handle,$hora . ' ' . $texto);
}
 
// Desactiva magic quotes.
 
set_magic_quotes_runtime(0);
 
// Agente de usuario (explorador).
 
$agente=getParam($_SERVER,'HTTP_USER_AGENT');
 
// Referencia (Página web de procedencia).
 
$referer=getParam($_SERVER,'HTTP_REFERER');
 
// IP del visitante.
 
$ip=$_SERVER['REMOTE_ADDR'];
 
// Obtiene el nombre de archivo y verifica su existencia.
// Si el archivo no se encuentra, envia un error 404
// y reporta en Log.
 
$file=getParam($_SERVER,'REQUEST_URI');
$displayname=substr($file,1);
$file=$downPath . $file;
if(!$displayname || !file_exists($file) || !($len=filesize($file)))
{
  if($displayname)
    writeLog("$displayname:\nAgente: $agente".
"\nReferencia: $referer\nIP $ip - ".
"RESPUESTA 404 (No encontrado).\n\n");
  header('HTTP/1.0 404 No encontrado');
  exit;
}
 
 
 
// Fecha de archivo (para la validación de Cache y para enviar
// en encabezado).
 
$mtime=filemtime($file);
$gmt_mtime = gmdate('D, d M Y H:i:s', $mtime).' GMT';
 
 
$md5=md5($file.$len.$mtime);
 
// Si el cliente solicita verificar el cache y la validacion
// es positiva, enviamos una respuesta 304 y salimos del script.
 
if(testCache($md5,$gmt_mtime))
{
    writeLog("$displayname:\nAgente: $agente".
"\nReferencia: $referer\nIP $ip - $len bytes - ".
"RESPUESTA 304 (No modificado).\n\n");
    header('HTTP/1.1 304 No modificado');
    exit;
}
 
// Intento de apertura del archivo.
// Si no podemos abrirlo enviamos un error 500.
 
$fp = @fopen($file, 'rb');
if(!$fp)
{
  writeLog("$displayname:\nAgente: $agente\nReferencia: $referer".
"\nIP $ip - $len bytes - RESPUESTA 500 (Error de servidor).\n\n");
  header( 'HTTP/1.1 500 Error de servidor' );
  exit;
}
 
// Content-Type de acuerdo a la extensión.
 
$ext=strrpos($displayname,'.');
if($ext===false)
  $ctype='application/force-download';
else
 	$ctype='text/xml';
 // Desactivamos el limite de tiempo del script antes de
// iniciar la transferencia.
 
@set_time_limit(0);
 
// Encabezados básicos, pueden agregarse otros
// como los relacionados al cache.
 
header('Last-Modified: '.$gmt_mtime);
header('ETag: "'.$md5.'"');
header('Content-Length: ' . $len);
header('Content-Type: ' . $ctype);
 
// Transferencia...
 
while(!feof($fp)) {
  echo fread($fp, 524288);
  flush();
}
 
// Solo se llega aquí si la transferencia fue finalizada.
 
$tiempo=time()-$inicio;
$bytesSeg=number_format(($tiempo?($len/$tiempo):$len)/1024,2,',','');
writeLog("$displayname:\nAgente: $agente".
"\nReferencia: $referer\nIP $ip - $len bytes - $tiempo segs. ".
"($bytesSeg KB/seg).\n\n");
?>
 