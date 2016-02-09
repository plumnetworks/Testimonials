<?php

$installer = $this;
$installer->startSetup();
$sql = <<<SQLTEXT
drop table if exists {$this->getTable('wbxtest/wbxtest')}; 
create table {$this->getTable('wbxtest/wbxtest')}(
    id int not null auto_increment,
 name varchar(255) default '-',
description TEXT,
`index` INT default 0,
`date` date,
value INT default 0,
`owner` int,
 primary key(id)) ENGINE = InnoDB DEFAULT CHARSET = utf8;
        
SQLTEXT;
$installer->run($sql);

$installer->endSetup();


