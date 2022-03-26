<?php include('header.php') ?>
<div class="container">
    <section>
        <header>
            <div class="row-xs-12">
                <div class="jh1 text-center well">
                    <h1>
                        Vehicles
                    </h1>
                </div>
                
            
                <form action="." method="get" class="form-inline">
                    <input type="hidden" name="action" value="list_vehicles">
                    <div class="btn btn-defualt dropdown-toggle">
                        <select name="class_id" class="btn btn-defualt active">
                            <label>Classes: </label>
                            <option value="0">View All Classes</option>
                            <?php foreach ($classes as $class) : ?>
                            <?php if ($class_id == $class['class_id']) { ?>
                            <option  value="<?= $class['class_id'] ?>" selected>
                                <?php } else { ?>
                            <option  value="<?= $class['class_id'] ?>">
                                <?php } ?>
                                <?= $class['class'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    

                    
                        <select name="make_id" class="btn btn-defualt active">
                            <label for="make">Makes: </label>
                            <option value="0">View All Makes</option>
                            <?php foreach ($makes as $make) : ?>
                            <?php if ($make_id == $make['make_id']) { ?>
                            <option  value="<?= $make['make_id'] ?>" selected>
                                <?php } else { ?>
                            <option  value="<?= $make['make_id'] ?>">
                                <?php } ?>
                                <?= $make['make'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    
                        <select name="type_id" class="btn btn-defualt active">
                            <label for="type">Types: </label>
                            <option value="0">View All Types</option>
                            <?php foreach ($types as $type) : ?>
                            <?php if ($type_id == $type['type_id']) { ?>
                            <option value="<?= $type['type_id'] ?>" selected>
                                <?php } else { ?>
                            <option value="<?= $type['type_id'] ?>">
                                <?php } ?>
                                <?= $type['type'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                

                
                        <select class="btn btn-defualt active">
                            <option value="<?php $price = true; ?>">Price</option>
                            <option value="<?php $year = false; ?>">Year</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-default">Search</button>
                </form>
            </div>
        </header>
        <?php if($vehicles) { ?>
        <?php foreach ($vehicles as $vehicle) : ?>
        <div class="container">
            <div class="row">
                <div class="list-group">
                    <div class="list-group-item">
                        <p>Year: <?= $vehicle['year']; ?></p> 
                        <p value="<? $vehicle['make_id']; ?>">Make: <?= $vehicle['make']; ?></p> 
                        <p>Model: <?= $vehicle['model']; ?></p> 
                        <p value="<? $vehicle['type_id']?>">Type: <?= $vehicle['type']; ?></p> 
                        <p value="<? $vehicle['class_id']?>">Class: <?= $vehicle['class']; ?></p> 
                        <p>Price: <?= $vehicle['price']; ?></p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php } else { ?>
        <br>
        <?php if ($class_id) { ?>
            <p>No vehicles exist for this class yet.</p>
        <?php } else if ($make_id) { ?>
            <p>No vehicles exist for this make yet.</p>
        <?php } else if ($type_id){ ?>
            <p>No vehicles exist for this type yet.</p>
        <?php } else { ?>
        <p>No vehicles exist yet.</p>
        <?php } ?>
        <br>
        <?php } ?>        
    </section>
</div>

<?php include('footer.php') ?>