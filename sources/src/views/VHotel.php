<?php

    /**
     * @access public
     * @package views
     *
     * @author Vittorio Piotti
     *
     * Class VHotel
    */

    class VHotel {


      

        
        public function viewAdminHotels($hotels) {
            ?>
            <div class="album py-5">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="hotels-list">
                        <?php foreach ($hotels as $hotel): ?>
                            <a href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=room&hotelId=<?php echo $hotel->getId();?>" class="col text-decoration-none hotel-card hotel-card-able" id="hotel-card-<?php echo $hotel->getId(); ?>">
                                <div class="card shadow border border-1 pattern-mono">
                                    <div class="card-header fs-4 custom-green">
                                        <?php echo $hotel->getName(); ?>
                                    </div>
                                    <img src="<?php echo $hotel->getImage(); ?>" alt="<?php echo $hotel->getName(); ?>">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $hotel->getDescription(); ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
        
                        <a href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=room&hotelId=newHotel" class="col text-decoration-none hotel-card hotel-card-able">
                            <div class="card shadow border border-1 pattern-mono placeholder-glow">
                                <div class="card-header fs-4 ">
                                    <span class="placeholder col-6"></span>
                                </div>
                                <div class="placeholder col-12" style="width: 100%; height: 225px; background-color: #55595c;"></div>
                                <div class="card-body">
                                    <span class="placeholder col-6"></span>
                                    <span class="placeholder w-75"></span>
                                    <span class="placeholder" style="width: 25%;"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        }
    
        


        public function viewListHotels($hotels) {
            ?>
            <script>
                    const hideDinamicItem = true;
                   
            </script>
       
            <div class="album py-5">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="hotels-list">
                        <?php foreach ($hotels as $hotel): ?>
                            <a href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=room&hotelId=<?php echo $hotel->getId();?>" class="col text-decoration-none hotel-card hotel-card-able" id="hotel-card-<?php echo $hotel->getId(); ?>">
                                <div class="card shadow border border-1 pattern-mono">
                                    <div class="card-header fs-4 custom-green">
                                        <?php echo $hotel->getName(); ?>
                                    </div>
                                    <img src="<?php echo $hotel->getImage(); ?>" alt="<?php echo $hotel->getName(); ?>">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $hotel->getDescription(); ?></p>
                                        <ul class="list-group list-group-flush mt-2">
                                            <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                                Camere totali 
                                                <span class="badge bg-primary text-light"><?php echo $hotel->getTotalRooms(); ?></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: transparent;">
                                                Camere libere oggi
                                                <span class="badge bg-primary text-light"><?php echo $hotel->getAvailability(); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        
    }
        
        
    
?>
