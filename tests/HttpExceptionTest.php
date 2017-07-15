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
use Fuzz\HttpException\NotImplementedHttpException;
use Fuzz\HttpException\PreconditionFailedHttpException;
use Fuzz\HttpException\PreconditionRequiredHttpException;
use Fuzz\HttpException\ServiceUnavailableHttpException;
use Fuzz\HttpException\TooManyRequestsHttpException;
use Fuzz\HttpException\UnauthorizedHttpException;
use Fuzz\HttpException\UnprocessableEntityHttpException;
use Fuzz\HttpException\UnsupportedMediaTypeHttpException;

class HttpExceptionTest extends TestCase
{
	public function testItCanGetError()
	{
		$exception = new HttpException();
		$exception->setError('stub_exception');
		$this->assertEquals('stub_exception', $exception->getError());
	}

	public function testItCanGetStatusCode()
	{
		$exception = new HttpException();
		$this->assertEquals(500, $exception->getStatusCode());
	}

	public function testItCanGetErrorMessage()
	{
		$exception = new HttpException();
		$exception->setErrorDescription('message');
		$this->assertEquals('message', $exception->getErrorDescription());
	}

	public function testItCanGetUserMessage()
	{
		$exception = new HttpException();
		$exception->setUserMessage('user message');
		$this->assertEquals('user message', $exception->getUserMessage());
	}

	public function testItCanGetErrorData()
	{
		$exception = new HttpException();
		$exception->setErrorData(['foo' => 'bar']);
		$this->assertEquals(['foo' => 'bar'], $exception->getErrorData());
	}

	public function testItCanGetErrorHttpHeaders()
	{
		$exception = new HttpException();
		$exception->setHttpHeaders(['header' => 'value']);
		$this->assertEquals(['header' => 'value'], $exception->getHttpHeaders());
	}

	public function testAccessDeniedHttpException()
	{
		$exception = new AccessDeniedHttpException('foo', [], 'user title');
		$this->assertEquals(403, $exception->getStatusCode());
		$this->assertEquals('access_denied', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testBadRequestHttpException()
	{
		$exception = new BadRequestHttpException('foo', [], 'user title');
		$this->assertEquals(400, $exception->getStatusCode());
		$this->assertEquals('bad_request', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testConflictHttpException()
	{
		$exception = new ConflictHttpException('foo', [], 'user title');
		$this->assertEquals(409, $exception->getStatusCode());
		$this->assertEquals('conflict', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testGoneHttpException()
	{
		$exception = new GoneHttpException('foo', [], 'user title');
		$this->assertEquals(410, $exception->getStatusCode());
		$this->assertEquals('gone', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testLengthRequiredHttpException()
	{
		$exception = new LengthRequiredHttpException('foo', [], 'user title');
		$this->assertEquals(411, $exception->getStatusCode());
		$this->assertEquals('length_required', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testMethodNotAllowedHttpException()
	{
		$exception = new MethodNotAllowedHttpException(['bar', 'baz'], 'foo', [], 'user title');
		$this->assertEquals(405, $exception->getStatusCode());
		$this->assertEquals('method_not_allowed', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
		$this->assertEquals(['Allow' => 'BAR,BAZ'], $exception->getHttpHeaders());
	}

	public function testNotAcceptableHttpException()
	{
		$exception = new NotAcceptableHttpException('foo', [], 'user title');
		$this->assertEquals(406, $exception->getStatusCode());
		$this->assertEquals('not_acceptable', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testNotFoundHttpException()
	{
		$exception = new NotFoundHttpException('foo', [], 'user title');
		$this->assertEquals(404, $exception->getStatusCode());
		$this->assertEquals('not_found', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testPreconditionFailedHttpException()
	{
		$exception = new PreconditionFailedHttpException('foo', [], 'user title');
		$this->assertEquals(412, $exception->getStatusCode());
		$this->assertEquals('precondition_failed', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testPreconditionRequiredHttpException()
	{
		$exception = new PreconditionRequiredHttpException('foo', [], 'user title');
		$this->assertEquals(428, $exception->getStatusCode());
		$this->assertEquals('precondition_required', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testServiceUnavailableHttpException()
	{
		$exception = new ServiceUnavailableHttpException(303, 'foo', [], 'user title');
		$this->assertEquals(503, $exception->getStatusCode());
		$this->assertEquals('service_unavailable', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
		$this->assertEquals(['Retry-After' => 303], $exception->getHttpHeaders());
	}

	public function testTooManyRequestsHttpException()
	{
		$exception = new TooManyRequestsHttpException(456, 'foo', [], 'user title');
		$this->assertEquals(429, $exception->getStatusCode());
		$this->assertEquals('too_many_requests', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
		$this->assertEquals(['Retry-After' => 456], $exception->getHttpHeaders());
	}

	public function testUnauthorizedHttpException()
	{
		$exception = new UnauthorizedHttpException('foo', [], 'user title');
		$this->assertEquals(401, $exception->getStatusCode());
		$this->assertEquals('unauthorized', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testUnprocessableEntityHttpException()
	{
		$exception = new UnprocessableEntityHttpException('foo', [], 'user title');
		$this->assertEquals(422, $exception->getStatusCode());
		$this->assertEquals('unprocessable_entity', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testUnsupportedMediaTypeHttpException()
	{
		$exception = new UnsupportedMediaTypeHttpException('foo', [], 'user title');
		$this->assertEquals(415, $exception->getStatusCode());
		$this->assertEquals('unsupported_media_type', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}

	public function testNotImplementedHttpException()
	{
		$exception = new NotImplementedHttpException('foo', [], 'user title');
		$this->assertEquals(501, $exception->getStatusCode());
		$this->assertEquals('not_implemented', $exception->getError());
		$this->assertEquals('foo', $exception->getErrorDescription());
	}
}
