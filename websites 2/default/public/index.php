<?php
require '../Functions/LoadTemplate.php'; //load templatw function
require '../databaseConnection.php'; //database connection
require  '../Classes/DatabaseTable.php';   //loading database functions
require  '../Controllers/UserController.php';
require  '../Controllers/AdminController.php';
session_start();
if(isset($_SESSION['loggedin'])) {
  $loggedin=true;
}
else {
$loggedin=false;
}
if(isset($_SESSION['ADMINLOGIN'])) {
  $superAdminLogin=true;
}
else {
$superAdminLogin=false;
}

$furnitureTable= new DatabaseTable($pdo, 'furniture', 'id');
$categoryTable= new DatabaseTable($pdo, 'category', 'id');
$recyleBin= new DatabaseTable($pdo, 'recyleBin', 'id');
$conditionTable= new DatabaseTable($pdo, 'conditionTable', 'id');
$homePagePosts=new DatabaseTable($pdo, 'homePagePosts', 'id');
$adminTable=new DatabaseTable($pdo, 'users', 'id');
$superAdminLogin=new DatabaseTable($pdo, 'masterAdmin', 'id');


$UserController = new UserController($furnitureTable,$categoryTable,$homePagePosts);
$AdminController = new AdminController($furnitureTable,$categoryTable,$recyleBin,$homePagePosts,$adminTable,$superAdminLogin);

$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
if ($route == '') {
 $page= $UserController->home();
}

else if ($route == 'index') {
 $page= $UserController->home();
}

else if ($route == 'furniture') {  //making up a route for the url then the page= the category controller edit function
 $page= $UserController->Furniture();
}

else if ($route == 'about') {
 $page= $UserController->About();
}

else if ($route == 'contact') {  //making up a route for the url then the page= the category controller edit function
 $page= $UserController->Contact();
}

else if ($route == 'faqs') {  //making up a route for the url then the page= the category controller edit function
 $page= $UserController->faqs();
}

else if ($route == 'adminHome') {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->adminHome();
}

else if ($route == 'adminFurniture' && $loggedin==true && $superAdminLogin=true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->adminFurniture();
}

else if ($route == 'addEditFurniture' && $loggedin==true && $superAdminLogin=true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->addEditFurniture();
}

else if ($route == 'deleteFurniture' && $loggedin==true&& $superAdminLogin=true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->deleteFurniture();
}

else if ($route == 'adminCategory' && $loggedin==true && $superAdminLogin=true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->adminCategory();
}

else if ($route == 'addEditCategory' && $loggedin==true &&$superAdminLogin==true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->addEditCategory();
}

else if ($route == 'deleteCategory' && $loggedin==true &&$superAdminLogin==true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->deleteCategory();
}
else if ($route == 'ViewSelectedCategory') {  //making up a route for the url then the page= the category controller edit function
 $page= $UserController->ViewSelectedCategory();
}

else if ($route == 'recyleBin1' && $loggedin==true &&$superAdminLogin==true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->recyleBin1();
}

else if ($route == 'restoreFurniture' && $loggedin==true&& $superAdminLogin==true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->restoreFurniture();
}

else if ($route == 'deleteFurniturePermantly' && $loggedin==true&& $superAdminLogin==true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->deleteFurniturePermantly();
}
else if ($route == 'ViewSelectedCategoryCondition' ) {  //making up a route for the url then the page= the category controller edit function
 $page= $UserController->ViewSelectedCategoryCondition();
}

else if ($route == 'homePagePosts' && $loggedin==true && $superAdminLogin==true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->homePagePosts();
}

else if ($route == 'adminUserList' && $superAdminLogin==true ) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->adminUserList();
}

else if ($route == 'addEditAdminUser' &&$superAdminLogin==true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->addEditAdminUser();
}

else if ($route == 'deleteAdminUser' && $superAdminLogin==true) {  //making up a route for the url then the page= the category controller edit function
 $page= $AdminController->deleteAdminUser();
}

else if ($route == 'ViewSelectedCategoryConditionSecondHand') {  //making up a route for the url then the page= the category controller edit function
 $page= $UserController->ViewSelectedCategoryConditionSecondHand();
}

else  {
  header('location:adminHome');
}

$output=loadTemplate('../Templates/' . $page['template'], $page['variables']);
$title=$page['title'];

if(isset($_SESSION['ADMINLOGIN'])) {
require  '../Templates/masterAdminTemplate.html.php';
}
else if (isset($_SESSION['loggedin'])) {
  require  '../Templates/AdminTemplate.html.php';
                                 }

  else {
  require  '../Templates/userAreaTemplate.html.php';
       }
