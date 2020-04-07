<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo ASSET_PATH;?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $_now_user['username'];?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        </div>
      
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview active">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>eEXPEDIENTE</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li <?php echo ($content=="membership/recordview.php"?"class=\"active\"":"");?>><a href="index"><i class="fa fa-circle-o"></i> Ver Registros</a></li>
                <li <?php echo ($content=="membership/addnew.php"?"class=\"active\"":"");?>><a href="addnew"><i class="fa fa-circle-o"></i>Agregar Registro</a></li>
            </ul>
            </li>
            <li><a href="<?php echo BASE_PATH?>/login/signout"><i class="fa fa-sign-out"></i> <span>Cerrar sesión</span></a></li>
        </ul>
    </section>
</aside>