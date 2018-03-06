<?php

namespace Fuzz\HttpException;

class FailedDependencyHttpException extends HttpException
{
	/**
	 * HTTP status code
	 *
	 * @const int
	 */
	const HTTP_CODE = 424;

	/**
	 * Error code storage;
	 *
	 * @const string
	 */
	const ERROR = 'failed_dependency';

	/**
	 * ServiceUnavailableHttpException constructor.
	 *
	 * @param string|null     $errorDescription
	 * @param array           $errorData
	 * @param string|null     $userTitle
	 * @param null            $userMessage
	 * @param array           $headers
	 * @param \Exception|null $previous
	 */
	public function __construct(string $errorDescription = null, array $errorData = [], string $userTitle = null, $userMessage = null, array $headers = [], \Exception $previous = null)
	{
		parent::__construct(self::HTTP_CODE, self::ERROR, $errorDescription, $errorData, $userTitle, $userMessage, $headers, $previous);
	}
}