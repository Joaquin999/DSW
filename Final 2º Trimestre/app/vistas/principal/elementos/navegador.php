<nav class="navbar pull-xs-right  flex-md-row navbar-expand-md  navbar-light bg-white ">
    <h1 class="my-0 mr-md-auto font-weight-normal"><?php echo NOMBRE_SITIO;?></h1>
    <div class="pull-xs-right">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse d-flex" id="navbarCollapse" >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link p-2 text-dark" href="<?php echo RUTA_URL;?>">Inicio</a>
                </li>
                <?php
                //SE GENERAN LOS ITEMS DEL NAVEGADOR DE ACUERDO CON LAS TABLAS QUE HAYAN EN LA BASE DE DATOS
                for($i=0;$i<count($NameTablas);$i++){
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link p-2 text-dark" href="'.RUTA_URL.'principal/Index?tab=' . $NameTablas[$i] . '">' .ucwords(strtolower($NameTablas[$i])) . '</a>';
                    echo '</li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link p-2 text-dark" href="<?php echo RUTA_URL."Principal/salir" ?>">Desconectarse</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br/>
