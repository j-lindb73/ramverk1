<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "IP JSON Validation.",
            "mount" => "ipJSON",
            "handler" => "\Lefty\IpValidation\IpValidationJsonController",
        ],
    ]
];
