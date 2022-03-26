<?php include('header.php') ?>

<?php if($classes) { ?>
<div class="container">
    <section>
        <div class="row-xs-12">
            <div class="jh1 text-center well">
                <h1>
                    Classes List
                </h1>
            </div>

            <?php foreach ($classes as $class) : ?>
            <div class="container">
                <div class="row">
                    <div class="list-group">
                        <div class="list-group-item">
                            <p class="bold"><?= $class['class'] ?></p>
                            <br>
                            <form action="." method="post">
                                <input type="hidden" name="action" value="delete_class">
                                <input type="hidden" name="class_id" value="<?= $class['class_id']; ?>">
                                <button class="btn btn-default btn-danger">X</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            
            <?php } else { ?>
            <p>No classes exist yet.</p>
            <?php } ?>


            <h2>Add Class</h2>
            <form action="." method="post" class="form-group">
                <input type="hidden" name="action" value="insert_class">
                <label>Name:</label>
                <input type="text" name="class_name" class="form-control" maxlength="30" placeholder="Class Name" autofocus required>              
                <br>
                <button class="btn btn-default">Add Class</button>
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