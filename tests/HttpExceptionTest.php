<?php

namespace Fuzz\HttpException\Tests;

use Fuzz\HttpException\AccessDeniedHttpException;
use Fuzz\HttpException\BadRequestHttpException;
use Fuzz\HttpException\ConflictHttpException;
use Fuzz\HttpException\GoneHttpException;
use Fuzz\HttpException\HttpException;
use Fuzz\HttpException\LengthRequiredHttpException;
use Fuzz\HttpException\MethodNotAllowedHttpException;
use Fuzz\HttpException\NotAcceptableHttpException;
use Fuzz\HttpException\NotFoundHttpException;
use Fuzz\HttpException\PreconditionFailedHttpException;
use Fuzz\HttpException\PreconditionRequiredHttpException;
use Fuzz\HttpException\ServiceUnavailableHttpException;
use Fuzz\HttpException\TooManyRequestsHttpException;
use Fuzz\HttpException\UnauthorizedHttpException;
use Fuzz\HttpException\UnprocessableEntityHttpException;
use Fuzz\HttpException\UnsupportedMediaTypeHttpException;

class HttpExceptionTest extends TestCase
{
	public function testItCanConstructException()
	{
		$exception = new StubException;
	}

	public function testItCanGetErrorName()
	{
		$exception = new StubException;
		$this->assertEquals('stub_exception', $exception->getErrorName());
	}

	public function testItCanGetStatusCode()
	{
		$exception = new StubException('message', 'formatted', ['foo' => 'bar'], ['header' => 'value'], new \Exception);
		$this->assertEquals(404, $exception->getStatusCode());
	}

	public function testItCanGetErrorMessage()
	{
		$exception = new StubException('message', 'formatted', ['foo' => 'bar'], ['header' => 'value'], new \Exception);
		$this->assertEquals('message', $exception->getMessage());
	}

	public function testItCanGetErrorFormatted()
	{
		$exception = new StubException('message', 'formatted', ['foo' => 'bar'], ['header' => 'value'], new \Exception);
		$this->assertEquals('formatted', $exception->getErrorFormatted());
	}

	public function testItCanGetErrorData()
	{
		$exception = new StubException('message', 'formatted', ['foo' => 'bar'], ['header' => 'value'], new \Exception);
		$this->assertEquals(['foo' => 'bar'], $exception->getErrorData());
	}

	public function testItCanGetErrorHeaders()
	{
		$exception = new StubException('message', 'formatted', ['foo' => 'bar'], ['header' => 'value'], new \Exception);
		$this->assertEquals(['header' => 'value'], $exception->getHeaders());
	}

	public function testAccessDeniedHttpException()
	{
		$exception = new AccessDeniedHttpException('foo');
		$this->assertEquals(403, $exception->getStatusCode());
		$this->assertEquals('access_denied', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testBadRequestHttpException()
	{
		$exception = new BadRequestHttpException('foo');
		$this->assertEquals(400, $exception->getStatusCode());
		$this->assertEquals('bad_request', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testConflictHttpException()
	{
		$exception = new ConflictHttpException('foo');
		$this->assertEquals(409, $exception->getStatusCode());
		$this->assertEquals('conflict', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testGoneHttpException()
	{
		$exception = new GoneHttpException('foo');
		$this->assertEquals(410, $exception->getStatusCode());
		$this->assertEquals('gone', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testLengthRequiredHttpException()
	{
		$exception = new LengthRequiredHttpException('foo');
		$this->assertEquals(411, $exception->getStatusCode());
		$this->assertEquals('length_required', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testMethodNotAllowedHttpException()
	{
		$exception = new MethodNotAllowedHttpException(['bar', 'baz'], 'foo');
		$this->assertEquals(405, $exception->getStatusCode());
		$this->assertEquals('method_not_allowed', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
		$this->assertEquals(['Allow' => 'BAR,BAZ'], $exception->getHeaders());
	}

	public function testNotAcceptableHttpException()
	{
		$exception = new NotAcceptableHttpException('foo');
		$this->assertEquals(406, $exception->getStatusCode());
		$this->assertEquals('not_acceptable', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testNotFoundHttpException()
	{
		$exception = new NotFoundHttpException('foo');
		$this->assertEquals(404, $exception->getStatusCode());
		$this->assertEquals('not_found', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testPreconditionFailedHttpException()
	{
		$exception = new PreconditionFailedHttpException('foo');
		$this->assertEquals(412, $exception->getStatusCode());
		$this->assertEquals('precondition_failed', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testPreconditionRequiredHttpException()
	{
		$exception = new PreconditionRequiredHttpException('foo');
		$this->assertEquals(428, $exception->getStatusCode());
		$this->assertEquals('precondition_required', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testServiceUnavailableHttpException()
	{
		$exception = new ServiceUnavailableHttpException(303, 'foo');
		$this->assertEquals(503, $exception->getStatusCode());
		$this->assertEquals('service_unavailable', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
		$this->assertEquals(['Retry-After' => 303], $exception->getHeaders());
	}

	public function testTooManyRequestsHttpException()
	{
		$exception = new TooManyRequestsHttpException(456, 'foo');
		$this->assertEquals(429, $exception->getStatusCode());
		$this->assertEquals('too_many_requests', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
		$this->assertEquals(['Retry-After' => 456], $exception->getHeaders());
	}

	public function testUnauthorizedHttpException()
	{
		$exception = new UnauthorizedHttpException('foo');
		$this->assertEquals(401, $exception->getStatusCode());
		$this->assertEquals('unauthorized', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testUnprocessableEntityHttpException()
	{
		$exception = new UnprocessableEntityHttpException('foo');
		$this->assertEquals(422, $exception->getStatusCode());
		$this->assertEquals('unprocessable_entity', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}

	public function testUnsupportedMediaTypeHttpException()
	{
		$exception = new UnsupportedMediaTypeHttpException('foo');
		$this->assertEquals(415, $exception->getStatusCode());
		$this->assertEquals('unsupported_media_type', $exception->getErrorName());
		$this->assertEquals('foo', $exception->getMessage());
	}
}

class StubException extends HttpException
{
	const HTTP_CODE = 404;

	protected $error_name = 'stub_exception';

	public function __construct($message = null, $error_formatted = null, array $error_data = [], array $headers = [], \Exception $previous = null)
	{
		parent::__construct($message, $error_formatted, $error_data, $headers, self::HTTP_CODE, $previous);
	}
}
