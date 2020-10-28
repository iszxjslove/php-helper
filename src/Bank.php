<?php


namespace phpHelper;


use Overtrue\Pinyin\FileDictLoader;
use Overtrue\Pinyin\GeneratorFileDictLoader;
use Overtrue\Pinyin\MemoryFileDictLoader;
use Overtrue\Pinyin\Pinyin;

/**
 * Class Bank
 * @package phpHelper
 */
class Bank
{
    /**
     * @var Pinyin
     */
    protected $pinyin;

    /**
     * @var string[]
     */
    protected $loader = [
        FileDictLoader::class,
        MemoryFileDictLoader::class,
        GeneratorFileDictLoader::class
    ];

    /**
     * @var string
     */
    private $name = '';

    /**
     * BankHelper constructor.
     * @param int $loaderName
     */
    public function __construct($loaderName = 0)
    {
        $this->pinyin = new Pinyin($this->loader[$loaderName] ?? $this->loader[0]);
    }

    /**
     * 银行名称
     * @param string $name
     * @return $this
     */
    public function bank(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * 首字母
     * @param string $delimiter
     * @param int $option
     * @return string
     */
    public function abbr($delimiter = '', $option = PINYIN_UMLAUT_V): string
    {
        return $this->pinyin->abbr($this->name, $delimiter, $option);
    }

    /**
     * 拼音
     * @param string $delimiter
     * @param int $option
     * @return string
     */
    public function py($delimiter = '', $option = PINYIN_UMLAUT_V): string
    {
        return $this->pinyin->permalink($this->name, $delimiter, $option);
    }

    /**
     * LOGO图标
     * @param int $type 图标类型
     * @return string
     */
    public function logo($type = 0): string
    {
        return '';
    }

    /**
     * 官网
     * @return string
     */
    public function official(): string
    {
        return '';
    }

    /**
     * 电话
     * @return string
     */
    public function phone(): string
    {
        return '';
    }
}