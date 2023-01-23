<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-6 mx-auto">
            <h2>Update This Product</h2>
            <p>Please fill out this form to update this product</p>
            <form action="<?php echo URLROOT . 'dashboard/edit/' . $data['product']['id'] ?>" method="post" enctype="multipart/form-data" id="edit">
            <div>
            <div class="form-group mt-3">
                    <label for="name">Product Name: <sup>*</sup></label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg" value="<?php echo $data['product']['name'] ?>">
                    <span class="" id="name_error"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="price">Product Price: <sup>*</sup></label>
                    <input type="text" id="price" name="price" class="form-control form-control-lg" value="<?php echo $data['product']['price'] ?>">
                    <span class="" id="price_error"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="image">Product Image: <sup>*</sup></label>
                    <input type="file" id="image" name="image" class="form-control form-control-lg">
                    <span class="" id="image_error"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="quantity">Product Quatity: <sup>*</sup></label>
                    <input type="text" id="quantity" name="quantity" class="form-control form-control-lg" value="<?php echo $data['product']['quantity'] ?>">
                    <span class="" id="quantity_error"></span>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <input type="submit" value="Update" class="btn btn-success btn-block">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo URLROOT ?>js/editValidate.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>