<?php
    function renderMenuToHTML($currentPageId) {
        // un tableau qui d\'efinit la structure du site
        $mymenu = array(
            // idPage titre
            'index' => 'Accueil' ,
            'cv' => 'CV' ,
            'projets' => 'Projets',
            'infos_techniques' => 'Infos'
            );
        // ...
        
        echo "<nav class=\"menu\"><ul>";

        foreach($mymenu as $pageId => $pageParameters) {
            $CurrentPageString = "";
            if ($currentPageId == $pageId){
                $CurrentPageString = ' id="currentpage"';
            }
            echo ('<li><a' . $CurrentPageString . ' href="' . $pageId . '.php">' . $pageParameters . '</a></li>');
        }
        
        echo "</ul></nav>";
    }
?>