<?php include 'app/views/_global/superAdminBeforeContent.php'; ?>



<div class="col-md-6 col-md-offset-3">
    <h1>Korisnički nalozi</h1>
    
    <a href="<?php echo Misc::link('superAdmin/menu/'); ?>">Povratak na menu stranu</a>    
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Korisnicko ime</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Adresa</th>
                <th>Telefon</th>
                <th>Aktivan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($DATA['users'] as $u): ?>
            <tr>
                <td><?php echo htmlspecialchars($u->user_id); ?></td>
                <td><?php echo htmlspecialchars($u->username); ?></td>
                <td><?php echo htmlspecialchars($u->forename); ?></td>
                <td><?php echo htmlspecialchars($u->surname); ?></td>
                <td><?php echo htmlspecialchars($u->address); ?></td>
                <td><?php echo htmlspecialchars($u->phone); ?></td>
                <td><?php if ($u->active == 'y') { echo 'Da';} else { echo 'Ne'; } ?></td>
                <td>
                    <form method="post">
                        <input name="userID" value="<?php echo htmlspecialchars($u->user_id); ?>" type="hidden">
                        <input name="confirmed" value="1" type="hidden">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <button onclick="return confirm('Da li ste sigurni da želite da izmenite ovaj nalog?');" class="btn btn-warning" type="submit" name="editUserAccount">
                                <i class="glyphicon glyphicon-edit"> </i> Aktiviraj / Deaktiviraj nalog
                            </button>
                        </div>
                    </form>
                </td>
            </tr>    
            <?php endforeach; ?>

        </tbody>

    </table><br>

</div>



<?php include 'app/views/_global/superAdminAfterContent.php'; ?>









