<?php
    function renderMenuToHTML($currentPageId,$currentLangId) {
        // un tableau qui d\'efinit la structure du site
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
            'Accueil' => 'Home' ,
            'CV' => 'CV' ,
            'Projets' => 'Projects',
            'Infos' => 'Infos',
            'Contact' => 'Contact',
            'fr' => 'French',
            'en' => 'English'
        );
        // ...
        
        echo "<nav class=\"menu\"><ul>";

        foreach($mymenu as $pageId => $pageParameters) {
            $CurrentPageString = "";
            if ($currentPageId == $pageId){
                $CurrentPageString = ' id="currentpage"';
            }
            $titre = $pageParameters;
            if ($currentLangId == 'en'){
                $titre = $translate[$pageParameters];
            }
            echo ('<li><a' . $CurrentPageString . ' href="index.php?page=' . $pageId . "&lang=" . $currentLangId. '">' . $titre . '</a></li>');
        }
        
        echo "</ul></nav>";
    }
?>