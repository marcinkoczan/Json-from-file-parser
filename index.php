<?php
include 'src/SplClassLoader.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$classLoader = new SplClassLoader('Parser', 'src');
$classLoader->register();

$fileData = \Parser\Helper\FileLoader::getFileData('data/1315475.json');

$priceOrderedBrandService = new \Parser\Service\PriceOrderedBrandService(json_decode($fileData), 1315475);
$priceOrderedBrandService->getOrderedBrandsByPrice();
