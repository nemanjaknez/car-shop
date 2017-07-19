            <ul class="nav navbar-nav navbar-right">
                <li><a><?php echo Session::get('username'); ?></a></li>
                <li <?php if ($Controller == 'Car' and $Method == 'index') echo 'class="active"'; ?>><a href="<?php echo Misc::link(''); ?>"><i class="glyphicon glyphicon-home"></i> POČETNA</a></li>
                <li <?php if ($Controller == 'AdminCars' and $Method == 'index') echo 'class="active"'; ?>><a href="<?php echo Misc::link('cars'); ?>"><i class="fa fa-car" aria-hidden="true"></i> MOJI OGLASI</a></li>
                <li <?php if ($Controller == 'AdminCars' and $Method == 'add') echo 'class="active"'; ?>><a href="<?php echo Misc::link('cars/add'); ?>"><i class="glyphicon glyphicon-plus-sign"></i> POSTAVI OGLAS</a></li>
                <li><a href="<?php echo Misc::link('logout'); ?>"><i class="glyphicon glyphicon-log-out"></i> ODJAVA</a></li>
            </ul>
        </div>
    </div>
</nav>
