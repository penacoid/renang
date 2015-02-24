<?php
$installer = $this;
 
$installer->startSetup();
 
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
Mage::getSingleton('eav/config')
    ->getAttribute('customer_address', 'town')
    ->setData('used_in_forms', array('customer_register_address','customer_address_edit','adminhtml_customer_address'))
    ->save();
$installer->endSetup();