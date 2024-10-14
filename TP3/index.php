<?php
    session_start();

    if(!isset($_SESSION['login']) && !isset($_SESSION['password'])) {
        header('Location: login.php');
    }


    require_once('template_header.php');

    $currentPageId = 'accueil';
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
    $currentLangId = 'fr';
    if(isset($_GET['lang'])) {
        $currentLangId = $_GET['lang'];
    }
    $langues = array('fr' => 'en', 'en' => 'fr');
    $mymenu = array(
        // idPage titre
        'accueil' => 'Accueil' ,
        'cv' => 'CV' ,
        'projets' => 'Projets',
        'infos_techniques' => 'Infos',
        'contact' => 'Contact'
    );
    $translate = array(
        // idPage titre
        'Accueil' => 'Home Page' ,
        'CV' => 'CV' ,
        'Projets' => 'Projects',
        'Infos' => 'Infos',
        'Contact' => 'Contact',
        'fr' => 'French',
        'en' => 'English',
        'Déconnexion' => 'Disconnection'
    );
?>
        <div class="head">
            <div class="loginSpace colonne">
                <div class="login">
                    <p>
                        <?php 
                            $login = $_SESSION['login'];
                            echo $login; 
                        ?>
                    </p>
                </div>
                <div class="disconnect">
                    <a href="deconnection.php">
                        <?php 
                            $deco = 'Déconnexion';
                            if ($currentLangId == 'en'){
                                $deco = $translate[$deco];
                            }
                            echo $deco; 
                        ?>
                    </a>
                </div>
            </div>
            <div class="titre">
                <h1>
                    <?php 
                        $titre = $mymenu[$currentPageId];
                        if ($currentLangId == 'en'){
                            $titre = $translate[$titre];
                        }
                        echo $titre; 
                    ?>
                </h1>
            </div>
            <div class="langue">
                <?php
                    echo ('<a href="index.php?page='.$currentPageId.'&lang='.$langues[$currentLangId].'">'.$translate[$langues[$currentLangId]].'</a>');
                ?>
            </div>
        </div>
        <div class="conteneur-flexible ligne side">
            <div class="menu-flexible">
                <?php
                    require_once('template_menu.php');
                    renderMenuToHTML($currentPageId,$currentLangId);
                ?>
            </div>
            <section class="corps">
                <?php
                    $pageToInclude = $currentPageId . ".php";
                    if(is_readable($currentLangId."/".$pageToInclude))
                        require_once($currentLangId."/".$pageToInclude);
                    else
                        require_once("error.php");
                ?>
            </section>
        </div>
<?php
    require_once('template_footer.php');
?>