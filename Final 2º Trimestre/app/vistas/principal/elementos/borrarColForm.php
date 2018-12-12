<div class="col-md-12 text-center">
<div class="collapse" id="collapseBorraC">
<form class="form-group" method="POST" action="<?php echo RUTA_URL."principal/borrarCol" ?>?tab=<?php echo $tabla ?>">
<datalist id='tipis'>
<?php
for ($i = 0; $i < $NumeroCol; $i++) {
    echo "<option value='" . $Columnas[$i] . "'>" .$Columnas[$i]."</option>";
}
?>
</datalist>
<label>Nombre de columna a Eliminar</label>
<input type="text" list="tipis" class="form-control"  name="oldCol" id="oldCol" value="">
<input type="hidden" name="tabla" value="<?php echo $tabla; ?>"/>
<br/>
<input class='form-control' type='submit' name='Enviar'>
</form></div></div>
