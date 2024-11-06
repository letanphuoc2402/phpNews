
<div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                <?php
                    global $conn;
                    $items = getItemWithFeatureView($conn);
                    foreach($items as $item)
                    {
                        echo <<<HTML
                        <div class="position-relative overflow-hidden" style="height: 300px;">
                            <img class="img-fluid h-100" src="./img/{$item['image']}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="">{$item['category_name']}</a>
                                    <a class="text-white" href=""><small>Jan 01, 2045</small></a>
                                </div>
                                <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="./detail.php/?id={$item['id']}">{$item['title']}</a>
                            </div>
                        </div>
                        HTML;
                        
                    }
                ?>
            </div>

            
        </div>
    </div>