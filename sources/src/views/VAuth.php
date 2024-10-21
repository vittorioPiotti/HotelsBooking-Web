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
                <div id="form-signin-dinamic" class="p-3 card pattern-mono-js rounded border border-3 on-appear">
                    <img class="mb-2" src="https://lh3.googleusercontent.com/fife/ALs6j_Eu5dk6Dxczf1cUHtS-SDwnnL1XbNXgJ8vJfJlqOChaTxyEM3kGRMMhaeZoCelMbPKyeVOM7Wkaf1NivU1sk02_iXu_5qYDN2JmwdXjepc2zKN-e17hLZ_I80Ghalrl5UsdQbuhUVpnG5dbBpjlX2aB7f2EpM5fGJZQBL-rF0X6wrKSoIn9-DIFs-Z5hzegyyO76oOAwuTuU4BPCPVBqXPi1ZA5tiL9GTJqgQjnPEhvDIcpPEqo6A2EonS0h1UuxOmZizx_tBS4TLscaipedHWnkfTp4e_95uR71mRrE_nj5W3jCt_btUMp14PxbedVFPq83i-kJ59KQrnY8xtQlr80xtt-gxxRbihkCv2uS4HC4QJhrnv6Uqka_1T0RwDT5pyv91BgDR6zMh_bOGAwMf6Dy6Jc8KvxPa7ZUUpe6MSpdMmwSX-TnPEiWCKHohRRyh7mi5BVVo7yNMmYw3Y6DkAoE4MKM_NaYtVjGHCzn8JjL2xxjXwdRSbYmkyq4Z52_KOiBO35EiLa6KM6aKCujeSF-pir67erx23pVa2PoP_Dvj2aMcdyiViE8Y_Et3z-UKrPjgRgrmT0P0ygdRQItq3rdvnogyQ_u9x_X9EMGXIzs6O526KbR1uhFqLKdD8iS-ZDelMEauAlDRIi0iCEbS0ezpiNjOEW7kSb2bA87C7jBtuy_tIDGuKU-y-fGJBLivDsdTmIzdJjDwRAW_NeyIEJ47UCTShBHXyvwUWrdaLIC9epWon-m71u2eFbOmyRpygoOc3dsiZZmGyqchylPk6J7JfPFqWBVhCDXM7rZJW_EPAvVWoohi9W3Qcr4Cyd2uFvZ3bGD8FLfnaII_pqw7Ysf5TDGIy1f5WoH5cWqgog0wS0KCLS3a2av1Rj5uUjchD3X6l0dtxbOUJL6Q8-p9oCt9eEGLaM43MllbVpsfmxlob-S5LcgfuwlqRzYJ_3miusPPDGrDf1qaGdRBrFZuzHIPDlFB4Tzu6VAkZbOOzlVj2sHxqagfT0O6ajVK1hvbOX7Oow8GZ-AocFv_8I0cN-GOQ2s-iFvULUs5EKhqu0q_rFqocDEyMgyk-StQ5Ktg6LlBYipcMqInRUNlES95KI1RBQ9ZoX7Ds94Y-_GIQiQPR05WkMtyg8PX1alc0AQZ93ro-Exq1F9Aho6hKMrKj8Nedxb0M2WvkU0VcIiZsKJnl8HEknQzVTXPgK7dEwhsJheLlV9rrWroPbRDULyILibi1O_1NfagGq4z2qt5TNatp8pjoDGBHJvS7kSOuTCU6UcbbGRqskObnrurt7ijlg7rSsl8nd4jvhxXdOLprIrCebIndMc2RmRbK_0_rYiqqN-Z0CV-eqd_SFySI6EkAiXFNa-E5Byh7ag_yIBDoUKUe-Uq9hy90NS3wFhAIZWVTO_i9Fj3yqD44BzV-pR9IoyT9Bf3BuKPtOTQJuMTvLUa68ZArZgFrDyHGH4SBXN7D8_tRQG53WvGqCy2yk2hxtz4dbypF_R6mlUEiKMDlPl5x4icUU4NMTy7Dz1-VcAoqWhIyFyIXlAquj9aX8glPlKn2jcTYrkZQiICdUDSB5ZIrjuvKJPx_1TftxL3_s4i13wjghqm370Qt4Ag=w2880-h1626" alt="" width="72" height="72">
                    <div id="logged-title"></div>
                    <hr class="featurette-divider mb-5 mt-5">
                    <p class="mt-3 mb-3 text-body-secondary">Effettua le operazioni sul tuo profilo per la disconnessione o l'eliminazione dell'account</p>
                    <div class="row">
                        <div class="col-auto">
                            <button id="btn-elimina-profilo" class="btn btn-md btn-outline-danger" >Elimina Profilo</button>
                        </div>
                        <div class="col-auto">
                            <a id="btn-disconnetti" class="btn btn-md btn-outline-secondary" href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=auth&action=logout">Disconnetti</a>
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
            <div id="form-signin-dinamic" class="p-3 card pattern-mono-js rounded border border-3 on-appear">
                <form method="POST" onsubmit="handleRegistration()">
                    <img class="mb-4" src="https://lh3.googleusercontent.com/fife/ALs6j_Eu5dk6Dxczf1cUHtS-SDwnnL1XbNXgJ8vJfJlqOChaTxyEM3kGRMMhaeZoCelMbPKyeVOM7Wkaf1NivU1sk02_iXu_5qYDN2JmwdXjepc2zKN-e17hLZ_I80Ghalrl5UsdQbuhUVpnG5dbBpjlX2aB7f2EpM5fGJZQBL-rF0X6wrKSoIn9-DIFs-Z5hzegyyO76oOAwuTuU4BPCPVBqXPi1ZA5tiL9GTJqgQjnPEhvDIcpPEqo6A2EonS0h1UuxOmZizx_tBS4TLscaipedHWnkfTp4e_95uR71mRrE_nj5W3jCt_btUMp14PxbedVFPq83i-kJ59KQrnY8xtQlr80xtt-gxxRbihkCv2uS4HC4QJhrnv6Uqka_1T0RwDT5pyv91BgDR6zMh_bOGAwMf6Dy6Jc8KvxPa7ZUUpe6MSpdMmwSX-TnPEiWCKHohRRyh7mi5BVVo7yNMmYw3Y6DkAoE4MKM_NaYtVjGHCzn8JjL2xxjXwdRSbYmkyq4Z52_KOiBO35EiLa6KM6aKCujeSF-pir67erx23pVa2PoP_Dvj2aMcdyiViE8Y_Et3z-UKrPjgRgrmT0P0ygdRQItq3rdvnogyQ_u9x_X9EMGXIzs6O526KbR1uhFqLKdD8iS-ZDelMEauAlDRIi0iCEbS0ezpiNjOEW7kSb2bA87C7jBtuy_tIDGuKU-y-fGJBLivDsdTmIzdJjDwRAW_NeyIEJ47UCTShBHXyvwUWrdaLIC9epWon-m71u2eFbOmyRpygoOc3dsiZZmGyqchylPk6J7JfPFqWBVhCDXM7rZJW_EPAvVWoohi9W3Qcr4Cyd2uFvZ3bGD8FLfnaII_pqw7Ysf5TDGIy1f5WoH5cWqgog0wS0KCLS3a2av1Rj5uUjchD3X6l0dtxbOUJL6Q8-p9oCt9eEGLaM43MllbVpsfmxlob-S5LcgfuwlqRzYJ_3miusPPDGrDf1qaGdRBrFZuzHIPDlFB4Tzu6VAkZbOOzlVj2sHxqagfT0O6ajVK1hvbOX7Oow8GZ-AocFv_8I0cN-GOQ2s-iFvULUs5EKhqu0q_rFqocDEyMgyk-StQ5Ktg6LlBYipcMqInRUNlES95KI1RBQ9ZoX7Ds94Y-_GIQiQPR05WkMtyg8PX1alc0AQZ93ro-Exq1F9Aho6hKMrKj8Nedxb0M2WvkU0VcIiZsKJnl8HEknQzVTXPgK7dEwhsJheLlV9rrWroPbRDULyILibi1O_1NfagGq4z2qt5TNatp8pjoDGBHJvS7kSOuTCU6UcbbGRqskObnrurt7ijlg7rSsl8nd4jvhxXdOLprIrCebIndMc2RmRbK_0_rYiqqN-Z0CV-eqd_SFySI6EkAiXFNa-E5Byh7ag_yIBDoUKUe-Uq9hy90NS3wFhAIZWVTO_i9Fj3yqD44BzV-pR9IoyT9Bf3BuKPtOTQJuMTvLUa68ZArZgFrDyHGH4SBXN7D8_tRQG53WvGqCy2yk2hxtz4dbypF_R6mlUEiKMDlPl5x4icUU4NMTy7Dz1-VcAoqWhIyFyIXlAquj9aX8glPlKn2jcTYrkZQiICdUDSB5ZIrjuvKJPx_1TftxL3_s4i13wjghqm370Qt4Ag=w2880-h1626" alt="" width="72" height="72">
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
                            Hai già un account? <a href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=auth&authState=login<?php echo isset($_SESSION['sessionError']) ? '&sessionError=' . $_SESSION['sessionError'] : ''; ?>">Accedi</a>
                        <?php } else { ?>
                            Non hai un account? <a href="http://vittoriopiotti.altervista.org/GestioneHotels/Online/Client/index.php?page=auth&authState=register">Registrati</a>
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

