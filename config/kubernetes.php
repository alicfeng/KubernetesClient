<?php

return [
    /**
     * kubernetes api-server authorization username
     */
    'username'  => env('KUBERNETES_USERNAME'),

    /**
     * kubernetes api-server authorization password
     */
    'password'  => env('KUBERNETES_PASSWORD'),

    /**
     * kubernetes api-server authorization token
     */
    'token'     => env('KUBERNETES_TOKEN'),

    /**
     * kubernetes api-server host
     */
    'base_uri'  => env('KUBERNETES_BASE_URI'),

    /**
     * kubernetes default namespace
     */
    'namespace' => env('KUBERNETES_NAMESPACE'),
];