<?php
$app->router->post('/upload/media', [MediaController::class, 'uploadFiles']);
$app->router->post('/delete/media', [MediaController::class, 'deleteFile']);
$app->router->get('/load/media', [MediaController::class, 'loadFiles']);



$app->router->get('/categories/{categoryUri}',[CategoriesController::class, 'categoriesDisplaySingle']);


$app->router->get('',[HomeController::class ,'index']);
$app->router->get('/home',[HomeController::class ,'index']);

$app->router->get('/about-us','about-us');
$app->router->get('/factory','factory');

$app->router->get('/products',[ProductsController::class, 'productsPage']);
// new 
$app->router->get('/products/{param1}',[ProductsController::class, 'categoryProductPage']);
$app->router->get('/products/{param1}/{param2}',[ProductsController::class, 'categoryProductPage']);

//$app->router->get('/products/{subcategoryUri}',[ProductsController::class, 'subcategoryProductPage']);
$app->router->get('/product/{productIdentify}',[ProductsController::class, 'productSingle']);

$app->router->get('/iconic-projects',[ProjectsController::class, 'projectsPage']);
$app->router->get('/sales-network',[NetworkController::class, 'networkPage']);


$app->router->get('/blog',[BlogController::class, 'blogPage']);
$app->router->get('/blog/{blogIdentify}',[BlogController::class, 'blogSingle']);

$app->router->get('/faq',[FaqsController::class, 'faqsPage']);
$app->router->get('/contact','contact');
$app->router->post('/contact',[ClientsController::class, 'clientsContact']);



// Authentication Pages
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/activate/{activateId}', [AuthController::class, 'activateAccount']);
$app->router->get('/reset-password/{token}', [AuthController::class, 'resetPassword']);

$app->router->get('/forget-password', [AuthController::class, 'forget']);
$app->router->post('/forget-password-send', [AuthController::class, 'forgetPassword']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/admin', [AuthController::class, 'dashboard']);


#admin panel
$app->router->get('/admin/get-subcategories/{categoryId}',[SubcategoriesController::class, 'getSubcategories']);

$app->router->resource('admin/campaign', 'campaign',CampaignController::class);
$app->router->resource('admin/products', 'products',ProductsController::class);
$app->router->resource('admin/projects', 'projects',ProjectsController::class);
$app->router->resource('admin/faqs', 'faqs',FaqsController::class);
$app->router->resource('admin/clients', 'clients',ClientsController::class);

$app->router->resource('admin/blog', 'blog',BlogController::class);

$app->router->resource('admin/network', 'network',NetworkController::class);

$app->router->resource('admin/metaseo', 'metaseo',MetaseoController::class);

$app->router->resource('admin/subcategories', 'subcategories',SubcategoriesController::class);

$app->router->resource('admin/categories', 'categories',CategoriesController::class);
