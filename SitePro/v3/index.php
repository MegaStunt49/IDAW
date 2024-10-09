<?php
    require_once('template_header.php');

    $currentPageId = 'accueil';
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
    $currentLangId = 'fr';
    if(isset($_GET['lang'])) {
        $currentLangId = $_GET['lang'];
    }
    $mymenu = array(
        // idPage titre
        'accueil' => 'Accueil' ,
        'cv' => 'CV' ,
        'projets' => 'Projets',
        'infos_techniques' => 'Infos',
        'contact' => 'Contact'
        );
?>
        <div class="head">
            <div class="titre">
                <h1><?php echo $mymenu[$currentPageId] ?></h1>
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