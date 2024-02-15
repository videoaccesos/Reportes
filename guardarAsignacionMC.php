<?php 

  //--------------------------------------------------------------------------
  // Example php script for fetching data from mysql database
  //--------------------------------------------------------------------------
  $host = "localhost";
  $user = "wwwvideo_root";
  $pass = "V1de0@cces0s";
  $databaseName = "wwwvideo_video_accesos";

$intAsignacionID=$_POST['intAsignacionID'];
$intTarjetaID=$_POST['intTarjetaID'];
$intTarjetaID2=$_POST['intTarjetaID2'];
$intTarjetaID3=$_POST['intTarjetaID3'];
$intTarjetaID4=$_POST['intTarjetaID4'];
$intTarjetaID5=$_POST['intTarjetaID5'];
$numeroSerie=$_POST['numeroSerie'];
$numeroSerie2=$_POST['numeroSerie2'];
$numeroSerie3=$_POST['numeroSerie3'];
$numeroSerie4=$_POST['numeroSerie4'];
$numeroSerie5=$_POST['numeroSerie5'];
$strResidenteID=$_POST['strResidenteID'];
$strCompradorID=$_POST['strCompradorID'];
$mostrarNombreComprador=$_POST['bolNombreComprador'];
$strFecha=date("Y-m-d");
$strFechaVencimiento=$_POST['strFechaVencimiento'];
$intTipoLecturaID=$_POST['intTipoLecturaID'];
$strLecturaEPC=$_POST['strLecturaEPC'];
$strFolioContrato=$_POST['strFolioContrato'];
$dblPrecio=$_POST['dblPrecio'];
$descuento=$_POST['descuento'];
$IVA=$_POST['IVA'];
$bolUtilizoSeguro=$_POST['bolUtilizoSeguro'];
$bolUtilizoSeguro2=$_POST['bolUtilizoSeguro2'];
$bolUtilizoSeguro3=$_POST['bolUtilizoSeguro3'];
$bolUtilizoSeguro4=$_POST['bolUtilizoSeguro4'];
$bolUtilizoSeguro5=$_POST['bolUtilizoSeguro5'];
$precioTarjeta=$_POST['precioTarjeta'];
$precioTarjeta2=$_POST['precioTarjeta2'];
$precioTarjeta3=$_POST['precioTarjeta3'];
$precioTarjeta4=$_POST['precioTarjeta4'];
$precioTarjeta5=$_POST['precioTarjeta5'];
$intEstatusID=$_POST['intEstatusID'];
$fechaModificacion = date("Y-m-d H:i:s");
$usuario=$_POST['usuarioID'];

  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);


//Sentencia de inserci¨®n del elemento 
$ssql = "SELECT asignacion_id FROM residencias_residentes_tarjetas_montecarlo"; 

//lo inserto en la base de datos 
if (mysql_query($ssql,$con)){ 

   	//recibo el ¨²ltimo id
   	$ultimo_id = mysql_insert_id($con); 
   	$intAsignacionID=$ultimo_id+1; 
}

  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------

$result1 = mysql_query("SELECT tarjeta_id FROM tarjetas WHERE lectura='$intTarjetaID'");          //query
  $tarjetaID= mysql_fetch_row($result1); 

$result2 = mysql_query("SELECT tarjeta_id FROM tarjetas WHERE lectura='$intTarjetaID2'");          //query
  $tarjetaID2= mysql_fetch_row($result2);   

  $result3 = mysql_query("SELECT tarjeta_id FROM tarjetas WHERE lectura='$intTarjetaID3'");          //query
  $tarjetaID3= mysql_fetch_row($result3);   

  $result4 = mysql_query("SELECT tarjeta_id FROM tarjetas WHERE lectura='$intTarjetaID4'");          //query
  $tarjetaID4= mysql_fetch_row($result4);   

  $result5 = mysql_query("SELECT tarjeta_id FROM tarjetas WHERE lectura='$intTarjetaID5'");          //query
  $tarjetaID5= mysql_fetch_row($result5);  


$fecha= date("Y-m-d H:i:s");


if ($strResidenteID !="")
{
$result6 = "INSERT INTO residencias_residentes_tarjetas_monte_carlo VALUES (NULL,0,'$tarjetaID[0]','$tarjetaID2[0]','$tarjetaID3[0]','$tarjetaID4[0]','$tarjetaID5[0]','$numeroSerie','$numeroSerie2','$numeroSerie3','$numeroSerie4','$numeroSerie5','$strResidenteID','$strCompradorID',$mostrarNombreComprador,CURDATE(),'$strFechaVencimiento',$intTipoLecturaID,'$strLecturaEPC','$strFolioContrato',$dblPrecio,$descuento,$IVA,$bolUtilizoSeguro,$bolUtilizoSeguro2,$bolUtilizoSeguro3,$bolUtilizoSeguro4,$bolUtilizoSeguro5,'',$intEstatusID,'".$fecha."',$usuario)";          //query
  $final= mysql_query($result6);  

  $rs = mysql_query("SELECT MAX(asignacion_id) AS id FROM residencias_residentes_tarjetas_monte_carlo");
  if ($row = mysql_fetch_row($rs)) 
  {
  $id = trim($row[0]);
  }
  if ($tarjetaID[0] != "")
  {
  $insert1 = "INSERT INTO residencias_residentes_tarjetas_detalle_monte_carlo VALUES (0,$id,'$intTarjetaID','$numeroSerie',$bolUtilizoSeguro,$precioTarjeta,'')";          
  $finalInsert1= mysql_query($insert1);
  }

  if ($tarjetaID2[0] != "")
  {
  $insert2 = "INSERT INTO residencias_residentes_tarjetas_detalle_monte_carlo VALUES (0,$id,'$intTarjetaID2','$numeroSerie2',$bolUtilizoSeguro2,$precioTarjeta2,'')";          
  $finalInsert2= mysql_query($insert2);
  }

  if ($tarjetaID3[0] != "")
  {
  $insert3 = "INSERT INTO residencias_residentes_tarjetas_detalle_monte_carlo VALUES (0,$id,'$intTarjetaID3','$numeroSerie3',$bolUtilizoSeguro3,$precioTarjeta3,'')";          
  $finalInsert3= mysql_query($insert3);
  }

  if ($tarjetaID4[0] != "")
  {
  $insert4 = "INSERT INTO residencias_residentes_tarjetas_detalle_monte_carlo VALUES (0,$id,'$intTarjetaID4','$numeroSerie4',$bolUtilizoSeguro4,$precioTarjeta4,'')";          
  $finalInsert4= mysql_query($insert4);
  }

  if ($tarjetaID5[0] != "")
  {
  $insert5 = "INSERT INTO residencias_residentes_tarjetas_detalle_monte_carlo VALUES (0,$id,'$intTarjetaID5','$numeroSerie5',$bolUtilizoSeguro5,$precioTarjeta5,'')";          
  $finalInsert5= mysql_query($insert5);
  }
}
  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($array);

?>