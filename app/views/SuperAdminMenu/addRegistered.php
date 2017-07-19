<?php include 'app/views/_global/superAdminBeforeContent.php'; ?>

<main class="container">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="margin-top-100px font-20pt">Dodajte novi datum važenja registracije</h1>

        <form method="post">
            <label for="registered">Vazenje registracije:</label>
            <input class="form-control" type="text" name="registered" id="registered" required>

            <button type="submit" name="addRegistered" class="btn btn-primary margin-top-15px">Dodaj</button>
        </form>

        <div class="margin-top-25px margin-bottom-500px"><a href="<?php echo Misc::link('superAdmin/menu/'); ?>">Povratak na menu stranu</a></div>
    </div>
</main>

<?php include 'app/views/_global/superAdminAfterContent.php'; ?>


