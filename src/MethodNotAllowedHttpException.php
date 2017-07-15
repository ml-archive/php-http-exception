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
	 * Error code.
	 *
	 * @const string
	 */
	const ERROR = 'method_not_allowed';

	/**
	 * MethodNotAllowedHttpException constructor.
	 *
	 * @param array           $allowed
	 * @param string|null     $errorDescription
	 * @param array           $errorData
	 * @param string|null     $userTitle
	 * @param null            $userMessage
	 * @param array           $headers
	 * @param \Exception|null $previous
	 */
	public function __construct(array $allowed = [], string $errorDescription = null, array $errorData = [], string $userTitle = null, $userMessage = null, array $headers = [], \Exception $previous = null)
	{
		$headers['Allow'] = strtoupper(implode(',', $allowed));

		parent::__construct(self::HTTP_CODE, self::ERROR, $errorDescription, $errorData, $userTitle, $userMessage, $headers, $previous);
	}
}
