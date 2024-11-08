<style>
    .project-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
    }

    .project-row {
        position: relative;
        width: calc(25% - 20px);
        /* 25% width for each project with some spacing */
        margin-bottom: 20px;
        box-sizing: border-box;
        overflow: hidden;
    }

    .project-img {
        width: 100%;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .project-details {
        position: absolute;
        bottom: 5px;
        left: 0px;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 10px;
        box-sizing: border-box;
        transition: opacity 0.3s ease-in-out;
    }

    .project-details:hover {
        opacity: 0.9;
    }

    .flag {
        width: 30px;
        height: 20px;
        margin-right: 10px;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .project-row {
            width: calc(50% - 20px);
            /* Two projects per row on smaller screens */
        }
    }
</style>

<section class="section">
    <div class="container">
        <div class="title">
            <h1>Project ICONIC</h1>
        </div>
        <div class="navigation">
            <a href="">Home</a> / <a href="">project</a>
        </div>
    </div>
</section>
<div class="heading sub-heading">
  <h1>MIDDLE EAST
  </h1>

</div>
<div class="project-container">

 <?php foreach ($params['projects'] as $key => $project) : ?>
        <div class="project-row">
        '<img class="project-img" src="<?=ASSETS?>/img/uploads/<?=$project["projectImage"]?>" alt="Project">
        <div class="project-details">
        <img class="flag" src="https://flagsapi.com/BE/flat/64.png">
        <?= $project["projectCountryName"]?>
       </div>
        </div>
    
    <?php endforeach; ?>
</div>