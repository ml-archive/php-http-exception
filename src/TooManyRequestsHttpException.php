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
	 * @const string
	 */
	const ERROR = 'too_many_requests';

	/**
	 * TooManyRequestsHttpException constructor.
	 *
	 * @param int|null            $wait
	 * @param string|null     $errorDescription
	 * @param array           $errorData
	 * @param string|null     $userTitle
	 * @param null            $userMessage
	 * @param array           $headers
	 * @param \Exception|null $previous
	 */
	public function __construct($wait = null, string $errorDescription = null, array $errorData = [], string $userTitle = null, $userMessage = null, array $headers = [], \Exception $previous = null)
	{
		if (! is_null($wait)) {
			$headers['Retry-After'] = $wait;
		}

		parent::__construct(self::HTTP_CODE, self::ERROR, $errorDescription, $errorData, $userTitle, $userMessage, $headers, $previous);
	}
}
