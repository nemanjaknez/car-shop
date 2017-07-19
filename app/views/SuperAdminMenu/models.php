<?php include 'app/views/_global/superAdminBeforeContent.php'; ?>

<div class="col-md-6 col-md-offset-3">

    <h1>Modeli automobila</h1>
    
    <a class="btn btn-default" href="<?php echo Misc::link('superAdmin/addModel/'); ?>">Dodaj novi model automobila</a><br><br>
    <a href="<?php echo Misc::link('superAdmin/menu/'); ?>">Povratak na menu stranu</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv modela</th>
                <th>Naziv brenda</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($DATA['models'] as $model): ?>
            <tr>
                <td><?php echo htmlspecialchars($model->model_id); ?></td>
                <td><?php echo htmlspecialchars($model->model_name); ?></td>
                <td>
                    <?php foreach ($model->manufacturers as $man) : ?>                
                        <?php echo htmlspecialchars($man->manufacturer_name)?>
                    <?php endforeach; ?>
                </td>
                <td>
                    <form method="post">
                        <input name="modelID" value="<?php echo htmlspecialchars($model->model_id); ?>" type="hidden">
                        <input name="confirmed" value="1" type="hidden">           
                        <button onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj zapis?');" class="btn btn-danger" type="submit" name="deleteModel">
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





