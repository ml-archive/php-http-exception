<?php

namespace Fuzz\HttpException;

class MethodNotAllowedHttpException extends HttpException
{
	/**
	 * HTTP status code
	 *
	 * @const int
	 */
	const HTTP_CODE = 405;

	/**
	 * Error code storage;
	 *
	 * @var string
	 */
	protected $error_name = 'method_not_allowed';

	/**
	 * NotFoundHttpException constructor.
	 *
	 * @param array      $allowed
	 * @param string     $message
	 * @param string     $error_formatted
	 * @param array      $error_data
	 * @param array      $headers
	 * @param \Exception $previous
	 */
	public function __construct(array $allowed = [], $message = null, $error_formatted = null, array $error_data = [], array $headers = [], \Exception $previous = null)
	{
		$headers['Allow'] = strtoupper(implode(',', $allowed));

		parent::__construct($message, $error_formatted, $error_data, $headers, self::HTTP_CODE, $previous);
	}
}
