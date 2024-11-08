<?php
class subcategoriesController extends Controller
{

    public function subcategoriesPage(Request $request, $subcategoryUri)
    {
        // Load the model to interact with subcategories
        $subcategoriesModel = $this->model('subcategoriesModel');

        // Fetch subcategories based on the category ID
        $subcategories = $subcategoriesModel->getByCategoryUri($subcategoryUri);
        $params['subcategories'] = $subcategories;
        var_dump($params['subcategories']);
        echo "Sub Category page" . $subcategoryUri;
        $this->view('subcategories', $params);
    }

    public function getSubcategories(Request $request, $categoryId)
    {
        // Load the model to interact with subcategories
        $subcategoriesModel = $this->model('subcategoriesModel');

        // Fetch subcategories based on the category ID
        $subcategories = $subcategoriesModel->getByCategoryId($categoryId);

        // Generate the HTML options for the subcategories dropdown
        if ($subcategories) {
            foreach ($subcategories as $subcategory) {
                echo '<option value="' . $subcategory['subcategoryId'] . '">' . $subcategory['subcategoryName'] . '</option>';
            }
        } else {
            echo '<option value="">No Subcategories Available</option>';
        }

    }

    public function subcategoriesIndex()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $subcategoriesModel = $this->model('subcategoriesModel');
        $searchColumns = array(
            0 => 'subcategoryId',
            1 => 'subcategoryName',
            2 => 'subcategoryDesc',
            3 => 'subcategoryUri',
            4 => 'subcategoryFeatureImage',
            5 => 'subcategoryUpdated',
            6 => 'subcategoryIdentify',
        );
        $totalRecords = $subcategoriesModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $subcategoriesModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['subcategories'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] = $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->adminView('subcategories/subcategoriesAll', $params);
    }

    public function subcategoriesDisplay(Request $request, $subcategoriesIdentify)
    {
        $subcategoriesModel = $this->model('subcategoriesModel');
        $params['subcategories'] = $subcategoriesModel->displaySingle($subcategoriesIdentify);
        $this->adminView('subcategories/subcategoriesSingle', $params);
    }

    public function subcategoriesDestroy(Request $request, $subcategoriesIdentify)
    {
        $subcategoriesModel = $this->model('subcategoriesModel');
        $subcategoriesModel->erase($subcategoriesIdentify);
        // success delete and redirect
        header("Location: /admin/subcategories/");
        $_SESSION['success_message'] = "Delete successful!";
        exit;
    }

    public function subcategoriesbuild()
    {
        // Fetch all categories using the dynamicSelect method
        $categoriesModel = $this->model('categoriesModel');
        $tableName = 'categories';
        $columns = ['categoryId', 'categoryName'];
        $categories = $categoriesModel->dynamicSelect($tableName, $columns);
        $params['categories'] = $categories;
        $this->adminView('subcategories/subcategoriesNew', $params);
    }

    public function subcategoriesRecord(Request $request)
    {
        $subcategoriesModel = $this->model('subcategoriesModel');
        $data = $request->getBody();

        $data['subcategoryUpdated'] = date('Y-m-d H:i:s');
        $data['subcategoryIdentify'] = generateUniqueId(16);
        $rules = array(
            'subcategoryName' => 'required',
            'subcategoryDesc' => 'required',
            'subcategoryUri' => 'required',
            'subcategoryFeatureImage' => 'required',
            'subcategoryUpdated' => '',
            'subcategoryIdentify' => 'required',
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
                        if ($_FILES['subcategoryFeatureImage']['error'] === UPLOAD_ERR_OK) {
                            // Upload the new image
                            $uploadedFileName = uploadFile('subcategoryFeatureImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880/* 5 MB */);
            
                            if ($uploadedFileName === false) {
                                // Handle file upload error
                                echo "File upload failed or file format or size not allowed.";
                                return;
                            }
                        }
                        // Update the image path in the data array
                        $data['subcategoryFeatureImage'] = $uploadedFileName;
            $subcategoriesModel->record($data); 
            // success adding and redirect
            header("Location: /admin/subcategories/");
            $_SESSION['success_message'] = "Added successful!";
            exit;
        }
    }

    public function subcategoriesModify(Request $request, $subcategoriesIdentify)
    {
        // Fetch all categories using the dynamicSelect method
        $categoriesModel = $this->model('categoriesModel');
        $tableName = 'categories';
        $columns = ['categoryId', 'categoryName'];
        $categories = $categoriesModel->dynamicSelect($tableName, $columns);
        $params['categories'] = $categories;

        $subcategoriesModel = $this->model('subcategoriesModel');
        $params['subcategoryIdentify'] = $subcategoriesIdentify;
        $params['subcategories'] = $subcategoriesModel->displaySingle($subcategoriesIdentify);
        $this->adminView('subcategories/subcategoriesEdit', $params);
    }

    public function subcategoriesEdit(Request $request, $subcategoriesIdentify)
    {
        $subcategoriesModel = $this->model('subcategoriesModel');
        $data = $request->getBody();
        $rules = array(
            'subcategoryName' => 'required',
            'subcategoryDesc' => 'required',
            'subcategoryUri' => 'required',
            'subcategoryFeatureImage' => 'required',
            'subcategoryUpdated' => '',
            'subcategoryIdentify' => 'required',
        );
        $validator = new Validator();

        if ($validator->fails($rules)) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {

            /* Upload file edit */
            if ($_FILES['subcategoryFeatureImage']['error'] === UPLOAD_ERR_OK) {
                $uploadedFileName = uploadFile('subcategoryFeatureImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880/* 5 MB */);
                if ($uploadedFileName === false) {
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }
                $data['subcategoryFeatureImage'] = $uploadedFileName;
            } else {
                $categoriesData = $subcategoriesModel->displaySingle($subcategoriesIdentify);
                $data['subcategoryFeatureImage'] = $categoriesData[0]['subcategoryFeatureImage'];
            }
            /* Upload file edit  */

            $subcategoriesModel->update($data, $subcategoriesIdentify);
            // success updated and redirect
            header("Location: /admin/subcategories/");
            $_SESSION['success_message'] = "Update successful!";
            exit;
        }
    }
}
