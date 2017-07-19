<?php include 'app/views/_global/beforeContent.php'; ?>


<main class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo Misc::link(''); ?>">Naslovna</a></li>
        <li class="active">Moj nalog</li>
    </ol>
    <div class="row r">
        <div class="col-md-6">
            <section>
                <header>
                    <h2>Prijava</h2>
                    <p>Ako kod nas imate korisnički nalog, molimo ulogujte se.</p>
                </header>
                <form method="post" onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="inputEmail" class="control-label">E-mail adresa</label><br>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-user"></i></div>
                            <input type="email" name="inputEmail" pattern="^.{6,64}$" class="form-control" id="inputEmail" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="control-label">Lozinka</label><br>                   
                        <div class="input-group">
                            <div class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></div>
                            <input type="password" name="password" pattern="^.{6,255}$" class="form-control" id="inputPassword" required>
                        </div>                    
                    </div>

                    <div class="form-group">                  
                        <button type="submit" name="loginBtn" class="btn btn-primary">Prijava</button>
                    </div>
                </form>
            </section>

            <?php if (isset($DATA['message'])): ?>
                <div class="alert alert-warning col-md-6">
                    <p><?php echo htmlspecialchars($DATA['message']); ?></p>
                </div>
            <?php endif; ?>

        </div>
        <div class="col-md-6 reg">
            <h2>Nemate nalog? Registrujte se</h2>
            <p>Kreiranjem naloga bićete u mogućnosti da:</p>
            <ul>
                <li>Postavlate nove oglase
                <li>Pregledate i pratite Vaše oglase itd
            </ul>
            <a class="btn btn-default" href="<?php echo Misc::link('register'); ?>">Kreiraj korisnički nalog</a>
        </div>
    </div>
</main>



<?php include 'app/views/_global/afterContent.php'; ?>