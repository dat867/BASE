<?php
require_once './models/ProductModel.php';
require_once './models/CommentModel.php';

class ProductController
{
    protected $productModel;
    protected $commentModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->commentModel = new CommentModel();
    }

    public function showAll()
    {
        $keyword = $_GET['keyword'] ?? '';
        $products = $this->productModel->getAll($keyword);
        require_once __DIR__ . '/../views/product/list.php';
    }

    public function addComment()
{
    if (isset($_SESSION['user'])) {
        $userId = $_SESSION['user']['id'];
        $productId = $_POST['product_id'];
        $content = trim($_POST['content']);

        if (!empty($content)) {
            $this->commentModel->add([
                'idproduct' => $productId,
                'iduser'    => $userId,
                'content'   => $content,
                'date'      => date('Y-m-d')
            ]);
        }

        header("Location: index.php?action=product_detail&id=" . $productId);
        exit;
    } else {
        echo "Bạn phải đăng nhập để bình luận.";
    }
}

    public function detail()
    {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $product = $this->productModel->findById($id);
        $comments = $this->commentModel->getByProductId($id); // Lấy bình luận

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
    $price = $_POST['price'];

    if (!is_numeric($price) || $price < 0) {
        $error = "Giá sản phẩm phải là số và không được âm!";
        require_once './models/CategoryModel.php';
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        require './views/admin/product/create.php';
        return;
    }

    $data = [
        'name'        => $_POST['name'],
        'price'       => $price,
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
    $price = $_POST['price'];

   
    if (!is_numeric($price) || $price < 0) {
        $error = "Giá sản phẩm phải là số và không được âm!";
        $product = $this->productModel->findById($id);
        require_once './models/CategoryModel.php';
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        require './views/admin/product/edit.php';
        return;
    }

    $image = $_FILES['image']['name'] ? uploadFile($_FILES['image'], 'uploads/imgproduct/') : $_POST['old_image'];

    $data = [
        'name'        => $_POST['name'],
        'price'       => $price,
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
public function deleteComment()
{
    if (!isset($_GET['id']) || !isset($_SESSION['user'])) {
        route('');
    }

    $commentId = $_GET['id'];
    $comment = $this->commentModel->findById($commentId);

    if (!$comment) {
        route('');
    }

    $userId = $_SESSION['user']['id'];
    $userRole = $_SESSION['user']['role'];

    if ($comment['iduser'] == $userId || $userRole == 1) {
        $this->commentModel->delete($commentId);
    }
   
    $productId = $comment['idproduct'];
    route("product_detail&id=" . $productId);
}


}
