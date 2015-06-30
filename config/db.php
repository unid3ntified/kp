<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=127.0.0.1;dbname=sinet',
    'username' => 'admin',
    'password' => 'admin',
    'charset' => 'utf8',
];

$db = Yii::createObject($config);