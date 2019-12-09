<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('abort'))
{
    function abort(int $error_code)
    {
    	// https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
    	switch ($error_code) {
    		case 203:
		    	$header = '203 Non-Authoritative Information (since HTTP/1.1)';
		    	$message = 'The server is a transforming proxy (e.g. a Web accelerator) that received a 200 OK from its origin, but is returning a modified version of the origin\'s response.';
    			break;

    		case 204:
		    	$header = '204 No Content.';
		    	$message = 'The server successfully processed the request and is not returning any content.';
    			break;

    		case 205:
		    	$header = '205 Reset Content.';
		    	$message = 'The server successfully processed the request, but is not returning any content. Unlike a 204 response, this response requires that the requester reset the document view.';
    			break;

    		case 206:
		    	$header = '206 Partial Content .';
		    	$message = 'The server is delivering only part of the resource (byte serving) due to a range header sent by the client. The range header is used by HTTP clients to enable resuming of interrupted downloads, or split a download into multiple simultaneous streams.';
    			break;

    		case 207:
		    	$header = '207 Multi-Status (WebDAV; RFC 4918).';
		    	$message = 'The message body that follows is by default an XML message and can contain a number of separate response codes, depending on how many sub-requests were made.';
    			break;

    		case 208:
		    	$header = '208 Already Reported (WebDAV; RFC 5842).';
		    	$message = 'The members of a DAV binding have already been enumerated in a preceding part of the (multistatus) response, and are not being included again.';
    			break;

    		case 226:
		    	$header = '226 IM Used (RFC 3229).';
		    	$message = 'The server has fulfilled a request for the resource, and the response is a representation of the result of one or more instance-manipulations applied to the current instance..';
    			break;

    		case 300:
		    	$header = '300 Multiple Choices';
		    	$message = 'Indicates multiple options for the resource from which the client may choose (via agent-driven content negotiation). For example, this code could be used to present multiple video format options, to list files with different filename extensions, or to suggest word-sense disambiguation.';
    			break;

    		case 301:
		    	$header = '301 Moved Permanently';
		    	$message = 'This and all future requests should be directed to the given URI.';
    			break;

    		case 302:
		    	$header = '302 Found (Previously "Moved temporarily")';
		    	$message = 'Tells the client to look at (browse to) another URL. 302 has been superseded by 303 and 307. This is an example of industry practice contradicting the standard. The HTTP/1.0 specification (RFC 1945) required the client to perform a temporary redirect (the original describing phrase was "Moved Temporarily"),[22] but popular browsers implemented 302 with the functionality of a 303 See Other. Therefore, HTTP/1.1 added status codes 303 and 307 to distinguish between the two behaviours.[23] However, some Web applications and frameworks use the 302 status code as if it were the 303.';
    			break;

    		case 303:
		    	$header = '303 See Other (since HTTP/1.1)';
		    	$message = 'The response to the request can be found under another URI using the GET method. When received in response to a POST (or PUT/DELETE), the client should presume that the server has received the data and should issue a new GET request to the given URI.';
    			break;

    		case 304:
		    	$header = '304 Not Modified (RFC 7232)';
		    	$message = 'Indicates that the resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match. In such case, there is no need to retransmit the resource since the client still has a previously-downloaded copy.';
    			break;

    		case 305:
		    	$header = '305 Use Proxy (since HTTP/1.1)';
		    	$message = 'The requested resource is available only through a proxy, the address for which is provided in the response. For security reasons, many HTTP clients (such as Mozilla Firefox and Internet Explorer) do not obey this status code.';
    			break;

    		case 306:
		    	$header = '306 Switch Proxy';
		    	$message = 'No longer used. Originally meant "Subsequent requests should use the specified proxy."';
    			break;

    		case 307:
		    	$header = '307 Temporary Redirect (since HTTP/1.1)';
		    	$message = 'In this case, the request should be repeated with another URI; however, future requests should still use the original URI. In contrast to how 302 was historically implemented, the request method is not allowed to be changed when reissuing the original request. For example, a POST request should be repeated using another POST request.';
    			break;

    		case 308:
		    	$header = '308 Permanent Redirect (RFC 7538)';
		    	$message = 'The request and all future requests should be repeated using another URI. 307 and 308 parallel the behaviors of 302 and 301, but do not allow the HTTP method to change. So, for example, submitting a form to a permanently redirected resource may continue smoothly.';
    			break;

    		case 400:
		    	$header = '400 Bad Request';
		    	$message = 'The server cannot or will not process the request due to an apparent client error (e.g., malformed request syntax, size too large, invalid request message framing, or deceptive request routing).';
    			break;

    		case 401:
		    	$header = '401 Unauthorized (RFC 7235)';
		    	$message = 'Similar to 403 Forbidden, but specifically for use when authentication is required and has failed or has not yet been provided. The response must include a WWW-Authenticate header field containing a challenge applicable to the requested resource. See Basic access authentication and Digest access authentication.[33] 401 semantically means "unauthorised",[34] the user does not have valid authentication credentials for the target resource.
Note: Some sites incorrectly issue HTTP 401 when an IP address is banned from the website (usually the website domain) and that specific address is refused permission to access a website.';
    			break;

    		case 402:
		    	$header = '402 Payment Required';
		    	$message = 'Reserved for future use. The original intention was that this code might be used as part of some form of digital cash or micropayment scheme, as proposed, for example, by GNU Taler,[35] but that has not yet happened, and this code is not usually used. Google Developers API uses this status if a particular developer has exceeded the daily limit on requests.[36] Sipgate uses this code if an account does not have sufficient funds to start a call.[37] Shopify uses this code when the store has not paid their fees and is temporarily disabled.[38] Stripe uses this code for failed payments where parameters were correct, for example blocked fraudulent payments.';
    			break;

    		case 403:
		    	$header = '403 Forbidden';
		    	$message = 'The request contained valid data and was understood by the server, but the server is refusing action. This may be due to the user not having the necessary permissions for a resource or needing an account of some sort, or attempting a prohibited action (e.g. creating a duplicate record where only one is allowed). This code is also typically used if the request provided authentication via the WWW-Authenticate header field, but the server did not accept that authentication. The request should not be repeated.';
    			break;

    		case 404:
		    	$header = '404 Page not found.';
		    	$message = 'The requested resource could not be found but may be available in the future. Subsequent requests by the client are permissible.';
    			break;

    		case 405:
		    	$header = '405 Method Not Allowed';
		    	$message = 'A request method is not supported for the requested resource; for example, a GET request on a form that requires data to be presented via POST, or a PUT request on a read-only resource.';
    			break;

    		case 406:
		    	$header = '406 Not Acceptable';
		    	$message = 'The requested resource is capable of generating only content not acceptable according to the Accept headers sent in the request.[40] See Content negotiation.';
    			break;

    		case 407:
		    	$header = '407 Proxy Authentication Required (RFC 7235)';
		    	$message = 'he client must first authenticate itself with the proxy.';
    			break;

    		case 408:
		    	$header = '408 Request Timeout';
		    	$message = 'The server timed out waiting for the request. According to HTTP specifications: "The client did not produce a request within the time that the server was prepared to wait. The client MAY repeat the request without modifications at any later time."';
    			break;

    		case 409:
		    	$header = '409 Conflict';
		    	$message = 'Indicates that the request could not be processed because of conflict in the current state of the resource, such as an edit conflict between multiple simultaneous updates.';
    			break;

    		case 410:
		    	$header = '410 Gone';
		    	$message = 'ndicates that the resource requested is no longer available and will not be available again. This should be used when a resource has been intentionally removed and the resource should be purged. Upon receiving a 410 status code, the client should not request the resource in the future. Clients such as search engines should remove the resource from their indices.[43] Most use cases do not require clients and search engines to purge the resource, and a "404 Not Found" may be used instead.';
    			break;

    		case 411:
		    	$header = '411 Length Required';
		    	$message = 'The request did not specify the length of its content, which is required by the requested resource.';
    			break;

    		case 500:
		    	$header = '500 Internal Server Error';
		    	$message = 'A generic error message, given when an unexpected condition was encountered and no more specific message is suitable.';
    			break;

    		case 501:
		    	$header = '501 Not Implemented';
		    	$message = 'The server either does not recognize the request method, or it lacks the ability to fulfil the request. Usually this implies future availability (e.g., a new feature of a web-service API).';
    			break;

    		case 502:
		    	$header = '502 Bad Gateway';
		    	$message = 'The server was acting as a gateway or proxy and received an invalid response from the upstream server.[66]';
    			break;

    		case 503:
		    	$header = '503 Service Unavailable';
		    	$message = 'The server cannot handle the request (because it is overloaded or down for maintenance). Generally, this is a temporary state.[67]';
    			break;

    		case 504:
		    	$header = '504 Gateway Timeout';
		    	$message = 'The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.[68]';
    			break;

    		case 505:
		    	$header = '505 HTTP Version Not Supported';
		    	$message = 'The server does not support the HTTP protocol version used in the request.[69]';
    			break;

    		case 506:
		    	$header = '506 Variant Also Negotiates (RFC 2295)';
		    	$message = 'Transparent content negotiation for the request results in a circular reference.[70]';
    			break;

    		case 507:
		    	$header = '507 Insufficient Storage (WebDAV; RFC 4918)';
		    	$message = 'The server is unable to store the representation needed to complete the request.[17]';
    			break;

    		case 508:
		    	$header = '508 Loop Detected (WebDAV; RFC 5842)';
		    	$message = 'The server detected an infinite loop while processing the request (sent instead of 208 Already Reported).';
    			break;

    		case 510:
		    	$header = '510 Not Extended (RFC 2774)';
		    	$message = 'Further extensions to the request are required for the server to fulfil it.[71]';
    			break;

    		case 511:
		    	$header = '511 Network Authentication Required (RFC 6585)';
		    	$message = 'The client needs to authenticate to gain network access. Intended for use by intercepting proxies used to control access to the network (e.g., "captive portals" used to require agreement to Terms of Service before granting full Internet access via a Wi-Fi hotspot).[60]';
    			break;

    		default:
    			$header = 'Error page';
		    	$message = 'Unknown error.';
    			break;
    	}

    	$message = str_replace("\n", "<br>", $message);
    	show_error($message, $error_code, $header);
    }
}
