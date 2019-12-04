<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Value comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 * AlicFeng | a@samego.com
 */

namespace AlicFeng\Kubernetes\Base;

interface KubernetesManagerIf
{
    /**
     * @function    新建资源项
     * @description 新建资源项
     *
     * @param array $package 期待的资源配置
     *
     * @return $this
     */
    public function create(array $package = []);

    /**
     * @function    修改资源项
     * @description 修改指定资源项
     *
     * @param string $name    资源名称
     * @param array  $package 期待的资源配置
     *
     * @return $this
     */
    public function apply(string $name, array $package = []);

    /**
     * @function    删除资源项
     * @description 删除指定资源项
     *
     * @param string $name 资源名称
     *
     * @return $this
     */
    public function remove(string $name);

    /**
     * @function    查询资源列表结合
     * @description 默认为具体的默认命名空间
     *
     * @param bool $is_all_namespace 是否为所有命名空间
     *
     * @return $this
     */
    public function list(bool $is_all_namespace = false);

    /**
     * @function    查询资源项状态
     * @description 查询资源项状态
     *
     * @param string $name 资源项名称
     *
     * @return $this
     */
    public function queryStatus(string $name);

    /**
     * @function   patch修改资源项状态
     * @description patch修改资源项状态
     *
     * @param string $name    资源项名称
     * @param array  $package 期待的资源配置
     *
     * @return $this
     */
    public function patch(string $name, array $package);
}
