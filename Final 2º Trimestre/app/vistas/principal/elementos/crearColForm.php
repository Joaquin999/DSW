<div class= "col-md-12 text-center" >
<div class= "collapse"  id= "collapseCreaC" >
<form class= "form-group"  method= "POST"  action= "<?php echo RUTA_URL . "principal/crearCol" ?>">
   <datalist id='tipasos'>
   <option value='int'>
   <option value='float'>
   <option value='varchar'>
   <option value='char'>
   </datalist>
   <label>Nombre de columna</label>
   <input type="hidden" name="tabla" value="<?php echo $tabla; ?>"/>
   <input type= "text" class= "form-control"  name= "newCol" id= "newCol"  value="" >
   <label>Tipo de columna</label>
   <input type="text"  list="tipasos"  class= "form-control"  placeholder= "int,varchar,char,float"  name= "TipoCol"  id= "newValor"  value=""  >
   <br/>
   <input class='form-control' type='submit' name='Enviar'>
   </form></div></div>
