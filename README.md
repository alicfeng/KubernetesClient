<h1 align="center">
  <a href="https://github.com/alicfeng/kubernetes-client">
    KubernetesClient
  </a>
</h1>
<p align="center">
  A PHP Client For Manage Kubernetes Cluster~
</p>
<p align="center">
  <a href="https://travis-ci.org/alicfeng/kubernetes-client">
    <img src="https://img.shields.io/travis/alicfeng/kubernetes-client/master.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/alicfeng/kubernetes-client">
    <img src="https://poser.pugx.org/alicfeng/kubernetes-client/v/stable.svg" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/alicfeng/IdentityCard">
    <img src="https://poser.pugx.org/alicfeng/kubernetes-client/d/total.svg" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/alicfeng/kubernetes-client">
    <img src="https://poser.pugx.org/alicfeng/kubernetes-client/license.svg" alt="License">
  </a>
  <a href="https://github.com/alicfeng/IdentityCard">
    <img src="https://travis-ci.org/alicfeng/IdentityCard.svg?branch=master" alt="build status">
  </a>
</p>


## 🚀 Quick start

```shell
composer require alicfeng/kubernetes-client -vvv
```



## ✨ Features

- [x] Service
- [x] Deployment
- [x] Pod
- [x] Job
- [x] ConfigMap
- [x] DaemonSet
- [x] Node
- [x] Secrets
- [x] StatefulSet
- [x] Event
- [x] Pvc
- [x] PersistentVolumeClaim
- [x] Ingress
- [x] ReplicationController



## Usage

```php
$config = [
 'base_uri'  => 'https://127.0.0.1:6443',
 'token'     => 'token',
 'namespace' => 'default'
];    
$service = Kubernetes::service($config);
$metadata = [
 'name' => 'demo-service'
];
$spec     = [
 'type'     => 'NodePort',
 'selector' => [
   'k8s-app' => 'demo-service',
 ],
 'ports'    => [
   [
     'protocol'   => 'TCP',
     'port'       => 80,
     'targetPort' => 80,
     'nodePort'   => 30008
   ]
 ]
];

# Create Service
$service->setMetadata($metadata)->setSpec($spec)->create();
# or 
$service->setApiVersion('v1')->setKind('Service')->create($yaml);

# Patch Service
$service->apply();
# Delete Service
$service->delete('service-name');
# Service Exist
$service->list()->exist('service-name');
# Item Service
$service->list()->item('service-name');

... ...
```



## 💖 Thanks developer

- [lljiuzheyang](https://github.com/lljiuzheyang) 
- [lsrong](https://github.com/lsrong)




## Kubernetes

See the API documentation for an explanation of the options:

https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.17/
