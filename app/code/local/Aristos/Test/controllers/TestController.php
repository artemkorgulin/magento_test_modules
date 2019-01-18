<?php

class Aristos_Test_TestController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
	    $this->loadLayout();
	    $this->renderLayout();
    }
}