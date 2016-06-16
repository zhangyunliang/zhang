<?php
/**
 * ȫ�����ò�������
 *
 * @category Taoapi
 * @package Taoapi_Config
 * @copyright Copyright (c) 2008-2010 Taoapi (http://www.Taoapi.com)
 * @license    http://www.Taoapi.com
 * @version    Id: Taoapi_Config  2010-02-22 15:36:47 Arvin
 */
class taoapi_config
{
    //���ȫ�ֲ���
    private $_Config;

    /**
     * @var  Taoapi_Config
     */
    private static $_init;

    private function __construct()
    {
		$this->_Config = require_once dirname(__FILE__).'/taoapi_config.inc.php';

		$this->setTestMode($this->_Config['TestMode']);
		$this->setCloseError();
		$this->_Config['PostMode'] = array('GET' => 'getSend' , 'POST' => 'postSend' , 'POSTIMG' => 'postImageSend');
    }

    /**
     * @return Taoapi_Config
     */
    public static function Init ()
    {
        if (! self::$_init) {
            self::$_init = new taoapi_config();
        }
        return self::$_init;
    }

    /**
	 * �������ݻ���: true ���Ի��� false ��ʽ����
	 * @param bool $test
     * @return Taoapi_Config
     */
    public function setTestMode ($test = true)
    {
 		if($test)
 		{
 		    $this->_Config['Container'] = 'http://container.api.tbsandbox.com/container';
 			$this->_Config['Url'] = 'http://gw.api.tbsandbox.com/router/rest';
 		}else{
 			$this->_Config['Url'] = 'http://gw.api.taobao.com/router/rest';
 		    $this->_Config['Container'] = 'http://container.api.taobao.com/container';
 		}
        return $this;
    }


    /**
     * ���û�ȡ���ݵı���. ֧��UTF-8 GBK GB2312
     * ��Ҫ iconv��mb_convert_encoding ����֧��
     * UTF-8 ����д��UTF8
     * @param string $Charset
     * @return Taoapi_Config
     */
	public function setCharset($Charset)
	{
 		$this->_Config['Charset'] = $Charset;

        return $this;
	}

    /**
     * ����appKey
     *
     * @param int $key
     * @return Taoapi_Config
     */
    public function setAppKey ($key)
    {
        if(is_array($key))
        {
            $this->_Config['AppKey'] = $key;
        }else{
            $this->_Config['AppKey'][$key] = 0;
        }

        return $this;
    }

    /**
     * ����appSecret
     *
     * @param string $Secret
     * @return Taoapi_Config
     */
    public function setAppSecret ($Secret)
    {
		$key = array_search('0',$this->_Config['AppKey']);

		if($key)
		{
			$this->_Config['AppKey'][$key] = $Secret;
		}

        return $this;
    }

    /**
     * ��appKey��ֻһ��ʱ,API�������޺��Զ�������һ��APPKEY
     *
     * @param bool $Secret
     * @return Taoapi_Config
     */
    public function setAppKeyAuto ($AppKeyAuto)
    {
        $this->_Config['AppKeyAuto'] = (bool)$AppKeyAuto;

        return $this;
    }

    /**
     * ����API�汾,1 ��ʾ1.0 2��ʾ2.0
     * ����sign���ܷ�ʽ,֧�� md5 �� hmac
     *
     * @param int $version
     * @param string $signmode
     * @return Taoapi_Config
     */
    public function setVersion ($version,$signmode = 'md5')
    {
        $this->_Config['Version'] = intval($version);
        $this->_Config['SignMode'] = $signmode;

        return $this;
    }

    /**
     * ����sign���ܷ�ʽ,֧�� md5 �� hmac
     *
     * @param string $signmode
     * @return Taoapi_Config
     */
    public function setSignMode ($signmode = 'md5')
    {
        $this->_Config['SignMode'] = $signmode;

        return $this;
    }

    /**
     * ��ʾ��رմ�����ʾ
     *
     * @param bool $CloseError
     * @return Taoapi_Config
     */
    public function setCloseError($CloseError = true)
    {
        $this->_Config['CloseError'] = (bool)$CloseError;

        return $this;
    }

    /**
     * ������ر�API������־����,
     * ��������Բ鿴��ÿ��APPKEY���õĴ����Լ����õ�API
     *
     * @param bool $Log
     * @return Taoapi_Config
     */
    public function setApiLog($Log)
    {
        $this->_Config['ApiLog'] = (bool)$Log;

        return $this;
    }

    /**
     * ������رմ�����־����
     *
     * @param bool $Errorlog
     * @return Taoapi_Config
     */
    public function setErrorlog($Errorlog)
    {
        $this->_Config['Errorlog'] = $Errorlog;

        return $this;
    }

    /**
     * ����API��ȡʧ��ʱ���ԵĴ���,
     * �������API���ȶ���,�Ƽ�Ϊ3��
     *
     * @param int $RestNumberic
     * @return Taoapi_Config
     */
    public function setRestNumberic($RestNumberic)
    {
        $this->_Config['RestNumberic'] = intval($RestNumberic);;

        return $this;
    }

    /**
     * �������ݻ����ʱ��,
     * ��λ:Сʱ;0��ʾ������
     *
     * @param int $cache
     * @return Taoapi_Config
     */
    public function setCache($cache = 0)
    {
        $this->_Config['Cache'] = intval($cache);

        return $this;
    }

    /**
     * ���û��汣���Ŀ¼
     *
     * @param string $CachePath
     * @return Taoapi_Config
     */
    public function setCachePath($CachePath)
    {
 		  $this->_Config['CachePath'] = $CachePath;

        return $this;
    }

    /**
     * ����ȫ�����ò���
     *
     * @return object
     */
    public function getConfig()
    {
        return (object)$this->_Config;
    }
}