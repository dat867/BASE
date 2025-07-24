<?php
require_once './models/CategoryModel.php';

class CategoryController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function list()
    {
        $categories = $this->categoryModel->getAll();
        require './views/admin/category/list.php';
    }

    public function create()
    {
        require './views/admin/category/create.php';
    }

    public function store()
    {
        $data = ['name' => $_POST['name']];
        $this->categoryModel->insert($data);
        header('Location: index.php?action=admin_category_list');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $category = $this->categoryModel->findById($id);
        require './views/admin/category/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $data = ['name' => $_POST['name']];
        $this->categoryModel->update($id, $data);
        header('Location: index.php?action=admin_category_list');
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        $this->categoryModel->delete($id);
        header('Location: index.php?action=admin_category_list');
        exit;
    }
}
