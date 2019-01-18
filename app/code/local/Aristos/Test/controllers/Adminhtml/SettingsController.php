<?php

class Aristos_Test_Adminhtml_SettingsController extends Mage_Adminhtml_Controller_Action
{

	public function indexAction()
	{
		$this->loadLayout()->_setActiveMenu('aristostest');

		$this->_addContent($this->getLayout()->createBlock('aristostest/adminhtml_settings'));
		$this->renderLayout();
	}

	public function newAction()
	{
		$this->_forward('edit');
	}

	public function editAction()
	{
		$id = (int)$this->getRequest()->getParam('id');
		/*$model = Mage::getModel('aristostestsql/aristostest');

		if ($data = Mage::getSingleton('adminhtml/session')->getFormData()) {
			$model->setData($data)->setId($id);
		} else {
			$model->load($id);
		}
		Mage::register('current_news', $model);*/

		$this->loadLayout()->_setActiveMenu('aristostest');
		$this->_addLeft($this->getLayout()->createBlock('mage/adminhtml/system_convert_gui_edit_tabs'));
		$this->_addContent($this->getLayout()->createBlock('aristostest/adminhtml_settings_edit_tabs'));
		$this->renderLayout();
	}

	public function saveAction()
	{
		if ($data = $this->getRequest()->getPost()) {
			try {
				$model = Mage::getModel('aristostest/settings');
				$model->setData($data)->setId($this->getRequest()->getParam('id'));
				if (!$model->getCreated()) {
					$model->setCreated(now());
				}
				$model->save();

				Mage::getSingleton('adminhtml/session')->addSuccess($this->__('settings was saved successfully'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				Mage::getSingleton('adminhtml/session')->setFormData($data);
				$this->_redirect('*/*/edit', array(
					'id' => $this->getRequest()->getParam('id')
				));
			}
			return;
		}
		Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
		$this->_redirect('*/*/');
	}

	public function deleteAction()
	{
		if ($id = $this->getRequest()->getParam('id')) {
			try {
				Mage::getModel('aristostest/settings')->setId($id)->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Settings was deleted successfully'));
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $id));
			}
		}
		$this->_redirect('*/*/');
	}

	public function massDeleteAction()
	{
		$news = $this->getRequest()->getParam('news', null);

		if (is_array($news) && sizeof($news) > 0) {
			try {
				foreach ($news as $id) {
					Mage::getModel('aristostest/settings')->setId($id)->delete();
				}
				$this->_getSession()->addSuccess($this->__('Total of %d settings have been deleted', sizeof($news)));
			} catch (Exception $e) {
				$this->_getSession()->addError($e->getMessage());
			}
		} else {
			$this->_getSession()->addError($this->__('Please select settings'));
		}
		$this->_redirect('*/*');
	}
}