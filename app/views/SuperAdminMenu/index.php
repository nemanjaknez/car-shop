<?php include 'app/views/_global/superAdminBeforeContent.php'; ?>

<main class="container">
    <div class="col-md-4 col-md-offset-4">        
        <div class="panel panel-primary text-center super-admin-menu">
            <header class="panel-heading">Super admin menu</header>     
            <ul class="list-group super-admin-menu-list">
                <li class="list-group-item"><a href="<?php echo Misc::link('superAdmin/userAccounts/'); ?>">Korisnički nalozi</a>
                <li class="list-group-item"><a href="<?php echo Misc::link('superAdmin/manufacturers/'); ?>">Brendovi automobila</a>
                <li class="list-group-item"><a href="<?php echo Misc::link('superAdmin/models/'); ?>">Modeli automobila</a>
                <li class="list-group-item"><a href="<?php echo Misc::link('superAdmin/colors/'); ?>">Boje automobila</a>
                <li class="list-group-item"><a href="<?php echo Misc::link('superAdmin/transmission/'); ?>">Tipovi menjača</a>
                <li class="list-group-item"><a href="<?php echo Misc::link('superAdmin/equipment/'); ?>">Dodatna oprema</a>
                <li class="list-group-item"><a href="<?php echo Misc::link('superAdmin/registered/'); ?>">Važenje registracije</a>
                <li class="list-group-item"><a href="<?php echo Misc::link('superAdmin/logout/'); ?>">Odjava</a>
            </ul>
        </div> 
    </div>
</main>

<?php include 'app/views/_global/superAdminAfterContent.php'; ?>