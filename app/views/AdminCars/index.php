<?php include 'app/views/_global/beforeContent.php'; ?>

<main class="container">
    <div class="row margin-top-15px">
        <?php foreach ($DATA['cars'] as $car) : ?>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <article class="thumbnail">
                    <?php foreach ($car->images as $image) : ?>                
                        <a href="<?php echo Misc::link('car/' . $car->car_id); ?>">
                            <img class="small-image" src="<?php echo Configuration::BASE_URL . htmlspecialchars($image->path); ?>" alt="<?php echo htmlspecialchars($image->path); ?>">
                        </a>
                    <?php endforeach; ?>
                    <div class="caption">
                        <header>
                            <a href="<?php echo Misc::link('car/' . $car->car_id) ?>">
                                <h4>                               
                                    <?php foreach ($car->manufacturers as $man) : ?>                
                                        <?php echo htmlspecialchars($man->manufacturer_name)?>
                                    <?php endforeach; ?>
                                    <?php foreach ($car->models as $m) : ?>                
                                        <?php echo htmlspecialchars($m->model_name)?>
                                    <?php endforeach; ?>                                
                                </h4>
                            </a>
                            <p><?php echo htmlspecialchars($car->year_of_production); ?></p>
                            <p class="price"><?php echo htmlspecialchars($car->price) . " €"; ?></p>
                        </header>
                        <footer class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <a href="<?php echo Misc::link('cars/edit/' . $car->car_id); ?>" class="btn btn-success btn-car-edit"><i class="glyphicon glyphicon-edit"> </i> 
                                    Izmeni
                                </a>
                            </div>
   
                            <form method="post">
                                <input name="carID" value="<?php echo htmlspecialchars($car->car_id); ?>" type="hidden">
                                <input name="confirmed" value="1" type="hidden">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <button onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj oglas?');" class="btn btn-danger btn-car-edit" type="submit" name="deleteCar">
                                        <i class="glyphicon glyphicon-trash"> </i> Obriši
                                    </button>
                                </div>
                            </form>
                        </footer>
                    </div>
                </article>
            </div>

        <?php endforeach; ?>  
    </div>   
    <a class="btn btn-default btn-add-car" href="<?php echo Misc::link('cars/add/'); ?>">Dodaj novi oglas</a>
</main>

<?php include 'app/views/_global/afterContent.php'; ?>