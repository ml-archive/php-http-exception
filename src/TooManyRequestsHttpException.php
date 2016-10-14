<?php

namespace Fuzz\HttpException;

class TooManyRequestsHttpException extends HttpException
{
	/**
	 * HTTP status code
	 *
	 * @const int
	 */
	const HTTP_CODE = 429;

	/**
	 * Error code storage;
	 *
	 * @var string
	 */
	protected $error_name = 'too_many_requests';

	/**
	 * NotFoundHttpException constructor.
	 *
	 * @param int|null       $wait
	 * @param string     $message
	 * @param string     $error_formatted
	 * @param array      $error_data
	 * @param array      $headers
	 * @param \Exception $previous
	 */
	public function __construct($wait = null, $message = null, $error_formatted = null, array $error_data = [], array $headers = [], \Exception $previous = null)
	{
		if (! is_null($wait)) {
			$headers['Retry-After'] = $wait;
		}

		parent::__construct($message, $error_formatted, $error_data, $headers, self::HTTP_CODE, $previous);
	}
}
