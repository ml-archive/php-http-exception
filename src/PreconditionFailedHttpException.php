<?php

namespace Fuzz\HttpException;

class PreconditionFailedHttpException extends HttpException
{
	/**
	 * HTTP status code
	 *
	 * @const int
	 */
	const HTTP_CODE = 412;

	/**
	 * Error code storage;
	 *
	 * @var string
	 */
	protected $error_name = 'precondition_failed';

	/**
	 * NotFoundHttpException constructor.
	 *
	 * @param string     $message
	 * @param string     $error_formatted
	 * @param array      $error_data
	 * @param array      $headers
	 * @param \Exception $previous
	 */
	public function __construct($message = null, $error_formatted = null, array $error_data = [], array $headers = [], \Exception $previous = null)
	{
		parent::__construct($message, $error_formatted, $error_data, $headers, self::HTTP_CODE, $previous);
	}
}
