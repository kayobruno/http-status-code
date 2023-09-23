<?php

declare(strict_types=1);

namespace App;

use App\Contracts\StatusCode;

enum HttpStatusCode:int implements StatusCode
{
	case CONTINUE = 100;
	case SWITCHING_PROTOCOLS = 101;
	case PROCESSING = 102;
	case EARLY_HINTS = 103;

	case OK = 200;
	case CREATED = 201;
	case ACCEPTED = 202;
	case NON_AUTHORITATIVE_INFORMATION = 203;
	case NO_CONTENT = 204;
	case RESET_CONTENT = 205;
	case PARTIAL_CONTENT = 206;
	case MULTI_STATUS = 207;
	case ALREADY_REPORTED = 208;
	case IM_USED = 226;

	case MULTIPLE_CHOICES = 300;
	case MOVED_PERMANENTLY = 301;
	case FOUND = 302;
	case SEE_OTHER = 303;
	case NOT_MODIFIED = 304;
	case USE_PROXY = 305;
	case SWITCH_PROXY = 306;
	case TEMPORARY_REDIRECT = 307;
	case PERMANENT_REDIRECT = 308;

	case BAD_REQUEST = 400;
	case UNAUTHORIZED = 401;
	case PAYMENT_REQUIRED = 402;
	case FORBIDDEN = 403;
	case NOT_FOUND = 404;
	case METHOD_NOT_ALLOWED = 405;
	case NOT_ACCEPTABLE = 406;
	case PROXY_AUTHENTICATION_REQUIRED = 407;
	case REQUEST_TIMEOUT = 408;
	case CONFLICT = 409;
	case GONE = 410;
	case LENGTH_REQUIRED = 411;
	case PRECONDITION_FAILED = 412;
	case PAYLOAD_TOO_LARGE = 413;
	case URI_TOO_LONG = 414;
	case UNSUPPORTED_MEDIA_TYPE = 415;
	case RANGE_NOT_SATISFIABLE = 416;
	case EXPECTATION_FAILED = 417;
	case IM_A_TEAPOT = 418;
	case MISDIRECTED_REQUEST = 421;
	case UNPROCESSABLE_ENTITY = 422;
	case LOCKED = 423;
	case FAILED_DEPENDENCY = 424;
	case TOO_EARLY = 425;
	case UPGRADE_REQUIRED = 426;
	case PRECONDITION_REQUIRED = 428;
	case TOO_MANY_REQUESTS = 429;
	case REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
	case UNAVAILABLE_FOR_LEGAL_REASONS = 451;

	case INTERNAL_SERVER_ERROR = 500;
	case NOT_IMPLEMENTED = 501;
	case BAD_GATEWAY = 502;
	case SERVICE_UNAVAILABLE = 503;
	case GATEWAY_TIMEOUT = 504;
	case HTTP_VERSION_NOT_SUPPORTED = 505;
	case VARIANT_ALSO_NEGOTIATES = 506;
	case INSUFFICIENT_STORAGE = 507;
	case LOOP_DETECTED = 508;
	case NOT_EXTENDED = 510;
	case NETWORK_AUTHENTICATION_REQUIRED = 511;

	public function description(): string
	{
		return match($this)
		{
			self::CONTINUE => 'The server has received the request headers',
			self::SWITCHING_PROTOCOLS => 'Indicates a protocol to which the server switches',
			self::PROCESSING => 'Full request has been received and the server is working on it',
			self::EARLY_HINTS => 'Hints about the resources that the server is expecting the final response will link',
			self::OK => 'The request has succeeded',
			self::CREATED => 'The request has succeeded and has led to the creation of a resource',
			self::ACCEPTED => 'The request has been accepted for processing, but the processing has not been completed',
			self::NON_AUTHORITATIVE_INFORMATION => 'The request was successful but the enclosed payload has been modified',
			self::NO_CONTENT => 'The request has succeeded, but that the client does not need to navigate away',
			self::RESET_CONTENT => 'Tells the client to reset the document view',
			self::PARTIAL_CONTENT => 'The request has succeeded and the body contains the requested ranges of data',
			self::MULTI_STATUS => 'There might be a mixture of responses',
			self::ALREADY_REPORTED => 'Is used in a (207 Multi-Status) response to save space and avoid conflicts',
			self::IM_USED => 'The server to indicate that it is returning a delta to the GET request that it received',
			self::MULTIPLE_CHOICES => 'The request has more than one possible response',
			self::MOVED_PERMANENTLY => 'The requested resource has been definitively moved to the URL given by the Location headers',
			self::FOUND => 'Tells the client to look at (browse to) another URL',
			self::SEE_OTHER => 'Redirects do not link to the requested resource itself, but to another page',
			self::NOT_MODIFIED => 'There is no need to retransmit the requested resources',
			self::USE_PROXY => 'The requested resource is available only through a proxy',
			self::SWITCH_PROXY => 'Subsequent requests should use the specified proxy',
			self::TEMPORARY_REDIRECT => 'The resource requested has been temporarily moved to the URL given by the Location headers',
			self::PERMANENT_REDIRECT => 'The resource requested has been definitively redirected to the URL given by the Location headers',
			self::BAD_REQUEST => 'The request cannot be fulfilled due to bad syntax',
			self::UNAUTHORIZED => 'The client request has not been completed because it lacks valid authentication credentials',
			self::PAYMENT_REQUIRED => 'The requested content is not available until the client makes a payment',
			self::FORBIDDEN => 'The server understands the request but refuses to authorize it',
			self::NOT_FOUND => 'The server cannot find the requested resource',
			self::METHOD_NOT_ALLOWED => 'The server knows the request method, but the target resource does not support this method',
			self::NOT_ACCEPTABLE => 'The server cannot produce a response matching the list of acceptable values defined in the request`s',
			self::PROXY_AUTHENTICATION_REQUIRED => 'The request has not been applied because it lacks valid authentication credentials for a proxy server',
			self::REQUEST_TIMEOUT => 'The server would like to shut down this unused connection',
			self::CONFLICT => 'Request conflict with the current state of the target resource.',
			self::GONE => 'That access to the target resource is no longer available at the origin server',
			self::LENGTH_REQUIRED => 'The server refuses to accept the request without a defined Content-Length header',
			self::PRECONDITION_FAILED => 'That access to the target resource has been denied',
			self::PAYLOAD_TOO_LARGE => 'The request entity is larger than limits defined by server',
			self::URI_TOO_LONG => 'The URI requested by the client is longer than the server is willing to interpret',
			self::UNSUPPORTED_MEDIA_TYPE => 'The server refuses to accept the request because the payload format is in an unsupported format',
			self::RANGE_NOT_SATISFIABLE => 'That a server cannot serve the requested ranges',
			self::EXPECTATION_FAILED => 'The expectation given in the request`s Expect header could not be met',
			self::IM_A_TEAPOT => 'This error is a reference to Hyper Text Coffee Pot Control Protocol defined in April Fools jokes in 1998 and 2014.',
			self::MISDIRECTED_REQUEST => 'The request was directed to a server that is not able to produce a response',
			self::UNPROCESSABLE_ENTITY => 'The server understands the content type of the request entity, and the syntax of the request entity is correct',
			self::LOCKED => 'The resources tentatively targeted by is locked',
			self::FAILED_DEPENDENCY => 'The method could not be performed on the resource because the requested action depended on another action',
			self::TOO_EARLY => 'The server is unwilling to risk processing a request that might be replayed',
			self::UPGRADE_REQUIRED => 'The server refuses to perform the request using the current protocol but might be willing to do so after the client upgrades to a different protocol.',
			self::PRECONDITION_REQUIRED => 'The server requires the request to be conditional',
			self::TOO_MANY_REQUESTS => 'The user has sent too many requests in a given amount of time',
			self::REQUEST_HEADER_FIELDS_TOO_LARGE => 'The server refuses to process the request because the request`s HTTP headers are too long',
			self::UNAVAILABLE_FOR_LEGAL_REASONS => 'The user requested a resource that is not available due to legal reasons',
			self::INTERNAL_SERVER_ERROR => 'The server encountered an unexpected condition that prevented it from fulfilling the request',
			self::NOT_IMPLEMENTED => 'The server does not support the functionality required to fulfill the request',
			self::BAD_GATEWAY => 'The server, while acting as a gateway or proxy, received an invalid response from the upstream server.',
			self::SERVICE_UNAVAILABLE => 'The server is not ready to handle the request',
			self::GATEWAY_TIMEOUT => 'The server, while acting as a gateway or proxy, did not get a response in time from the upstream',
			self::HTTP_VERSION_NOT_SUPPORTED => 'The HTTP version used in the request is not supported by the server',
			self::VARIANT_ALSO_NEGOTIATES => 'The server has a configuration error in which the chosen variant is itself configured to engage in content negotiation',
			self::INSUFFICIENT_STORAGE => 'The server cannot store the representation needed to successfully complete the request',
			self::LOOP_DETECTED => 'The server terminated an operation because it encountered an infinite loop while processing a request with "Depth: infinity"',
			self::NOT_EXTENDED => 'The server receives such a request, but any described extensions are not supported for the request',
			self::NETWORK_AUTHENTICATION_REQUIRED => 'The client needs to authenticate to gain network access',
		};
	}

	public function isSuccess(): bool
	{
		return match ($this) {
			self::OK,
			self::CREATED,
			self::ACCEPTED,
			self::NON_AUTHORITATIVE_INFORMATION,
			self::NO_CONTENT,
			self::RESET_CONTENT,
			self::PARTIAL_CONTENT,
			self::MULTI_STATUS,
			self::ALREADY_REPORTED,
			self::IM_USED => true,
			default => false,
		};
	}

	public function category(): HttpStatusCodeCategory
	{
		return match (true) {
			(intdiv($this->value, 100) === 1) => HttpStatusCodeCategory::INFORMATIONAL,
			(intdiv($this->value, 100) === 2) => HttpStatusCodeCategory::SUCCESSFUL,
			(intdiv($this->value, 100) === 3) => HttpStatusCodeCategory::REDIRECTION,
			(intdiv($this->value, 100) === 4) => HttpStatusCodeCategory::CLIENT_ERROR,
			(intdiv($this->value, 100) === 5) => HttpStatusCodeCategory::SERVER_ERROR,
		};
	}
}