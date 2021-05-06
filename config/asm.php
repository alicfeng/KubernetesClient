<?php

return [
    /*
     * kubernetes component runtime model for debug
     */
    'debug'=>env('ASM_DEBUG',false),

    /*
     * kubernetes api-server host
     */
    'base_uri'    => env('ASM_BASE_URI'),

    /*
     * kubernetes api-server authorization certificate file path
     */
    'cert_path'        => env('ASM_CERT_PATH'),

    /*
     * kubernetes api-server authorization certificate storage dir
     */
    'cert_storage_dir'        => env('ASM_CERT_STORAGE_DIR','/var/www/.kubernetes'),

    /*
     * kubernetes default namespace
     */
    'namespace'   => env('ASM_NAMESPACE'),

    /*
     * kubernetes communication timeout
     */
    'timeout'     => env('ASM_TIMEOUT', 2),

    /*
     * kubernetes yaml.apiVersion for all resource types
     */
    'api_version' => [
        'virtual_service'                     => env('ASM_API_VERSION_VIRTUAL_SERVICE', 'networking.istio.io/v1alpha3'),
    ]
];
