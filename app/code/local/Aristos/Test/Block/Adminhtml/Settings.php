<?php

class Aristos_Test_Block_Adminhtml_Settings extends Mage_Adminhtml_Block_Widget_Grid_Container
{

	protected function _construct()
	{
		parent::_construct();

		$helper = Mage::helper('aristostest');
		$this->_blockGroup = 'aristostest';
		$this->_controller = 'adminhtml_settings';

		$this->_headerText = $helper->__('');
		$this->_addButtonLabel = $helper->__('Add Prop');

	}

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

		$form->setValues($model->getData());
		$this->setForm($form);

		return parent::_prepareForm();
	}

}