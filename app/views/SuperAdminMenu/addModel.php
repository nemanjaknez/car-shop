<?php include 'app/views/_global/superAdminBeforeContent.php'; ?>

<main class="container">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="margin-top-100px font-20pt">Dodajte novi model automobila</h1>

        <form method="post">

            <label for="marka">Marka:</label>
            <select class="form-control" name="manufacturer_id" id="marka">
                <?php foreach ($DATA['manufacturers'] as $m): ?>
                    <option value="<?php echo htmlspecialchars($m->manufacturer_id); ?>"><?php echo htmlspecialchars($m->manufacturer_name); ?></option>
                <?php endforeach; ?>
            </select>

            <label for="model">Model:</label>
            <input class="form-control" type="text" name="model" id="model" required>

            <button type="submit" name="addModel" class="btn btn-primary margin-top-15px">Dodaj</button>
        </form>

        <div class="margin-top-25px margin-bottom-500px"><a href="<?php echo Misc::link('superAdmin/menu/'); ?>">Povratak na menu stranu</a></div>
    </div>
</main>

<?php include 'app/views/_global/superAdminAfterContent.php'; ?>


