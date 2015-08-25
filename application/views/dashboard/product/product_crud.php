<div class="container crud-form">
<?php if($form_name=="add-product") { ?>
 <div class="jumbotron">
	<form action="" name="add-product" method="POST" role="form" enctype="multipart/form-data">
            <legend><U>Add Product</U></legend>

            <div class="form-group">
		<label for="product-name">Product name: </label>
                <input type="text" class="form-control" id="product-name" value="<?php echo set_value('product-name'); ?>" name="product-name" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
		<label for="product-category">Product Category: </label>
                <select name="product-category" id="product-category" class="form-control" required="required">
                    <?php
                        foreach ($query->result() as $row) {
                            $catValue = $row->CategoryName;
                            $catName = ucwords($catValue);
                            //print_r($row);
                            //echo $row->CategoryName;
                            echo "<option value=" . $catValue .'-'.$row->CategoryID.">" .$catName ."</option>";
                        }
                        echo "</pre>";
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="product-description">Product Description: </label>
                <textarea class="form-control" name="product-description" id="product-description" rows="3" value="<?php echo set_value('product-description'); ?>"></textarea>
            </div>

            <div class="form-group">
				<label for="product-stock">Product Stock Quantity: </label>
                <input type="number" name="product-stock" id="product-stock" class="form-control" value="<?php echo set_value('product-stock'); ?>" min="1" max="1000" step="" required="required" title="">
            </div>

            <div class="form-group">
				<label for="product-price">Product Price: </label>
                <input type="number" name="product-price" id="product-price" class="form-control" value="<?php echo set_value('product-price'); ?>" min="1" max="1000" step="0.01" required="required" title="">
            </div>
            
            <img src="<?php echo base_url()."asset/uploads/";?>" alt="Product Image" class="img-thumbnail">
            <div class="form-group">
		<label for="product-image">Product Image: </label>
                <input type="file" name="userfile" id="userfile">
            </div>

            <input type="hidden" name="form-name" id="add-product" class="form-control" value="add-product">

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
<?php } else if($form_name=="edit-product") { ?>
 <div class="jumbotron">
	<div class="container">
		<form action="" name="edit-product" method="POST" role="form">
			<legend><U>Edit Product</U></legend>

			<div class="form-group">
				<label for="product-name">Product name: </label>
				<input type="text" class="form-control" id="product-name" name="product-name" placeholder="Enter Product Name">
			</div>
			                                                                                                                                                                                                                               
			<input type="hidden" name="form-name" id="edit-product" class="form-control" value="edit-product">

			<button type="submit" class="btn btn-primary">Save</button>
		</form>
	</div>
</div>
<?php } else if($form_name=="delete-product") { ?>
 <div class="jumbotron">
	<div class="container">
		<form action="" name="delete-product" method="POST" role="form">
			<legend><U>Delete Product</U></legend>

			<div class="form-group">
				<label for="product-name">Product name: </label>
				<input type="text" class="form-control" id="product-name" name="product-name" placeholder="Enter Product Name">
			</div>
			                                                                                                                                                                                                                               
			<input type="hidden" name="form-name" id="delete-product" class="form-control" value="delete-product">

			<button type="submit" class="btn btn-primary">Delete</button>
		</form>
	</div>
</div>
<?php } 
echo validation_errors();
?>
</div>