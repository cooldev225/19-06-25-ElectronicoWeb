<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo ASSET_PATH;?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo $_now_user['name'];?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        </div>
      
        <ul class="sidebar-menu" data-widget="tree">
            <li class="active"><a href="excelimport"><i class="fa fa-book"></i> <span>Excel Data Import</span></a></li>
            <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>User Manage</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="index"><i class="fa fa-circle-o"></i> View Users</a></li>
                <li><a href="adduser"><i class="fa fa-circle-o"></i>Add User</a></li>
            </ul>
            </li>
            
            <?php if($_now_user['role']==0){
            $menu="<li class=\"treeview ".($content=="instructor/comment.php"||$content=="instructor/template_ex.php"||$content=="instructor/template_rm.php"||$content=="instructor/template_rs.php"||$content=="instructor/template_hm.php"||$content=="instructor/template_hs.php"||$content=="instructor/template_im.php"?"active":"")."\">".
					"<a href=\"index\">".
					"<i class=\"fa fa-share-alt\"></i>".
					"<span>Template</span>".
					"<span class=\"pull-right-container\">".
					"  <i class=\"fa fa-angle-left pull-right\"></i>".
					"</span>".
					"</a>".
					"<ul class=\"treeview-menu\" style=\"display: ".($content=="instructor/comment.php"||$content=="instructor/template_ex.php"||$content=="instructor/template_rm.php"||$content=="instructor/template_rs.php"||$content=="instructor/template_hm.php"||$content=="instructor/template_hs.php"||$content=="instructor/template_im.php"?"block":"").";\">".
					"	<li ".($content=="instructor/template_rm.php"?"class=\"active\"":"")."><a href=\"rmtemplate\" onclick=\"\"><i class=\"fa fa-circle-o\"></i>SESSION MESSAGE</a></li>".
					"	<li ".($content=="instructor/template_rs.php"?"class=\"active\"":"")."><a href=\"rstemplate\" onclick=\"\"><i class=\"fa fa-circle-o\"></i>SESSION SMS</a></li>".
					($_user_sendable?"	<li ".($content=="instructor/template_hm.php"?"class=\"active\"":"")."><a href=\"hmtemplate\" onclick=\"\"><i class=\"fa fa-circle-o\"></i>HOMEWORK MESSAGE</a></li>":"").
					($_user_sendable?"	<li ".($content=="instructor/template_hs.php"?"class=\"active\"":"")."><a href=\"hstemplate\" onclick=\"\"><i class=\"fa fa-circle-o\"></i>HOMEWORK SMS</a></li>":"").
					"	<li ".($content=="instructor/template_im.php"?"class=\"active\"":"")."><a href=\"imtemplate\" onclick=\"\"><i class=\"fa fa-circle-o\"></i>INTERNAL MESSAGE</a></li>".
					($_user_sendable?"	<li ".($content=="instructor/template_ex.php"?"class=\"active\"":"")."><a href=\"extemplate\" onclick=\"\"><i class=\"fa fa-circle-o\"></i>EXTRA MESSAGE</a></li>":"").
					"</ul>".
			      "</li>";
			echo $menu;
			}
			?>
            
			<li><a href="controlpanel"><i class="fa fa-gear"></i> <span>Control Panel</span></a></li>
            <li><a href="<?php echo BASE_PATH?>/login/signout"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
            <!-- <li class="treeview">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Layout Options</span>
                <span class="pull-right-container">
                <span class="label label-primary pull-right">4</span>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            </ul>
            </li>
            
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
        </ul>
    </section>
</aside>