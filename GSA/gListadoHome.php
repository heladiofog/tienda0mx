<?php
session_start();
if(isset($_SESSION['login']))
{
require_once dirname(__FILE__) ."/include/database.php";

	/*JSON*/
	include ('controllers/json_creator.php');
	$jc = new Json_Creator();
	/*----*/
	
$db=getDb();

//esto me trae el ID conforme a la nueva posicion en la que se dejen las publicaciones
foreach ($_POST['lh'] as $value){
	//echo $value."<br>";
}
/* SE LE CAMBIA LA POSICION A TODAS, ESTO NO APLICARIA YA QUE AL CAMBIAR LA POSICION DE LAS QUE AFECTAMOS PODEMOS mostrar solo esas */
$sql="UPDATE CMS_RelPromocionSitioCanal SET posicionIn=0 WHERE id_canalSi=21";
$db -> Execute($sql);
 //ORDENAMOS CONFORME A ESTE NUEVO CRITERIO 
$npos=1;
foreach ($_POST['lh'] as $value){
 	$sql="UPDATE CMS_RelPromocionSitioCanal SET posicionIn=$npos WHERE id_promocionIn=$value AND id_canalSi=21";
	$db -> Execute($sql);
	$npos++;
}

//PARA VER LAS ACTIVAS
$arrayPE = array();
$contador=0;
foreach ($_POST['lh'] as $value){
	if(!empty($_POST['c'.$value])){
		$arrayPE[$contador]=$value;
		$contador++;
	}
	else{
		//echo "no activo<br>";
	}
}
//Arreglo vacio ninguna publicacion activa 
if(count($arrayPE) !=0){
	$sql="UPDATE CMS_RelPromocionSitioCanal SET publicadoBi=0 WHERE id_canalSi=21";
	$db -> Execute($sql);
	foreach ($arrayPE as $value){
		$sql="UPDATE CMS_RelPromocionSitioCanal SET publicadoBi=1 WHERE id_promocionIn=$value AND id_canalSi=21";
		$db -> Execute($sql);
	}
}
else{
	$sql="UPDATE CMS_RelPromocionSitioCanal SET publicadoBi=0 WHERE id_canalSi=21";
	$db -> Execute($sql);
}
	/*JSON*/
	$promos_home = $jc->generar_json_home_promos();
	//echo "Promociones para el home..................</br><br/>";
	
header('location: home.php');
}
else{
	die("Error::no ha iniciado sesi&oacute;n");
}
?>
