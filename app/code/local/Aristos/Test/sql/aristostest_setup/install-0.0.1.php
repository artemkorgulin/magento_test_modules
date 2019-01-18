<?php

$installer = $this;
$tableArist = $installer->getTable('aristostestsql/table_aristostest');

$installer->startSetup();

$installer->getConnection()->dropTable($tableArist);
$table = $installer->getConnection()
	->newTable($tableArist)
	->addColumn('aristos_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'identity'  => true,
		'nullable'  => false,
		'primary'   => true,
	))
	->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
		'nullable'  => false,
	))
	->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable'  => false,
	))
	->addColumn('created', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		'nullable'  => false,
	));
$installer->getConnection()->createTable($table);

$installer->endSetup();