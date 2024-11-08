<?php
class blogController extends Controller
{

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
    public function blogPage()
    {
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
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $blogModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['blog'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        
        // var_dump($params);
         $this->view('blog', $params);
         
    }

    public function blogIndex()
    {
        checkAdmin(); 
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
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $blogModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['blog'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->adminView('blog/blogAll', $params);
    }

    public function blogSingle(Request $request, $blogIdentify)
    {
       // checkAdmin(); 
        $blogModel = $this->model('blogModel');
        $params['blog'] =  $blogModel->displaySingle($blogIdentify);
        $this->view('blog-single', $params);
    }


    public function blogDisplay(Request $request, $blogIdentify)
    {
        checkAdmin(); 
        $blogModel = $this->model('blogModel');
        $params['blog'] =  $blogModel->displaySingle($blogIdentify);
        $this->adminView('blog/blogSingle', $params);
    }

    public function blogDestroy(Request $request, $blogIdentify)
    {
        checkAdmin(); 
        $blogModel = $this->model('blogModel');
        $blogModel->erase($blogIdentify);
        // success delete and redirect
        header("Location: /admin/blog/");
        $_SESSION['success_message'] = "Delete successful!";
        exit;
    }

    public function blogbuild()
    {
        checkAdmin(); 
        $this->adminView('blog/blogNew');
    }

    public function blogRecord(Request $request)
    {
        checkAdmin(); 
        $blogModel = $this->model('blogModel');
        $data = $request->getBody();
        $data['blogUpdated'] = date('Y-m-d H:i:s');
        $data['blogIdentify'] = generateUniqueId(16);
        $rules = array(
            'blogTitle' => 'required|max:255',
            'blogSubtitle' => 'required|max:500',
            'blogContent' => 'required|max:5000',
            'blogAuthor' => 'required|max:255',
            'blogImage' => 'required|max:255',
            'blogUpdated' => '',
            'blogIdentify' => 'required',
        );
        $validator = new Validator();
        $validator->validate($rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {


            // Check if a new blog image is uploaded
            if (isset($_FILES['blogImage']) && $_FILES['blogImage']['error'] === UPLOAD_ERR_OK) {
                // Upload the new blog image
                $uploadedFileName = uploadFile('blogImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880 /* 5 MB */);

                if ($uploadedFileName === false) {
                    // Handle file upload error
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }

                // Update the blog image path in the data array
                $data['blogImage'] = $uploadedFileName;
            }


            $blogModel->record($data);
            // success adding and redirect
            header("Location: /admin/blog/");
            $_SESSION['success_message'] = "Added successful!";
            exit;
        }
    }

    public function blogModify(Request $request, $blogIdentify)
    {
        checkAdmin(); 
        $blogModel = $this->model('blogModel');
        $params['blogIdentify'] = $blogIdentify;
        $params['blog'] =  $blogModel->displaySingle($blogIdentify);
        $this->adminView('blog/blogEdit', $params);
    }

    public function blogEdit(Request $request, $blogIdentify)
    {
        checkAdmin(); 
        $blogModel = $this->model('blogModel');
        $data = $request->getBody();
        $rules = array(
            'blogTitle' => 'required|max:255',
            'blogSubtitle' => 'required|max:500',
            'blogContent' => 'required|max:5000',
            'blogAuthor' => 'required|max:255',
            'blogImage' => 'required|max:255',
            'blogIdentify' => 'required',
        );
        $validator = new Validator();

        if ($validator->fails($rules)) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {

            // Check if a new image is uploaded
            if ($_FILES['blogImage']['error'] === UPLOAD_ERR_OK) {
                // Upload the new image
                $uploadedFileName = uploadFile('blogImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880 /* 5 MB */);

                if ($uploadedFileName === false) {
                    // Handle file upload error
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }

                // Update the image path in the data array
                $data['blogImage'] = $uploadedFileName;
            } else {
                // If no new image is uploaded, retain the existing image path
                $blogData = $blogModel->displaySingle($blogIdentify);
                $data['blogImage'] = $blogData[0]['blogImage'];
                // p($data['campaignMedia']);

            }


            $blogModel->update($data, $blogIdentify);
            // success updated and redirect
            header("Location: /admin/blog/");
            $_SESSION['success_message'] = "Update successful!";
            exit;
        }
    }
}
