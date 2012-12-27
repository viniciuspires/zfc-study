<?php

class IndexController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $artistOrm = new Application_Model_DbTable_Artist();

        $this->view->artists = $artistOrm->fetchAll();
    }
}

