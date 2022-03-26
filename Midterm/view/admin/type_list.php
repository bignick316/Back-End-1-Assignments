<?php include('header.php') ?>

<?php if($types) { ?>

<div class="container">
    <section>
        <div class="row-xs-12">
            <div class="jh1 text-center well">
                <h1>
                    Types List
                </h1>
            </div>
        

            <?php foreach ($types as $type) : ?>
            <div class="container">
                <div class="row">
                    <div class="list-group">
                        <div class="list-group-item">
                            <p class="bold"><?= $type['type'] ?></p>
                            <br>
                            <form action="." method="post">
                                <input type="hidden" name="action" value="delete_class">
                                <input type="hidden" name="type_id" value="<?= $class['type_id']; ?>">
                                <button class="btn btn-default btn-danger">X</button>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
            <?php endforeach; ?>
            
            <?php } else { ?>
            <p>No Types exist yet.</p>
            <?php } ?>

            
            <h2>Add Type</h2>
            <form action="." method="post" class="form-group">
                <input type="hidden" name="action" value="insert_type">
                <label>Name:</label>
                <input type="text" name="class_name" class="form-control" maxlength="30" placeholder="Type Name" autofocus required>
                <br>
                <button class="btn btn-default">Add Type</button>
                
            </form>
            

            <br>
            <div class="text-center">
                <a href=".?action=list_vehicles">View Full Vehicle list</a>
                <a href=".?action=insert_vehicle">Add Vehicle</a>
                <a href=".?action=edit_make">View/Edit Vehicle Makes</a>
                <a href=".?action=edit_class">View/Edit Vehicle Classes</a>
            </div>
        </div>
    </section>
</div>
<?php include('footer.php') ?>