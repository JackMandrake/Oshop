<!--============= HEADER =============-->
  <section>
    <div class="container-fluid">

      <!-- First Table -->
      <div class="row mx-0">
        <?php foreach($categoryListFirst as $categoryFirst): ?>
        <div class="col-md-6">
          <div class="card border-0 text-white text-center">
            <img src="<?= $categoryFirst->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100 py-3">
                <h2 class="display-3 font-weight-bold mb-4">
                  <?= $categoryFirst->getName() ?>
                </h2>
                <a href="<?= $router->generate('catalog_category', ["category_id"=>$categoryFirst->getId()]) ?>" class="btn btn-light">
                  <?= $categoryFirst->getSubTitle() ?>
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

      <!-- The second one -->
      <div class="row mx-0">
        
      <?php foreach($categoryListSecond as $categorySecond): ?>
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white">
            <img src="<?=$categorySecond->getPicture() ?>"
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?=$categorySecond->getName() ?></h2>
                  <a href="<?= $router->generate('catalog_category', ["category_id"=>$categorySecond->getId()]) ?>" class="btn btn-link text-white">
                    <?=$categorySecond->getSubTitle() ?>
                    <i class="fa-arrow-right fa ml-2"></i>
                  </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
        
      </div>
    </div>
  </section>
  
  <!--============= FOOTER =============-->
