<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
// echo showEnvironment(get_defined_vars(), get_defined_functions());


// var_dump($geoLocation);
// echo $geoLocation;

// if (!$resultset) {
//     return;
// }
// ?>
<h2>IP Validation</h2>
<div class="flex-container">
    <div>
        <h3><?= $ip . $isValidMessage; ?>

        </h3>
    </div>
        
</div>

