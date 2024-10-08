<?php
    require_once('template_header.php');
?>
        <div class="head">
            <div class="titre">
                <h1><pre>Projets</pre></h1>
            </div>
        </div>
        <div class="conteneur-flexible ligne side">
            <div class="menu-flexible">
                <?php
                    require_once('template_menu.php');
                ?>
            </div>
            <div class="element-flexible">
                <div class="item 1">
                    <h2><pre>   Jeu :</pre></h2>
                    <h1><pre>       Vigilant</pre></h1>
                    <div class="conteneur-flexible">
                        <img width="480" height="270" src="https://img.itch.zone/aW1hZ2UvMjQyNTE3OC8xNTIxNjczNy5wbmc=/347x500/uaH6jM.png">
                        <iframe id="myythtml5player" title="Vigilant Trailer" width="480" height="270" src="https://www.youtube.com/embed/Z6DO_anwKFg?enablejsapi=1&amp;origin=https%3A%2F%2Fdevelopers-dot-devsite-v2-prod.appspot.com&amp;widgetid=1"></iframe>
                        <p> </p>
                    </div>
                    <a href="https://deadlinechasers.itch.io/vigilant">Itch io link</a>
                </div>
                <div class="item 2">
                    <h2><pre>   IA :</pre></h2>
                    <h1><pre>       Advance Information Retrieval System</pre></h1>
                    <p><pre>                (Find song from lyrics)</pre></p>
                    <div class="conteneur-flexible">
                        <img width="480" height="270" src="https://raw.githubusercontent.com/filippo-orru/genius-lyrics-search/main/pipeline-diagram.png">
                        <p> </p>
                    </div>
                    <a href="https://github.com/filippo-orru/genius-lyrics-search">github link</a>
                </div>
            </div>
        </div>
<?php
    require_once('template_footer.php');
?>