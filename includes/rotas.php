<?php

$postArray = isset($_REQUEST['p']) ? explode("/", $_REQUEST['p']) : array();

$modulo = isset($postArray[0]) ? $postArray[0] : 'home';

$action = isset($postArray[1]) ? $postArray[1] : '';

$idRegistro = isset($postArray[3]) ? $postArray[3] : '';
