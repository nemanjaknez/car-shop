<?php include 'app/views/_global/beforeContent.php'; ?>

<div class="container">
    <section class="panel panel-default">
        <header class="panel-heading">
            <h4>Brza pretraga</h4>
        </header>
        <div class="panel-body">
            <form method="post" action="<?php echo Misc::link('search/'); ?>" class="row form-search">      
                <div class="col-md-4 form-group">
                    <label for="manufacturer_id">Marka</label>
                    <select class="form-control" id="manufacturer_id" name="manufacturer_id" onchange="loadModels()">
                        <option label=" " value="-1"></option>
                        <?php foreach ($DATA['manufacturers'] as $m) : ?>
                            <option value="<?php echo htmlspecialchars($m->manufacturer_id); ?>"><?php echo htmlspecialchars($m->manufacturer_name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label for="model_id">Model</label>
                    <select class="form-control" id="model_id" name="model_id">
                        <option label=" " value="-1"></option>
                    </select>   
                </div>
                <div class="col-md-4 form-group">
                    <label for="body_style">Karoserija</label>
                    <select class="form-control" id="body_style" name="body_style">
                        <option label=" " value="-1"></option>
                        <?php foreach ($DATA['body_style'] as $b) : ?>
                            <option value="<?php echo htmlspecialchars($b->body_style_id); ?>"><?php echo htmlspecialchars($b->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="fuel">Gorivo</label>
                    <select class="form-control" id="fuel" name="fuel">
                        <option label=" " value="-1"></option>
                        <?php foreach ($DATA['fuel'] as $f) : ?>
                            <option value="<?php echo htmlspecialchars($f->fuel_id); ?>"><?php echo htmlspecialchars($f->type); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="price">Cena do (EUR)</label>
                    <input type="number" name="price" min="1" step="any" class="form-control" id="price">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-default btn-search" name="searchBtn"><i class="glyphicon glyphicon-search"></i> Pretraga</button>        
                </div>
            </form>
        </div>
    </section>
</div>

<main class="container">
    <div class="row">
        <?php foreach ($DATA['cars'] as $car) : ?>

            <div class="col-md-3 col-sm-4 col-xs-12">
                <article class="thumbnail">
                    <?php foreach ($car->images as $image) : ?>                
                        <a href="<?php echo Misc::link('car/' . $car->car_id); ?>">
                            <img class="small-image" src="<?php echo Configuration::BASE_URL . htmlspecialchars($image->path); ?>" alt="<?php echo htmlspecialchars($image->path); ?>">
                        </a>
                    <?php endforeach; ?>
                    <div class="caption">                        
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
                    </div>
                </article>
            </div>

        <?php endforeach; ?>  
    </div>   
</main>

<?php include 'app/views/_global/afterContent.php'; ?>