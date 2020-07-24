<?php
$challenge_key = $mysqli->query("SELECT * FROM settings WHERE id = '27'")->fetch_object()->value;
$private_key = $mysqli->query("SELECT * FROM settings WHERE id = '28'")->fetch_object()->value;
$hash_key = $mysqli->query("SELECT * FROM settings WHERE id = '29'")->fetch_object()->value;
$publicey=$challenge_key;
$privkey=$private_key;
$hashkey=$hash_key;
define("ADCOPY_API_SERVER",        "http://api.solvemedia.com");
define("ADCOPY_API_SECURE_SERVER", "https://api-secure.solvemedia.com");
define("ADCOPY_VERIFY_SERVER",     "verify.solvemedia.com");
define("ADCOPY_SIGNUP",            "http://api.solvemedia.com/public/signup");
function _adcopy_qsencode ($data) {
        $req = "";
        foreach ( $data as $key => $value )
                $req .= $key . '=' . urlencode( stripslashes($value) ) . '&';
        // Cut the last '&'
        $req=substr($req,0,strlen($req)-1);
        return $req;
}
function _adcopy_http_post($host, $path, $data, $port = 80) {
        $req = _adcopy_qsencode ($data);
        $http_request  = "POST $path HTTP/1.0\r\n";
        $http_request .= "Host: $host\r\n";
        $http_request .= "Content-Type: application/x-www-form-urlencoded;\r\n";
        $http_request .= "Content-Length: " . strlen($req) . "\r\n";
        $http_request .= "User-Agent: solvemedia/PHP\r\n";
        $http_request .= "\r\n";
        $http_request .= $req;
        $response = '';
        if( false == ( $fs = @fsockopen($host, $port, $errno, $errstr, 10) ) ) {
                die ('Could not open socket');
        }
        fwrite($fs, $http_request);
        while ( !feof($fs) )
                $response .= fgets($fs, 1024); // One TCP-IP packet [sic]
        fclose($fs);
        $response = explode("\r\n\r\n", $response, 2);
        return $response;
}
function solvemedia_get_html ($pubkey, $error = null, $use_ssl = false)
{
	if ($pubkey == null || $pubkey == '') {
		die ("To use solvemedia you must get an API key from <a href='" . ADCOPY_SIGNUP . "'>" . ADCOPY_SIGNUP . "</a>");
	}

	if ($use_ssl) {
                $server = ADCOPY_API_SECURE_SERVER;
        } else {
                $server = ADCOPY_API_SERVER;
        }

        $errorpart = "";
        if ($error) {
           $errorpart = ";error=1";
        }
        return '<script type="text/javascript" src="'. $server . '/papi/challenge.script?k=' . $pubkey . $errorpart . '"></script>
	<noscript>
  		<iframe src="'. $server . '/papi/challenge.noscript?k=' . $pubkey . $errorpart . '" height="300" width="500" frameborder="0"></iframe><br/>
  		<textarea name="adcopy_challenge" rows="3" cols="40"></textarea>
  		<input type="hidden" name="adcopy_response" value="manual_challenge"/>
	</noscript>';
}
class SolveMediaResponse {
        var $is_valid;
        var $error;
}
function solvemedia_check_answer ($privkey, $remoteip, $challenge, $response, $hashkey = '' )
{
	if ($privkey == null || $privkey == '') {
		die ("To use solvemedia you must get an API key from <a href='" . ADCOPY_SIGNUP . "'>" . ADCOPY_SIGNUP . "</a>");
	}

	if ($remoteip == null || $remoteip == '') {
		die ("For security reasons, you must pass the remote ip to solvemedia");
	}

        //discard spam submissions
        if ($challenge == null || strlen($challenge) == 0 || $response == null || strlen($response) == 0) {
                $adcopy_response = new SolveMediaResponse();
                $adcopy_response->is_valid = false;
                $adcopy_response->error = 'incorrect-solution';
                return $adcopy_response;
        }

        $response = _adcopy_http_post (ADCOPY_VERIFY_SERVER, "/papi/verify",
                                          array (
                                                 'privatekey' => $privkey,
                                                 'remoteip'   => $remoteip,
                                                 'challenge'  => $challenge,
                                                 'response'   => $response
                                                 )
                                          );

        $answers = explode ("\n", $response [1]);
        $adcopy_response = new SolveMediaResponse();

        if( strlen($hashkey) ){
                # validate message authenticator
                $hash = sha1( $answers[0] . $challenge . $hashkey );

                if( $hash != $answers[2] ){
                        $adcopy_response->is_valid = false;
                        $adcopy_response->error = 'hash-fail';
                        return $adcopy_response;
                }
        }

        if (trim ($answers [0]) == 'true') {
                $adcopy_response->is_valid = true;
        }
        else {
                $adcopy_response->is_valid = false;
                $adcopy_response->error = $answers [1];
        }
        return $adcopy_response;

}
function solvemedia_get_signup_url ($domain = null, $appname = null) {
	return ADCOPY_SIGNUP . "?" .  _adcopy_qsencode (array ('domain' => $domain, 'app' => $appname));
}
function solvemedia_precheck_response ($privkey, $verifycode)
{
    //discard spam submissions
    if ($verifycode == null || strlen($verifycode) == 0 ) {
            $adcopy_response = new SolveMediaResponse();
            $adcopy_response->is_valid = false;
            $adcopy_response->error = 'incorrect-solution';
            return $adcopy_response;
    }
    $response = _adcopy_http_post (ADCOPY_VERIFY_SERVER, "/papi/verify.precheck.server",
                                      array (
                                             'privatekey' => $privkey,
                                             'verify_code' => $verifycode
                                             )
                                      );
    $answers = explode ("\n", $response [1]);
    $adcopy_response = new SolveMediaResponse();

    if (trim ($answers [0]) == 'true') {
            $adcopy_response->is_valid = true;
    }
    else {
            $adcopy_response->is_valid = false;
            $adcopy_response->error = $answers [1];
    }
    return $adcopy_response;
}
$startsolvemedia = solvemedia_get_html("$publicey");
?>