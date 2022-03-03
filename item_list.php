<?php include('view/header.php') ?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>
            To-Do List
        </h1>
        <form action="." method="get" id="list__header_select" class="list__header_select">
            <input type="hidden" name="action" value="list_items">
            <select name="category_id" required>
                <option value="0">View All</option>
                <?php foreach ($categories as $category) : ?>
                <?php if ($category_id == $category['categoryID']) { ?>
                <option value="<?= $category['categoryID'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $category['categoryID'] ?>">
                    <?php } ?>
                    <?= $category['categoryName'] ?>
                </option>
                <?php endforeach; ?>
            </select>
            <button class="add-button bold">Search</button>
        </form>
    </header>
    <?php if($items) { ?>
    <?php foreach ($items as $item) : ?>
    <div class="list__row">
        <div class="list__item">
            <p class="item_title"><?= "{$item['Title']}" ?></p>
            <p><?= $item['Description']; ?></p>
        </div>
        <div class="remove_Item">
            <form action="." method="post">
                <input type="hidden" name="action" value="delete_item"> 
                <input type="hidden" name="action" value="<?= $item['ItemNum']; ?>">
                <button class="remove-button">X</button>
            </form>
        </div>
    </div>
    <?php endforeach; ?>
    <?php } else { ?>
    <br>
    <?php if ($category_id) { ?>
    <p>No items exist for this category yet.</p>
    <?php } else { ?>
    <p>No items exist yet.</p>
    <?php } ?>
    <br>
    <?php } ?>
</section>

<section id="add" class="add">
    <h2>Add item</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_item">
        <div class="add__inputs">
            <label>Category:</label>
            <select name="category_id" required>
                <option value="">Please select</option>
                <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['categoryID']; ?>">
                    <?= $category['categoryName']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <label>Title:</label>
            <input type="text" name="title" placeholder="Title" required>
            <label>Description:</label>
            <input type="text" name="description" placeholder="Description" required>
        </div>
        <div class="add__Item">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>
<br>
<p><a href=".?action=list_categories">View/Edit categories</a></p>
<?php include('view/footer.php') ?>
