<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
// echo showEnvironment(get_defined_vars(), get_defined_functions());


// if (!$resultset) {
//     return;
// }
?>
<div class="flex-container">
    <div>
        <h2>
            Validera IP
        </h2>
    <!-- <?= currentUrl(); ?> -->
    <!-- <form method="post" action="<?= currentUrl() . "/validate"?>"> -->
        <form method="post">
            <input type="text" name="ip" value="<?= $ip ?? "" ?>">
            <input type="submit" value="Validera">
        </form>
    </div>
    <div>
        <h2>
            Validera IP JSON
        </h2>

        <form method="get" action="<?= currentUrl() . "JSON"?>">
        <!-- <form method="post"> -->
            <input type="text" name="ip" value="<?= $ip ?? "" ?>">




            <input type="submit" value="Validera">
        </form>
    </div>
</div>
<h2>
    Test av IP
</h2>
<p>
    Genomför validering av ip-adress 194.47.131.154 genom att trycka. WEBB presenterar svaret nedan och JSON leverera informationen i JSON-format. 
</p>
<div class="flex-container">
    <form method="post" action="<?= currentUrl()?>">
        <input type="hidden" name="ip" value="194.47.131.154">
        <input type="submit" value="WEBB">
    </form>
    <form method="get" action="<?= currentUrl() . "JSON"?>">
        <input type="hidden" name="ip" value="194.47.131.154">
        <input type="submit" value="JSON">
    </form>
</div>


