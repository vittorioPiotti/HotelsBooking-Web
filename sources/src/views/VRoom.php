<?php
   /**
     * @access public
     * @package views
     *
     * @author Vittorio Piotti
     *
     * Class VRoom
    */



    class VRoom {


        private function initProperties( $hotel) {
            ?>
                <script>
                    const stateRoom = false;
                    const hotelName = "<?php echo $hotel->getName(); ?>";
                    const hotelId = "<?php echo $hotel->getId(); ?>";
                </script>
            <?php
        }



        public function viewEditRoom($rooms, $hotel) {  
            $this->initProperties($hotel);
            ?>
           
            <script>
                const numRooms = "<?php echo count($rooms); ?>";
                const adminId = "<?php echo $_SESSION['user_id']; ?>";
            </script>
            <div class="container marketing mb-5 mt-5">
                <p class="fs-1 mb-5 "><span>Benvenuto</span> <span class="custom-green fw-bold "><?php echo explode('@', $_SESSION['email'])[0]; ?> </span></p>
                <p class="fs-5 font-monospace fw-light ">Personalizza i dati sul tuo Hotel e quelli sulle Stanze   </p>
                <hr class="featurette-divider">
                <div id="inner-container-input-hotel"class="row featurette on-appear" >
                    <div class="col-12 col-lg-6 ">
                        <div id="container-input-hotel" >
                            <div class="input-group mb-3" style="max-width:330px;">
                                <span class="input-group-text">Nome Hotel</span>
                                <input id="input-nome-hotel" type="text" class="form-control" placeholder="Il nome del tuo Hotel" value="<?php echo $hotel->getName() ?$hotel->getName() : "Nome Hotel" ; ?>" maxlength="20">
                            </div>
                        <div class="form-floating mb-3 ">
                            <textarea id="input-desc-hotel" class="form-control"  id="floatingTextarea2" style="height: 100px"  maxlength="250"><?php echo $hotel->getDescription() ? $hotel->getDescription() : "Descrizione"; ?></textarea>
                            <label for="floatingTextarea2" >Descrizione</label>
                        </div>
                    </div>
                    <button id="btn-block-input-hotel"type="button" class="btn btn-outline-secondary  ms-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                            <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2"/>
                        </svg>
                    </button>
                    <button id="btn-view-input-hotel"type="button" class="btn btn-outline-primary  ms-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                            <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                            <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                            <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                        </svg>
                    </button>
                </div>
            <div class="col-12 col-lg-6">
                <div id="container-img-hotel">
                    <div class="input-group m-0">
                        <span class="m-0 input-group-text border rounded rounded-bottom-0 rounded-end-0" id="inputGroup-sizing-sm">Carica URL immagine</span>
                        <input type="url" name="url" id="input-img-hotel" placeholder="https://example.com" value="<?php echo $hotel->getImage(); ?>"  class="m-0 form-control border   " pattern="https://.*" size="30" required />
                        <button class="m-0 btn btn-secondary border-1 rounded rounded-bottom-0 rounded-start-0" type="button" id="upload-hotel" >Carica</button>
                    </div>
                    <div id="input-placeholder-img-hotel">
                        <svg class="mx-auto w-100 h-100 border border-1 rounded  bd-placeholder-img  rounded-top-0" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img"  preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#55595c"></rect>
                        </svg>                              
                    </div>
                    <img id="content-img-hotel" class="bd-placeholder-img bd-placeholder-img-lg rounded-top-0 featurette-image img-fluid mx-auto w-100 h-100 border border-1 rounded shadow" width="500" height="500" src="<?php echo $hotel->getImage(); ?>">  
                </div>
            </div>
        </div>
        <div id="dinamic-rooms">
        <?php foreach ($rooms as $i => $room): ?>
            <div id="dinamic-room-item-<?php echo $i;?>">
                <hr class="featurette-divider">
                    <div class="row featurette on-appear" id="inner-container-input-stanza-<?php echo $i;?>">
                        <div class="col-12 col-lg-6 <?php echo (($i + 1) % 2 !== 0 ? ' order-lg-2' : ''); ?>">
                            <div id="container-input-stanza-<?php echo $i;?>">
                                <div class="input-group mb-3" style="max-width:330px;">
                                <span class="input-group-text">Nome Stanza</span>
                                <input id="input-nome-stanza-<?php echo $i;?>"type="text" class="form-control" placeholder="Il nome della stanza" value="<?php echo $room->getName() ?$room->getName() : "Nome Stanza"; ?>"  maxlength="20">
                            </div>
                        <div class="form-floating mb-3">
                            <textarea id="input-desc-stanza-<?php echo $i;?>" class="form-control"  id="floatingTextarea2" style="height: 100px" maxlength="250"><?php echo $room->getDescription() ? $room->getDescription() : "Descrizione"; ?></textarea>
                            <label for="floatingTextarea2" >Descrizione</label>
                        </div>
                        <div class="input-group mb-3" style="max-width:170px;">
                            <input id="input-cost-stanza-<?php echo $i;?>" type="text" class="form-control" placeholder="300" value="<?php echo $room->getCost() ? $room->getCost() : 150 ; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);">
                            <span class="mb-0 input-group-text">Costo<small class="text-body-secondary fw-light ms-2">€/gg</small></span>

                        </div>
                            <div class="input-group mb-3" style="max-width:200px;">
                                <span class="input-group-text">Quantità Stanze</span>
                                <input id="input-quantita-stanza-<?php echo $i;?>"type="text" class="form-control" placeholder="23" value="<?php echo $room->getTotalRooms() ? $room->getTotalRooms() : 23 ; ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2);">
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger mb-3" id="delete-btn-stanza-<?php echo $i;?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </button>
                        <button type="button" id="input-btn-stanza-<?php echo $i;?>" class="btn btn-outline-secondary  ms-2 mb-3" onclick="blockInput('<?php echo $i;?>')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2"/>
                            </svg>
                        </button>
                        <button id="view-btn-stanza-<?php echo $i;?>"type="button" class="btn btn-outline-primary  ms-2 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                            </svg>
                        </button>
                    </div>
                    <div class="col-12 col-lg-6 <?php echo (($i + 1) % 2 !== 0 ? ' order-lg-1' : ''); ?>">
                        <div id="container-img-stanza-<?php echo $i;?>">
                            <div class="input-group m-0">
                                <span class="m-0 input-group-text border rounded rounded-bottom-0 rounded-end-0" id="inputGroup-sizing-sm">Carica URL immagine</span>
                                <input type="url" name="url" id="input-img-stanza-<?php echo $i;?>" placeholder="https://example.com"value="<?php echo $room->getImage(); ?>"  class="m-0 form-control border   " pattern="https://.*" size="30" required />
                                <button class="m-0 btn btn-secondary border-1 rounded rounded-bottom-0 rounded-start-0" type="button" id="upload-stanza-<?php echo $i;?>" >Carica</button>
                            </div>
                            <div id="input-placeholder-img-<?php echo $i;?>"><svg class="mx-auto w-100 h-100 border border-1 rounded  bd-placeholder-img  rounded-top-0" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img"  preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"></rect></svg>                                 
                            </div>
                            <img id="content-img-stanza-<?php echo $i;?>" class="bd-placeholder-img bd-placeholder-img-lg rounded-top-0 featurette-image img-fluid mx-auto w-100 h-100 border border-1 rounded shadow" width="500" height="500" src="<?php echo $room->getImage(); ?>">  
                        </div>    
                    </div>  
                </div>  
            </div>
            <?php endforeach; ?>
        </div>
        <?php
            $i = $i+1;
        ?>
        <hr class="featurette-divider">
        <div class="row featurette skeleton on-appear hotel-card-able" id="append-room">
            <div class="col-12 col-lg-6  <?php echo (($i + 1) % 2 !== 0 ? ' order-lg-2' : ''); ?>">
                <h5 class="card-title placeholder-glow ">
                    <span class="fs-2 placeholder col-6"></span>
                </h5>
                <p class="mt-3 fs-4 card-text placeholder-glow">
                    <span class="placeholder col-7"></span>
                    <span class="placeholder col-4"></span>
                    <span class="placeholder col-4"></span>
                    <span class="placeholder col-6"></span>
                    <span class="placeholder col-8"></span>
                </p>
                <h5 class="card-title placeholder-glow mb-4">
                    <span class="fs-2 placeholder col-3"></span>
                </h5>
                <p class="placeholder-glow">
                    <a href="#" tabindex="-1 " class="btn me-2 btn-danger disabled placeholder col-1"></a>
                    <a href="#" tabindex="-1 " class="btn me-2 btn-secondary disabled placeholder col-1"></a>
                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-1"></a>
                </p>
            </div>
                <div class="col-12 col-lg-6 placeholder-glow<?php echo (($i + 1) % 2 !== 0 ? ' order-lg-1' : ''); ?>">
                <a href="#" tabindex="-1" class=" mx-auto w-100 h-100  btn btn-secondary disabled placeholder col-12"></a>
                </div> 
            </div>
            <hr class="featurette-divider">
            <p class="fs-1 ">Termina operazione di modifica</p>
            <p class="fs-5 font-monospace fw-light ">Le modifiche apportate saranno irreversibili</p>
            <button class="btn btn-lg btn-outline-danger mb-5" id="delete-btn-hotel">Elimina</button>
            <button class="btn btn-lg btn-outline-success ms-3 mb-5" id="update-btn-hotel">Aggiorna</button>
            <button class="btn btn-lg btn-outline-secondary ms-3 mb-5" id="annulla-btn-hotel">Annulla</button>
        </div>
        <?php
    }


    public function viewListRoom($rooms, $hotel) {
        $this->initProperties($hotel);
        ?>
            <div class="container marketing mb-5 mt-5">

                <div class="row featurette">
                    <div class="col-lg-6">
                        <div id="hotel-name" class="mb-3"></div>
                            <p class="lead"><?php echo $hotel->getDescription(); ?></p>
                        </div>


                        <div class="col-12 col-lg-6  d-flex justify-content-center align-items-center p-0">
<div style="width:95%" class="position-relative">   
<img class="mx-auto border border-3 rounded" src="<?php echo $hotel->getImage(); ?>" alt="Image" style="width:100%;height:100%;">
    <div class="m-auto position-absolute bottom-0 start-0 end-0 bg-white rounded-bottom border border-3">
    <ul class="list-group list-group-flush " >
                            <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color: transparent;">
                                Camere totali 
                                <span class="badge bg-primary text-light"><?php echo $hotel->getTotalRooms(); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color: transparent;">
                                Camere disponibili oggi
                                <span class="badge bg-primary text-light"><?php echo $hotel->getAvailability(); ?></span>
                            </li>
                        </ul>
    </div>
    </div>
    </div>



                        
                 





                    </div>
                </div>
                <div id="myCarousel" class="carousel slide mb-0 " data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php
                            foreach ($rooms as $key => $room) {
                        ?>
                        <button type="button" data-bs-target="#hotel-carousel" data-bs-slide-to="<?php echo $key; ?>" <?php echo ($key === 0 ? 'class="active" aria-current="true"' : ''); ?> aria-label="Slide <?php echo ($key + 1); ?>"></button>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="carousel-inner">
                        <?php
                            foreach ($rooms as $key => $room) {
                        ?>
                        <div class="carousel-item <?php echo ($key === 0 ? 'active' : ''); ?>">
                            <div class="bg-secondary carousel-bg carousel-overlay-bg"></div>
                                <div class="carousel-bg  carousel-underlay-bg" style="background: url('<?php echo $room->getImage(); ?>') no-repeat center;">
                                    <div class="carousel-caption">
                                        <h1><?php echo $room->getName(); ?></h1>
                                        <p><?php echo $room->getDescription(); ?></p>
                                        <p><a class="btn btn-lg btn-primary" href="#stanza-<?php echo ($key);?>">Dettagli</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <nav class=" sticky-top bg-light border-bottom ">
                    <div class="row">
                        <div class="col-6">
                            <p class=" fs-1 p-2 ms-2 mb-0 mt-0 pb-0 d-inline-block custom-red" href="#">
                            Prenota
                            </p>
                        </div>
                        <div class="col-6 text-end" >
                            <div id="hotel-name-booking"class="p-2 me-2 mt-1" >
                            </div>
                        </div>
                    </div>
                    <div class="navbar navbar-expand-lg pt-0  ">
                        <div class="container-fluid mb-2 mb-lg-0 ">
                            <a class="navbar-brand" >
                                <select id="selectRoom" class="form-select form-select-lg custom-green" aria-label=".form-select-lg example" style="width:250px" >
                                    <?php foreach ($rooms as $i => $room): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $room->getName(); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </a>
                            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"  aria-controls="navbarScroll" aria-expanded="false"  aria-label="Toggle navigation"  >
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div  class="navbar-collapse collapse" id="navbarScroll">
                                <ul class=" col-8 navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll m-0 p-0" style="--bs-scroll-height: 420px"> 
                                    <div class="row mt-4" style="max-width:230px">
                                        <li class="nav-item m-0 p-0 ms-3 p-1">
                                            <div class="input-group input-group-md" style="width:200px">
                                                <span class="input-group-text">Da</span>
                                                <input type="date" id="start-date" class="border rborder-1 rounded rounded-start-0 bg-light" name="start-date" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </li>
                                    </div>
                                    <div class="row mt-4" style="max-width:230px">
                                        <li class="nav-item m-0 p-0 ms-3 p-1">
                                            <div class="input-group input-group-md" style="width:200px">
                                                <span class="input-group-text">A</span>
                                                <input type="date" id="end-date" name="end-date" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" class="border rborder-1 rounded rounded-start-0 bg-light">
                                            </div>
                                        </li>
                                    </div>
                                    <div class="row "  >
                                        <ul class="list-group list-group-flush p-1 ms-3 "style="max-width:200px;">
                                            <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color: transparent;">
                                                Costo
                                                <span class="fs-5 mb-0" id="cost-pre-booking"><?php echo $room->getCost(); ?><small class="text-body-secondary fw-light ms-2">€/gg</small></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color: transparent;">
                                                Disponibili
                                                <span id="availability-pre-booking" class="badge bg-primary text-light"><?php echo $room->getAvailability(); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </ul>
                           <a id="btn-prenota-stanza" class="btn fs-5 btn-outline-success mb-2 mt-2" onclick="preCheckout('<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>')">Checkout</a>

                            </div>
                        </div>
                    </div>
                </nav>     
                <div class="container marketing" >
                    <div class="pricing-container m-auto">
                        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                            <h1 class="display-4 fw-normal custom-red mt-5 mb-5">Listino</h1>
                            <p class="lead text-body-secondary fs-4 mt-5">Esplora facilmente le opzioni di camere disponibili e scegli con la nostra selezione di tariffe per le camere, puoi trovare rapidamente la soluzione di alloggio che si adatta alle tue esigenze e al tuo budget. </p>
                         <?php
    if (!session_id()) {
        session_start();
    }

    if(!isset($_SESSION['email']) || empty($_SESSION['email'])) {
        echo '<a href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=auth&authState=login" class="btn btn-lg btn-primary mt-4 mb-5" type="submit">Autenticati</a>';
    }
?>
                 </div>
                        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center mt-5">
                            <?php foreach ($rooms as $i => $room): ?>
                                <div class="col">
                                <div class="card mb-4 rounded-3 shadow">
                                        <div class="card-header py-3">
                                            <h4 class="my-0 fw-normal custom-green"><?php echo $room->getName(); ?></h4>
                                        </div>
                                        <a class="card-body text-decoration-none" href="#stanza-<?php echo ($i);?>">
                                            <h1 class="card-title pricing-card-title "><?php echo $room->getCost(); ?><small class="text-body-secondary fw-light ">€/gg</small></h1>
                                            <p><?php echo rtrim(substr($room->getDescription(), 0, strrpos(substr($room->getDescription(), 0, 50), ' '))) . '...'; ?></p>
                                                <ul class="list-group list-group-flush mt-2" >
                                                    <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color: transparent;">
                                                        Camere totali
                                                        <span class="badge bg-primary text-light"><?php echo $room->getTotalRooms(); ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color: transparent;">
                                                        Camere libere oggi
                                                        <span class="badge bg-primary text-light"><?php echo $room->getAvailability(); ?></span>
                                                    </li>
                                                </ul>
                            </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php foreach ($rooms as $i => $room): ?>
                        <hr class="featurette-divider">
                        <div class="row featurette" id="stanza-<?php echo ($i);?>">
                            <div class="col-12 col-lg-6 <?php echo ($i % 2 !== 0 ? ' order-lg-2' : ''); ?>">
                                <h2 class="featurette-heading custom-green featurette-heading-stanza fw-normal lh-1"><?php echo $room->getName(); ?></h2>
                                <p class="lead"><?php echo $room->getDescription(); ?></p>
                                <p class="d-flex align-items-center">
                                    <span class="btn btn-lg btn-primary me-3" onclick="selezionaStanza('<?php echo $i; ?>')">Seleziona</span>
                                    <span class="fs-2 mb-0"><?php echo $room->getCost(); ?><small class="text-body-secondary fw-light ms-2">€/gg</small></span>
                                </p>     
                            </div>
                            <div class="col-12 col-lg-6  d-flex justify-content-center align-items-center p-0">
<div style="width:95%" class="position-relative">   
<img class="mx-auto border border-3 rounded" src="<?php echo $room->getImage(); ?>" alt="Image" style="width:100%;height:100%;">
    <div class="m-auto position-absolute bottom-0 start-0 end-0 bg-white rounded-bottom border border-3">
    <ul class="list-group list-group-flush " >
                            <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color: transparent;">
                                Camere totali 
                                <span class="badge bg-primary text-light"><?php echo $room->getTotalRooms(); ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color: transparent;">
                                Camere disponibili oggi
                                <span class="badge bg-primary text-light"><?php echo $room->getAvailability(); ?></span>
                            </li>
                        </ul>
    </div>
    </div>
    </div>

                        </div>
                      
                    <?php endforeach; ?>
                </div>
            <?php
        }
    
      
    
   
    }
    
    
    




    
  
?>