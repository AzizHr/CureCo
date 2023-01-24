<?php
class Admin extends Controller
{
  private $adminModel;
  private $productModel;
  public function __construct()
  {
    $this->adminModel = $this->model('AdminModel');
    $this->productModel = $this->model('Product');
  }

  public function index()
  {
    $this->view('admin/auth');
  }
  public function dashboard()
  {
    if (!isset($_SESSION['admin_id'])) {
      redirect('admin/auth');
    }

    $products = $this->productModel->getProducts();
    $numberOfProducts = $this->productModel->getNumberOfProducts();
    $priceAverege = $this->productModel->getPriceAverege();
    $maxPrice = $this->productModel->getMaxPrice();
    $minPrice = $this->productModel->getMinPrice();
    $data = [
      'products' => $products,
      'numberOfProducts' => intval($numberOfProducts),
      'priceAverege' => number_format((float)$priceAverege, 2, '.', ''),
      'maxPrice' => floatval($maxPrice),
      'minPrice' => floatval($minPrice),
    ];

    $this->view('admin/dashboard', $data);
  }

  public function auth()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, 513);

      // Init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
      ];

      // Check and set logged in admin
      $loggedInAdmin = $this->adminModel->login($data['email'], $data['password']);

      if ($loggedInAdmin) {
        // Create Session
        $this->createUserSession($loggedInAdmin);
      } else {
        flash("login_error", "Email or Password invalid", "alert alert-danger");
        redirect('admin/auth');
      }
    } else {
      unset($_SESSION['error']);
      if (isset($_SESSION['admin_id'])) {
        redirect('admin/dashboard');
      }
      // Init data
      $data = [
        'email' => '',
        'password' => '',
      ];
      // Load view
      $this->view('admin/auth', $data);
    }
  }

  public function createUserSession($admin)
  {
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['admin_email'] = $admin['email'];
    $_SESSION['admin_name'] = $admin['name'];
    redirect('dashboard/index');
  }

  public function logout()
  {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_email']);
    unset($_SESSION['admin_name']);
    session_destroy();
    redirect('admin/auth');
  }

  public function isLoggedIn()
  {
    if (isset($_SESSION['admin_id'])) {
      return true;
    } else {
      return false;
    }
  }
}
