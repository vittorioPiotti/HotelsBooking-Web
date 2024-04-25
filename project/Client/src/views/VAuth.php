<?php

/**
 * @access public
 * @package views
 * @author Vittorio Piotti
 * Class VAuth
 */

class VAuth {

    private function initProperties() {
        //if (isset($_SESSION['sessionError'])){}
        ?>
        <script>
            const fixedBottom = "fixed-bottom";
            <?php
            if (isset($_SESSION['email']) && isset($_SESSION['is_admin'])) { 
                ?>
                const userEmail = "<?php echo explode('@', $_SESSION['email'])[0]; ?>";
                const userState = "<?php echo ($_SESSION['is_admin'])?'Admin':'Cliente' ?>";
                <?php 
            }
            ?>
        </script>
        <?php
    }

    public function viewAuthenticated($authState) {
        $this->initProperties();
        ?>
        <script>
            const editHotels = true;
        </script>
        <div>
            <div class="form-signin m-0 p-0" style="background-color: transparent;">
                <div id="form-signin-dinamic" class="p-3 card pattern-mono-js rounded border border-1 shadow on-appear">
                    <img class="mb-2" src="../../frontend/assets/images/logo.png" alt="" width="72" height="72">
                    <div id="logged-title"></div>
                    <hr class="featurette-divider mb-5 mt-5">
                    <p class="mt-3 mb-3 text-body-secondary">Effettua le operazioni sul tuo profilo per la disconnessione o l'eliminazione dell'account</p>
                    <div class="row">
                        <div class="col-auto">
                            <button id="btn-elimina-profilo" class="btn btn-md btn-outline-danger" >Elimina Profilo</button>
                        </div>
                        <div class="col-auto">
                            <a id="btn-disconnetti" class="btn btn-md btn-outline-secondary" href="../../index.php?page=auth&action=logout">Disconnetti</a>
                        </div>
                    </div>
                    <p class="mt-5 mb-3 text-body-secondary">© 2023–2024 Vittorio Piotti 5DSA</p>
                </div>
            </div>
        </div>
        <?php
    }
    
    public function viewAuthentication($authState) {
        $this->initProperties();
        ?>
        <div class="form-signin m-0 p-0" style="background-color: transparent;">
            <div id="form-signin-dinamic" class="p-3 card pattern-mono-js rounded border border-1 shadow on-appear">
                <form method="POST" onsubmit="handleRegistration()">
                    <img class="mb-4" src="../../frontend/assets/images/logo.png" alt="" width="72" height="72">
                    <h1 class="mb-3 fw-normal">
                        <?php if ($authState == 'register') { ?>
                            Effettua Registrazione
                        <?php } else { ?>
                            Effettua Accesso
                        <?php } ?>
                    </h1>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating position-relative">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        <div class="text-end mt-2">
                            <a href="#" id="button-password" class="text-decoration-none toggle-password" onclick="togglePassword(); "></a>
                        </div>
                    </div>
                    <div class="form-check text-start my-3">
                        <?php 
                            $checkboxId = ($authState == 'register') ? 'registerAsAdmin' : 'loginAsAdmin';
                        ?>
                        <input class="form-check-input" type="checkbox" value="admin" id="<?php echo $checkboxId; ?>" name="<?php echo $checkboxId; ?>">
                        <label class="form-check-label" for="<?php echo $checkboxId; ?>">
                        <?php if ($authState == 'register') { ?>
                            Registrati come Admin
                        <?php } else { ?>
                            Accedi come Admin
                        <?php } ?>
                        </label>
                    </div>
                    <p class="mt-3 mb-3 text-body-secondary">
                        <?php if ($authState == 'register') { ?>
                            Hai già un account? <a href="../../index.php?page=auth&authState=login<?php echo isset($_SESSION['sessionError']) ? '&sessionError=' . $_SESSION['sessionError'] : ''; ?>">Accedi</a>
                        <?php } else { ?>
                            Non hai un account? <a href="../../index.php?page=auth&authState=register">Registrati</a>
                        <?php } ?>
                    </p>
                    <button class="btn btn-primary w-100 py-2" type="submit">
                        <?php if ($authState == 'register') { ?>
                            Registrati
                        <?php } else { ?>
                            Accedi
                        <?php } ?>
                    </button>
                    <p class="mt-5 mb-3 text-body-secondary">© 2023–2024 Vittorio Piotti 5DSA</p>
                </form>
            </div>
        </div>
        <?php
    }
}
?> 


