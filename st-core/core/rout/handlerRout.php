<?php
namespace core\rout;

use lib\Rout;
use core\Exceptions\_404_NOT_FOUND;

//include_once('Request.php');
class handlerRout
{
    private $request;
    private $supportedHttpMethods = array(
        "GET",
        "POST",
        "PUT",
        "SET"
    );

    public function __construct(interfaces\IRequest $request)
    {
        $this->request = $request;
    }

    public function __call($name, $args)
    {
        list($route, $method) = $args;
        if (!in_array(strtoupper($name), $this->supportedHttpMethods)) {
            $this->invalidMethodHandler();
        }
        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }
    /**
     * Removes trailing forward slashes from the right of the route.
     * @param route (string)
     */
    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        $result = ltrim($route, '/');
        $result = explode("?", $result);
        $path = $result[0];
        $result = explode("/", $result[0]);
        $this->arg = $result;
        if ($result[0]=="asset") {
            $this->serveFile($this->arg, $path);
        }
        $result = "/".$result[0];
        if ($result === '') {
            return '/';
        }
        return $result;
    }

    private function invalidMethodHandler()
    {
        header("{$this->request->serverProtocol} 405 Method Not Allowed");
    }

    private function defaultRequestHandler()
    {
        header("{$this->request->serverProtocol} 404 Not Found");
    }
    /**
     * Resolves a route
     */
    public function resolve()
    {
        $methodDictionary = $this->{strtolower($this->request->requestMethod)};
        $formatedRoute = $this->formatRoute($this->request->requestUri);
        $method = null;
        if (isset($methodDictionary[$formatedRoute])) {
            $method = $methodDictionary[$formatedRoute];
        }
        if (is_null($method)) {
            $method = $methodDictionary["/"];
        }
        echo call_user_func_array($method, array(array("request"=>$this->request,"var"=>$this->arg)));
    }

    public function __destruct()
    {
        //$this->resolve();
    }

    //serve to the client asset file like image,js,css and other media file

    public function serveFile($arg, $path)
    {
        $filename = $arg[\count($arg)-1];
        try {
            if (\is_file(ROOT.$path)  && \file_exists(ROOT.$path)) {
                header_remove('Cache-Control');
                header_remove("Pragma");
                header('Content-Type: '.get_mime_type($filename));
                readfile(ROOT.$path);
                exit();
            } else {
                throw new _404_NOT_FOUND();
            }
        } catch (_404_NOT_FOUND $e) {
            $e->errorMessage();
        }
    }
}

function get_mime_type($filename)
{
    $idx = explode('.', $filename);
    $count_explode = count($idx);
    $idx = strtolower($idx[$count_explode-1]);

    $mimet = array(
        'txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',

        // images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',

        // archives
        //'zip' => 'application/zip',
        //'rar' => 'application/x-rar-compressed',
        //'exe' => 'application/x-msdownload',
        //'msi' => 'application/x-msdownload',
        //'cab' => 'application/vnd.ms-cab-compressed',

        // audio/video
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',

        // adobe
        'pdf' => 'application/pdf',
        'psd' => 'image/vnd.adobe.photoshop',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',

        // ms office
        'doc' => 'application/msword',
        'rtf' => 'application/rtf',
        'xls' => 'application/vnd.ms-excel',
        'ppt' => 'application/vnd.ms-powerpoint',
        'docx' => 'application/msword',
        'xlsx' => 'application/vnd.ms-excel',
        'pptx' => 'application/vnd.ms-powerpoint',


        // open office
        'odt' => 'application/vnd.oasis.opendocument.text',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    );

    if (isset($mimet[$idx])) {
        return $mimet[$idx];
    } else {
        return 'application/octet-stream';
    }
}
