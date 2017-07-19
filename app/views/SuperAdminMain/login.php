<?php include 'app/views/_global/superAdminBeforeContent.php'; ?>

<main class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <section class="super-admin-login">
                <header>
                    <h2>Prijava</h2>
                </header>
                <form method="post">
                    <div class="form-group">
                        <label for="em" class="control-label">E-mail adresa</label><br>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                            <input type="email" name="em" id="em" pattern="^.{6,64}$" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="control-label">Lozinka</label><br>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                            <input type="password" name="pwd" id="pwd" pattern="^.{6,255}$" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" name="loginButton" class="btn btn-primary">Prijava</button>
                        </div>
                    </div>
                </form>

                <?php if (isset($DATA['message'])): ?>
                    <div class="alert alert-warning col-md-6">
                        <p><?php echo htmlspecialchars($DATA['message']); ?></p>
                    </div>
                <?php endif; ?>                
    
            </section>
        </div>
    </div>
</main>

<?php include 'app/views/_global/superAdminAfterContent.php'; ?>



