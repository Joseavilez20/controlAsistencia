<?php

if($_REQUEST["DATA1"]){
	echo "data is: ".$_REQUEST["DATA1"];
	file_put_contents("datos.txt",$_REQUEST["DATA1"]);
}

 ?>