<?php
return array(
    'router' => array(
        'routes' => array(
            'nmda-web-api.rpc.hola' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/hola[/:hola_id]',
                    'constraints' => array(
                        'hola_id' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\Hola\\Controller',
                        'action' => 'hola',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdb-uncorrected-raw' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/uncorrected/raw[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9]*',
                        'finish' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedRaw\\Controller',
                        'action' => 'nmdbUncorrectedRaw',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdb-uncorrected-group' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/uncorrected/group[/:start][/:finish][/:points]',
                    'constraints' => array(
                        'start' => '[0-9]*|all',
                        'finish' => '[0-9]*|all',
                        'points' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedGroup\\Controller',
                        'action' => 'nmdbUncorrectedGroup',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdb-corrected-raw' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/corrected/raw[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9]*',
                        'finish' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedRaw\\Controller',
                        'action' => 'nmdbCorrectedRaw',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdb-corrected-group' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/corrected/group[/:start][/:finish][/:points]',
                    'constraints' => array(
                        'start' => '[0-9]*|all',
                        'finish' => '[0-9]*|all',
                        'points' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedGroup\\Controller',
                        'action' => 'nmdbCorrectedGroup',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdb-mark-null' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/marknull',
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbMarkNull\\Controller',
                        'action' => 'nmdbMarkNull',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdadb-raw-data' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdadb/rawdata[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9]*',
                        'finish' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdadbRawData\\Controller',
                        'action' => 'nmdadbRawData',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdadb-channel-stats' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdadb/channel/stats[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9]*|default',
                        'finish' => '[0-9]*|default',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdadbChannelStats\\Controller',
                        'action' => 'nmdadbChannelStats',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdadb-channel-histogram' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdadb/channel/histogram[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9]*|default',
                        'finish' => '[0-9]*|default',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdadbChannelHistogram\\Controller',
                        'action' => 'nmdadbChannelHistogram',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdb-original-raw' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/original/raw[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9]*',
                        'finish' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbOriginalRaw\\Controller',
                        'action' => 'nmdbOriginalRaw',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdb-original-group' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/original/group[/:start][/:finish][/:points]',
                    'constraints' => array(
                        'start' => '[0-9]*|all',
                        'finish' => '[0-9]*|all',
                        'points' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbOriginalGroup\\Controller',
                        'action' => 'nmdbOriginalGroup',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdb-revised-raw' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/revised/raw[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9]*',
                        'finish' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbRevisedRaw\\Controller',
                        'action' => 'nmdbRevisedRaw',
                    ),
                ),
            ),
            'nmda-web-api.rpc.nmdb-revised-group' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/revised/group[/:start][/:finish][/:points]',
                    'constraints' => array(
                        'start' => '[0-9]*|all',
                        'finish' => '[0-9]*|all',
                        'points' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbRevisedGroup\\Controller',
                        'action' => 'nmdbRevisedGroup',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'nmda-web-api.rpc.hola',
            1 => 'nmda-web-api.rpc.nmdb-uncorrected-raw',
            2 => 'nmda-web-api.rpc.nmdb-uncorrected-group',
            3 => 'nmda-web-api.rpc.nmdb-corrected-raw',
            4 => 'nmda-web-api.rpc.nmdb-corrected-group',
            5 => 'nmda-web-api.rpc.nmdb-mark-null',
            6 => 'nmda-web-api.rpc.nmdadb-raw-data',
            7 => 'nmda-web-api.rpc.nmdadb-channel-stats',
            8 => 'nmda-web-api.rpc.nmdadb-channel-histogram',
            9 => 'nmda-web-api.rpc.nmdb-original-raw',
            10 => 'nmda-web-api.rpc.nmdb-original-group',
            11 => 'nmda-web-api.rpc.nmdb-revised-raw',
            12 => 'nmda-web-api.rpc.nmdb-revised-group',
        ),
    ),
    'service_manager' => array(
        'factories' => array(),
    ),
    'zf-rest' => array(),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'NmdaWebApi\\V1\\Rpc\\Hola\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedRaw\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedGroup\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedRaw\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedGroup\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdbMarkNull\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdadbRawData\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdadbChannelStats\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdadbChannelHistogram\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdbOriginalRaw\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdbOriginalGroup\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdbRevisedRaw\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rpc\\NmdbRevisedGroup\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'NmdaWebApi\\V1\\Rpc\\Hola\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedRaw\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedGroup\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedRaw\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedGroup\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbMarkNull\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdadbRawData\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdadbChannelStats\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdadbChannelHistogram\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbOriginalRaw\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbOriginalGroup\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbRevisedRaw\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbRevisedGroup\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ),
        ),
        'content_type_whitelist' => array(
            'NmdaWebApi\\V1\\Rpc\\Hola\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedRaw\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedGroup\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedRaw\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedGroup\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbMarkNull\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdadbRawData\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdadbChannelStats\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdadbChannelHistogram\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbOriginalRaw\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbOriginalGroup\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbRevisedRaw\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rpc\\NmdbRevisedGroup\\Controller' => array(
                0 => 'application/json',
            ),
        ),
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
    'controllers' => array(
        'factories' => array(
            'NmdaWebApi\\V1\\Rpc\\Hola\\Controller' => 'NmdaWebApi\\V1\\Rpc\\Hola\\HolaControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedRaw\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedRaw\\NmdbUncorrectedRawControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedGroup\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedGroup\\NmdbUncorrectedGroupControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedRaw\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedRaw\\NmdbCorrectedRawControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedGroup\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedGroup\\NmdbCorrectedGroupControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdbMarkNull\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbMarkNull\\NmdbMarkNullControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdadbRawData\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdadbRawData\\NmdadbRawDataControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdadbChannelStats\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdadbChannelStats\\NmdadbChannelStatsControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdadbChannelHistogram\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdadbChannelHistogram\\NmdadbChannelHistogramControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdbOriginalRaw\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbOriginalRaw\\NmdbOriginalRawControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdbOriginalGroup\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbOriginalGroup\\NmdbOriginalGroupControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdbRevisedRaw\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbRevisedRaw\\NmdbRevisedRawControllerFactory',
            'NmdaWebApi\\V1\\Rpc\\NmdbRevisedGroup\\Controller' => 'NmdaWebApi\\V1\\Rpc\\NmdbRevisedGroup\\NmdbRevisedGroupControllerFactory',
        ),
    ),
    'zf-rpc' => array(
        'NmdaWebApi\\V1\\Rpc\\Hola\\Controller' => array(
            'service_name' => 'Hola',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.hola',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedRaw\\Controller' => array(
            'service_name' => 'nmdbUncorrectedRaw',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdb-uncorrected-raw',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdbUncorrectedGroup\\Controller' => array(
            'service_name' => 'nmdbUncorrectedGroup',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdb-uncorrected-group',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedRaw\\Controller' => array(
            'service_name' => 'nmdbCorrectedRaw',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdb-corrected-raw',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdbCorrectedGroup\\Controller' => array(
            'service_name' => 'nmdbCorrectedGroup',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdb-corrected-group',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdbMarkNull\\Controller' => array(
            'service_name' => 'nmdbMarkNull',
            'http_methods' => array(
                0 => 'POST',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdb-mark-null',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdadbRawData\\Controller' => array(
            'service_name' => 'nmdadbRawData',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdadb-raw-data',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdadbChannelStats\\Controller' => array(
            'service_name' => 'nmdadbChannelStats',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdadb-channel-stats',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdadbChannelHistogram\\Controller' => array(
            'service_name' => 'nmdadbChannelHistogram',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdadb-channel-histogram',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdbOriginalRaw\\Controller' => array(
            'service_name' => 'nmdbOriginalRaw',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdb-original-raw',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdbOriginalGroup\\Controller' => array(
            'service_name' => 'nmdbOriginalGroup',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdb-original-group',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdbRevisedRaw\\Controller' => array(
            'service_name' => 'nmdbRevisedRaw',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdb-revised-raw',
        ),
        'NmdaWebApi\\V1\\Rpc\\NmdbRevisedGroup\\Controller' => array(
            'service_name' => 'nmdbRevisedGroup',
            'http_methods' => array(
                0 => 'GET',
            ),
            'route_name' => 'nmda-web-api.rpc.nmdb-revised-group',
        ),
    ),
);
