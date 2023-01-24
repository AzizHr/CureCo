<?php require APPROOT . '/views/inc/header.php'; ?>
<style>
  .border {
    border-radius: 6px;
  }

  @media (min-width:576px) {
    .doIt {
      margin-left: 200px;
    }
  }

  @media (max-width:576px) {
    .doIt {
      margin-left: 70px;
    }

    .doIt {
      width: 50%;
    }

    .border {
      width: 90%;
    }
  }
</style>
<div class="container-fluid">
  <div class="row flex-nowrap">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light" style="position:fixed">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <img src="<?php echo URLROOT ?>img/logoCureCo.png" alt="" style="width:40px; height:40px;">
          <span class="fs-5 d-none d-sm-inline text-dark"><b>CureCo</b></span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start gap-3" id="menu">
          <li class="nav-item mt-2">
          <li>
            <a href="" class="btn btn-sm btn-dark">
              <i class="fa fa-home"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
          </li>
          </li>
          <li>
            <a href="<?php echo URLROOT . 'dashboard/sortByPriceAsc' ?>" class="nav-link px-0 align-middle">
              <i class="fa fa-arrow-down-short-wide text-primary"></i><span class="ms-1 d-none d-sm-inline text-dark">Sort By Price Asc</span> </a>
          </li>
          <li>
            <a href="<?php echo URLROOT . 'dashboard/sortByPriceDesc' ?>" class="nav-link px-0 align-middle">
              <i class="fa fa-arrow-down-wide-short text-warning"></i><span class="ms-1 d-none d-sm-inline text-dark">Sort By Price Desc</span> </a>
          </li>
          <li>
            <a href="<?php echo URLROOT . 'dashboard/sortByDateAsc' ?>" class="nav-link px-0 align-middle">
              <i class="fa fa-arrow-down-wide-short text-primary"></i><span class="ms-1 d-none d-sm-inline text-dark">Sort By Date Asc</span> </a>
          </li>
          <li>
            <a href="<?php echo URLROOT . 'dashboard/sortByDateDesc' ?>" class="nav-link px-0 align-middle">
              <i class="fa fa-arrow-down-short-wide text-warning"></i><span class="ms-1 d-none d-sm-inline text-dark">Sort By Date Desc</span> </a>
          </li>
          <li>
            <a href="<?php echo URLROOT . 'dashboard/add' ?>" class="btn btn-sm btn-success">
              <i class="fa fa-plus"></i><span class="ms-1 d-none d-sm-inline">Add New Product</span> </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
          <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo URLROOT ?>img/admin_img.jfif" alt="admin" width="30" height="30" class="rounded-circle">
            <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['admin_name'] ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li> -->
            <li><a class="dropdown-item" href="<?php echo URLROOT . 'admin/logout' ?>">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col py-3 mt-2 doIt">
      <?php flash('add_success') ?>
      <?php flash('edit_success') ?>
      <?php flash('delete_success') ?>
      <div class="container row gap-4 justify-content-center">
        <div class="col-lg-2 col-md-5 border py-2 bg-primary text-light">
          <i class="fa fa-flag"></i>
          <h5 class="mt-2">All Products</h5>
          <b><?php echo $data['numberOfProducts'] . ' Items' ?></b>
        </div>
        <div class="col-lg-2 col-md-5 border py-2  bg-warning">
          <i class="fa-solid fa-gauge-simple"></i>
          <h5 class="mt-2">The Average</h5>
          <b><?php echo $data['priceAverege'] . ' $' ?></b>
        </div>
        <div class="col-lg-2 col-md-5 border py-2  bg-success text-light">
          <i class="fa-solid fa-gauge"></i>
          <h5 class="mt-2">The Max Price</h5>
          <b><?php echo $data['maxPrice'] . ' $' ?></b>
        </div>

        <div class="col-lg-2 col-md-5 border py-2  bg-light">
          <i class="fa-solid fa-gauge"></i>
          <h5 class="mt-2">The Min Price</h5>
          <b><?php echo $data['minPrice'] . ' $' ?></b>
        </div>
      </div>
      <form class="d-flex mx-auto w-75 mt-5" action="<?php echo URLROOT ?>dashboard/search" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_name">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div style="overflow-x: scroll;">
        <table class="table mt-3 text-center">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">IMAGE</th>
              <th scope="col">NAME</th>
              <th scope="col">QUANTITY</th>
              <th scope="col">PRICE</th>
              <th scope="col">DATE</th>
              <th scope="col">DETAILS</th>
              <th scope="col">DELETE</th>
              <th scope="col">EDIT</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($data['products'] as $product) : ?>
                <tr>
                  <td><?php echo $product['id'] ?></td>
                  <td><img style="width: 70px; height:70px; border-radius: 6px;" src="<?php echo URLROOT . 'uploads/' . $product['image'] ?>" /></td>
                  <td><?php echo $product['name'] ?></td>
                  <td><?php echo $product['quantity'] ?></td>
                  <td><?php echo $product['price'] . ' $' ?></td>
                  <td><?php echo $product['date'] ?></td>
                  <td><a href="<?php echo URLROOT . 'dashboard/productDetails/' . $product['id'] ?>" class="btn btn-sm btn-success"><i class="fa-sharp fa-solid fa-eye"></i></a></td>
                  <td><a class="btn btn-sm btn-danger" id="delete" onclick="deletItem(`<?php echo URLROOT . 'dashboard/delete/' . $product['id'] ?>`)"><i class="fa-solid fa-trash"></i></a></td>
                  <td><a href="<?php echo URLROOT . 'dashboard/get/' . $product['id'] ?>" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></a></td>
                </tr>
              <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function deletItem(link) {
    Swal.fire({
      title: 'Are you sure?',
      text: "If you delete this now you can't go back !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: 'rgb(83, 157, 182)',
      cancelButtonColor: 'red',
      confirmButtonText: 'Yes, Delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href = link;
      }
    })
  }
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>