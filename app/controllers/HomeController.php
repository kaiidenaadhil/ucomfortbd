<?php
class HomeController extends Controller
{

    public function index()
    { 
        require_once '../app/controllers/CampaignController.php';
        require_once '../app/controllers/BlogController.php';
        require_once '../app/controllers/ProductsController.php';
        require_once '../app/controllers/NetworkController.php';
        require_once '../app/controllers/CategoriesController.php';

        $campaignController = new CampaignController();
        $networkController = new NetworkController();
        $blogController = new BlogController();
        $productController = new ProductsController();
        $CategoriesController = new CategoriesController();

        $params['sliders'] = $campaignController->getCampaign();
        $params['blog'] = $blogController->getBlog();
        $params['products'] = $productController->getProduct();
        $params['networks'] = $networkController->getNetwork();
        $params['categories'] = $CategoriesController->getCategories();
        

        $params['meta'] = [
            'title' => 'uComfortBD',
            'description' => 'Join Mornstar, an online platform dedicated to fostering goodness, unity, justice, guidance, and positivity. Make a positive impact on the world.',
            'keywords' => 'Fostering goodness, Unity and community, Justice and equity, Positive impact, Ethical choices, Empowerment, Virtuous society, Guided living, Online platform, Social change, Moral responsibility, Empowering individuals, Ethical decision-making, Positive change, Moral values, Ethical living, Social issues, Empowerment through education, Community engagement, Virtue and positivity, Online community, Ethical platform, Transformative actions, Mornstar, Goodness and evil, Ethical living, Empowerment platform, Social impact, Moral awareness, Values-driven, Ethical platform, Empowering change',
            'author' => 'Ahad Ul Amin',
            'url' => ROOT.'',
            'image' => ASSETS.'/img/site-social-share-cover.jpg'
        ];

        $this->view('index', $params);
    }
}