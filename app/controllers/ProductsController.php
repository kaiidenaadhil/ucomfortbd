<?php
class productsController extends Controller
{
    public function getCategoriesWithSubcategories()
    {
        $db = Database::getInstance()->getConnection();
        $query = "
            SELECT 
                c.categoryId, c.categoryName, c.categoryDesc, c.categoryUri, c.categoryFeatureImage, c.categoryIdentify,
                s.subcategoryId, s.subcategoryName, s.subcategoryDesc, s.subcategoryUri, s.subcategoryFeatureImage, s.subcategoryIdentify
            FROM 
                categories AS c
            LEFT JOIN 
                subcategories AS s ON c.categoryId = s.categoryId
            ORDER BY 
                c.categoryId, s.subcategoryId
        ";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];
        
        foreach ($results as $row) {
            $categoryId = $row['categoryId'];

            // Initialize the category if it hasn't been added
            if (!isset($categories[$categoryId])) {
                $categories[$categoryId] = [
                    'categoryId' => $row['categoryId'],
                    'categoryName' => $row['categoryName'],
                    'categoryUri' => $row['categoryUri'],
                    'subcategories' => []
                ];
            }

            // Add subcategory if it exists
            if ($row['subcategoryId']) {
                $categories[$categoryId]['subcategories'][] = [
                    'subcategoryId' => $row['subcategoryId'],
                    'subcategoryName' => $row['subcategoryName'],
                    'subcategoryUri' => $row['subcategoryUri']
                ];
            }
        }

        return $categories;
    }

    public function categoryProductPage(Request $request, $categoryUri = null, $subcategoryUri = null) {
        $search = null;
    
        if (isset($categoryUri)) {
            $categoriesModel = $this->model('categoriesModel');
            $category = $categoriesModel->getByCategoryUri($categoryUri);
    
            // Ensure $category is not empty before accessing [0]['categoryId']
            if (!empty($category) && isset($category[0]['categoryId'])) {
                $search = $category[0]['categoryId'];
            } else {
                // Handle the case where the category is not found
                $search = null;
            }
    
            // Only proceed with subcategory query if category is valid and $subcategoryUri is provided
            if (isset($subcategoryUri) && !empty($category)) {
                $subcategoriesModel = $this->model('subcategoriesModel');
                $subcategory = $subcategoriesModel->getByCategoryUri($subcategoryUri);
    
                // Ensure $subcategory is not empty before accessing [0]['subcategoryId']
                if (!empty($subcategory) && isset($subcategory[0]['subcategoryId'])) {
                    $search = $subcategory[0]['subcategoryId'];
                    // Optional: uncomment if you want these parameters in your view
                    // $params['subcategoryName'] = $subcategory[0]['subcategoryName'];
                    // $params['subcategoryUri'] = $subcategoryUri;
                }
            }
        }
    
        $productsModel = $this->model('productsModel');
    
        $searchColumns = array(
            0 => 'categoryId',
            1 => 'subcategoryId',
        );
    
        $totalRecords = $productsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $productsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
    
        $params['categories'] = $this->getCategoriesWithSubcategories();
        $params['products'] = $data;

        $params['blog'] = $this->getBlog();
        $this->view('products', $params);
    }
    
    public function subcategoryProductPage(Request $request, $subcategoryUri)
    {
        // Load the model to interact with subcategories
        $subcategoriesModel = $this->model('subcategoriesModel');
        // Fetch subcategories based on the category ID
        $subcategories = $subcategoriesModel->getByCategoryUri($subcategoryUri);
        $search = $subcategories[0]['subcategoryId'];
        $productsModel = $this->model('productsModel');
        $searchColumns = array('subcategoryId');

        $totalRecords = $productsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $productsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());

        $params['subcategoryName'] = $subcategories[0]['subcategoryName'];
        $params['subcategoryUri'] = $subcategoryUri;
        $params['categories'] = $this->getCategoriesWithSubcategories();
        $params['products'] = $data;
        $this->view('products', $params);
    }

    public function getProduct()
    {

        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $productsModel = $this->model('productsModel');
        $searchColumns = array(
            0 => 'productId',
            1 => 'productName',
            2 => 'productShortDesc',
            3 => 'productDesc',
            4 => 'productPrice',
            5 => 'productImage',
            6 => 'productTags',
            7 => 'subcategoryId',
            8 => 'productUpdated',
            9 => 'productIdentify',
        );
        $totalRecords = $productsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 12);
        $data = $productsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        return $data;
    }

    public function productsPage()
{
//$params['categories'] = $this->getCategoriesWithSubcategories();
    
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $category = isset($_GET['category']) ? $_GET['category'] : '';
    $minPrice = isset($_GET['minPrice']) ? (float)$_GET['minPrice'] : null;
    $maxPrice = isset($_GET['maxPrice']) ? (float)$_GET['maxPrice'] : null;

    $productsModel = $this->model('productsModel');
    $searchColumns = [
        'productId', 'productName', 'productShortDesc', 'productDesc', 
        'productPrice', 'productImage', 'productTags', 'subcategoryId', 
        'productUpdated', 'productIdentify'
    ];

    $filters = [
        'subcategoryId' => $category,
        'productPrice_min' => $minPrice,
        'productPrice_max' => $maxPrice
    ];

    $totalRecords = $productsModel->countAll($search, $searchColumns, $filters);
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $pagination = new Pagination($totalRecords, $page, 9);
    $data = $productsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit(), $filters);

    $params['products'] = $data;
    $params['pagination'] = $totalRecords > $pagination->getLimit() ? $pagination->render() : '';

    // Fetch all categories using the dynamicSelect method
   // $categoriesModel = $this->model('categoriesModel');
  //  $categories = $categoriesModel->dynamicSelect('categories', ['categoryId', 'categoryName']);
    $params['categories'] = $this->getCategoriesWithSubcategories();
    $params['blog'] = $this->getBlog();
    $this->view('products', $params);
}


    public function productsPageold()
    {

        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $productsModel = $this->model('productsModel');
        $searchColumns = array(
            0 => 'productId',
            1 => 'productName',
            2 => 'productShortDesc',
            3 => 'productDesc',
            4 => 'productPrice',
            5 => 'productImage',
            6 => 'productTags',
            7 => 'subcategoryId',
            8 => 'productUpdated',
            9 => 'productIdentify',
        );
        $totalRecords = $productsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 9);
        $data = $productsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['products'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] = $pagination->render();
        } else {
            $params['pagination'] = '';
        }

        // Fetch all categories using the dynamicSelect method
        $categoriesModel = $this->model('categoriesModel');
        $tableName = 'categories';
        $columns = ['categoryId', 'categoryName'];
        $categories = $categoriesModel->dynamicSelect($tableName, $columns);
        $params['categories'] = $categories;
        $this->view('products', $params);
    }
    public function productSingleOld(Request $request, $productsIdentify)
    {
        $productsModel = $this->model('productsModel');
        $params['products'] = $productsModel->displaySingle($productsIdentify);
        // Related Product Query
        $search = $params['products']['0']['subcategoryId'];
        $searchColumns = array('subcategoryId');
        $totalRecords = $productsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $productsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['relatedProducts'] = $data;
        $this->view('product-single', $params);
    }

    public function productSingle(Request $request, $productsIdentify) {
        $productsModel = $this->model('productsModel');
        $mediaModel = $this->model('MediaModel'); // Load the media model
    
        // Fetch product details
        $params['products'] = $productsModel->displaySingle($productsIdentify);
    
        // Fetch media files related to this product
        $params['mediaFiles'] = $mediaModel->getFiles($productsIdentify, null); // Filter by mediaIdentify
    
        // Related Products Query
        $search = $params['products']['0']['subcategoryId'];
        $searchColumns = array('subcategoryId');
        $totalRecords = $productsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $productsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['relatedProducts'] = $data;
    
        // Load the view with all parameters
        $this->view('product-single', $params);
    }
    
    public function productsIndex()
    {
        checkAdmin();
        // Let's try to get category:

        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $productsModel = $this->model('productsModel');
        $searchColumns = array(
            0 => 'productId',
            1 => 'productName',
            2 => 'productShortDesc',
            3 => 'productDesc',
            4 => 'productPrice',
            5 => 'productImage',
            6 => 'productTags',
            7 => 'subcategoryId',
            8 => 'productUpdated',
            9 => 'productIdentify',
        );
        $totalRecords = $productsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $productsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['products'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] = $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->adminView('products/productsAll', $params);
    }

    public function productsDisplay(Request $request, $productsIdentify)
    {
        checkAdmin();
        $productsModel = $this->model('productsModel');
        $params['products'] = $productsModel->displaySingle($productsIdentify);
        $this->adminView('products/productsSingle', $params);
    }

    public function productsDestroy(Request $request, $productsIdentify)
    {
        checkAdmin();
        $productsModel = $this->model('productsModel');
        $productsModel->erase($productsIdentify);
        // success delete and redirect
        header("Location: /admin/products/");
        $_SESSION['success_message'] = "Delete successful!";
        exit;
    }

    public function productsbuild()
    {
        // Fetch all categories using the dynamicSelect method
        $categoriesModel = $this->model('categoriesModel');
        $tableName = 'categories';
        $columns = ['categoryId', 'categoryName'];
        $categories = $categoriesModel->dynamicSelect($tableName, $columns);
        $params['categories'] = $categories;

        checkAdmin();
        $this->adminView('products/productsNew', $params);
    }

    public function productsRecord(Request $request)
    {
        checkAdmin();
        $productsModel = $this->model('productsModel');
        $data = $request->getBody();
        $data['productUpdated'] = date('Y-m-d H:i:s');
        $data['productIdentify'] = generateUniqueId(16);
        $rules = array(
            'productName' => 'required|max:255',
            'productDesc' => 'required|max:5000',
            'productPrice' => 'required|max:255',
            'productImage' => 'required|max:255',
            'productTags' => 'required|max:255',
            'productUpdated' => '',
            'productIdentify' => 'required',
        );
        $validator = new Validator();
        $validator->validate($rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {

            /* #### File upload #####*/
            if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
                $uploadedFileName = uploadFile('productImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880/* 5 MB */);
                if ($uploadedFileName === false) {
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }
                $data['productImage'] = $uploadedFileName;
            }
            /* #### File upload #####*/
            $productsModel->record($data);
            // success adding and redirect
            header("Location: /admin/products/");
            $_SESSION['success_message'] = "Added successful!";
            exit;
        }
    }

    public function productsModify(Request $request, $productsIdentify)
    {
        checkAdmin();
        $productsModel = $this->model('productsModel');
        $params['productIdentify'] = $productsIdentify;
        $params['products'] = $productsModel->displaySingle($productsIdentify);
        $this->adminView('products/productsEdit', $params);
    }

    public function productsEdit(Request $request, $productsIdentify)
    {
        checkAdmin();
        $productsModel = $this->model('productsModel');
        $data = $request->getBody();
        $rules = array(
            'productName' => 'required|max:255',
            'productDesc' => 'required|max:5000',
            'productPrice' => 'required|max:255',
            'productImage' => 'required|max:255',
            'productTags' => 'required|max:255',
            'productUpdated' => '',
            'productIdentify' => 'required',
        );
        $validator = new Validator();

        if ($validator->fails($rules)) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {

            /* Upload file edit */
            if ($_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
                $uploadedFileName = uploadFile('productImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880/* 5 MB */);
                if ($uploadedFileName === false) {
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }
                $data['productImage'] = $uploadedFileName;
            } else {
                $productsData = $productsModel->displaySingle($productsIdentify);
                $data['productImage'] = $productsData[0]['productImage'];
            }
            /* Upload file edit  */

            $productsModel->update($data, $productsIdentify);
            // success updated and redirect
            header("Location: /admin/products/");
            $_SESSION['success_message'] = "Update successful!";
            exit;
        }
    }

    public function getBlog(){
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $blogModel = $this->model('blogModel');
        $searchColumns = array(
            0 => 'blogId',
            1 => 'blogTitle',
            2 => 'blogSubtitle',
            3 => 'blogContent',
            4 => 'blogAuthor',
            5 => 'blogImage',
            6 => 'blogUpdated',
            7 => 'blogIdentify',
        );
        $totalRecords = $blogModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 4);
        $data = $blogModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        return  $data;

    }
}
