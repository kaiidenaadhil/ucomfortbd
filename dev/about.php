<?php include_once "./components/header.php"; ?>
<section>
    <div class="container" style="padding-top:2rem;padding-bottom:2rem;">
        <h1>
            Introducing pulsePHP: The Ultimate Web-Based PHP Framework for Building Secure and Speedy Applications
        </h1>
        <p>
            Welcome to pulsePHP, a web-based PHP framework that is designed to help you create small to large business applications with ease. With pulsePHP, you can create secure and speedy applications without having to worry about dependencies.
            <br><br>
            One of the key features of pulsePHP is its use of the Model-View-Controller (MVC) pattern. This pattern separates your application into three key components, making it easier to manage and maintain your code. Additionally, pulsePHP uses PDO (PHP Data Objects), which allows you to work with databases in a more secure and efficient way.
            <br><br>
            Another great feature of pulsePHP is its browser-supported tools, which allow you to create database schemas, routers, controllers, models, and views with just a few clicks. This makes it easy for developers to get up and running quickly, without having to spend hours setting up their application.
            <br><br>
            At pulsePHP, we understand that security is a top concern for businesses. That's why we've designed our framework with security in mind. pulsePHP uses the latest security practices to protect your application from attacks and vulnerabilities.
            <br>
            Whether you're a seasoned developer or just getting started, pulsePHP is the perfect tool for building web-based applications. With its easy-to-use interface, speedy performance, and secure design, pulsePHP is the ideal choice for businesses of all sizes.
        </p>
    </div>
</section>


<section class="container" style="display: flex;align-content: flex-end;justify-content: space-evenly;align-items: center;">
    <aside>
        <h1>
            Directory Stuctures:
        </h1>
        <p>
                        The phoenixmvc directory contains two main directories: app and public. The app directory contains the core files of the application such as controllers, models, views, and core files. The public directory contains the files that are accessible to the public such as assets and the main entry point of the application.

The app directory contains three subdirectories: controllers, models, and views. The controllers directory contains all the controllers of the application. The models directory contains all the models of the application. The views directory contains all the views of the application.

The core directory contains all the core files of the application such as app, controller, database, function, language, model, pagination, request, response, router and validator.

The .htaccess file is used to configure Apache web server settings for this application.
                        </p>
    </aside>
    <aside>
        <div class="codeblock">
            <div class="codeblock-head">
                <div class="codeblock-header">
                    <div class="browser"> <span></span> </div>
                    <div class="browser-info">
                        <h6 class="btn" data-clipboard-target="#codec">Directory Stucture</h6>

                    </div>
                </div>
            </div>
            <div class="codeblock-body">
                <pre class="hljs language-html">
                    <code id="codec"  class="language-html">
                                    
phoenixmvc/
├── app/
│ ├── controllers/
│ │ ├── HomeController.php
│ │ └── ... (other controller files)
│ ├── models/
│ │ ├── User.php
│ │ └── ... (other model files)
│ ├── views/
│ │ ├── home/
│ │ │ ├── index.php
│ │ │ └── ... (other view files for the home controller)
│ │ ├── layout/
│ │ │ ├── main.php
│ │ │ └── ... (other layout files)
│ │ └── ... (other view directories)
│ ├── core/
│ │ ├── app.php
│ │ ├── controller.php
│ │ ├── database.php
│ │ ├── function.php
│ │ ├── language.php
│ │ ├── model.php
│ │ ├── pagination.php
│ │ ├── request.php
│ │ ├── response.php
│ │ ├── router.php
│ │ └── validator.php
│ ├── router.php
│ └── init.php
│ └── .env
├── public/
│ ├── assets/
│ │ ├── css/
│ │ ├── js/
│ │ └── ... (other asset files)
│ └── index.php
└── .htaccess   
                    </code>
        </pre>

            </div>
        </div>

    </aside>
</section>
<?php include_once "./components/footer.php"; ?>