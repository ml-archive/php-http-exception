<?php

namespace Fuzz\HttpException;

/**
 * Empty class providing the formal status phrase for 403
 */
class ForbiddenHttpException extends AccessDeniedHttpException
{
	/**
	 * Error code storage;
	 *
	 * @const string
	 */
	const ERROR = 'forbidden';
}
