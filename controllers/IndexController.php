<?php
namespace app\controllers;

use app\models\IndexModel;


class IndexController extends Controller
{

    public function Index()
    {
        $this->pageData['title'] = "Shop";

        $this->pageData['products'] = IndexModel::getProducts();

        return $this->view->render($this->nameTemplate('index'), $this->pageData);
    }


    function nameClass()
    {
        return get_class($this) ;
    }

}