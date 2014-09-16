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
            'nmda-web-api.rest.nmdb-mark-null' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdb/marknull',
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rest\\NmdbMarkNull\\Controller',
                    ),
                ),
            ),
            'nmda-web-api.rest.nmdadb-channel-stats' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdadb/channel/stats[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9]*|default',
                        'finish' => '[0-9]*|default',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rest\\NmdadbChannelStats\\Controller',
                    ),
                ),
            ),
            'nmda-web-api.rest.nmdb-channel-histogram' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdadb/channel/histogram[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9]*|default',
                        'finish' => '[0-9]*|default',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rest\\NmdbChannelHistogram\\Controller',
                    ),
                ),
            ),
            'nmda-web-api.rest.nmdadb-channel-histogram-relative' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/nmdadb/channel/histogramRelative[/:start][/:finish]',
                    'constraints' => array(
                        'start' => '[0-9]*|default',
                        'finish' => '[0-9]*|default',
                    ),
                    'defaults' => array(
                        'controller' => 'NmdaWebApi\\V1\\Rest\\NmdadbChannelHistogramRelative\\Controller',
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
            6 => 'nmda-web-api.rest.nmdb-mark-null',
            7 => 'nmda-web-api.rest.nmdadb-channel-stats',
            8 => 'nmda-web-api.rest.nmdb-channel-histogram',
            9 => 'nmda-web-api.rest.nmdadb-channel-histogram-relative',
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
        'NmdaWebApi\\V1\\Rest\\NmdbMarkNull\\Controller' => array(
            'listener' => 'NmdaWebApi\\V1\\Rest\\NmdbMarkNull\\NmdbMarkNullResource',
            'route_name' => 'nmda-web-api.rest.nmdb-mark-null',
            'route_identifier_name' => 'nmdb_mark_null_id',
            'collection_name' => 'nmdb_mark_null',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NmdaWebApi\\V1\\Rest\\NmdbMarkNull\\NmdbMarkNullEntity',
            'collection_class' => 'NmdaWebApi\\V1\\Rest\\NmdbMarkNull\\NmdbMarkNullCollection',
            'service_name' => 'nmdbMarkNull',
        ),
        'NmdaWebApi\\V1\\Rest\\NmdadbChannelStats\\Controller' => array(
            'listener' => 'NmdaWebApi\\V1\\Rest\\NmdadbChannelStats\\NmdadbChannelStatsResource',
            'route_name' => 'nmda-web-api.rest.nmdadb-channel-stats',
            'route_identifier_name' => 'nmdadb_channel_stats_id',
            'collection_name' => 'nmdadb_channel_stats',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NmdaWebApi\\V1\\Rest\\NmdadbChannelStats\\NmdadbChannelStatsEntity',
            'collection_class' => 'NmdaWebApi\\V1\\Rest\\NmdadbChannelStats\\NmdadbChannelStatsCollection',
            'service_name' => 'nmdadbChannelStats',
        ),
        'NmdaWebApi\\V1\\Rest\\NmdbChannelHistogram\\Controller' => array(
            'listener' => 'NmdaWebApi\\V1\\Rest\\NmdbChannelHistogram\\NmdbChannelHistogramResource',
            'route_name' => 'nmda-web-api.rest.nmdb-channel-histogram',
            'route_identifier_name' => 'nmdb_channel_histogram_id',
            'collection_name' => 'nmdb_channel_histogram',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NmdaWebApi\\V1\\Rest\\NmdbChannelHistogram\\NmdbChannelHistogramEntity',
            'collection_class' => 'NmdaWebApi\\V1\\Rest\\NmdbChannelHistogram\\NmdbChannelHistogramCollection',
            'service_name' => 'nmdbChannelHistogram',
        ),
        'NmdaWebApi\\V1\\Rest\\NmdadbChannelHistogramRelative\\Controller' => array(
            'listener' => 'NmdaWebApi\\V1\\Rest\\NmdadbChannelHistogramRelative\\NmdadbChannelHistogramRelativeResource',
            'route_name' => 'nmda-web-api.rest.nmdadb-channel-histogram-relative',
            'route_identifier_name' => 'nmdadb_channel_histogram_relative_id',
            'collection_name' => 'nmdadb_channel_histogram_relative',
            'entity_http_methods' => array(),
            'collection_http_methods' => array(
                0 => 'GET',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'NmdaWebApi\\V1\\Rest\\NmdadbChannelHistogramRelative\\NmdadbChannelHistogramRelativeEntity',
            'collection_class' => 'NmdaWebApi\\V1\\Rest\\NmdadbChannelHistogramRelative\\NmdadbChannelHistogramRelativeCollection',
            'service_name' => 'nmdadbChannelHistogramRelative',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'NmdaWebApi\\V1\\Rest\\Hola\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdadbRawData\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedRaw\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdbUncorrectedGroup\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedRaw\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdbCorrectedGroup\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdbMarkNull\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdadbChannelStats\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdbChannelHistogram\\Controller' => 'Json',
            'NmdaWebApi\\V1\\Rest\\NmdadbChannelHistogramRelative\\Controller' => 'Json',
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
            'NmdaWebApi\\V1\\Rest\\NmdbMarkNull\\Controller' => array(
                0 => 'application/json',
                1 => 'application/vnd.nmda-web-api.v1+json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbChannelStats\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbChannelHistogram\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbChannelHistogramRelative\\Controller' => array(
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
            'NmdaWebApi\\V1\\Rest\\NmdbMarkNull\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbChannelStats\\Controller' => array(
                0 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbChannelHistogram\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbChannelHistogramRelative\\Controller' => array(
                0 => 'application/vnd.nmda-web-api.v1+json',
                1 => 'application/json',
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
            'NmdaWebApi\\V1\\Rest\\NmdbMarkNull\\NmdbMarkNullEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-mark-null',
                'route_identifier_name' => 'nmdb_mark_null_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbMarkNull\\NmdbMarkNullCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-mark-null',
                'route_identifier_name' => 'nmdb_mark_null_id',
                'is_collection' => true,
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbChannelStats\\NmdadbChannelStatsEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdadb-channel-stats',
                'route_identifier_name' => 'nmdadb_channel_stats_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbChannelStats\\NmdadbChannelStatsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdadb-channel-stats',
                'route_identifier_name' => 'nmdadb_channel_stats_id',
                'is_collection' => true,
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbChannelHistogram\\NmdbChannelHistogramEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-channel-histogram',
                'route_identifier_name' => 'nmdb_channel_histogram_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdbChannelHistogram\\NmdbChannelHistogramCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdb-channel-histogram',
                'route_identifier_name' => 'nmdb_channel_histogram_id',
                'is_collection' => true,
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbChannelHistogramRelative\\NmdadbChannelHistogramRelativeEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdadb-channel-histogram-relative',
                'route_identifier_name' => 'nmdadb_channel_histogram_relative_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'NmdaWebApi\\V1\\Rest\\NmdadbChannelHistogramRelative\\NmdadbChannelHistogramRelativeCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'nmda-web-api.rest.nmdadb-channel-histogram-relative',
                'route_identifier_name' => 'nmdadb_channel_histogram_relative_id',
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
