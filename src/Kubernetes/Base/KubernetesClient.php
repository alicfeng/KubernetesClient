<?php

/*
 * What samego team is that is 'one thing, a team, work together'
 * Value comes from technology, technology comes from sharing~
 * https://github.com/alicfeng/KubernetesClient
 * AlicFeng | a@samego.com
 */

namespace AlicFeng\Kubernetes\Base;

use AlicFeng\Kubernetes\Exception\CommunicationException;
use Psr\Http\Message\ResponseInterface;

/**
 * 用于管理Kubernetes集群、编排
 * Class KubernetesManager Kubernetes类库.
 */
abstract class KubernetesClient extends AbstractKubernetes
{
    /**
     * @var string namespace - 命名空间
     */
    protected $namespace = 'default';

    /**
     * @var string kubernetes api-server domain - k8s接口基本域
     */
    protected $base_uri = null;
    /**
     * @var string k8s token
     */
    protected $token = null;

    /**
     * 请求报文.
     *
     * @var array interface package
     */
    protected $package = [];
    /**
     * guzzle 响应.
     *
     * @var ResponseInterface
     */
    protected $response = null;

    /**
     * @var string package.apiVersion - 资源版本
     */
    protected $api_version = '';
    /**
     * @var string package.kind - 资源类型
     */
    protected $kind = '';
    /**
     * @var array package.metadata - 资源元数据
     */
    protected $metadata = [];
    /**
     * @var array package.spec - 资源清单数据
     */
    protected $spec = [];

    public function __construct(array $config = [])
    {
        $this->token     = $config['token'];
        $this->base_uri  = $config['base_uri'];
        $this->namespace = $config['namespace'] ?? 'default';
        $default         = [
            'base_uri' => $this->base_uri,
            'verify'   => false,
            'headers'  => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer '.$this->token,
            ],
        ];
        $config          = array_merge($default, $config);
        parent::__construct($config);
    }

    /**
     * @function    设置命名空间
     * @description 默认为 default
     *
     * @param string $namespace
     *
     * @return $this
     */
    public function setNamespace(string $namespace = 'default')
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * @function    设置版本号
     * @description 默认为 v1
     *
     * @param string $api_version
     *
     * @return $this
     */
    public function setApiVersion(string $api_version = 'v1')
    {
        $this->api_version = $api_version;

        return $this;
    }

    /**
     * @function    设置类型
     * @description 设置 package.kind 节点
     *
     * @param string $kind
     *
     * @return $this
     */
    public function setKind(string $kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * @function    设置元数据节点
     * @description 设置 package.metadata 节点
     *
     * @param array $metadata 元数据配置信息
     *
     * @return $this
     */
    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @function    设置资源清单
     * @description 设置 package.spec 资源清单信息
     *
     * @param array $spec 资源清单配置信息
     *
     * @return $this
     */
    public function setSpec(array $spec)
    {
        $this->spec = $spec;

        return $this;
    }

    /**
     * @function    构建接口报文
     * @description [ apiVersion,kind,metadata,spec ]
     */
    public function builder()
    {
        $this->package = [
            'apiVersion' => $this->api_version,
            'kind'       => $this->kind,
            'metadata'   => $this->metadata,
            'spec'       => $this->spec,
        ];
    }

    /**
     * @function    接口请求结果响应
     * @description guzzle response
     *
     * @return ResponseInterface
     *
     * @throws CommunicationException
     */
    public function response()
    {
        if (!in_array($this->response->getStatusCode(), [200, 201], true)) {
            throw new CommunicationException('communication exception');
        }

        return json_decode($this->response->getBody()->getContents(), true);
    }

    /**
     * @function    新建资源项
     * @description 新建资源项
     *
     * @param string $uri     api地址
     * @param string $type    资源类型
     * @param array  $package 期待的资源配置
     *
     * @return $this
     */
    protected function _create(string $uri, string $type, array $package)
    {
        $this->commonPackage($type, $package)->builder();

        $this->response = $this->post($uri, ['json' => $this->package]);

        return $this;
    }

    /**
     * @function    修改资源项
     * @description 修改指定资源项
     *
     * @param string $uri     api地址
     * @param string $type    资源类型
     * @param array  $package 期待的资源配置
     *
     * @return $this
     */
    protected function _apply(string $uri, string $type, array $package)
    {
        $this->commonPackage($type, $package)->builder();
        $this->response = $this->put($uri, ['json' => $this->package]);

        return $this;
    }

    /**
     * @function    删除资源项
     * @description 删除指定资源项
     *
     * @param string $uri
     *
     * @return $this
     */
    protected function _remove(string $uri)
    {
        $this->response = $this->delete($uri);

        return $this;
    }

    /**
     * @function    查询资源列表结合
     * @description 查询资源列表结合
     *
     * @param string $uri
     *
     * @return $this
     */
    protected function _list(string $uri)
    {
        $this->response = $this->get($uri);

        return $this;
    }

    /**
     * @function    查询资源状态
     * @description 查询具体资源状态
     *
     * @param string $uri
     *
     * @return $this
     */
    protected function _queryStatus(string $uri)
    {
        $this->response = $this->get($uri);

        return $this;
    }

    /**
     * @function    判断是否存在节点
     * @description 根据名称判断时候存在
     *
     * @param string $name 名称
     *
     * @return bool
     *
     * @throws
     */
    public function exist(string $name): bool
    {
        $list    = [];
        $message = $this->response();
        array_walk($message['items'], function ($value) use (&$list) {
            $list[] = $value['metadata']['name'];
        });
        unset($message);

        return in_array($name, $list, true);
    }

    /**
     * @function    查询一个项
     * @description 支持所有服务
     *
     * @param string $name 名称
     *
     * @return bool|\Illuminate\Support\Collection|mixed
     *
     * @throws CommunicationException
     */
    public function item(string $name)
    {
        $items = $this->response()['items'];

        foreach ($items as $item) {
            if ($name == $item['metadata']['name']) {
                return $item;
            }
        }

        return false;
    }

    /**
     * @function    获取 api 版本
     * @description 已请求获取响应值, 否则获取请求值
     *
     * @return string
     */
    public function getApiVersion()
    {
        if ($this->response) {
            return json_decode($this->response, true)['apiVersion'];
        }

        return $this->api_version;
    }

    /**
     * @function    获取类型
     * @description 已请求获取响应值, 否则获取请求值
     *
     * @return string
     */
    public function getKind(): string
    {
        if ($this->response) {
            return json_decode($this->response, true)['kind'];
        }

        return $this->kind;
    }

    /**
     * @function    获取元数据
     * @description 已请求获取响应值, 否则获取请求值
     *
     * @return array
     */
    public function getMetadata(): array
    {
        if ($this->response) {
            return json_decode($this->response, true)['metadata'];
        }

        return $this->metadata;
    }

    /**
     * @function    获取资源清单数据
     * @description 已请求获取响应值, 否则获取请求值
     *
     * @return array
     *
     * @throws
     */
    public function getSpec(): array
    {
        if ($this->response) {
            return $this->response()['spec'];
        }

        return $this->spec;
    }

    /**
     * @function    统一处理 yaml 报文信息
     * @description 除了方法设定外, 灵活二次处理报文
     *
     * @param string $type    类型
     * @param array  $package 报文信息
     *
     * @return $this
     */
    protected function commonPackage(string $type, array $package = [])
    {
        if (null == $this->api_version) {
            $this->api_version = self::$resourceTypes[$type]['api_version'];
        }
        if (null == $this->kind) {
            $this->kind = self::$resourceTypes[$type]['kind'];
        }

        if (empty($package)) {
            return $this;
        }

        if (array_key_exists('apiVersion', $package) && $package['apiVersion']) {
            $this->api_version = $package['apiVersion'];
        }

        if (array_key_exists('kind', $package) && $package['kind']) {
            $this->api_version = $package['kind'];
        }

        if (array_key_exists('metadata', $package)) {
            $this->metadata = array_merge($this->metadata, $package['metadata']);
        }

        if (array_key_exists('spec', $package)) {
            $this->metadata = array_merge($this->metadata, $package['spec']);
        }

        return $this;
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func([get_called_class(), $name], $arguments);
    }
}
