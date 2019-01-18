<?php

class Aristos_Test_Model_Resource_Settings extends Mage_Core_Model_Mysql4_Abstract
{

    public function _construct()
    {
        $this->_init('aristostestsql/table_aristostest', 'aristos_id');
    }

}