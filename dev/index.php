<?php include_once"./components/header.php"; ?>
    <section class="container" style="min-height: 520px;
    display: flex;
    margin-bottom: 3rem;">
      <div style="width:50%;">
        <div style="padding: 4rem 9rem 1rem 1rem;">
          <h1 style="font-size: 2rem;line-height: 2.7rem;font-weight: 800;"> Build Super Fast App using Core PHP MVC PDO</h1>
          <p style="    font-size: 1rem;font-weight: 100;
            line-height: 1.5rem;
            text-transform: uppercase;
            text-align: justify;">
            All you need to generate a json format Shcemea and dev system will generate MODEL , VIEW, CONTROLLER,
            DATABASE , ROUTER authomatically
          </p>
          <form action="data.php" method="POST">
            <input type="text" name="TABLE" value="orders" style="width:97%;margin:0.5rem 0.2rem;padding:0.4rem;border-radius:0.5rem;background:black;color:white;font-size:1rem;">
            <textarea name="JSON" class="textarea" style="" rows="7">
                <?php
                echo json_encode([
                  'OrderId' => 'integer|primary_key|auto_increment',
                  'OrderNumber' => 'integer|max:50',
                  'ClientName' => 'string',
                  'PersonId' => 'integer|foreign:Persons'
                ], JSON_PRETTY_PRINT);
                ?>
                
                
              </textarea>
            <button class="buttonI">try now!</button> <a href="#" class="myButton">json rules list</a>
          </form>
        </div>
      </div>
      <div style="width:50%;" class="rightPortion">
        <div class="codeblock">
          <div class="codeblock-head">
            <div class="codeblock-header">
              <div class="browser"> <span></span> </div>
              <div class="browser-info">
                <h6 class="btn" data-clipboard-target="#codem">Model</h6>
              </div>
            </div>
          </div>
          <div class="codeblock-body">
            <pre class="hljs language-php">
<code id="codem"  class="language-php">
class CareerController extends Controller{

public function index(Request $request){
    $careerModel = $this->model('careerModel');
    $data = $request->getBody();
    $validator = new Validator();
    $validator->rules([
        'careerFullname' => 'required|min:5',
        'careerEmail' => 'required|email|min:6',
        'careerCover' => 'required|min:10',
    ]);
    $validator->validate($data);
    if ($validator->fails()) {
        $errors = $validator->errors();
        foreach($errors as $error){
                echo $error."</br>";
        }
    } else {

        $careerModel->insertCareer($data);
        return $this->view('success'); // Success Page
    }

}
}
</code>
        </pre>
          </div>
        </div>
        <div class="codeblock">
          <div class="codeblock-head">
            <div class="codeblock-header">
              <div class="browser"> <span></span> </div>
              <div class="browser-info">
                <h6 class="btn" data-clipboard-target="#codec">Controller</h6>
              </div>
            </div>
          </div>
          <div class="codeblock-body">
            <pre class="hljs language-php">
<code id="codec"  class="language-php">
class App{
    
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database();

    }

    public function run(){
       echo $this->router->resolve();
    }
}
</code>
        </pre>

          </div>
        </div>
        <div class="codeblock">
          <div class="codeblock-head">
            <div class="codeblock-header">
              <div class="browser"> <span></span> </div>
              <div class="browser-info">
                <h6 class="btn" data-clipboard-target="#code">View</h6>
              </div>
            </div>
          </div>
          <div class="codeblock-body">
            <pre class="hljs language-javascript">

          <code id="code"  class="language-javascript">
$(document).ready(function() {
  const toggle = document.querySelector('.toggle');
  const menu = document.querySelector('.menu');
  toggle.addEventListener('click', function() {
    toggle.classList.toggle('active');
    if (menu.style.display === 'flex') {
      menu.style.display = 'none';
    } else {
      menu.style.display = 'flex';
    }
  });

  const toggle = document.querySelector('.toggle');
  const menu = document.querySelector('.menu');
  toggle.addEventListener('click', function() {
    toggle.classList.toggle('active');
    if (menu.style.display === 'flex') {
      menu.style.display = 'none';
    } else {
      menu.style.display = 'flex';
    }
  });
  
}); </code>
        </pre>

          </div>
        </div>
      </div>

    </section>




    <section style="width: 100%;
    background: white;
    display: block;
    clear: both;
    background-image: url(assets/actionbg.png);">
      <div class="container" style="padding: 1rem 0rem;font-weight: 800;display: flex;justify-content: space-evenly;align-items: center;">
        <h1 style="color:white;"> Do you want to download this frmework of Core PHP MVC PDO </h1>
        <button class="buttonN"> download now!</button>
      </div>
    </section>

    <section style="background:#f2f2f2;">
      <div class="container" >
        <h1 style="text-align:center;"><br> Model Schema Creation form</h1>
        <?php require_once 'form.php'; ?>
      </div>

      <div class="container" >
      <h1 style="text-align:center;">Model Schema List</h1>
        <?php require_once 'list.php'; ?>
      </div>
    </section>
    <script>
    $(document).ready(function() {
        $('.modify').click(function() {
            var targetId = $(this).data('target');
            var jsonCode = $('#' + targetId).text().trim();
            alert(jsonCode);
        });
    });
</script>


    <section style="background-color:#e9e9e9;">

      <div class="container" style="display:flex;padding: 3rem 3rem;">

        <div style="width:100%;">
          <h1 style="font-size: 2rem;
    line-height: 2.7rem;
    font-weight: 800;text-transform:uppercase;">Are you looking to build a super fast and robust application?
     </h1>
          <hr style="margin:1rem;font-weight:100;">
          <p>
          Look no further than our expert service ! We specializes in using Core PHP MVC PDO to create applications that are optimized for speed and performance.
            Our system can handle this task effortlessly, and automate the creation of models, views, controllers, databases, routers,
            and authentication processes.
            This means that your application will be up and running in no time, without any hassle.

            Whether you're a small startup or a large enterprise, our service hero can help you build an application that meets
            your unique needs that application will be optimized for speed and performance, allowing you to stay ahead of the competition.
            So why wait?


          </p><br>
          <button class="buttonI">Start now!</button><br>
        </div>
      </div>

    </section>


    <section style="    display: block;
    clear: both;
    background-color: #3b3b3c;
    background-image: url(https://trongate.io/themes/dark_neon/default/images/trondark.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    height:auto;">
      <div class="container">
        <br>
        <h1 style="color:white;text-align:center;padding:1rem;font-size:2.1rem;font-weight: 800;">
          Harnessing the Power of CorePHP for High-Performing Web App
        </h1>
        <p style="color:white;color: white;
    font-size: 1.1rem;
    line-height: 1.5rem;font-weight:100;">
          CorePHP is known for its impressive speed and is widely considered to be one of the fastest enterprise
          PHP frameworks available. However, its primary focus is not just on achieving great benchmark results,
          but also on ensuring stability. If you're looking to build a high-performing web application
          that can run online for ten years or more, CorePHP is an excellent choice.
          With its stability and performance, you can be confident that your application will operate
          efficiently throughout its lifespan.
          Let's work together to bring PHP to new heights, using CorePHP as a powerful tool in our arsenal.
        </p><br>
        <div style="display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    flex-direction: row;"><img style="width:70%;" src="https://trongate.io/images/balancing.svg" alt="Domains"></div>
        <h1 style="color:white;text-align:center;">Together, we WILL make PHP great again!</h1>
        <br>
      </div>
    </section>

    <section>
      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <p>This is a beautiful model dialog!</p>
        </div>
      </div>

    </section>

    <?php include_once"./components/footer.php"; ?>
