<?php
require_once "CatInfo.php";
require_once "People.php";
$people = new People();
$block = new CatInfo($people);
echo $block->init();
