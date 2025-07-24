<?php
require_once './models/ProductModel.php';

class ProductController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function showAll()
    {
        $products = $this->productModel->getAll();
        require './views/product/list.php';
    }

    public function detail()
{
    $id = $_GET['id'] ?? null;
    if ($id) {
        $product = $this->productModel->findById($id);
        if ($product) {
            require './views/product/detail.php';
        } else {
            echo "Không tìm thấy sản phẩm với ID = $id!";
        }
    } else {
        echo "ID sản phẩm không hợp lệ!";
    }
}


    public function adminList()
    {
        $products = $this->productModel->getAll();
        require './views/admin/product/list.php';
    }

    public function create()
{
    require_once './models/CategoryModel.php';
    $categoryModel = new CategoryModel();
    $categories = $categoryModel->getAll();

    require './views/admin/product/create.php';
}


    public function store()
{
    $data = [
        'name'        => $_POST['name'],
        'price'       => $_POST['price'],
        'description' => $_POST['description'],
        'category_id' => $_POST['category_id'],
        'image'       => uploadFile($_FILES['image'], 'uploads/imgproduct/')
    ];
    $this->productModel->insert($data);
    header('Location: index.php?action=admin_product_list');
    exit;
}

    public function edit()
{
    $id = $_GET['id'] ?? null;
    $product = $this->productModel->findById($id);

    require_once './models/CategoryModel.php';
    $categoryModel = new CategoryModel();
    $categories = $categoryModel->getAll();

    require './views/admin/product/edit.php';
}

   public function update()
{
    $id = $_POST['id'];
    $image = $_FILES['image']['name'] ? uploadFile($_FILES['image'], 'uploads/imgproduct/') : $_POST['old_image'];

    $data = [
        'name'        => $_POST['name'],
        'price'       => $_POST['price'],
        'description' => $_POST['description'],
        'image'       => $image,
        'category_id' => $_POST['category_id']
    ];
    $this->productModel->update($id, $data);
    header('Location: index.php?action=admin_product_list');
    exit;
}

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        $this->productModel->delete($id);
        header('Location: index.php?action=admin_product_list');
        exit;
    }
} 