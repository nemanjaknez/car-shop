<?php include 'app/views/_global/beforeContent.php'; ?>

<main class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo Misc::link(''); ?>">Naslovna</a></li>
        <li><a href="<?php echo Misc::link('cars'); ?>">Moji oglasi</a></li>
        <li class="active">Postavljanje oglasa</li>
    </ol>    

    <h1>Postavite novi oglas</h1>

    <form method="post">
        <section class="row">
            <header class="col-md-12">
                <h3>Marka i model</h3>
            </header>
            <div class="form-group col-md-3">
                <label for="manufacturer_id">Marka:</label>
                <select class="form-control" id="manufacturer_id" name="manufacturer_id" onchange="loadModels()" required>
                    <option label=" "></option>
                    <?php foreach ($DATA['manufacturers'] as $m) : ?>
                        <option value="<?php echo htmlspecialchars($m->manufacturer_id); ?>"><?php echo htmlspecialchars($m->manufacturer_name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="model_id">Model:</label>
                <select class="form-control" id="model_id" name="model_id" required>
                    <option label=" "></option>
                </select>
            </div>       

            <div class="form-group col-md-3">
                <label for="title">Naslov oglasa:</label>
                <input class="form-control" type="text" name="title" id="title" pattern="^.{4,64}$" required>
            </div> 
            
            <div class="col-md-3"></div>
        </section>
        
        <section class="row">
            <header class="col-md-12">
                <h3>Osnovne informacije</h3>
            </header>
            <div class="form-group col-md-3">
                <label for="year">Godina proizvodnje:</label>
                <input class="form-control" type="text" maxlength="4" name="year" id="year" pattern="^(19|20)([0-9]{2})$" required>
            </div>
            
            <div class="form-group col-md-3">
                <label for="body_style">Karoserija:</label>
                <select class="form-control" id="body_style" name="body_style" required>
                    <option label=" "></option>
                    <?php foreach ($DATA['body_style'] as $b) : ?>
                        <option value="<?php echo htmlspecialchars($b->body_style_id); ?>"><?php echo htmlspecialchars($b->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>             

            <div class="form-group col-md-3">
                <label for="engineSize">Zapremina motora:</label>
                <input class="form-control" type="number" name="engineSize" id="engineSize" required>
            </div>  
            
            <div class="form-group col-md-3">
                <label for="fuel">Gorivo:</label>
                <select class="form-control" id="fuel" name="fuel" required>
                    <option label=" "></option>
                    <?php foreach ($DATA['fuel'] as $f) : ?>
                        <option value="<?php echo htmlspecialchars($f->fuel_id); ?>"><?php echo htmlspecialchars($f->type); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>            
            
        </section>
        
        <section class="row">
            <header>
                <h3 class="col-md-12">Dodatne informacije</h3>
            </header>
            <div class="form-group col-md-3">
                <label for="horsepower">Snaga (KS):</label>
                <input class="form-control" type="number" name="horsepower" id="horsepower" required>
            </div> 
    
            <div class="form-group col-md-3">
                <label for="kilometers">Kilometraza:</label>
                <input class="form-control" type="number" name="kilometers" id="kilometers" required>
            </div> 
            
            <div class="form-group col-md-3">
                <label for="drive">Pogon:</label>
                <select class="form-control" id="drive" name="drive" required>
                    <option label=" "></option>
                    <?php foreach ($DATA['drive'] as $d) : ?>
                        <option value="<?php echo htmlspecialchars($d->drive_id); ?>"><?php echo htmlspecialchars($d->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>      
            
            <div class="form-group col-md-3">
                <label for="transmission">Menjac:</label>
                <select class="form-control" id="transmission" name="transmission" required>
                    <option label=" "></option>
                    <?php foreach ($DATA['transmission'] as $t) : ?>
                        <option value="<?php echo htmlspecialchars($t->transmission_id); ?>"><?php echo htmlspecialchars($t->type); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>            

            <div class="form-group col-md-3">
                <label for="door_number">Broj vrata:</label>
                <select class="form-control" id="door_number" name="door_number" required>
                    <option label=" "></option>
                    <?php foreach ($DATA['door_number'] as $dn) : ?>
                        <option value="<?php echo htmlspecialchars($dn->door_number_id); ?>"><?php echo htmlspecialchars($dn->number); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group col-md-3">
                <label for="color">Boja:</label>
                <select class="form-control" id="color" name="color" required>
                    <option label=" "></option>
                    <?php foreach ($DATA['colors'] as $c) : ?>
                        <option value="<?php echo htmlspecialchars($c->color_id); ?>"><?php echo htmlspecialchars($c->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>            
            
            <div class="form-group col-md-3">
                <label for="condition">Stanje vozila:</label>
                <select class="form-control" id="condition" name="condition" required>
                    <option label=" "></option>
                    <?php foreach ($DATA['condition'] as $con) : ?>
                        <option value="<?php echo htmlspecialchars($con->condition_id); ?>"><?php echo htmlspecialchars($con->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </div> 

            <div class="form-group col-md-3">
                <label for="registered">Registrovan do:</label>
                <select class="form-control" id="registered" name="registered" required>
                    <option label=" "></option>
                    <?php foreach ($DATA['registered'] as $r) : ?>
                        <option value="<?php echo htmlspecialchars($r->registered_id); ?>"><?php echo htmlspecialchars($r->date); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>             
            
            <div class="form-group col-md-3">
                <label for="price">Cena:</label>
                <input class="form-control" type="number" min="0.001" step="any" name="price" id="price" required>
            </div>              

            <div class="form-group col-md-12">
                <label for="description">Opis:</label>
                <textarea class="form-control" rows="3" id="description" name="description"></textarea>
            </div>            
        </section>
        
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="addCar">Dalje</button><br><br>
            </div>
    </form>

    <?php if (isset($DATA['message'])): ?>
        <div class="alert alert-warning col-md-6">
            <p><?php echo htmlspecialchars($DATA['message']); ?></p>
        </div>
    <?php endif; ?>


</main>

<?php include 'app/views/_global/afterContent.php'; ?>
