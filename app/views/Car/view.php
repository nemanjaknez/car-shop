<?php include 'app/views/_global/beforeContent.php'; ?>

    <?php if (isset($DATA['car'])): ?>
        <main class="container">
            <ol class="breadcrumb">
                <li><a href="<?php echo Misc::link(''); ?>">Naslovna</a></li>
                <li class="active">
                    <?php foreach ($DATA['car']->manufacturer as $man): ?>
                        <?php echo htmlspecialchars($man->manufacturer_name); ?>   
                    <?php endforeach; ?>
                    <?php foreach ($DATA['car']->model as $m): ?>
                        <?php echo htmlspecialchars($m->model_name); ?>   
                    <?php endforeach; ?>
                </li>
            </ol>
            <section class="main-part">
                <h1><?php echo htmlspecialchars($DATA['car']->advertisement_title); ?></h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <?php foreach ($DATA['car']->image as $i): ?>
                                <img class="img-responsive large-image" alt="<?php echo $i->path; ?>" src="<?php echo Configuration::BASE_URL . htmlspecialchars($i->path);?>">
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="list-group">
                            <p class="list-group-item active"><?php echo htmlspecialchars($DATA['car']->price); ?> &euro;</p>
                            <p class="list-group-item">
                                <?php foreach ($DATA['car']->condition as $cond): ?>
                                    <?php echo htmlspecialchars($cond->name); ?>
                                <?php endforeach; ?>
                            </p>
                            <p class="list-group-item">
                                <?php foreach ($DATA['car']->manufacturer as $man): ?>
                                    <?php echo htmlspecialchars($man->manufacturer_name); ?>   
                                <?php endforeach; ?>
                            </p>
                            <p class="list-group-item">
                                <?php foreach ($DATA['car']->model as $m): ?>
                                    <?php echo htmlspecialchars($m->model_name); ?>   
                                <?php endforeach; ?>                                
                            </p>
                            <p class="list-group-item"><?php echo htmlspecialchars($DATA['car']->year_of_production); ?>. godište</p>
                            <p class="list-group-item"><?php echo htmlspecialchars($DATA['car']->kilometers); ?> km</p>
                            <p class="list-group-item">
                                <?php foreach ($DATA['car']->body_style as $bs): ?>
                                    <?php echo htmlspecialchars($bs->name); ?>
                                <?php endforeach; ?>
                            </p>
                            <p class="list-group-item">
                                <?php foreach ($DATA['car']->fuel as $f): ?>
                                    <?php echo htmlspecialchars($f->type); ?>
                                <?php endforeach; ?>
                            </p>
                            <p class="list-group-item"><?php echo htmlspecialchars($DATA['car']->engine_size); ?> cm3</p>
                        </div>
                    </div>
                    <div class="col-md-3 contact well">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-2">
                                <img src="<?php echo Configuration::BASE_URL .'assets/img/phone_icon.png'; ?>" alt="Kontaktiraj prodavca">
                            </div>
                            <header class="col-md-10 col-sm-10 col-xs-10">
                                <h2>Kontaktiraj prodavca</h2>
                            </header>
                            <div class="col-md-12 col-sm-12 col-xs-12 contact-info">
                                <p>PRODAVAC</p>
                                <h4>
                                    <?php foreach ($DATA['car']->user as $u): ?>
                                        <?php echo htmlspecialchars($u->forename); ?>
                                    <?php endforeach; ?>
                                    <?php foreach ($DATA['car']->user as $u): ?>
                                        <?php echo htmlspecialchars($u->surname); ?>
                                    <?php endforeach; ?>
                                </h4>
                                <p>
                                    <?php foreach ($DATA['car']->user as $u): ?>
                                        <?php echo htmlspecialchars($u->phone); ?>
                                    <?php endforeach; ?>
                                </p>
                            </div>
                        </div>     
                    </div>
                </div>
            </section>
            <article class="additional-info">
                <h2>Dodatne informacije</h2>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Snaga(KS)</td>
                                    <td class="information"><?php echo htmlspecialchars($DATA['car']->horsepower); ?> KS</td>
                                </tr>
                                <tr>    
                                    <td>Menjač</td>
                                    <td class="information">
                                        <?php foreach ($DATA['car']->transmission as $t): ?>
                                            <?php echo htmlspecialchars($t->type); ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pogon</td>
                                    <td class="information">
                                        <?php foreach ($DATA['car']->drive as $d): ?>
                                            <?php echo htmlspecialchars($d->name); ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Registrovan do</td>
                                    <td class="information">
                                        <?php foreach ($DATA['car']->registered as $r): ?>
                                            <?php echo htmlspecialchars($r->date); ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Boja</td>
                                    <td class="information">
                                        <?php foreach ($DATA['car']->color as $c): ?>
                                            <?php echo htmlspecialchars($c->name); ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>    
                                    <td>Broj vrata</td>
                                    <td class="information">
                                        <?php foreach ($DATA['car']->door_number as $dn): ?>
                                            <?php echo htmlspecialchars($dn->number); ?>
                                        <?php endforeach; ?> vrata
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
            <article class="equipment">
                <h2>Oprema</h2>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <ul>
                            <?php foreach ($DATA['car']->equipment as $eq): ?>
                                <li class="col-md-3"><?php echo htmlspecialchars($eq->name); ?>
                            <?php endforeach; ?>              
                        </ul>
                    </div>
                </div>
            </article>

            <section class="description">
                <h2>Opis</h2>
                <p><?php echo htmlspecialchars($DATA['car']->description); ?></p>
            </section>
        </main>
    <?php else : ?>

        <main class="container">
            <div class="text-center">
                <h1 class="col-md-6 col-md-offset-3 alert alert-danger margin-bottom-500px margin-top-100px">Traženi automobil ne postoji!</h1>
            </div>
        </main>

    <?php endif; ?>

<?php include 'app/views/_global/afterContent.php'; ?>

