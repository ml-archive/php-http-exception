<?php

namespace Fuzz\HttpException;

use Fuzz\HttpException\Contracts\HttpExceptionInterface;
use RuntimeException;

class HttpException extends RuntimeException implements HttpExceptionInterface
{
	/**
	 * HTTP status code storage
	 *
	 * @var int
	 */
	protected $status_code;

	/**
	 * Header storage
	 *
	 * @var array
	 */
	protected $headers;

	/**
	 * Error code storage;
	 *
	 * @var string
	 */
	protected $error_name;

	/**
	 * Formatted error description storage
	 *
	 * @var string|null
	 */
	protected $error_formatted;

	/**
	 * Error data storage
	 *
	 * @var array
	 */
	protected $error_data;

	/**
	 * HttpException constructor.
	 *
	 * @param string     $message
	 * @param string     $error_formatted
	 * @param array      $error_data
	 * @param array      $headers
	 * @param int        $code
	 * @param \Exception $previous
	 */
	public function __construct($message = null, $error_formatted = null, array $error_data = [], array $headers = [], $code = 0, \Exception $previous = null)
	{
		$this->status_code     = $code;
		$this->headers         = $headers;
		$this->error_formatted = $error_formatted;
		$this->error_data      = $error_data;

		parent::__construct($message, $code, $previous);
	}

	/**
	 * The HTTP status code
	 *
	 * @return int
	 */
	public function getStatusCode()
	{
		return $this->status_code;
	}

	/**
	 * Return headers
	 *
	 * @return array
	 */
	public function getHeaders()
	{
		return $this->headers;
	}

	/**
	 * Data corresponding to the error
	 *
	 * @return array
	 */
	public function getErrorData()
	{
		return $this->error_data;
	}

	/**
	 * String code of the error
	 *
	 * i.e. not_found or access_denied
	 *
	 * @return string
	 */
	public function getErrorName()
	{
		return $this->error_name;
	}

	/**
	 * A user-friendly error description
	 *
	 * @return string
	 */
	public function getErrorFormatted()
	{
		return $this->error_formatted;
	}
}
