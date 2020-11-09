<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP Validation.",
            "mount" => "ip",
            "handler" => "\Lefty\IpValidation\IpValidationController",
        ],
    ]
];
