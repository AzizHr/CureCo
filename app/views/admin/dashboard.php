<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-fluid">
  <div class="row flex-nowrap">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-5 d-none d-sm-inline">CureCo</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
          <li class="nav-item">
            <a href="#" class="nav-link align-middle px-0 text-light">
              <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
            </a>
          </li>
          <li>
            <a href="<?php echo URLROOT . 'dashboard/sortByPriceAsc' ?>" class="nav-link px-0 align-middle">
            <i class="fa fa-arrow-down-short-wide"></i><span class="ms-1 d-none d-sm-inline">Sort By Price Asc</span> </a>
          </li>
          <li>
            <a href="<?php echo URLROOT . 'dashboard/sortByPriceDesc' ?>" class="nav-link px-0 align-middle">
            <i class="fa fa-arrow-down-wide-short"></i><span class="ms-1 d-none d-sm-inline">Sort By Price Desc</span> </a>
          </li>
          <li>
            <a href="<?php echo URLROOT . 'dashboard/sortByDateAsc' ?>" class="nav-link px-0 align-middle">
            <i class="fa fa-arrow-down-wide-short"></i><span class="ms-1 d-none d-sm-inline">Sort By Date Asc</span> </a>
          </li>
          <li>
            <a href="<?php echo URLROOT . 'dashboard/sortByDateDesc' ?>" class="nav-link px-0 align-middle">
            <i class="fa fa-arrow-down-short-wide"></i><span class="ms-1 d-none d-sm-inline">Sort By Date Desc</span> </a>
          </li>
          <li>
            <a href="<?php echo URLROOT . 'dashboard/add' ?>" class="nav-link px-0 align-middle">
            <i class="fa fa-plus"></i><span class="ms-1 d-none d-sm-inline">Add New Product</span> </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown pb-4">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
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
    <div class="col py-3 mt-5" style="overflow-x: auto">
    <div class="container row gap-4">
    <div class="col border py-4">
      <h1>All Products</h1>
      </div>

      <div class="col border py-4">
      <h1>All Products</h1>
    </div>
    </div>
    <form class="d-flex mx-auto w-75 mt-3" action="<?php echo URLROOT ?>dashboard/search" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_name">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
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
          <?php foreach($data['products'] as $product): ?>
          <tr>
            <td><?php echo $product['id'] ?></td>
            <td><?php echo $product['image'] ?></td>
            <td><?php echo $product['name'] ?></td>
            <td><?php echo $product['quantity'] ?></td>
            <td><?php echo $product['price'] . ' $' ?></td>
            <td><?php echo $product['date'] ?></td>
            <td><a href="<?php echo URLROOT . 'dashboard/productDetails/' . $product['id'] ?>" class="btn btn-sm btn-success"><i class="fa-sharp fa-solid fa-eye"></i></a></td>
            <td><a href="<?php echo URLROOT . 'dashboard/delete/' . $product['id'] ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a></td>
            <td><a href="<?php echo URLROOT . 'dashboard/get/' . $product['id'] ?>" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></a></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>