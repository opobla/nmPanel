<?php
return array(
    'router' => array(
        'routes' => array(),
    ),
    'zf-versioning' => array(
        'uri' => array(),
    ),
    'service_manager' => array(
        'factories' => array(),
    ),
    'zf-rest' => array(),
    'zf-content-negotiation' => array(
        'controllers' => array(),
        'accept_whitelist' => array(),
        'content_type_whitelist' => array(),
    ),
    'zf-hal' => array(
        'metadata_map' => array(),
    ),
    'zf-content-validation' => array(),
    'input_filter_specs' => array(
        'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\Validator' => array(
            0 => array(
                'name' => 'start',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
        ),
    ),
);
