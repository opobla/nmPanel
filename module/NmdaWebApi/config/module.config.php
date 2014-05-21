<?php
return array(
    'router' => array(
        'routes' => array(
            'nmda-web-api.rest.hola' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/hola[/:hola_id]',
                    'constraints' => array(
                        'hola_id' => '[a-zA-Z][a-zA-Z0-9%+:_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rest\\Hola\\Controller',
                    ),
                ),
            ),
            'nmda-web-api.rest.nmdadb-raw-data' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdadb/rawdata[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9][0-9]*',
                        'finish' => '[0-9][0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\Controller',
                    ),
                ),
            ),
            'nmda-web-api.rest.nmdb-uncorrected-raw' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/uncorrected/raw[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9][0-9]*',
                        'finish' => '[0-9][0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\Controller',
                    ),
                ),
            ),
            'nmda-web-api.rest.nmdb-uncorrected-group' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/uncorrected/group[/:start][/:finish][/:points]',
                    'constraints' => array(
                        'start' => '[0-9]*|all',
                        'finish' => '[0-9]*|all',
                        'points' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\Controller',
                    ),
                ),
            ),
            'nmda-web-api.rest.nmdb-corrected-raw' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/corrected/raw[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9][0-9]*',
                        'finish' => '[0-9][0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\Controller',
                    ),
                ),
            ),
            'nmda-web-api.rest.nmdb-corrected-group' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/corrected/group[/:start][/:finish][/:points]',
                    'constraints' => array(
                        'start' => '[0-9]*|all',
                        'finish' => '[0-9]*|all',
                        'points' => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'nmda-web-api.rest.hola',
            1 => 'nmda-web-api.rest.nmdadb-raw-data',
            2 => 'nmda-web-api.rest.nmdb-uncorrected-raw',
            3 => 'nmda-web-api.rest.nmdb-uncorrected-group',
            4 => 'nmda-web-api.rest.nmdb-corrected-raw',
            5 => 'nmda-web-api.rest.nmdb-corrected-group',
        ),
    ),
    'service_manager' => array(
        'factories' => array(),
    ),
    'zf-rest' => array(
        'NmdaWebApi\\V1\\Rest\\Hola\\Controller' => array(
            'listener' => 'NmdaWebApi\\V1\\Rest\\Hola\\HolaResource',
            'route_name' => 'nmda-web-api.rest.hola',
            'route_identifier_name' => 'hola_id',
            'collection_name' => 'hola',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NmdaWebApi\\V1\\Rest\\Hola\\HolaEntity',
            'collection_class' => 'NmdaWebApi\\V1\\Rest\\Hola\\HolaCollection',
            'service_name' => 'hola',
        ),
        'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\Controller' => array(
            'listener' => 'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\NmdadbRawDataResource',
            'route_name' => 'nmda-web-api.rest.nmdadb-raw-data',
            'route_identifier_name' => 'nmdadb_raw_data_id',
            'collection_name' => 'nmdadb_raw_data',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\NmdadbRawDataEntity',
            'collection_class' => 'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\NmdadbRawDataCollection',
            'service_name' => 'nmdadbRawData',
        ),
        'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\Controller' => array(
            'listener' => 'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\NmdbUncorrectedRawResource',
            'route_name' => 'nmda-web-api.rest.nmdb-uncorrected-raw',
            'route_identifier_name' => 'nmdb_uncorrected_raw_id',
            'collection_name' => 'nmdb_uncorrected_raw',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\NmdbUncorrectedRawEntity',
            'collection_class' => 'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\NmdbUncorrectedRawCollection',
            'service_name' => 'nmdbUncorrectedRaw',
        ),
        'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\Controller' => array(
            'listener' => 'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\NmdbUncorrectedGroupResource',
            'route_name' => 'nmda-web-api.rest.nmdb-uncorrected-group',
            'route_identifier_name' => 'nmdb_uncorrected_group_id',
            'collection_name' => 'nmdb_uncorrected_group',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\NmdbUncorrectedGroupEntity',
            'collection_class' => 'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\NmdbUncorrectedGroupCollection',
            'service_name' => 'nmdbUncorrectedGroup',
        ),
        'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\Controller' => array(
            'listener' => 'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\NmdbCorrectedRawResource',
            'route_name' => 'nmda-web-api.rest.nmdb-corrected-raw',
            'route_identifier_name' => 'nmdb_corrected_raw_id',
            'collection_name' => 'nmdb_corrected_raw',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\NmdbCorrectedRawEntity',
            'collection_class' => 'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\NmdbCorrectedRawCollection',
            'service_name' => 'nmdbCorrectedRaw',
        ),
        'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\Controller' => array(
            'listener' => 'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\NmdbCorrectedGroupResource',
            'route_name' => 'nmda-web-api.rest.nmdb-corrected-group',
            'route_identifier_name' => 'nmdb_corrected_group_id',
            'collection_name' => 'nmdb_corrected_group',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\NmdbCorrectedGroupEntity',
            'collection_class' => 'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\NmdbCorrectedGroupCollection',
            'service_name' => 'nmdbCorrectedGroup',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'NmdaWebApi\\V1\\Rest\\Hola\\Controller' => 'HalJson',
            'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'NmdaWebApi\\V1\\Rest\\Hola\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'NmdaWebApi\\V1\\Rest\\Hola\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\Controller' => array(
                0 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'NmdaWebApi\\V1\\Rest\\Hola\\HolaEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.hola',
                'route_identifier_name' => 'hola_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NmdaWebApi\\V1\\Rest\\Hola\\HolaCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.hola',
                'route_identifier_name' => 'hola_id',
                'is_collection' => true,
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\NmdadbRawDataEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdadb-raw-data',
                'route_identifier_name' => 'nmdadb_raw_data_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\NmdadbRawDataCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdadb-raw-data',
                'route_identifier_name' => 'nmdadb_raw_data_id',
                'is_collection' => true,
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\NmdbUncorrectedRawEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-uncorrected-raw',
                'route_identifier_name' => 'nmdb_uncorrected_raw_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\NmdbUncorrectedRawCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-uncorrected-raw',
                'route_identifier_name' => 'nmdb_uncorrected_raw_id',
                'is_collection' => true,
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\NmdbUncorrectedGroupEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-uncorrected-group',
                'route_identifier_name' => 'nmdb_uncorrected_group_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\NmdbUncorrectedGroupCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-uncorrected-group',
                'route_identifier_name' => 'nmdb_uncorrected_group_id',
                'is_collection' => true,
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\NmdbCorrectedRawEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-corrected-raw',
                'route_identifier_name' => 'nmdb_corrected_raw_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\NmdbCorrectedRawCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-corrected-raw',
                'route_identifier_name' => 'nmdb_corrected_raw_id',
                'is_collection' => true,
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\NmdbCorrectedGroupEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-corrected-group',
                'route_identifier_name' => 'nmdb_corrected_group_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\NmdbCorrectedGroupCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-corrected-group',
                'route_identifier_name' => 'nmdb_corrected_group_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\Controller' => array(
            'input_filter' => 'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\Validator',
        ),
    ),
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