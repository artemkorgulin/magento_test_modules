<?php

class Aristos_Test_Block_Adminhtml_Settings_Edit_Tabs_General extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {

        $helper = Mage::helper('aristostest');
        $model = Mage::registry('current_aristostest');

        $form = new Varien_Data_Form();
        $fieldset = $form->addFieldset('general_form', array('legend' => $helper->__('Настройки')));

        $fieldset->addField('content', 'editor', array(
            'label' => $helper->__('Test Text Block'),
            'required' => true,
            'name' => 'content',
        ));

	    //$form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
