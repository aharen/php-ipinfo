<?php
/*
The MIT License (MIT)

Copyright (c) 2015 Ahmed Khusaam (@aharen) - http://ahmed.khusaam.com

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

class ipinfo {
	
	private $host = 'http://ipinfo.io/';
	private $ip;
	private $curluri;
	
	public $response;
	
	public function __construct($ip = NULL) {
		$this->ip = $ip;
	}
	
	public function fetch() {
		return $this->ipCurl();
	}
	
	private function ipCurl() {
		$this->curluri = $this->host;
		$this->curluri .= (($this->ip == '') || (empty($this->ip))) ? 'json' : $this->ip.'/json';
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->curluri);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);

		$this->response = curl_exec($ch);
		curl_close($ch);
		
		$this->response = json_decode($this->response, TRUE);
		
 		if(!is_array($this->response)) {
			$this->response = array('error' => $this->response);
		} 
		
		return (object)$this->response;
	} 
}