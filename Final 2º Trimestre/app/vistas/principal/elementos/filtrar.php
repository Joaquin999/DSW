<div class="col-md-12">
 <div class="collapse" id="collapseFiltro">

  <form class="form-inline" method="POST" action="<?php echo RUTA_URL."Principal/filtrar" ?>?tab=<?php echo $tabla ?>">
      <div class="form-group row">
      <div class="col-12 text-center">
          <input style="width:100%" class="form-control" name="busqueda" placeholder="Buscar" aria-label="Search" type="text">
          <br/><br/>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        </div>
  </div>
</div>
</div>
