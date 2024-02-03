<?php
class AdminController {

private $furnitureTable;
private $categoryTable;
private $recyleBin;
private $homePagePosts;
private $adminTable;
private $superAdminLogin;

public function __construct($furnitureTable, $categoryTable,$recyleBin,$homePagePosts,$adminTable,$superAdminLogin) {


 $this->furnitureTable=$furnitureTable;
 $this->categoryTable=$categoryTable;
 $this->recyleBin=$recyleBin;
 $this->homePagePosts=$homePagePosts;
 $this->adminTable=$adminTable;
 $this->superAdminLogin=$superAdminLogin;
 }


 public function adminHome() {

if (isset($_POST['submit'])) {
  $superAdminQuery=$this->superAdminLogin->find('username',$_POST['userName']);
  $adminQuery=$this->adminTable->find('username',$_POST['userName']);

  if(password_verify($_POST['password'],
  $superAdminQuery[0]['password'])) {
  $_SESSION ['ADMINLOGIN' ]=true;
  $_SESSION ['loggedin' ]=true;
  header('Location: adminFurniture');
  }

  else if (password_verify($_POST['password'],
  $adminQuery[0]['password'])) {
  $_SESSION ['loggedin' ]=true;
  header('Location: adminFurniture');

}
  else {
     echo 'login details do not match please re enter login form ';
      }
  }
 return ['template' => 'adminHomeTemplate.html.php',
 'title' => 'Admin Home',
 'variables' => [
''
]
];
}

public function homePagePosts() {
  if (isset($_POST['homePagePosts'])) {
  $homePagePost= $_POST['homePagePosts'];
  $date = new DateTime();
  $homePagePost['Postdate'] = $date->format('Y-m-d H:i:s');
  $this->homePagePosts->save($homePagePost);
    header('location: homePagePosts');
  if ($_FILES['image']['error'] == 0) {
    $fileName=$this->homePagePosts->findLastInsertId(). '.jpg';
    move_uploaded_file($_FILES['image']['tmp_name'], './images/homePagePostsPictures/' . $fileName);
}
  }

  if (isset($_POST['logout'])) {
    unset($_SESSION['loggedin']);
      header('location:adminHome');
    }
    if (isset($_POST['logout'])) {
      unset($_SESSION['ADMINLOGIN']);
        header('location:adminHome');
      }

  else {
    if  (isset($_GET['id'])) {
      $result = $this->homePagePosts->find('id', $_GET['id']);

      $homePagePost = $result[0];

    }

    else  {
      $homePagePost= false;
}

//header('location: adminFurniture');
return ['template' => 'AdminHomePagePosts.html.php',
'title' => 'AddPostToHomePage',
'variables' => [
'homePagePost' => $homePagePost]
];
}
}

public function adminFurniture() {
 $furnitureQuery=$this->furnitureTable->findAll();
   if (isset($_POST['submit'])) {
     unset($_SESSION['loggedin']);
		 	 header('location:adminHome');
     }
     if (isset($_POST['submit'])) {
       unset($_SESSION['ADMINLOGIN']);
  		 	 header('location:adminHome');
       }
 return ['template' => 'AdminFurnitureListTemplate.html.php',
 'title' => 'Furniture List',
 'variables' => [
 'furnitureQuery' => $furnitureQuery
]
 ];
 }

public function adminCategory() {
$categories=$this->categoryTable->findAll();
if (isset($_POST['submit'])) {
  unset($_SESSION['loggedin']);
    header('location:adminHome');
  }
  if (isset($_POST['submit'])) {
    unset($_SESSION['ADMINLOGIN']);
      header('location:adminHome');
    }
return ['template' => 'categoryAdminTemplate.html.php',
'title' => 'category List',
'variables' => [
'categories' => $categories
]
];
}
///

public function addEditCategory(){

  if (isset($_POST['category'])) {
  $category= $_POST['category'];
  $this->categoryTable->save($category);
  header('location: adminCategory');

}
if (isset($_POST['submit'])) {
  unset($_SESSION['loggedin']);
    header('location:adminHome');
  }
  if (isset($_POST['submit'])) {
    unset($_SESSION['ADMINLOGIN']);
      header('location:adminHome');
    }
else {
  if  (isset($_GET['id'])) {
    $result = $this->categoryTable->find('id', $_GET['id']);

    $category = $result[0];

  }

  else  {
    $category= false;
  }
  return [
    'template' => 'addEditCategory.html.php',
    'title' => 'Edit category',
    'variables' => ['category' => $category]

  ];
  }
}

  public function addEditFurniture(){

    if (isset($_POST['furniture'])) {
    $furniture = $_POST['furniture'];
    $this->furnitureTable->save($furniture);
    if ($_FILES['image']['error'] == 0) {
      $fileName =$this->furnitureTable->findLastInsertId(). '.jpg';
      move_uploaded_file($_FILES['image']['tmp_name'], './images/furniture/' . $fileName);
      //var_dump("added");
    }
    header('location: adminFurniture');

  }
  if (isset($_POST['submit'])) {
    unset($_SESSION['loggedin']);
      header('location:adminHome');
    }
    if (isset($_POST['submit'])) {
      unset($_SESSION['ADMINLOGIN']);
        header('location:adminHome');
      }
  else {
    if  (isset($_GET['id'])) {
      $result = $this->furnitureTable->find('id', $_GET['id']);
      $furniture = $result[0];
    }
    else  {
      $furniture = false;
    }

  $categorys=$this->categoryTable->findAll();
  //$conditionQuery=$this->conditionTable->findAll();
    return [
      'template' => 'addEditfurniture.html.php',
      'variables' => ['furniture' => $furniture ,'categorys' => $categorys],
      'title' => 'AddEditProduct'
    ];
  }

}

public function deleteCategory() {
$this->categoryTable->delete($_POST['id']);
header('location:adminCategory');
}


public function deleteFurniture() {
  if (isset($_POST['furniture'])) {
  $furniture = $_POST['furniture'];
  $this->recyleBin->save($furniture);
  $this->furnitureTable->delete($_GET['id']);
  header('location: adminFurniture');
}
else {
  if  (isset($_GET['id'])) {
    $result = $this->furnitureTable->find('id', $_GET['id']);
    $categorys=$this->categoryTable->findAll();

    $furniture = $result[0];
  }

return [
  'template' => 'deleteFurnitureTemp.html.php',
  'variables' => ['furniture' => $furniture,'categorys'=>$categorys],
  'title' => 'Recyle Bin'
];
}
}

public function recyleBin1() {
   $recyleBinQuery=$this->recyleBin->findAll();
   if (isset($_POST[''])) {
   $this->recyleBin->delete($_GET['id']);
   header('location: adminFurniture');
   }
return ['template' => 'recyleBinTemplate.html.php',
'title' => 'deleted product list',
'variables' => [
'recyleBinQuery' => $recyleBinQuery
]
];
}

public function deleteFurniturePermantly() {
  if (isset($_POST['furniture'])) {
  $furniture = $_POST['furniture'];
  $this->recyleBin->delete($_GET['id']);
  header('location: recyleBin1');
}
else {
  if  (isset($_GET['id'])) {
    $result = $this->recyleBin->find('id', $_GET['id']);
    $categorys=$this->categoryTable->findAll();
    $furniture = $result[0];
  }

return [
  'template' => 'deleteFurniturePerm.html.php',
  'variables' => ['furniture' => $furniture, 'categorys'=>$categorys],
  'title' => 'Recyle Bin'
];
}
}

public function restoreFurniture() {
  if (isset($_POST['furniture'])) {
  $furniture = $_POST['furniture'];
  $this->furnitureTable->save($furniture);
  $this->recyleBin->delete($_GET['id']);
  header('location: recyleBin1');
}
else {
  if  (isset($_GET['id'])) {
    $result = $this->recyleBin->find('id', $_GET['id']);
    $categorys=$this->categoryTable->findAll();

    $furniture = $result[0];
  }
return [
  'template' => 'restoreFurniture.html.php',
  'variables' => ['furniture' => $furniture,'categorys'=>$categorys],
  'title' => 'Restore Furniture'
];
     }
}

public function adminUserList() {
  if (isset($_SESSION['ADMINLOGIN'])) {


 $adminTable=$this->adminTable->findAll();
}
else {
  header('location: adminHome');

}
 return ['template' => 'AdminUserListTemplate.html.php',
 'title' => 'Admin User List',
 'variables' => [
 'adminTable' => $adminTable
]
 ];
 }

 public function addEditAdminUser() {
   if(isset($_SESSION['ADMINLOGIN'])) {

   }
   else {
   header('Location: adminHome');
   }
  if (isset($_POST['users'])) {
  $user= $_POST['users'];
  $user['password']=password_hash($user['password'], PASSWORD_DEFAULT);
  $this->adminTable->save($user);
  header('location: adminUserList');
}

else {
  if  (isset($_GET['id'])) {
    $result = $this->adminTable->find('id', $_GET['id']);
    $users = $result[0];

  }

  else  {
    $users= false;
  }
}

  return ['template' => 'addEditAdminTemplate.html.php',
  'title' => 'Admin Add Edit List',
  'variables' => [
  'users' => $users
 ]
  ];
  }


  public function deleteAdminUser() {
    if(isset($_SESSION['ADMINLOGIN'])) {

    }
    else {
    header('Location: adminHome');
    }
 if (isset($_POST['users'])) {
 $user= $_POST['users'];
 $this->adminTable->delete($_GET['id']);
 header('location:adminUserList');
}
else {
 if  (isset($_GET['id'])) {
   $result = $this->adminTable->find('id', $_GET['id']);
   $users = $result[0];
 }
   return ['template' => 'deleteAdminTemplate.html.php',
   'title' => 'Delete Admin ',
   'variables' => [
    'users' =>$users
  ]
   ];
   }
  }


}
