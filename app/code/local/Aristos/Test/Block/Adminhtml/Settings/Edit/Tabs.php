<?php

class Aristos_Test_Block_Adminhtml_Settings_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        $helper = Mage::helper('aristostest');

        parent::__construct();
        $this->setDestElementId('edit_form');
        $this->setTitle($helper->__('Основная информация'));
    }

    protected function _prepareLayout()
    {
        $helper = Mage::helper('aristostest');

        $this->addTab('general_section', array(
            'title' => $helper->__('Основная информация'),
            'content' => $this->getLayout()->createBlock('aristostest/adminhtml_settings_edit_tabs_general')->toHtml(),
        ));
        return parent::_prepareLayout();
    }

}
