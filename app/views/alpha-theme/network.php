
    <style>
        .sales-card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 20px auto;
        }

        .sales-card {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            
        }
        .sales-card:hover{
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sales-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .sales-details {
            padding: 15px;
            box-sizing: border-box;
            color:#615757;
        }

        .location-heading {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .city,
        .store-name,
        .phone,
        .address {
            margin-bottom: 5px;
        }

        .city,
        .store-name,
        .phone,
        .address {
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            .sales-card {
                width: calc(50% - 20px);
            }
        }
        span{
            font-weight: bold;
        }
    </style>

<div style="padding-top:50px;"></div>
<div class="heading sub-heading">
  <h1>SALES NETWORK
    <span>YOUR PARTNER FOR BATH ROOM SOLUTION</span>
  </h1>
</div>
    <div class="sales-card-container">


        <?php foreach ($params['networks'] as $key => $network) : ?>
        <div class="sales-card"><img src="<?=ASSETS?>/img/uploads/<?=$network['networkImage']?>" alt="Sales Card Image">
            <div class="sales-details">
                <h2><i class="uil uil-map-marker"></i> <?=$network['networkTitle']?></h2>
                <div class="location-heading"><span>Country: </span><?=$network['networkCountry']?></div>
                <div class="city"><span>
                    City: 
                </span> <?=$network['networkCity']?></div>
                <div class="store-name"><span>Store: </span>  <?=$network['networkStore']?></div>
                <div class="phone"><span>Phone:</span> <?=$network['networkPhone']?></div>
                <div class="address"><span>Address: </span>  <?=$network['networkAddress']?></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
