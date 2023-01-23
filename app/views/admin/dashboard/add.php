<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <h2>Add A New Product</h2>
            <p>Please fill out this form to add a new product</p>
            <form action="<?php echo URLROOT; ?>dashboard/add" method="post" enctype="multipart/form-data" id="add">
            <div>
            <div class="form-group mt-3">
                    <label for="name1">Product Name: <sup>*</sup></label>
                    <input type="text" id="name1" name="name1" class="form-control form-control-lg">
                    <span class="" id="name1_error"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="price1">Product Price: <sup>*</sup></label>
                    <input type="text" id="price1" name="price1" class="form-control form-control-lg">
                    <span class="" id="price1_error"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="image1">Product Image: <sup>*</sup></label>
                    <input type="file" id="image1" name="image1" class="form-control form-control-lg">
                    <span class="" id="image1_error"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="quantity1">Product Quatity: <sup>*</sup></label>
                    <input type="text" id="quantity1" name="quantity1" class="form-control form-control-lg">
                    <span class="" id="quantity1_error"></span>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <input value="Add another product" class="btn btn-success btn-block" id="add_another_product">
                    </div>
                </div>
            </div>

            <div id="anotherProduct" style="display:none; margin-top:40px;">
            <div class="form-group mt-3">
                    <label for="name2">Product Name: <sup>*</sup></label>
                    <input type="text" id="name2" name="name2" class="form-control form-control-lg">
                    <span class="" id="name2_error"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="price2">Product Price: <sup>*</sup></label>
                    <input type="text" id="price2" name="price2" class="form-control form-control-lg">
                    <span class="" id="price2_error"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="image2">Product Image: <sup>*</sup></label>
                    <input type="file" id="image2" name="image2" class="form-control form-control-lg">
                    <span class="" id="image2_error"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="quantity2">Product Quatity: <sup>*</sup></label>
                    <input type="text" id="quantity2" name="quantity2" class="form-control form-control-lg">
                    <span class="" id="quantity2_error"></span>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <input type="submit" value="Add Two Products" class="btn btn-success btn-block">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo URLROOT ?>js/addValidate.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>