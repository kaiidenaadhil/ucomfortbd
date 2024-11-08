
<?php

$blogModel = $this->model('blogModel');
$productsModel = $this->model('productsModel');
$clientsModel = $this->model('clientsModel');
$totalClientRecords = $clientsModel->countAll(null,null);
$totalProductRecords = $productsModel->countAll(null,null);
$totalBlogRecords = $blogModel->countAll(null,null);

?>
<section style="display: flex;flex-wrap: nowrap;justify-content: space-between;">
                <div class="summery-area">
                    <h1><?=$totalProductRecords?></h1>
                    <p>Total Products</p>
                    <div class="top-corner">
                    <div style="padding: 0rem 0.6rem;font-size: 1.8rem;"><i class="uil uil-shopping-bag"></i></div>
                    </div>
                </div>
                <div class="summery-area">
                    <h1><?=$totalBlogRecords?></h1>
                    <p>Total Post</p>
                    <div class="top-corner">
                        <div style="padding: 0rem 0.6rem;font-size: 1.8rem;">
                        <i class="uil uil-document-layout-left"></i>
                        </div>
                    
                    </div>
                </div>
                <div class="summery-area">
                    <h1><?=$totalClientRecords?></h1>
                    <p>Leads</p>
                    <div class="top-corner">
                        <div style="padding: 0rem 0.6rem;font-size: 1.8rem;">
                        <i class="uil uil-user-circle"></i>
                        </div>
                    
                    </div>
                </div>

            </section>






