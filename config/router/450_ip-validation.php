<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP Validation.",
            "mount" => "ip",
            "handler" => "\Anax\IpValidation\IpValidationController",
        ],
    ]
];
