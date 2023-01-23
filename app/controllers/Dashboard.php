<?php
class Dashboard extends Controller
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = $this->model('Product');
    }

    public function index()
    {
        if (!isset($_SESSION['admin_id'])) {
            redirect('admin/auth');
        }

        $products = $this->productModel->getProducts();
        $data['products'] = $products;
        $this->view('admin/dashboard', $data);
    }

    public function add()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, 513);

            // Init data
            $data = [
                'name1' => trim($_POST['name1']),
                'quantity1' => trim($_POST['quantity1']) ,
                'price1' => trim($_POST['price1']),
                'image1' => $_FILES['image1']['name'] ,
                'name2' => trim($_POST['name2']),
                'quantity2' => trim($_POST['quantity2']) ,
                'price2' => trim($_POST['price2']),
                'image2' => $_FILES['image2']['name']
            ];

            move_uploaded_file($_FILES['image1']['tmp_name'], 'uploads/' . $data['image1']);
            move_uploaded_file($_FILES['image2']['tmp_name'], 'uploads/' . $data['image2']);
                if ($this->productModel->addProduct($data)) {
                    redirect('dashboard/index');
                } else {
                    die('Something went wrong');
                }
        } else {
            // Load view
            $this->view('admin/dashboard/add');
        }
    }


    public function edit($id)
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, 513);

            // Init data
            $data = [
                'name' => trim($_POST['name']),
                'quantity' => trim($_POST['quantity']) ,
                'price' => trim($_POST['price']),
                'image' => $_FILES['image']['name']
            ];

            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $data['image']);
                if ($this->productModel->editProduct($id , $data)) {
                    redirect('dashboard/index');
                } else {
                    die('Something went wrong');
                }
        } else {
            // Load view
            $this->view('admin/dashboard/add');
        }
    }

    
    public function get($id)
    {
        $product = $this->productModel->getProduct($id);
        $data['product'] = $product;

        $this->view('admin/dashboard/edit', $data);
    }

    public function productDetails($id)
    {
        $product = $this->productModel->getProduct($id);
        $data['product'] = $product;

        $this->view('admin/dashboard/productDetails', $data);
    }
    

    public function delete($id)
    {
        if ($this->productModel->deleteProduct($id)) {
            redirect('dashboard/index');
        } else {
            redirect('dashboard/index');
        }
    }

    public function sortByPriceAsc()
    {
        if ($this->productModel->sortByPriceASC()) {
            $products = $this->productModel->sortByPriceASC();

            $data['products'] = $products;

            $this->view('admin/dashboard', $data);
        }
    }

    public function sortByPriceDesc()
    {
        if ($this->productModel->sortByPriceDESC()) {
            $products = $this->productModel->sortByPriceDESC();

            $data['products'] = $products;

            $this->view('admin/dashboard', $data);
        }
    }

    public function sortByDateAsc()
    {
        if ($this->productModel->sortByDateASC()) {
            $products = $this->productModel->sortByDateASC();

            $data['products'] = $products;

            $this->view('admin/dashboard', $data);
        }
    }

    public function sortByDateDesc()
    {
        if ($this->productModel->sortByDateDESC()) {
            $products = $this->productModel->sortByDateDESC();

            $data['products'] = $products;

            $this->view('admin/dashboard', $data);
        }
    }

    public function search()
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, 513);

            $searchName = trim($_POST['search_name']);

                if ($this->productModel->searchInProducts($searchName)) {
                    $products = $this->productModel->searchInProducts($searchName);
                    $data['products'] = $products;
                    $this->view('admin/dashboard', $data);
                } else {
                    $data['no_result'] = 'No Results Found';
                    $this->view('admin/dashboard', $data);
                }
        }

    }
}
