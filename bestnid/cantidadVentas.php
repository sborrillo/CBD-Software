<?php
	include('connect.php');
	$dia1=$_POST['dia1'];
	$mes1=$_POST['mes1'];
	$anio1=$_POST['anio1'];
	$dia2=$_POST['dia2'];
	$mes2=$_POST['mes2'];
	$anio2=$_POST['anio2'];
	$num=0;
	$fecha1="$dia1/$mes1/$anio1";
	$fecha2="$dia2/$mes2/$anio2";
	$query=mysql_query("SELECT * FROM venta");
	$numRows=mysql_num_rows($query);
	$error="*";
	if($dia1>31){
		$error="Se ingresó una fecha inválida. Vuelva a intentarlo";
	}else{
		if($dia2>31){
			$error="Se ingresó una fecha inválida. Vuelva a intentarlo";
		}else{
			if($mes1>12){
				$error="Se ingresó una fecha inválida. Vuelva a intentarlo";
			}else{
				if($mes2>12){
					$error="Se ingresó una fecha inválida. Vuelva a intentarlo";
				}else{
					if(strlen($anio1)!=4){
						$error="Se ingresó una fecha inválida. Vuelva a intentarlo";		
					}else{
						if(strlen($anio2!=4)){
							$error="Se ingresó una fecha inválida. Vuelva a intentarlo";
						}
					}
				}
			}
		}
	}
	if($error!="*"){
	for($i=1;$i<=$numRows;$i++){
		$venta=mysql_fetch_assoc($query);
		$fechaventa=$venta['fecha'];
		$aux=new DateTime($fechaVenta);
		$fecha=date_format($aux,'d-m-Y');
		list($dia,$mes,$anio)=explode('-',$fecha);
		if($anio>=$anio1 && $anio<=$anio2){
			if($mes>=$mes1 && $mes<=$mes2){
				if($mes==$mes1 && $mes==$mes2){
					if($dia>=$dia1 && $dia<=$dia2){
						$num=$num+1;
					}
				}
				else{
					if($mes==$mes1){
						if($dia>=$dia1){
							$num=$num+1;
						}
					}
					if($mes==$mes2){
						if($dia<=$dia2){
							$num=$num+1;
						}
					}
				}
				if($mes>$mes1 && $mes<$mes2){
					$num=$num+1;
				}
			}
		}
	}
	}
	header("Location: reportes.php?cantVentas=$num&f1=$fecha1&f2=$fecha2&errorVentas=$error");
?>
