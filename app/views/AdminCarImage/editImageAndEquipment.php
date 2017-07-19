<?php include 'app/views/_global/beforeContent.php'; ?>

<main class="container">


    <h2>Odaberite opremu automobila</h2>

    <form method="post" enctype="multipart/form-data">


        <label>Oprema:</label><br>   
        <div class="row">
            <?php foreach ($DATA['equipment'] as $e) : ?>
                <div class='col-md-4 checkbox-padding'>
                    <input type='checkbox' name='equipment_ids[]' value="<?php echo $e->equipment_id ?>" <?php if (in_array($e->equipment_id, $DATA['car']->equipment_ids)) echo 'checked'; ?>>
                        <?php echo htmlspecialchars($e->name); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <h2>Slika automobila</h2>
        
        <div>
            <?php foreach ($DATA['image'] as $i) : ?>
                <img src="<?php echo Configuration::BASE_URL . htmlspecialchars($i->path); ?>" 
                     alt="<?php echo htmlspecialchars($i->path); ?>" 
                     class="img-thumbnail small-image">
            <?php endforeach; ?>
        </div>

        <label for="image">Izaberite sliku</label>
        <input type="file" name="image" id="image" class="input-field">


        <button type="submit" name="editImageAndEq" class="btn btn-primary" id="btn-add_img_eq">Sačuvaj i završi</button>
    </form>


    <?php if (isset($DATA['message'])): ?>
        <div class="alert alert-warning col-md-6">
            <p><?php echo htmlspecialchars($DATA['message']); ?></p>
        </div>
    <?php endif; ?>


</main>

<?php include 'app/views/_global/afterContent.php'; ?>
