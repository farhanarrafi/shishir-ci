<div class="container crud-form">
<?php if($form_name=="add-category") { ?>
<div class="jumbotron">
    <form action="" name="add-category" method="POST" role="form">
            <legend><U>Add Category</U></legend>

            <div class="form-group">
                    <label for="category-name">Category name: </label>
                    <input type="text" class="form-control" id="category-name" value="<?php echo $category_name; ?>" name="category-name" placeholder="Enter Category Name">
            </div>

            <input type="hidden" name="form-name" id="add-category" class="form-control" value="add-category">

            <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
<?php } else if($form_name=="edit-category") { ?>
<div class="jumbotron">
    <form action="" name="edit-category" method="POST" role="form">
            <legend><U>Edit Category</U></legend>

            <div class="form-group">
                    <label for="category-name">Category name: </label>
                    <input type="text" class="form-control" id="category-name" name="category-name" placeholder="Enter Category Name">
            </div>

            <input type="hidden" name="form-name" id="edit-category" class="form-control" value="edit-category">

            <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<?php } else if($form_name=="delete-category") { ?>
<div class="jumbotron">
    <form action="" name="delete-category" method="POST" role="form">
            <legend><U>Delete Category</U></legend>

            <div class="form-group">
                    <label for="category-name">Category name: </label>
                    <input type="text" class="form-control" id="category-name" name="category-name" placeholder="Enter Category Name">
            </div>

            <input type="hidden" name="form-name" id="delete-category" class="form-control" value="delete-category">

            <button type="submit" class="btn btn-primary">Delete</button>
    </form>
</div>
<?php } ?>
</div>		