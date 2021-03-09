<?php

return [
    /*
     * kubernetes api-server host
     */
    'base_uri'    => env('KUBERNETES_BASE_URI'),

    /*
     * kubernetes api-server authorization username
     */
    'username'    => env('KUBERNETES_USERNAME'),

    /*
     * kubernetes api-server authorization password
     */
    'password'    => env('KUBERNETES_PASSWORD'),

    /*
     * kubernetes api-server authorization token
     */
    'token'       => env('KUBERNETES_TOKEN'),

    /*
     * kubernetes api-server authorization certificate file path
     */
    'cert'        => env('KUBERNETES_CERT'),

    /*
     * kubernetes default namespace
     */
    'namespace'   => env('KUBERNETES_NAMESPACE'),

    /*
     * kubernetes yaml.apiVersion for all resource types
     */
    'api_version' => [
        'pod'                     => env('KUBERNETES_API_VERSION_POD', 'v1'),
        'deployment'              => env('KUBERNETES_API_VERSION_DEPLOYMENT', 'apps/v1'),
        'service'                 => env('KUBERNETES_API_VERSION_SERVICE', 'v1'),
        'job'                     => env('KUBERNETES_API_VERSION_JOB', 'batch/v1'),
        'config_map'              => env('KUBERNETES_API_VERSION_CONFIG_MAP', 'v1'),
        'persistent_volume_claim' => env('KUBERNETES_API_VERSION_PERSISTENT_VOLUME_CLAIM', 'v1'),
        'ingress'                 => env('KUBERNETES_API_VERSION_INGRESS', 'extensions/v1beta1'),
        'networking_ingress'      => env('KUBERNETES_API_VERSION_NETWORKING_INGRESS', 'networking.k8s.io/v1beta1'),
        'secret'                  => env('KUBERNETES_API_VERSION_SECRET', 'v1'),
        'node'                    => env('KUBERNETES_API_VERSION_NODE', 'v1'),
        'daemon_set'              => env('KUBERNETES_API_VERSION_DAEMON_SET', 'apps/v1'),
    ]
];