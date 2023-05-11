<?php

// This file is auto-generated, don't edit it. Thanks.

namespace AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8;

use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Exception\TeaUnableRetryError;
use AlibabaCloud\Tea\Request;
use AlibabaCloud\Tea\RpcUtils\RpcUtils;
use AlibabaCloud\Tea\Tea;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\BindAntchainSaasAbilityRequest;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\BindAntchainSaasAbilityResponse;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\BindDemoCenterAbilityRequest;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\BindDemoCenterAbilityResponse;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\BindDemoMoreAbilityTestabcRequest;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\BindDemoMoreAbilityTestabcResponse;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\CallbackAntchainSaasAbilityRequest;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\CallbackAntchainSaasAbilityResponse;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\PublishDemoSaasTestTestcRequest;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\PublishDemoSaasTestTestcResponse;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\QueryAntchainSaasAbilityResultcodeRequest;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\QueryAntchainSaasAbilityResultcodeResponse;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\QueryAntchainSaasAbilityWithapinameRequest;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\QueryAntchainSaasAbilityWithapinameResponse;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\QueryAntchainSaasFoundationProtobufRequest;
use AntChain\Ak_68b3ee3230284cddaa19740dcaf251d8\Models\QueryAntchainSaasFoundationProtobufResponse;
use AntChain\Util\UtilClient;
use Exception;

class Client
{
    protected $_endpoint;

    protected $_regionId;

    protected $_accessKeyId;

    protected $_accessKeySecret;

    protected $_protocol;

    protected $_userAgent;

    protected $_readTimeout;

    protected $_connectTimeout;

    protected $_httpProxy;

    protected $_httpsProxy;

    protected $_socks5Proxy;

    protected $_socks5NetWork;

    protected $_noProxy;

    protected $_maxIdleConns;

    protected $_securityToken;

    protected $_maxIdleTimeMillis;

    protected $_keepAliveDurationMillis;

    protected $_maxRequests;

    protected $_maxRequestsPerHost;

    /**
     * Init client with Config.
     *
     * @param config config contains the necessary information to create a client
     * @param mixed $config
     */
    public function __construct($config)
    {
        if (Utils::isUnset($config)) {
            throw new TeaError([
                'code'    => 'ParameterMissing',
                'message' => "'config' can not be unset",
            ]);
        }
        $this->_accessKeyId             = $config->accessKeyId;
        $this->_accessKeySecret         = $config->accessKeySecret;
        $this->_securityToken           = $config->securityToken;
        $this->_endpoint                = $config->endpoint;
        $this->_protocol                = $config->protocol;
        $this->_userAgent               = $config->userAgent;
        $this->_readTimeout             = Utils::defaultNumber($config->readTimeout, 20000);
        $this->_connectTimeout          = Utils::defaultNumber($config->connectTimeout, 20000);
        $this->_httpProxy               = $config->httpProxy;
        $this->_httpsProxy              = $config->httpsProxy;
        $this->_noProxy                 = $config->noProxy;
        $this->_socks5Proxy             = $config->socks5Proxy;
        $this->_socks5NetWork           = $config->socks5NetWork;
        $this->_maxIdleConns            = Utils::defaultNumber($config->maxIdleConns, 60000);
        $this->_maxIdleTimeMillis       = Utils::defaultNumber($config->maxIdleTimeMillis, 5);
        $this->_keepAliveDurationMillis = Utils::defaultNumber($config->keepAliveDurationMillis, 5000);
        $this->_maxRequests             = Utils::defaultNumber($config->maxRequests, 100);
        $this->_maxRequestsPerHost      = Utils::defaultNumber($config->maxRequestsPerHost, 100);
    }

    /**
     * Encapsulate the request and invoke the network.
     *
     * @param string         $version
     * @param string         $action   api name
     * @param string         $protocol http or https
     * @param string         $method   e.g. GET
     * @param string         $pathname pathname of every api
     * @param mixed[]        $request  which contains request params
     * @param string[]       $headers
     * @param RuntimeOptions $runtime  which controls some details of call api, such as retry times
     *
     * @throws TeaError
     * @throws Exception
     * @throws TeaUnableRetryError
     *
     * @return array the response
     */
    public function doRequest($version, $action, $protocol, $method, $pathname, $request, $headers, $runtime)
    {
        $runtime->validate();
        $_runtime = [
            'timeouted'          => 'retry',
            'readTimeout'        => Utils::defaultNumber($runtime->readTimeout, $this->_readTimeout),
            'connectTimeout'     => Utils::defaultNumber($runtime->connectTimeout, $this->_connectTimeout),
            'httpProxy'          => Utils::defaultString($runtime->httpProxy, $this->_httpProxy),
            'httpsProxy'         => Utils::defaultString($runtime->httpsProxy, $this->_httpsProxy),
            'noProxy'            => Utils::defaultString($runtime->noProxy, $this->_noProxy),
            'maxIdleConns'       => Utils::defaultNumber($runtime->maxIdleConns, $this->_maxIdleConns),
            'maxIdleTimeMillis'  => $this->_maxIdleTimeMillis,
            'keepAliveDuration'  => $this->_keepAliveDurationMillis,
            'maxRequests'        => $this->_maxRequests,
            'maxRequestsPerHost' => $this->_maxRequestsPerHost,
            'retry'              => [
                'retryable'   => $runtime->autoretry,
                'maxAttempts' => Utils::defaultNumber($runtime->maxAttempts, 3),
            ],
            'backoff' => [
                'policy' => Utils::defaultString($runtime->backoffPolicy, 'no'),
                'period' => Utils::defaultNumber($runtime->backoffPeriod, 1),
            ],
            'ignoreSSL' => $runtime->ignoreSSL,
            // api信息结构体
        ];
        $_lastRequest   = null;
        $_lastException = null;
        $_now           = time();
        $_retryTimes    = 0;
        while (Tea::allowRetry(@$_runtime['retry'], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime(@$_runtime['backoff'], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;

            try {
                $_request           = new Request();
                $_request->protocol = Utils::defaultString($this->_protocol, $protocol);
                $_request->method   = $method;
                $_request->pathname = $pathname;
                $_request->query    = [
                    'method'           => $action,
                    'version'          => $version,
                    'sign_type'        => 'HmacSHA1',
                    'req_time'         => UtilClient::getTimestamp(),
                    'req_msg_id'       => UtilClient::getNonce(),
                    'access_key'       => $this->_accessKeyId,
                    'base_sdk_version' => 'TeaSDK-2.0',
                    'sdk_version'      => '1.0.3',
                    '_prod_code'       => 'ak_68b3ee3230284cddaa19740dcaf251d8',
                    '_prod_channel'    => 'saas',
                ];
                if (!Utils::empty_($this->_securityToken)) {
                    $_request->query['security_token'] = $this->_securityToken;
                }
                $_request->headers = Tea::merge([
                    'host'       => Utils::defaultString($this->_endpoint, 'openapi.antchain.antgroup.com'),
                    'user-agent' => Utils::getUserAgent($this->_userAgent),
                ], $headers);
                $tmp                               = Utils::anyifyMapValue(RpcUtils::query($request));
                $_request->body                    = Utils::toFormString($tmp);
                $_request->headers['content-type'] = 'application/x-www-form-urlencoded';
                $signedParam                       = Tea::merge($_request->query, RpcUtils::query($request));
                $_request->query['sign']           = UtilClient::getSignature($signedParam, $this->_accessKeySecret);
                $_lastRequest                      = $_request;
                $_response                         = Tea::send($_request, $_runtime);
                $raw                               = Utils::readAsString($_response->body);
                $obj                               = Utils::parseJSON($raw);
                $res                               = Utils::assertAsMap($obj);
                $resp                              = Utils::assertAsMap(@$res['response']);
                if (UtilClient::hasError($raw, $this->_accessKeySecret)) {
                    throw new TeaError([
                        'message' => @$resp['result_msg'],
                        'data'    => $resp,
                        'code'    => @$resp['result_code'],
                    ]);
                }

                return $resp;
            } catch (Exception $e) {
                if (!($e instanceof TeaError)) {
                    $e = new TeaError([], $e->getMessage(), $e->getCode(), $e);
                }
                if (Tea::isRetryable($e)) {
                    $_lastException = $e;

                    continue;
                }

                throw $e;
            }
        }

        throw new TeaUnableRetryError($_lastRequest, $_lastException);
    }

    /**
     * Description: testc
     * Summary: 测试用api.
     *
     * @param PublishDemoSaasTestTestcRequest $request
     *
     * @return PublishDemoSaasTestTestcResponse
     */
    public function publishDemoSaasTestTestc($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->publishDemoSaasTestTestcEx($request, $headers, $runtime);
    }

    /**
     * Description: testc
     * Summary: 测试用api.
     *
     * @param PublishDemoSaasTestTestcRequest $request
     * @param string[]                        $headers
     * @param RuntimeOptions                  $runtime
     *
     * @return PublishDemoSaasTestTestcResponse
     */
    public function publishDemoSaasTestTestcEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return PublishDemoSaasTestTestcResponse::fromMap($this->doRequest('1.0', 'demo.saas.test.testc.publish', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 绑定API
     * Summary: 绑定能力与API关系.
     *
     * @param BindAntchainSaasAbilityRequest $request
     *
     * @return BindAntchainSaasAbilityResponse
     */
    public function bindAntchainSaasAbility($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->bindAntchainSaasAbilityEx($request, $headers, $runtime);
    }

    /**
     * Description: 绑定API
     * Summary: 绑定能力与API关系.
     *
     * @param BindAntchainSaasAbilityRequest $request
     * @param string[]                       $headers
     * @param RuntimeOptions                 $runtime
     *
     * @return BindAntchainSaasAbilityResponse
     */
    public function bindAntchainSaasAbilityEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return BindAntchainSaasAbilityResponse::fromMap($this->doRequest('1.0', 'antchain.saas.ability.bind', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 根据api名称列表查询能力标签列表
     * Summary: 根据api名称列表查询能力标签列表.
     *
     * @param QueryAntchainSaasAbilityWithapinameRequest $request
     *
     * @return QueryAntchainSaasAbilityWithapinameResponse
     */
    public function queryAntchainSaasAbilityWithapiname($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->queryAntchainSaasAbilityWithapinameEx($request, $headers, $runtime);
    }

    /**
     * Description: 根据api名称列表查询能力标签列表
     * Summary: 根据api名称列表查询能力标签列表.
     *
     * @param QueryAntchainSaasAbilityWithapinameRequest $request
     * @param string[]                                   $headers
     * @param RuntimeOptions                             $runtime
     *
     * @return QueryAntchainSaasAbilityWithapinameResponse
     */
    public function queryAntchainSaasAbilityWithapinameEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return QueryAntchainSaasAbilityWithapinameResponse::fromMap($this->doRequest('1.0', 'antchain.saas.ability.withapiname.query', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 测试能力中心九期API打标&能力绑定API使用
     * Summary: 能力中心九期测试.
     *
     * @param BindDemoCenterAbilityRequest $request
     *
     * @return BindDemoCenterAbilityResponse
     */
    public function bindDemoCenterAbility($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->bindDemoCenterAbilityEx($request, $headers, $runtime);
    }

    /**
     * Description: 测试能力中心九期API打标&能力绑定API使用
     * Summary: 能力中心九期测试.
     *
     * @param BindDemoCenterAbilityRequest $request
     * @param string[]                     $headers
     * @param RuntimeOptions               $runtime
     *
     * @return BindDemoCenterAbilityResponse
     */
    public function bindDemoCenterAbilityEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return BindDemoCenterAbilityResponse::fromMap($this->doRequest('1.0', 'demo.center.ability.bind', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 测试API绑定多个标签时的情况
     * Summary: API绑定多个标签.
     *
     * @param BindDemoMoreAbilityTestabcRequest $request
     *
     * @return BindDemoMoreAbilityTestabcResponse
     */
    public function bindDemoMoreAbilityTestabc($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->bindDemoMoreAbilityTestabcEx($request, $headers, $runtime);
    }

    /**
     * Description: 测试API绑定多个标签时的情况
     * Summary: API绑定多个标签.
     *
     * @param BindDemoMoreAbilityTestabcRequest $request
     * @param string[]                          $headers
     * @param RuntimeOptions                    $runtime
     *
     * @return BindDemoMoreAbilityTestabcResponse
     */
    public function bindDemoMoreAbilityTestabcEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return BindDemoMoreAbilityTestabcResponse::fromMap($this->doRequest('1.0', 'demo.more.ability.testabc.bind', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: api上线回调接口
     * Summary: api上线回调接口.
     *
     * @param CallbackAntchainSaasAbilityRequest $request
     *
     * @return CallbackAntchainSaasAbilityResponse
     */
    public function callbackAntchainSaasAbility($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->callbackAntchainSaasAbilityEx($request, $headers, $runtime);
    }

    /**
     * Description: api上线回调接口
     * Summary: api上线回调接口.
     *
     * @param CallbackAntchainSaasAbilityRequest $request
     * @param string[]                           $headers
     * @param RuntimeOptions                     $runtime
     *
     * @return CallbackAntchainSaasAbilityResponse
     */
    public function callbackAntchainSaasAbilityEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return CallbackAntchainSaasAbilityResponse::fromMap($this->doRequest('1.0', 'antchain.saas.ability.callback', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 根据产品码+api code查询api protobuf信息
     * Summary: 查询api protobuf信息（勿删）.
     *
     * @param QueryAntchainSaasFoundationProtobufRequest $request
     *
     * @return QueryAntchainSaasFoundationProtobufResponse
     */
    public function queryAntchainSaasFoundationProtobuf($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->queryAntchainSaasFoundationProtobufEx($request, $headers, $runtime);
    }

    /**
     * Description: 根据产品码+api code查询api protobuf信息
     * Summary: 查询api protobuf信息（勿删）.
     *
     * @param QueryAntchainSaasFoundationProtobufRequest $request
     * @param string[]                                   $headers
     * @param RuntimeOptions                             $runtime
     *
     * @return QueryAntchainSaasFoundationProtobufResponse
     */
    public function queryAntchainSaasFoundationProtobufEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return QueryAntchainSaasFoundationProtobufResponse::fromMap($this->doRequest('1.0', 'antchain.saas.foundation.protobuf.query', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 测试网关结果码和计量接口
     * Summary: 网关结果码测试接口.
     *
     * @param QueryAntchainSaasAbilityResultcodeRequest $request
     *
     * @return QueryAntchainSaasAbilityResultcodeResponse
     */
    public function queryAntchainSaasAbilityResultcode($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->queryAntchainSaasAbilityResultcodeEx($request, $headers, $runtime);
    }

    /**
     * Description: 测试网关结果码和计量接口
     * Summary: 网关结果码测试接口.
     *
     * @param QueryAntchainSaasAbilityResultcodeRequest $request
     * @param string[]                                  $headers
     * @param RuntimeOptions                            $runtime
     *
     * @return QueryAntchainSaasAbilityResultcodeResponse
     */
    public function queryAntchainSaasAbilityResultcodeEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return QueryAntchainSaasAbilityResultcodeResponse::fromMap($this->doRequest('1.0', 'antchain.saas.ability.resultcode.query', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }
}
