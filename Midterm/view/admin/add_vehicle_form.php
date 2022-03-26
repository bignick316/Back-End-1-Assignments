<?php include('header.php') ?>
<div class="container">
    <section>
        <header>
            <div class="row-xs-12">
                <div class="jh1 text-center well">
                    <h1>
                        Add Vehicle
                    </h1>
                </div>
                <form action="." method="POST" class="form-group">
                    <input type="hidden" name="action" value="show_insert_vehicle">
                    
                    <div class="form-group">
                        <label>Year:</label>
                        <input type="text" name="year" class="form-control" maxlength="30" autofocus required>
                    </div>
                    
                    <div class="form-group">
                        <label>Model:</label>
                        <input type="text" name="model" class="form-control" maxlength="30" autofocus required>
                    </div>
                    
                    <div class="form-group">
                        <label>Price:</label>
                        <input type="text" name="price" class="form-control" maxlength="30" autofocus required>
                    </div>

                    <select name="type_id" class="btn btn-defualt active">
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
                    
                    <select name="class_id" class="btn btn-defualt active">
                        <option value="0">View All Classes</option>
                        <?php foreach ($classes as $class) : ?>
                        <?php if ($class_id == $class['class_id']) { ?>
                        <option value="<?= $class['class_id'] ?>" selected>
                            <?php } else { ?>
                        <option  value="<?= $class['class_id'] ?>">
                            <?php } ?>
                            <?= $class['class'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    
                    <select name="make_id" class="btn btn-defualt active">
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
                    <button type="submit" class="btn btn-default">Add Vehicle</button>
                </form>
            </div>
        </header>
        <div class="text-center">
            <a href=".?action=list_vehicles">View Full Vehicle List</a>
            <a href=".?action=edit_make">View/Edit Vehicle Makes</a>
            <a href=".?action=edit_type">View/Edit Vehicle Types</a>
            <a href=".?action=edit_class">View/Edit Vehicle Classes</a> 
        </div>
    
    </section>
</dev>

<?php include('footer.php') ?>