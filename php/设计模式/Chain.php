<?php

//责任链模式
//建立一个对象链来按指定顺序处理调用。
//如果其中一个对象无法处理命令，它会委托这个调用给它的下一个对象来进行处理，以此类推。

namespace chain;

interface RequestInterface
{

}

abstract class Handler
{
    private $successor = null;

    public function __construct(Handler $handler = null)
    {
        $this->successor = $handler;
    }

    final function handle(RequestInterface $request)
    {
        $processed = $this->processing($request);
        if ($processed == null) {
            if ($this->successor != null) {
                $processed = $this->successor->handle($request);
            }
        }
        return $processed;
    }

    abstract protected function processing(RequestInterface $request);

}


/**
 * 创建 http 缓存处理类。
 */
class HttpInMemoryCacheHandler extends Handler
{
    /**
     * @var array
     */
    private $data;

    /**
     * @param array $data
     * 传入数据数组参数。
     * @param Handler|null $successor
     * 传入处理器类对象 $successor 。
     */
    public function __construct(array $data, Handler $successor = null)
    {
        parent::__construct($successor);

        $this->data = $data;
    }

    /**
     * @param RequestInterface $request
     * 传入请求类对象参数 $request 。
     * @return string|null
     *
     * 返回缓存中对应路径存储的数据。
     */
    protected function processing(RequestInterface $request)
    {
        $key = sprintf(
            '%s?%s',
            $request->getUri()->getPath(),
            $request->getUri()->getQuery()
        );

        if ($request->getMethod() == 'GET' && isset($this->data[$key])) {
            return $this->data[$key];
        }

        return null;
    }
}