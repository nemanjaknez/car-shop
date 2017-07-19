            <ul class="nav navbar-nav navbar-right navigation">
                <li <?php if ($Controller == 'Car' and $Method == 'index') echo 'class="active"'; ?>><a href="<?php echo Misc::link(''); ?>"><i class="glyphicon glyphicon-home"></i> POČETNA</a></li>
                <li <?php if ($Controller == 'Main' and $Method == 'login') echo 'class="active"'; ?>><a href="<?php echo Misc::link('login'); ?>"><i class="glyphicon glyphicon-log-in"></i> PRIJAVA</a></li>
            </ul> 
        </div>
    </div>
</nav>