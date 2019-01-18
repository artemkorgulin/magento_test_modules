<?php

class Aristos_Test_Block_Settings extends Mage_Core_Block_Template
{

    public function getSettingsCollection()
    {
        $settingsCollection = Mage::getModel('aristostest/adminhtml_settings')->getCollection();
        $settingsCollection->setOrder('created', 'DESC');

        return $settingsCollection;
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

}