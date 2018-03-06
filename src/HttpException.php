<?php

namespace Fuzz\HttpException;

use Fuzz\HttpException\Contracts\HttpExceptionInterface;
use RuntimeException;

class HttpException extends RuntimeException implements HttpExceptionInterface
{
	/**
	 * HTTP Status code.
	 *
	 * @var int
	 */
	protected $statusCode;

	/**
	 * Http headers to pass to the response.
	 *
	 * @var array
	 */
	protected $httpHeaders;

	/**
	 * An error code.
	 *
	 * @var string
	 */
	protected $error;

	/**
	 * The error description.
	 *
	 * @var string
	 */
	protected $errorDescription;

	/**
	 * Error data that an application can use to run logic.
	 *
	 * @var array|string|null
	 */
	protected $errorData;

	/**
	 * An error title that can be presented to the user.
	 *
	 * @var string
	 */
	protected $userTitle;

	/**
	 * A user friendly error message.
	 *
	 * If it is an array, the keys will be the field names, and the value the error for those fields.
	 *
	 * @var array|string|null
	 */
	protected $userMessage;

	/**
	 * HttpException constructor.
	 *
	 * @param int             $statusCode
	 * @param array           $httpHeaders
	 * @param string          $error
	 * @param string          $errorDescription
	 * @param array           $errorData
	 * @param string          $userTitle
	 * @param string          $userMessage
	 * @param \Exception|null $previous
	 */
	public function __construct(int $statusCode = null, string $error = null, string $errorDescription = null, $errorData = [], string $userTitle = null, $userMessage = null, array $httpHeaders = [], \Exception $previous = null)
	{
		$this->statusCode       = $statusCode ?? 500;
		$this->error            = $error;
		$this->errorDescription = $errorDescription;
		$this->errorData        = $errorData;
		$this->userTitle        = $userTitle;
		$this->userMessage      = $userMessage;
		$this->httpHeaders      = $httpHeaders;

		$originalMessage = $errorDescription;
		$originalCode    = $statusCode;

		parent::__construct($originalMessage, $originalCode, $previous);
	}

	/**
	 * Get the HTTP status code.
	 *
	 * @return int
	 */
	public function getStatusCode(): int
	{
		return $this->statusCode;
	}

	/**
	 * Set the HTTP status code.
	 *
	 * @param int $statusCode
	 *
	 * @return HttpException
	 */
	public function setStatusCode(int $statusCode): HttpException
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	/**
	 * Return HTTP headers.
	 *
	 * @return array
	 */
	public function getHttpHeaders()
	{
		return $this->httpHeaders;
	}

	/**
	 * Set the HTTP headers.
	 *
	 * @param array $httpHeaders
	 *
	 * @return HttpException
	 */
	public function setHttpHeaders(array $httpHeaders): HttpException
	{
		$this->httpHeaders = $httpHeaders;

		return $this;
	}

	/**
	 * Get the error code.
	 *
	 * @return string
	 */
	public function getError()
	{
		return $this->error;
	}

	/**
	 * Set the error code.
	 *
	 * @param string $error
	 *
	 * @return HttpException
	 */
	public function setError(string $error): HttpException
	{
		$this->error = $error;

		return $this;
	}

	/**
	 * Get the error description.
	 *
	 * @return string
	 */
	public function getErrorDescription()
	{
		return $this->errorDescription;
	}

	/**
	 * Set the error description.
	 *
	 * @param string $errorDescription
	 *
	 * @return HttpException
	 */
	public function setErrorDescription(string $errorDescription): HttpException
	{
		$this->errorDescription = $errorDescription;

		return $this;
	}

	/**
	 * Get error data.
	 *
	 * @return array|null|string
	 */
	public function getErrorData()
	{
		return $this->errorData;
	}

	/**
	 * Set error data.
	 *
	 * @param array|null|string $errorData
	 *
	 * @return HttpException
	 */
	public function setErrorData($errorData)
	{
		$this->errorData = $errorData;

		return $this;
	}

	/**
	 * Get user title.
	 *
	 * @return string
	 */
	public function getUserTitle()
	{
		return $this->userTitle;
	}

	/**
	 * Set user title.
	 *
	 * @param string $userTitle
	 *
	 * @return HttpException
	 */
	public function setUserTitle(string $userTitle): HttpException
	{
		$this->userTitle = $userTitle;

		return $this;
	}

	/**
	 * Get user message.
	 *
	 * @return array|null|string
	 */
	public function getUserMessage()
	{
		return $this->userMessage;
	}

	/**
	 * Set user message.
	 *
	 * @param array|null|string $userMessage
	 *
	 * @return HttpException
	 */
	public function setUserMessage($userMessage)
	{
		$this->userMessage = $userMessage;

		return $this;
	}
}
