<?php
    function renderMenuToHTML($currentPageId,$currentLangId="fr") {
        // un tableau qui d\'efinit la structure du site
        $mymenu = array(
            // idPage titre
            'accueil' => 'Accueil' ,
            'cv' => 'CV' ,
            'projets' => 'Projets',
            'infos_techniques' => 'Infos',
            'contact' => 'Contact'
            );
        // ...
        
        echo "<nav class=\"menu\"><ul>";

        foreach($mymenu as $pageId => $pageParameters) {
            $CurrentPageString = "";
            if ($currentPageId == $pageId){
                $CurrentPageString = ' id="currentpage"';
            }
            echo ('<li><a' . $CurrentPageString . ' href="index.php?page=' . $pageId . "&lang=" . $currentLangId. '">' . $pageParameters . '</a></li>');
        }
        
        echo "</ul></nav>";
    }
?>