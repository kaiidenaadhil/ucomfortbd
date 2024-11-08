<?php
class categoriesController extends Controller
{
    public function categoriesDisplaySingle(Request $request, $categoryUri)
    { 
        $categoriesModel = $this->model('categoriesModel');
        $subcategoriesModel = $this->model('subcategoriesModel');
  
        $params['categories'] = $categoriesModel->displaySingleCategory($categoryUri);
        $categoryId = $params['categories'][0]['categoryId'];
        // Load the model to interact with subcategories
        
        // Fetch subcategories based on the category ID
        $params['subcategories'] = $subcategoriesModel->getByCategoryId($categoryId);
        
        
        //Getting Blog Posts with filtered
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
        $params['blog'] = $blogModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
      
        $this->view('categories', $params);
    }


    public function getCategories()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $categoriesModel = $this->model('categoriesModel');
        $searchColumns = array(
            0 => 'categoryId',
            1 => 'categoryName',
            2 => 'categoryDesc',
            3 => 'categoryUri',
            4 => 'categoryFeatureImage',
            5 => 'categoryUpdated',
            6 => 'categoryIdentify',
        );
        $totalRecords = $categoriesModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 8);
        $data = $categoriesModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        return $data;
    }

    public function categoriesPage()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $categoriesModel = $this->model('categoriesModel');
        $searchColumns = array(
            0 => 'categoryId',
            1 => 'categoryName',
            2 => 'categoryDesc',
            3 => 'categoryUri',
            4 => 'categoryFeatureImage',
            5 => 'categoryUpdated',
            6 => 'categoryIdentify',
        );
        $totalRecords = $categoriesModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $categoriesModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['categories'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] = $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->view('categories', $params);
    }

    public function categoriesIndex()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $categoriesModel = $this->model('categoriesModel');
        $searchColumns = array(
            0 => 'categoryId',
            1 => 'categoryName',
            2 => 'categoryDesc',
            3 => 'categoryUri',
            4 => 'categoryFeatureImage',
            5 => 'categoryUpdated',
            6 => 'categoryIdentify',
        );
        $totalRecords = $categoriesModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $categoriesModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['categories'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] = $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->adminView('categories/categoriesAll', $params);
    }

    public function categoriesDisplay(Request $request, $categoriesIdentify)
    {
        $categoriesModel = $this->model('categoriesModel');
        $params['categories'] = $categoriesModel->displaySingle($categoriesIdentify);
        $this->adminView('categories/categoriesSingle', $params);
    }

    public function categoriesDestroy(Request $request, $categoriesIdentify)
    {
        $categoriesModel = $this->model('categoriesModel');
        $categoriesModel->erase($categoriesIdentify);
        // success delete and redirect
        header("Location: /admin/categories/");
        $_SESSION['success_message'] = "Delete successful!";
        exit;
    }

    public function categoriesbuild()
    {
        $this->adminView('categories/categoriesNew');
    }

    public function categoriesRecord(Request $request)
    {
        $categoriesModel = $this->model('categoriesModel');
        $data = $request->getBody();
        $data['categoryUpdated'] = date('Y-m-d H:i:s');
        $data['categoryIdentify'] = generateUniqueId(16);
        $rules = array(
            'categoryName' => 'required',
            'categoryDesc' => 'required',
            'categoryUri' => 'required',
            'categoryFeatureImage' => 'required',
            'categoryUpdated' => '',
            'categoryIdentify' => 'required',
        );
        $validator = new Validator();
        $validator->validate($rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {

            // Check if a new image is uploaded
            if ($_FILES['categoryFeatureImage']['error'] === UPLOAD_ERR_OK) {
                // Upload the new image
                $uploadedFileName = uploadFile('categoryFeatureImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880/* 5 MB */);

                if ($uploadedFileName === false) {
                    // Handle file upload error
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }
            }
            // Update the image path in the data array
            $data['categoryFeatureImage'] = $uploadedFileName;

            $categoriesModel->record($data);
            // success adding and redirect
            header("Location: /admin/categories/");
            $_SESSION['success_message'] = "Added successful!";
            exit;
        }
    }

    public function categoriesModify(Request $request, $categoriesIdentify)
    {
        $categoriesModel = $this->model('categoriesModel');
        $params['categoryIdentify'] = $categoriesIdentify;
        $params['categories'] = $categoriesModel->displaySingle($categoriesIdentify);
        $this->adminView('categories/categoriesEdit', $params);
    }

    public function categoriesEdit(Request $request, $categoriesIdentify)
    {
        $categoriesModel = $this->model('categoriesModel');
        $data = $request->getBody();
        $rules = array(
            'categoryName' => 'required',
            'categoryDesc' => 'required',
            'categoryUri' => 'required',
            'categoryFeatureImage' => 'required',
            'categoryUpdated' => '',
            'categoryIdentify' => 'required',
        );
        $validator = new Validator();

        if ($validator->fails($rules)) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {

            // Check if a new image is uploaded
            if ($_FILES['categoryFeatureImage']['error'] === UPLOAD_ERR_OK) {
                // Upload the new image
                $uploadedFileName = uploadFile('categoryFeatureImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880/* 5 MB */);

                if ($uploadedFileName === false) {
                    // Handle file upload error
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }

                // Update the image path in the data array
                $data['categoryFeatureImage'] = $uploadedFileName;
            } else {
                // If no new image is uploaded, retain the existing image path
                $categoryData = $categoriesModel->displaySingle($categoriesIdentify);
                $data['categoryFeatureImage'] = $categoryData[0]['categoryFeatureImage'];
                // p($data['campaignMedia']);

            }

            $categoriesModel->update($data, $categoriesIdentify);
            // success updated and redirect
            header("Location: /admin/categories/");
            $_SESSION['success_message'] = "Update successful!";
            exit;
        }
    }
}
