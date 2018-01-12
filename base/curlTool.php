<?php
/**
 * 一个curl的工具类
 * get post
 */
class CurlTool
{
    /**
     * get
     * @param $url
     * @param array $query
     * @return string
     */
    public function get($url, array $query = [])
    {
        if(!empty($query)) {
            $url = $url . '?' . http_build_query($query);
        }
        return self::request('GET', $url);
    }

    /**
     * post
     * @param $url
     * @param array $body
     * @param array $query
     * @return string
     */
    public function post($url, array $body = [], $query = [])
    {
        if(!empty($query)) {
            $url = $url . '?' . http_build_query($query);
        }
        return self::request('POST', $url, $body);
    }

    /**
     * 返回信息
     * @param $method
     * @param $url
     * @param array $body
     * @param array $header
     * @return string
     */
    private static function request($method, $url, array $body = [], array  $header = [])
    {
        //默认头信息
        $default_headers = [
            'Content-Type: application/json',
            'Connection: Keep-Alive'
        ];
        //转换大写
        $method = strtoupper($method);
        //curl
        $ch = curl_init();
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => (empty($headers) ? $default_headers : $headers),
            CURLOPT_CONNECTTIMEOUT => 20,
            CURLOPT_TIMEOUT => 120,

            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => ('UPLOAD' == $method) ? 'POST' : $method
        ];

        curl_setopt_array($ch, $options);
        $output = curl_exec($ch);
        //处理返回的内容
        if($output === false) {
            return 'error code:' . curl_errno($ch) . ', message' . curl_error($ch);
        } else {
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header_text = substr($output, 0, $header_size);
            $body = substr($output, $header_size);
            $headers = [];
            foreach (explode("\r\n",$header_text) as $k => $line) {
                if(!empty($line)) {
                    if ($k === 0) {
                        $headers[0] = $line;
                    } else if(strpos($line, ': ')) {
                        list($k, $v) = explode(': ', $line);
                        $headers[$k] = $v;
                    }
                }
            }
        }
        $response['code'] = $http_code;
        $response['headers'] = $headers;
        $response['body'] = json_decode($body, true);
        return $response;
    }
}