<?php
$installer = $this;
 
$installer->startSetup();

function saveEav($field) {
    Mage::getSingleton('eav/config')
        ->getAttribute('customer_address', $field)
        ->setData('used_in_forms', array('customer_register_address','customer_address_edit','adminhtml_customer_address'))
        ->save();
}
 
$this->addAttribute('customer_address', 'town', array(
    'type' => 'varchar',
    'input' => 'text',
    'label' => 'Town',
    'global' => 1,
    'visible' => 1,
    'required' => 0,
    'user_defined' => 1,
    'visible_on_front' => 1
));

saveEav($field = "town");


//$tablequote = $this->getTable('sales/quote_address');
//$installer->run("ALTER TABLE  $tablequote ADD  `town` varchar(255) NOT NULL");
 
//$tablequote = $this->getTable('sales/order_address');
//$installer->run("ALTER TABLE  $tablequote ADD  `town` varchar(255) NOT NULL");


$this->addAttribute('customer_address', 'town_id', array(
    'type' => 'int',
    'input' => 'text',
    'label' => 'Town ID',
    'global' => 1,
    'visible' => 1,
    'is_visible' => 0,
    'required' => 0,
    'user_defined' => 1,
    'visible_on_front' => 1
));

saveEav($field = "town_id");
//$tablequote = $this->getTable('sales/quote_address');
//$installer->run("ALTER TABLE  $tablequote ADD  `town_id` int(10) DEFAULT NULL AFTER `town`");
 
//$tablequote = $this->getTable('sales/order_address');
//$installer->run("ALTER TABLE  $tablequote ADD  `town_id` int(10) DEFAULT NULL AFTER `town`");

$this->addAttribute('customer_address', 'city_id', array(
    'type' => 'int',
    'input' => 'text',
    'label' => 'City ID',
    'global' => 1,
    'visible' => 1,
    'is_visible' => 0,
    'required' => 0,
    'user_defined' => 1,
    'visible_on_front' => 1
));

saveEav($field = "city_id");
//$tablequote = $this->getTable('sales/quote_address');
//$installer->run("ALTER TABLE  $tablequote ADD  `city_id` int(10) DEFAULT NULL AFTER `city`");
 
//$tablequote = $this->getTable('sales/order_address');
//$installer->run("ALTER TABLE  $tablequote ADD  `city_id` int(10) DEFAULT NULL AFTER `city`");

$installer->endSetup();