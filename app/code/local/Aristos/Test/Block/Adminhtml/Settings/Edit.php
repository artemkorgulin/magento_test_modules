<?php

class Aristos_Test_Block_Adminhtml_Settings_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    protected function _construct()
    {
        $this->_blockGroup = 'aristostest';
        $this->_controller = 'adminhtml_settings';
    }

    public function getHeaderText()
    {
        $helper = Mage::helper('aristostest');
        $model = Mage::registry('current_settings');

        //if ($model->getId()) {
        //    return $helper->__("Edit Prop item '%s'", $this->escapeHtml($model->getTitle()));
        //} else {
        //    return $helper->__("Добавление свойства");
        //}
    }

}