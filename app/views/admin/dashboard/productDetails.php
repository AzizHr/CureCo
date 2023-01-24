<?php require APPROOT . '/views/inc/header.php'; ?>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card text-black">
          <img src="<?php echo URLROOT . 'uploads/' . $data['product']['image'] ?>" class="card-img-top" alt="Apple Computer" />
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">Product Details</h5>
              <p class="text-muted mb-4"><?php echo $data['product']['name'] ?></p>
            </div>
            <div>
              <div class="d-flex justify-content-between">
                <span>Product Price</span><span><?php echo $data['product']['price'] . ' $' ?></span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Product Quantity</span><span><?php echo $data['product']['quantity'] ?></span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Date Added</span><span><?php echo $data['product']['date'] ?></span>
              </div>
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">
              <span>Action</span><span>
                <a href="<?php echo URLROOT . 'dashboard/delete/' . $data['product']['id'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                <a href="<?php echo URLROOT . 'dashboard/get/' . $data['product']['id'] ?>" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>