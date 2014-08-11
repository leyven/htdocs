<html>
<head></head>


<body>



<form action="<?php echo $_SERVER['PHP_SELF'];?>"method="get">
<?
$ARCHIVOS=7;
for($i=1;$i<=$ARCHIVOS;$i++)
		{
			?>
            <br>
            <label> <? echo "Prueba".$i?></label>
			<input type="checkbox" name="prueba[]" value="prueba<? echo $i?>"/>
			
            
			<?			
			}   
?>
<br><br>
<input type="submit" name="submit" value="hit it">

</form>
<? 
if(isset($_GET['submit'])){
	$opcionesEscogidas= $_GET['prueba'];
	for($i=0; $i<count($opcionesEscogidas);$i++){
		echo "Las opciones escogida es: ".$opcionesEscogidas[$i];
		?>
		<br>
		<?
	}
	
}

?>

</body>
</html>