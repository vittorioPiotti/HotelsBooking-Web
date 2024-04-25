

$(function() {

    var appContainerHotelInput = [];
    var appContainerHotelImg = [];
    var realNumRooms;
    var lifeNumRooms;    
    var indexRooms = [];
    


    var _desc = []
    var _name = []
    var _cost = []
    var _quant = []
    var _img = []


    $(document).ready(function(){

        
       
        function appendRoom(roomId, roomName, roomCost, roomDesc, roomImg,roomQuant) {
            $('#dinamic-rooms').append(`
                <div id="dinamic-room-item-${roomId}">
                    <hr class="featurette-divider">
                    <div class="row featurette on-appear" id="inner-container-input-stanza-${roomId}">
                        <div class="col-12 col-lg-6">
                            <div id="container-input-stanza-${roomId}">
                                <div class="input-group mb-3" style="max-width:330px;">
                                    <span class="input-group-text">Nome Stanza</span>
                                    <input id="input-nome-stanza-${roomId}" type="text" class="form-control" placeholder="Il nome della stanza" value="${roomName}" maxlength="20">
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea id="input-desc-stanza-${roomId}" class="form-control" style="height: 100px" maxlength="250" value="${roomDesc}">${roomDesc}</textarea>
                                    <label for="floatingTextarea2">Descrizione</label>
                                </div>
                                <div class="input-group mb-3" style="max-width:170px;">
                                    <input id="input-cost-stanza-${roomId}" type="text" class="form-control" placeholder="300" value="${roomCost}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);">
                                    <span class="mb-0 input-group-text">Costo<small class="text-body-secondary fw-light ms-2">€/gg</small></span>
                                </div>
                                <div class="input-group mb-3" style="max-width:200px;">
                                    <span class="input-group-text">Quantità Stanze</span>
                                    <input id="input-quantita-stanza-${roomId}" type="text" class="form-control" placeholder="23" value="${roomQuant}" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2);">
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger mb-3" id="delete-btn-stanza-${roomId}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"></path>
                                </svg>
                            </button>
                            <button type="button" id="input-btn-stanza-${roomId}" class="btn btn-outline-secondary ms-2 mb-3" onclick="blockInput('${roomId}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                    <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2"></path>
                                </svg>
                            </button>
                            <button id="view-btn-stanza-${roomId}" type="button" class="btn btn-outline-primary ms-2 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"></path>
                                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"></path>
                                    <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div id="container-img-stanza-${roomId}" value="">
                                <div class="input-group m-0">
                                    <span class="m-0 input-group-text border rounded rounded-bottom-0 rounded-end-0" id="inputGroup-sizing-sm">Carica URL immagine</span>
                                    <input type="url" name="url" id="input-img-stanza-${roomId}" placeholder="https://example.com" class="m-0 form-control border" pattern="https://.*" size="30" required />
                                    <button class="m-0 btn btn-secondary border-1 rounded rounded-bottom-0 rounded-start-0" type="button" id="upload-stanza-${roomId}">Carica</button>
                                </div>
                                <div id="input-placeholder-img-${roomId}">
                                    <svg class="mx-auto w-100 h-100 border border-1 rounded shadow bd-placeholder-img rounded-top-0" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <rect width="100%" height="100%" fill="#55595c"></rect>
                                    </svg>
                                </div>
                                <img id="content-img-stanza-${roomId}" class="bd-placeholder-img bd-placeholder-img-lg rounded-top-0 featurette-image img-fluid mx-auto w-100 h-100 border border-1 rounded shadow" width="500" height="500" src="<?php echo $room->getImage(); ?>">
                            </div>
                        </div>
                    </div>
                </div> 
            `);
        }
        
        
  
        async function addOnChangeContainerImg(containerImg, inputImg, contentImg, placeholderImg, inputImgUrl) {
            $(`#${placeholderImg}`).show();
            $(`#${contentImg}`).show();
            if ($(`#${contentImg}`).attr('src') !== undefined) {
                $(`#${placeholderImg}`).hide();
                $(`#${contentImg}`).hide();
                var isValidPromise = isValid($(`#${contentImg}`).attr('src'));
                if (await isValidPromise) {
                    $(`#${contentImg}`).show();
                } else {
                    $(`#${placeholderImg}`).show();
                }
            } else {
                $(`#${placeholderImg}`).show();
            }
        
            $(`#${containerImg}`).on('click', `#${inputImg}`, async function() {
                var imageURL = $(`#${inputImgUrl}`).val(); // Correzione: mancava il simbolo '#'
        
                var isValidPromise = isValid(imageURL);
                if (await isValidPromise) {
                    $(`#${contentImg}`).attr('src', imageURL);
                    $(`#${placeholderImg}`).hide();
                    $(`#${contentImg}`).show();
                } else {
                    $(`#${inputImg}`).val('');
                    $(`#${contentImg}`).attr('src', '');
        
                    mostraModalErrore("URL dell'immagine non valido.");
                    $(`#${placeholderImg}`).show();
                    $(`#${contentImg}`).hide();
                }
            });
        
            function mostraModalErrore(message) {
                $('#modal-svg').html(SVG_ERROR);
                $('#modal-title').text("Errore caricamento File");
                $('#modal-desc').text(message);
                $('#modal-feed').modal('show');
                $('#modal-btn-chiudi').removeClass("d-none");
                $('#modal-btn-conferma').addClass("d-none");
                $('#modal-btn-annulla').addClass("d-none");
                $('#modal-feed').on('hidden.bs.modal', function () {
                    $('#modal-content').removeClass('show-modal');
                });
                $('#modal-content').delay(300).queue(function(next) {
                    $(this).addClass('show-modal');
                    next();
                });
            }
        }
        



       
       

         
       


            addOnChangeBtnViewInputStanza(0,`btn-view-input-hotel`,`container-input-hotel`,`container-img-hotel`,`input-desc-hotel`,`input-nome-hotel`,`content-img-hotel`,"","btn-block-input-hotel",-1,``,`input-img-hotel`);
            realNumRooms = parseInt(numRooms, 10);
            lifeNumRooms = parseInt(numRooms, 10) ;
            addOnChangeContainerImg(`container-img-hotel`,`upload-hotel`,`content-img-hotel`,`input-placeholder-img-hotel`,'input-img-hotel')

            $("#inner-container-input-hotel").addClass('show');
            $("#append-room").addClass('show');
            for(let inputId =  0; inputId < lifeNumRooms ; inputId ++){
                indexRooms.push(inputId)
                addOnChangeContainerImg(`container-img-stanza-${inputId}`,`upload-stanza-${inputId}`,`content-img-stanza-${inputId}`,`input-placeholder-img-${inputId}`,`input-img-stanza-${inputId}`)
                addOnChangeBtnViewInputStanza(inputId + 1,`view-btn-stanza-${inputId}`,`container-input-stanza-${inputId}`,`container-img-stanza-${inputId}`,`input-desc-stanza-${inputId}`,`input-nome-stanza-${inputId}`,`content-img-stanza-${inputId}`,`input-cost-stanza-${inputId}`,`input-btn-stanza-${inputId}`,inputId,`input-quantita-stanza-${inputId}`,`input-img-stanza-${inputId}`);
                $(`#inner-container-input-stanza-${inputId}`).addClass('show');
            }
            

            
         
            

                function addOnChangeBtnViewInputStanza(index,btnView,containerInput,containerImg,inputDesc,inputNome,contentImg,inputCost,inputLock,indexRoom,inputQuant,inputImg){
                    
                    var state;
                    $(`#${btnView}`).on('click', async function() {
                      

                        if ($(this).hasClass('actived')) {
                            $(this).removeClass('actived');

                            state = true;
                        } else {
                            $(this).addClass('actived');
                            state = false;
                        }
                           $(`#${inputLock}`).prop('disabled', !state);

                        if(state){
                          
                           
                            $(this).html(SVG_EYE_OFF(24))
                            $(`#${containerInput}`).html(appContainerHotelInput[index])
                            $(`#${containerImg}`).html(appContainerHotelImg[index])
                            $(`#${inputNome}`).val(_name[index])
                            $(`#${inputDesc}`).val(_desc[index])
                            $(`#${inputImg}`).val(_img[index])
                            if (inputCost != ""){
                                $(`#${inputQuant}`).val(_quant[index])
                                $(`#${inputCosr}`).val(_cost[index])
                            }


                        }else{
                            _desc[index] = $(`#${inputDesc}`).val();
                            _name[index] = $(`#${inputNome}`).val();
                            _img[index] = $(`#${inputImg}`).val();
                  

                            _cost[index] = "";
                            if (inputCost != ""){
                                _cost[index] = $(`#${inputCost}`).val();
                                _quant[index] = $(`#${inputQuant}`).val();
                            }
                       
                            var hotelNameParts = _name[index].split(' '); // Dividi hotelName in parti separate da spazi
                            var firstPart = hotelNameParts[0]; // Prima parte del nome dell'hotel
                            var secondPart = hotelNameParts.slice(1).join(' '); // Rimuovi la prima parte e unisci il resto
                            $(this).html(SVG_EYE_ON(24))
                            appContainerHotelInput[index] = $(`#${containerInput}`).html();
                            appContainerHotelImg[index] =  $(`#${containerImg}`).html();

                            var imgInner = `<img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto w-100 h-100 border border-1 rounded shadow" width="500" height="500" src="${_img[index] }">`
                            var imgPlace = ` <div class=" placeholder-glow"><svg class="mx-auto w-100 h-100 border border-1 rounded shadow bd-placeholder-img placeholder shadow" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img"  preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"></rect></svg>         </div>                             `
                            
                            
                            if($(`#${contentImg}`).attr('src') != undefined ){
                             
                                       
                                var isValidPromise = isValid($(`#${contentImg}`).attr('src') );
                                if (await isValidPromise){
                                let app = $(`#${contentImg}`).attr('src')
                                    $(`#${containerImg}`).html(imgInner).attr('value', app);
                
                                }else{
                                    $(`#${containerImg}`).html(imgPlace).attr('value', "");

                
                                }
                            }else{
                                $(`#${containerImg}`).html(imgPlace).attr('value', "");
                
                
                            }
                            
                            
                            
                           
                            $(`#${containerInput}`).html(`
                            
            
                                    <div id="${inputNome}" value="${_name[index]}" class="mb-3"><span class="display-4 fw-normal custom-green">${firstPart}&nbsp;</span><span class="display-4 fw-normal custom-red">${secondPart}</span></div>
            
                                        <p class="lead" id="${inputDesc} value="${ _desc[index] }">${ _desc[index] }</p>
                                    </div>
                               
                             ${

                                _cost[index] == "" ? "" : `   <ul class="list-group list-group-flush mt-2 mb-3" >
                                <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color: transparent;">
                                    <span class="fs-5">Costo</span>
                                    <span class="fs-2 mb-0"><span id="${inputCost}" value="${_cost[index]}">${_cost[index]}</span><small class="text-body-secondary fw-light ms-2">€/gg</small></span>
                                    </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" style=" background-color: transparent;">
                                <span class="fs-5">Camere Totali</span>
                                <span class="badge bg-primary text-light fs-5" id="${inputQuant}" value="${_quant[index]}">${_quant[index]}</span>
                                </li>

                            </ul>`

                             }
                            
                            `)

                            

                            $(`#${inputNome}`).val(_name[index])
                            $(`#${inputDesc}`).val(_desc[index])
                            $(`#${inputImg}`).val(_img[index])
                            if (inputCost != ""){
                                $(`#${inputQuant}`).val(_quant[index])
                                $(`#${inputCosr}`).val(_cost[index])
                            }
                    
                       
                   
                            
                        }
                        state = !state;
                      
                    });
                    if(indexRoom != -1){
                    $(`#delete-btn-stanza-${indexRoom}`).on('click', function() {
                        deleteRoom(indexRoom);
                    });

                
                }
               

                    function deleteRoom(indexRoom){
                        $(`#inner-container-input-stanza-${indexRoom}`).removeClass('show');
                        $(`#dinamic-room-item-${indexRoom}`).delay(300).queue(function() {
                            $(this).remove();
                        
                            indexRooms.splice(indexRoom, 1);
                            var indexToRemove = indexRooms.indexOf(indexRoom);
    
                                if (indexToRemove !== -1) {
                                    indexRooms.splice(indexToRemove, 1);
                                }
                            lifeNumRooms--;
                        });
                       
                    }
                }

                $("#append-room").on("click", function() {
                    newRoom(); // Chiama la funzione appendRoom() quando viene cliccato l'elemento
                    
                });
                $('#delete-btn-hotel').off('click').on('click', async function() {
                    $('#modal-svg').html(SVG_EXCLA);
                    $('#modal-title').text("Eliminazione Hotel");
                    $('#modal-btn-chiudi').addClass("d-none");
                    $('#modal-btn-conferma').removeClass("d-none");
                    $('#modal-btn-annulla').removeClass("d-none");
                    $('#modal-btn-conferma').addClass("btn-danger");
                    $('#modal-btn-conferma').removeClass("btn-success");
                    $('#modal-btn-annulla').off('click').on('click', async function() {
                    });
                
                    $('#modal-btn-conferma').off('click').on('click', async function() {
                        if(hotelId != '') {deleteHotelData(hotelId)}
                     
                        window.location.href = "index.php";

                    });
                
                    $('#modal-desc').html("Confermare l'eliminazione del tuo Hotel e dei dati ad esso assoiati causando la perdita delle relative prenotazioni");
                    $('#modal-feed').modal('show');

                    $('#modal-feed').on('hidden.bs.modal', function () {
                        $('#modal-content').removeClass('show-modal');
                    });
                    $('#modal-content').delay(300).queue(function(next) {
                        $(this).addClass('show-modal');
                        next();
                    });
                });
                

                $('#annulla-btn-hotel').on('click', async function() {
                    $('#modal-svg').html(SVG_EXCLA);
                    $('#modal-title').text("Annullare Personalizzazioni");
                    $('#modal-btn-chiudi').addClass("d-none");
                    $('#modal-btn-conferma').removeClass("d-none");
                    $('#modal-btn-annulla').removeClass("d-none");
                    $('#modal-btn-conferma').removeClass("btn-danger");
                    $('#modal-btn-conferma').addClass("btn-success");

                    $('#modal-btn-annulla').off('click').on('click', async function() {

                    });
                
                    $('#modal-btn-conferma').off('click').on('click', async function() {
                        window.location.href = "index.php";
                    });


                    $('#modal-desc').text("Confermare l'annullamento delle personalizzazzioni effettuate al tuo Hotel ripristinando le configurazioni di partenza");
                    $('#modal-feed').modal('show');
                    $('#modal-feed').on('hidden.bs.modal', function () {
                        $('#modal-content').removeClass('show-modal');
                    });
                    $('#modal-content').delay(300).queue(function(next) {
                        $(this).addClass('show-modal');
                        next();
                    });
                })


           
                $('#update-btn-hotel').on('click', async function() {
                    var error = false;
                
                    if (await checkItems(`#container-input-hotel`,`#container-img-hotel`,`#input-nome-hotel`,`#input-desc-hotel`,``,`#content-img-hotel`, 0,``)) {
                        error = true;
                    } else {
                        
                        let app = [];
                        for (let i = 0; i < lifeNumRooms; i ++){
                            app.push($(`#input-nome-stanza-${indexRooms[i]}`).val());
                            
                        }
                        let seen = {};
                        let isUnique = true;
                        
                        for (let i = 0; i < app.length; i++) {
                            if (seen[app[i]]) {
                                // Se il valore è già stato visto, non è unico
                                isUnique = false;
                                break;
                            } else {
                                // Segna il valore come visto
                                seen[app[i]] = true;
                            }
                        }
                        
                        if (isUnique) {
                            for (let i = 0; i < lifeNumRooms; i++) {
                                if (await checkItems(`#container-input-stanza-${indexRooms[i]}`, `#container-img-stanza-${indexRooms[i]}`, `#input-nome-stanza-${indexRooms[i]}`, `#input-desc-stanza-${indexRooms[i]}`, `#input-cost-stanza-${indexRooms[i]}`, `#content-img-stanza-${indexRooms[i]}`, indexRooms[i] + 1, `#input-quantita-stanza-${indexRooms[i]}`)) {
                                    error = true;
                                    break;
                                }
                            }             
                        } else {
                                $('#modal-svg').html(SVG_ERROR);
                                $('#modal-title').text("Errore inserimento Nomi Stanze");
                                $('#modal-desc').text("Assicurati di caricare i Nomi delle Stanze in modo che non ci siano duplicati");
                                $('#modal-btn-chiudi').removeClass("d-none");
                                $('#modal-btn-conferma').addClass("d-none");
                                $('#modal-btn-annulla').addClass("d-none");
                                $('#modal-feed').modal('show');
                                $('#modal-feed').on('hidden.bs.modal', function () {
                                    $('#modal-content').removeClass('show-modal');
                                });
                                $('#modal-content').delay(300).queue(function(next) {
                                    $(this).addClass('show-modal');
                                    next();
                                });
                                error = true;
                        }
                        
                        
                     
                    }
                
                    //invia api richiesta insert into 
                   
                    if(!error){
                        $('#modal-svg').html(SVG_CHECK);
                        $('#modal-title').text("Personalizazzioni in Pubblicazione");
                        $('#modal-btn-chiudi').addClass("d-none");
                        $('#modal-btn-conferma').removeClass("d-none");
                        $('#modal-btn-annulla').removeClass("d-none");
                        $('#modal-btn-conferma').removeClass("btn-danger");
                        $('#modal-btn-conferma').addClass("btn-success");

                        $('#modal-btn-annulla').off('click').on('click', async function() {

                        });
                    
                        $('#modal-btn-conferma').off('click').on('click', async function() {

                            let rooms = setRooms();
                            let hotel = setHotel();
                          
                            updateHotelData(rooms, hotel)
                            window.location.href = "index.php";

                  
                        });


                        $('#modal-desc').text("Confermare le personalizzazzioni effettuate al tuo Hotel");
                        $('#modal-feed').modal('show');
                        $('#modal-feed').on('hidden.bs.modal', function () {
                            $('#modal-content').removeClass('show-modal');
                        });
                        $('#modal-content').delay(300).queue(function(next) {
                            $(this).addClass('show-modal');
                            next();
                        });
                    }

                    
                });
                
                
                function newRoom() {
                    realNumRooms++;
                    lifeNumRooms++;
                    indexRooms.push(realNumRooms)
                    appendRoom(realNumRooms,'Nome Stanza',330,"Descrizione","",5);
                    addOnChangeContainerImg(`container-img-stanza-${realNumRooms}`,`upload-stanza-${realNumRooms}`,`content-img-stanza-${realNumRooms}`,`input-placeholder-img-${realNumRooms}`,`input-img-stanza-${realNumRooms}`)

                    addOnChangeBtnViewInputStanza(realNumRooms+1,`view-btn-stanza-${realNumRooms}`,`container-input-stanza-${realNumRooms}`,`container-img-stanza-${realNumRooms}`,`input-desc-stanza-${realNumRooms}`,`input-nome-stanza-${realNumRooms}`,`content-img-stanza-${realNumRooms}`,`input-cost-stanza-${realNumRooms}`,`input-btn-stanza-${realNumRooms}`,realNumRooms,`input-quantita-stanza-${realNumRooms}`,`input-img-stanza-${realNumRooms}`);
                    $(`#inner-container-input-stanza-${realNumRooms}`).addClass('show');

                
                
                }
    
                function setHotel() {
                    
                    let name = $('#input-nome-hotel').val();
                    let description = $('#input-desc-hotel').val();
                    let image = $('#input-img-hotel').val();
                
                    return new Hotel(hotelId, name, image, description,adminId);
                }
                

                function setRooms() {
                    let rooms = [];
                    for (let i = 0; i < indexRooms.length; i++) {
                        let name = $(`#input-nome-stanza-${indexRooms[i]}`).val();
                        let image = $(`#input-img-stanza-${indexRooms[i]}`).val();
                        let description = $(`#input-desc-stanza-${indexRooms[i]}`).val();
                        let cost = $(`#input-cost-stanza-${indexRooms[i]}`).val();
                        let totalRooms = $(`#input-quantita-stanza-${indexRooms[i]}`).val();
                        rooms.push(new Room( name, image, description, cost, totalRooms));
                    }
                    return rooms;
                }
                

                async function checkItems(containerItem,containerImg,inputNome,inputDesc,inputCost,inputImg,index,inputQuant){

                    var appInput = ""; 
                    var appImg = ""; 

                    if(lifeNumRooms == 0){
                        $('#modal-svg').html(SVG_ERROR);
                        $('#modal-title').text("Errore inserimento valori");
                        $('#modal-desc').text("Assicurati di caricare almeno una stanza per il tuo Hotel");
                        $('#modal-btn-chiudi').removeClass("d-none");
                        $('#modal-btn-conferma').addClass("d-none");
                        $('#modal-btn-annulla').addClass("d-none");
                        $('#modal-feed').modal('show');
                        $('#modal-feed').on('hidden.bs.modal', function () {
                            $('#modal-content').removeClass('show-modal');
                        });
                        $('#modal-content').delay(300).queue(function(next) {
                            $(this).addClass('show-modal');
                            next();
                        });
                        return true
                    }
                    if(appContainerHotelInput[index] != undefined || appContainerHotelImg[index] != undefined){
                        appInput = $(containerItem).html(); 
                        appImg = $(containerImg).html();
                        $(containerItem).html(appContainerHotelInput[index])
                        $(containerImg).html(appContainerHotelImg[index])
                    }
                    
                    var name = $(inputNome).val();
                    var desc = $(inputDesc).val();
                    var cost = inputCost == '' ? '' : $(inputCost).val();
                    var quant = inputQuant == '' ? '' : $(inputQuant).val();
                    var image = $(inputImg).attr('src');

                    var isValidPromise = isValid(image);
               
                    if (name === "" ||  desc === "" || (inputCost != '' && cost === "" )  || (inputQuant != '' && quant === "")|| !await isValidPromise ) {
                        
                        $('#modal-svg').html(SVG_ERROR);
                        $('#modal-title').text("Errore inserimento valori");
                        $('#modal-desc').text("Assicurati che non ci siano campi vuoti o non correttamente valorizzati");
                        $('#modal-btn-chiudi').removeClass("d-none");
                        $('#modal-btn-conferma').addClass("d-none");
                        $('#modal-btn-annulla').addClass("d-none");
                        $('#modal-feed').modal('show');
                        $('#modal-feed').on('hidden.bs.modal', function () {
                            $('#modal-content').removeClass('show-modal');
                        });
                        $('#modal-content').delay(300).queue(function(next) {
                            $(this).addClass('show-modal');
                            next();
                        });
                        if(appContainerHotelInput[index] != undefined || appContainerHotelImg[index] != undefined){
               
                            $(containerItem).html(appInput)
                            $(containerImg).html(appImg)
                        }
                        return true;
         
                    }
                    if(appContainerHotelInput[index] != undefined || appContainerHotelImg[index] != undefined){
               
                        $(containerItem).html(appInput)
                        $(containerImg).html(appImg)
                    }

                    return false;

                }
            
     
    });
     
    
});





function toggleInputLock(nomeBtn,nomeInput, descInput,imgInput,costInput){
    var nomeDisabled = $(`#${nomeInput}`).is(':disabled');
    var descDisabled = $(`#${descInput}`).is(':disabled');
    var imgDisabled = $(`#${imgInput}`).is(':disabled');
  

    if (nomeDisabled && descDisabled && imgDisabled) {
        $(`#${nomeBtn}`).html(SVG_UNLOCK)
    } else {
        $(`#${nomeBtn}`).html(SVG_LOCK)
    }
    
    // Se l'attributo è presente, inverti il suo stato
    $(`#${nomeInput}`).prop('disabled', !nomeDisabled);
    $(`#${descInput}`).prop('disabled', !descDisabled);
    $(`#${imgInput}`).prop('disabled', !imgDisabled);
    if(costInput!= ''){
        var costDisabled = $(`#${costInput}`).is(':disabled');
        $(`#${costInput}`).prop('disabled', !costDisabled);
    }
}




function blockInput(inputId){
    toggleInputLock(`input-btn-stanza-${inputId}`,`input-nome-stanza-${inputId}`,`input-desc-stanza-${inputId}`,`input-img-stanza-${inputId}`,`input-cost-stanza-${inputId}`);


}

async function verificaURL(url) {
    return new Promise(function(resolve) {
        var img = new Image();
        img.onload = function() {
            resolve(true);
        };
        img.onerror = function() {
            resolve(false);
        };
        img.src = url;
    });
}

async function isValid(url) {
    return await verificaURL(url);
}


