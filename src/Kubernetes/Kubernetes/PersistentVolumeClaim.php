<?php
/**
 * Created by PhpStorm.
 * User: jiuzheyang
 * Date: 2020/7/7
 * Time: 下午3:12
 */

namespace AlicFeng\Kubernetes\Kubernetes;

use AlicFeng\Kubernetes\Base\KubernetesClient;
use AlicFeng\Kubernetes\Base\KubernetesManagerIf;

class PersistentVolumeClaim extends KubernetesClient implements KubernetesManagerIf
{
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    /**
     * @function    新建资源项
     * @description 新建资源项
     *
     * @param array $package 期待的资源配置
     *
     * @return $this
     */
    public function create(array $package = [])
    {
        $uri = "/api/v1/namespaces/{$this->namespace}/persistentvolumeclaims";
        
        return $this->_create($uri, self::TYPE_PERSISTENT_VOLUME_CLAIM, $package);
    }

    /**
     * @function    修改资源项
     * @description 修改指定资源项
     *
     * @param string $name    资源名称
     * @param array  $package 期待的资源配置
     *
     * @return $this
     */
    public function apply(string $name, array $package = [])
    {
       return $this;
    }

    /**
     * @function    查询资源列表结合
     * @description 默认为具体的默认命名空间
     *
     * @param bool  $is_all_namespace 是否为所有命名空间
     * @param array $query_parameters 查询参数
     *
     * @return $this
     */
    public function list(bool $is_all_namespace = false, array $query_parameters = [])
    {
        return $this;
    }

    /**
     * @function    查询资源项状态
     * @description 查询资源项状态
     *
     * @param string $name 资源项名称
     *
     * @return $this
     */
    public function queryStatus(string $name)
    {
        return $this;
    }

    /**
     * @function    删除资源项
     * @description 删除指定资源项
     *
     * @param string $name 资源名称
     *
     * @return $this
     */
    public function remove(string $name)
    {
        return $this;
    }

    /**
     * @function     修改部分资源项
     * @description  修改部分资源项
     *
     * @param string $name    资源名称
     * @param array  $package 期待的资源配置
     *
     * @return $this
     */
    public function repair(string $name, array $package = [])
    {
        return $this;
    }

    /**
     * @description获取pod日志
     * @function log
     *
     * @param string $name  pod名称
     * @param array  $query 查询参数
     *
     * @return $this
     */
    public function log(string $name, array $query = [])
    {
        return $this;
    }

}