<?php

class Aristos_Test_Block_Adminhtml_Settings_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

	protected function _prepareCollection()
	{
		if (is_object(Mage::getModel('aristostest/adminhtml_settings'))) {
			$collection = Mage::getModel('aristostest/adminhtml_settings')->getCollection();
			$this->setCollection($collection);
		}
		return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
		/*$helper = Mage::helper('aristostest');

		$this->addColumn('aristos_id', array(
			'header' => $helper->__('Param ID'),
			'index' => 'aristos_id'
		));

		$this->addColumn('title', array(
			'header' => $helper->__('Title'),
			'index' => 'title',
			'type' => 'text',
		));

		$this->addColumn('created', array(
			'header' => $helper->__('Created'),
			'index' => 'created',
			'type' => 'date',
		));*/

		return parent::_prepareColumns();
	}

	protected function _prepareMassaction()
	{
		$this->setMassactionIdField('aristos_id');
		$this->getMassactionBlock()->setFormFieldName('Params');

		$this->getMassactionBlock()->addItem('delete', array(
			'label' => $this->__('Delete'),
			'url' => $this->getUrl('*/*/massDelete'),
		));
		return $this;
	}

	public function getRowUrl($model)
	{
		return $this->getUrl('*/*/edit', array(
			'id' => $model->getId(),
		));
	}

}