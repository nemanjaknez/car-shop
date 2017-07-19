<?php include 'app/views/_global/superAdminBeforeContent.php'; ?>

<div class="col-md-6 col-md-offset-3">
    <h1>Brendovi automobila</h1>

    <a class="btn btn-default" href="<?php echo Misc::link('superAdmin/addManufacturer/'); ?>">Dodaj novi brend automobila</a><br><br>
    <a href="<?php echo Misc::link('superAdmin/menu/'); ?>">Povratak na menu stranu</a>    
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv brenda</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($DATA['manufacturers'] as $m): ?>
            <tr>
                <td><?php echo htmlspecialchars($m->manufacturer_id); ?></td>
                <td><?php echo htmlspecialchars($m->manufacturer_name); ?></td>
                <td>
                    <form method="post">
                        <input name="manufacturerID" value="<?php echo htmlspecialchars($m->manufacturer_id); ?>" type="hidden">
                        <input name="confirmed" value="1" type="hidden">           
                        <button onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj zapis?');" class="btn btn-danger" type="submit" name="deleteManufacturer">
                            <i class="glyphicon glyphicon-trash"> </i> Obriši
                        </button>                     
                    </form>                    
                </td>
            </tr>    
            <?php endforeach; ?>

        </tbody>

    </table><br>



</div>


<?php include 'app/views/_global/superAdminAfterContent.php'; ?>





