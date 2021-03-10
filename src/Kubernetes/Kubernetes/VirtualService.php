<?php
/**
 * Created by AlicFeng at 2021/3/9 下午9:47
 */

namespace AlicFeng\Kubernetes\Kubernetes;


use AlicFeng\Kubernetes\Base\KubernetesClient;
use AlicFeng\Kubernetes\Base\KubernetesManagerInterface;

class VirtualService extends KubernetesClient implements KubernetesManagerInterface
{
    /**
     * @inheritDoc
     */
    public function create(array $package = [])
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function apply(string $name, array $package = [])
    {
        // TODO: Implement apply() method.
    }

    /**
     * @inheritDoc
     */
    public function remove(string $name)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @inheritDoc
     */
    public function list(bool $is_all_namespace = false, array $query_parameters = [])
    {
        $uri = "/apis/networking.istio.io/v1alpha3/namespaces/{$this->namespace}/virtualservices";
        if ($is_all_namespace) {
            $uri = '/apis/networking.istio.io/v1alpha3/virtualservices';
        }

        return $this->_list($uri, $query_parameters);
    }

    /**
     * @inheritDoc
     */
    public function queryStatus(string $name)
    {
        // TODO: Implement queryStatus() method.
    }

    /**
     * @inheritDoc
     */
    public function repair(string $name, array $package)
    {
        // TODO: Implement repair() method.
    }
}
