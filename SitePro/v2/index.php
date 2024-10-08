<?php
    require_once('template_header.php');
?>
        <div class="head">
            <div class="titre">
                <h1>Index</h1>
            </div>
        </div>
        <div class="conteneur-flexible ligne side">
            <div class="menu-flexible">
                <?php
                    require_once('template_menu.php');
                    renderMenuToHTML('index');
                ?>
            </div>
            <div class="element-flexible">
                <div class="item 1">
                    <div class="conteneur-flexible">
                        <img height="620" src="https://i.pinimg.com/originals/b0/1d/df/b01ddf257d18c8a9b41e0502161d580c.gif">
                    </div>
                </div>
            </div>
        </div>
<?php
    require_once('template_footer.php');
?>