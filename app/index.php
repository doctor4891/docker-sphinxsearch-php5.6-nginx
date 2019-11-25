<?php
phpinfo();die;
require_once 'Sphinx.php';
var_dump(Sphinx::getInstance()->getParagraphsIds('a'));