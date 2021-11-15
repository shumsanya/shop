<?php

namespace app\controllers;

use app\models\ProductModel;


class ProductController extends Controller
{

    public function Index()
    {
        $this->pageData['title'] = "Product";
        $model = new ProductModel();

        $this->pageData['product'] = $model->getProduct();

        return $this->view->render($this->nameTemplate('index'), $this->pageData);
    }

    public function Id($id)
    {

        $this->pageData['product'] = ProductModel::getProduct($id);

        $this->pageData['title'] = $this->pageData['product']['title'];

        return $this->view->render($this->nameTemplate('index'), $this->pageData);
    }

    function nameClass()
    {
        return get_class($this) ;
    }
}