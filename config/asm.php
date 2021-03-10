<?php

return [
    /*
     * kubernetes component runtime model for debug
     */
    'debug'=>env('KUBERNETES_DEBUG',false),

    /*
     * kubernetes api-server host
     */
    'base_uri'    => env('KUBERNETES_BASE_URI'),

    /*
     * kubernetes api-server authorization certificate file path
     */
    'cert_path'        => env('KUBERNETES_CERT_PATH'),

    /*
     * kubernetes api-server authorization certificate storage dir
     */
    'cert_storage_dir'        => env('KUBERNETES_CERT_STORAGE_DIR','/var/www/.kubernetes'),

    /*
     * kubernetes default namespace
     */
    'namespace'   => env('KUBERNETES_NAMESPACE'),

    /*
     * kubernetes communication timeout
     */
    'timeout'     => env('KUBERNETES_TIMEOUT', 2),

    /*
     * kubernetes yaml.apiVersion for all resource types
     */
    'api_version' => [
        'virtual_service'                     => env('KUBERNETES_API_VERSION_VIRTUAL_SERVICE', 'networking.istio.io/v1alpha3'),
    ]
];
