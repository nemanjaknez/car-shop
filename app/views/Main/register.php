<?php include 'app/views/_global/beforeContent.php'; ?>

<main class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo Misc::link(''); ?>">Naslovna</a></li>
        <li><a href="<?php echo Misc::link('login'); ?>">Prijava</a></li>
        <li class="active">Registracija</li>
    </ol>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <section>
                <header>
                    <h2>Registracija</h2>
                    <p>Ukoliko nemate nalog molimo Vas da popunite sledeća polja traženim podacima.</p>
                    <p class="fields">OBAVEZNO POPUNITI SVA POLJA!</p>
                </header>
                <form method="post" onsubmit="return validateRegisterForm();">
                    <div class="form-group">
                        <label for="inputEmail1" class="control-label">E-mail adresa</label>
                        <div>
                            <input type="email" name="regEmail" pattern="^.{6,64}$" class="form-control" id="inputEmail1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword2" class="control-label">Lozinka</label>
                        <div>
                            <input type="password" name="regPassword" pattern="^.{6,255}$" class="form-control" id="inputPassword2" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="repeatPassword" class="control-label">Ponovite lozinku</label>
                        <div>
                            <input type="password" name="regPassword2" pattern="^.{6,255}$" class="form-control" id="repeatPassword" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="forename" class="control-label">Ime</label>
                        <div>
                            <input type="text" name="regForename" pattern="^([A-z][\ |\-]?){2,}$" class="form-control" id="forename" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="surname" class="control-label">Prezime</label>
                        <div>
                            <input type="text" name="regSurname" pattern="^([A-z][\ |\-]?){2,}$" class="form-control" id="surname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Adresa</label>
                        <div>
                            <input type="text" name="regAddress" pattern="^.{2,}$" class="form-control" id="address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="control-label">Telefon</label>
                        <div>
                            <input type="tel" name="regPhone" pattern="^[\+]?([0-9][\ ]?){7,}$" class="form-control" id="phone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" name="regBtn" class="btn btn-primary">Pošalji</button>
                        </div>
                    </div>
                </form>
            </section>

            <?php if (isset($DATA['message'])): ?>
                <div class="alert alert-warning col-md-6">
                    <p><?php echo htmlspecialchars($DATA['message']); ?></p>
                </div>    
            <?php endif; ?>

        </div>
    </div>
</main>

<?php include 'app/views/_global/afterContent.php'; ?>

