<?php
class UserController {

 private $furnitureTable;
 private $categoryTable;
 private $homePagePosts;

 public function __construct($furnitureTable,$categoryTable,$homePagePosts) {
 $this->furnitureTable = $furnitureTable;
 $this->categoryTable = $categoryTable;
 $this->homePagePosts=$homePagePosts;

 }

 public function home() {
   $homePageQuery= $this->homePagePosts->findAll();
 return ['template' => 'homePageTemplate.html.php',
 'title' => 'Home',
 'variables' =>['homePageQuery' =>$homePageQuery
 ]
];
 }

 public function Furniture() {
$furnitureQuery= $this->furnitureTable->findAll();
$category= $this->categoryTable->findAll();
 return ['template' => 'furnitureTemplate.html.php',
 'title' => 'furniture page',
 'variables' => [ 'category' => $category, 'furnitureQuery' => $furnitureQuery, 'categoryTable' => $this->categoryTable
 ]
 ];

 }

 public function About() {

 return ['template' => 'aboutTemplate.html.php',
 'title' => 'about',
 'variables' => [
 ''
 ]
 ];

 }

 public function contact() {

 return ['template' => 'contactTemplate.html.php',
 'title' => 'contact',
 'variables' => ['']
 ];

 }

 public function faqs() {

 return ['template' => 'faqsTemplate.html.php',
 'title' => 'FAQS',
 'variables' => ['']
 ];

 }

 public function ViewSelectedCategory() {
 $category= $this->categoryTable->findAll();
 $furnitureQuery = $this->furnitureTable->find('categoryId', $_GET['id']);
    if (isset($_POST['submit'])) {
}
 return ['template' => 'viewCategoryTemplate.html.php',
 'title' => 'Category List',
 'variables' => [
 'furnitureQuery' => $furnitureQuery, 'category' => $category
]
 ];

 }


 public function ViewSelectedCategoryCondition() {
 $category= $this->categoryTable->findAll();
 $furnitureQuery = $this->furnitureTable->findExtra('categoryId', $_GET['id'], 'state', 'FirstHand');


 return ['template' => 'ViewSelectedCategoryConditionTemplate.html.php',
 'title' => 'Category List',
 'variables' => [
 'category' => $category,'furnitureQuery' =>$furnitureQuery
 ]
 ];

 }

  public function ViewSelectedCategoryConditionSecondHand()   {
  $category= $this->categoryTable->findAll();
  $furnitureQuery = $this->furnitureTable->findExtra('categoryId', $_GET['id'], 'state', 'SecondHand');
   return ['template' => 'ViewSelectedCategoryConditionTemplate.html.php',
   'title' => 'Category List',
   'variables' => [
   'category' => $category,'furnitureQuery' =>$furnitureQuery
   ]
   ];

   }

}
