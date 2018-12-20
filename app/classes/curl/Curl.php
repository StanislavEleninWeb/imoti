<?php
namespace app\classes\curl;

/**
 *
 * @author stanislavelenin
 *        
 */
class Curl
{

    /**
     * Curl object
     *
     * @var object
     */
    private $_ch;

    /**
     * Curl Url
     *
     * @var string
     */
    private $_url;

    /**
     * Curl Header
     *
     * @var int
     */
    private $_header;

    /**
     * Curl nobody
     *
     * @var int
     */
    private $_nobody;

    /**
     *
     * @var int
     */
    private $_post;

    /**
     * Post data
     *
     * @var array
     */
    private $_postfields;
    
    /**
     * Followlocation
     *
     * @var int
     */
    private $_followlocation;

    /**
     * Maxredirs
     *
     * @var int
     */
    private $_maxredirs;

    /**
     * Returntranfer
     *
     * @var int
     */
    private $_returntransfer;

    /**
     * Referer
     *
     * @var string
     */
    private $_referer;

    /**
     * The maximum number of seconds to allow cURL functions to execute.
     *
     * @var int
     */
    private $_timeout;

    /**
     * The number of seconds to wait while trying to connect.
     *
     * @var int
     */
    private $_connecttimeout;

    /**
     * Cookiesession
     *
     * @var int
     */
    private $_cookiesession;

    /**
     *
     * @var int
     */
    private $_cookie;

    /**
     *
     * @var string
     */
    private $_cookiejar;

    /**
     *
     * @var string
     */
    private $_cookiefile;

    /**
     *
     * @var int
     */
    private $_failonerror;

    /**
     *
     * @var string
     */
    private $_useragent = 'Googlebot/2.1 (+http://www.google.com/bot.html)';

    /**
     *
     * @var array
     */
    private $_error;

    /**
     * Construct Curl object
     */
    public function __construct()
    {
        echo 'START CURL CLASS';
        $this->_error = array();

        $this->_ch = curl_init();

        if (! $this->_ch) {
            $this->_error[] = 'Failed to Initialize a cURL session ';
        }
    }

    /**
     * Set Curl params
     *
     * @param array $param
     */
    public function setOprions(array $param)
    {
        curl_reset($this->_ch);

        foreach ($param as $key => $value) {
            if (property_exists($this, '_'.$key)) {
                $this->{'_' . $key} = htmlspecialchars($value);
            } else {
                $this->_error[] = 'Failed to set option : ' . htmlspecialchars($key);
            }
        }
    }

    /**
     * Execute Curl request
     *
     * @return string
     */
    public function curl(): string
    {
        if (isset($this->_url)) {
            curl_setopt($this->_ch, CURLOPT_URL, $this->_url);
        } else {
            $this->_error[] = 'Failed no url set.';
            return '';
        }

        if (isset($this->_header)) {
            curl_setopt($this->_ch, CURLOPT_HEADER, $this->_header);
        }

        if (isset($this->_nobody)) {
            curl_setopt($this->_ch, CURLOPT_NOBODY, $this->_nobody);
        }

        if (isset($this->_post)) {
            curl_setopt($this->_ch, CURLOPT_POST, $this->_post);
        }

        if (isset($this->_postfields)) {
            curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $this->_postfields);
        }
        
        if (isset($this->_followlocation)) {
            curl_setopt($this->_ch, CURLOPT_FOLLOWLOCATION, $this->_followlocation);
        }

        if (isset($this->_maxredirs)) {
            curl_setopt($this->_ch, CURLOPT_MAXREDIRS, $this->_maxredirs);
        }

        if (isset($this->_returntransfer)) {
            curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, $this->_returntransfer);
        }

        if (isset($this->_referer)) {
            curl_setopt($this->_ch, CURLOPT_REFERER, $this->_referer);
        }

        if (isset($this->_timeout)) {
            curl_setopt($this->_ch, CURLOPT_TIMEOUT, $this->_timeout);
        }

        if (isset($this->_connecttimeout)) {
            curl_setopt($this->_ch, CURLOPT_CONNECTTIMEOUT, $this->_connecttimeout);
        }

        if (isset($this->_cookie)) {
            curl_setopt($this->_ch, CURLOPT_COOKIE, $this->_cookie);
        }

        if (isset($this->_cookiesession)) {
            curl_setopt($this->_ch, CURLOPT_COOKIESESSION, $this->_cookiesession);
        }

        if (isset($this->_cookiejar)) {
            curl_setopt($this->_ch, CURLOPT_COOKIEJAR, $this->_cookiejar);
        }

        if (isset($this->_cookiefile)) {
            curl_setopt($this->_ch, CURLOPT_COOKIEFILE, $this->_cookiefile);
        }

        $result = curl_exec($this->_ch);

        if ($result === false) {
            $this->_error[] = 'Curl error: ' . curl_error($this->_ch);
        }

        return $result;
    }

    /**
     * Return response code
     *
     * @return int
     */
    public function getResponseCode(): int
    {
        return curl_getinfo($this->_ch, CURLINFO_RESPONSE_CODE);
    }

    /**
     * Return Curl Errors
     *
     * @return string
     */
    public function getError(): string
    {
        return implode(', ' . PHP_EOL, $this->_error);
    }

    /**
     * Destroy Curl obect
     */
    function __destruct()
    {
        curl_close($this->_ch);
    }
}

