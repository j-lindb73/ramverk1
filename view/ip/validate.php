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
// ?>
<fieldset>
    <legend>IP Validation</legend>

    <h3><?= $ip . $isValidMessage; ?>
<?php
if ($isValidIPv4) {
      echo " (IPv4)";
} elseif ($isValidIPv6) {
    echo " (IPv6)";
}
?>
</h3>

    <p>
        Hostname: <?= $hostname ?>


</fieldset>


