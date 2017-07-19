<?php include 'app/views/_global/superAdminBeforeContent.php'; ?>

<div class="col-md-6 col-md-offset-3">    
    <h1>Tipovi menjača</h1>

    <a class="btn btn-default" href="<?php echo Misc::link('superAdmin/addTransmission/'); ?>">Dodaj novi tip menjaca</a><br><br>
    <a href="<?php echo Misc::link('superAdmin/menu/'); ?>">Povratak na menu stranu</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tip menjaca</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($DATA['transmission'] as $t): ?>
            <tr>
                <td><?php echo htmlspecialchars($t->transmission_id); ?></td>
                <td><?php echo htmlspecialchars($t->type); ?></td>
                <td>
                    <form method="post">
                        <input name="transmissionID" value="<?php echo htmlspecialchars($t->transmission_id); ?>" type="hidden">
                        <input name="confirmed" value="1" type="hidden">           
                        <button onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj zapis?');" class="btn btn-danger" type="submit" name="deleteTransmission">
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









