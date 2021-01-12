<?php
    /*
        PAMANTASAN NG LUNGSOD NG MUNTINLUPA
        FORDEE@BETA-v0.1
    */
    class Fordee {

        function _key() {
            return $key = '42c8b78d856848bc8834ff8c5b59005181addd9a'; 
        }

        // ENCRYPT DATA
        function _encrypt($data, $key) {
            $method 	    = 'aes-256-cbc';
            $iv_lenght 	    = openssl_cipher_iv_length($method);  
            $iv_bytes	    = openssl_random_pseudo_bytes($iv_lenght);
            $ciphertext     = openssl_encrypt($data, $method, $key, 0, $iv_bytes);
            return base64_encode($ciphertext . '|:' . $iv_bytes);
        }
        
        // DECRYPT DATA
        function _decrypt($data, $key) {
            $encrypted	    = base64_decode($data);
            $separator 	    = explode('|:', $encrypted);
            return openssl_decrypt($separator[0], 'aes-256-cbc', $key, 0, $separator[1]);
        }

        // USERID, SESSIONID
        function _createToken($x, $y) {
            $token = sha1(hash('sha512',$x.$y.'>F0RD3E-T0K3N-2O20!<'));
            return $token; 
        }

        // USERID, SESSIONID, TOKEN
        function _validateToken($x,$y,$token) {
            if(sha1(hash('sha512',$x.$y.'>F0RD3E-T0K3N-2O20!<')) == $token){
                return true;
            };
            return false;
        }
        
        // STRIP TAGS
        function _stripString($x) {
            $x = htmlspecialchars(strip_tags($x));
            return $x;
        }

        // function _setCookie() {
        //     return true;
        // }

        // function _deleteCookie() {
        //     return true;
        // }

    }
?>