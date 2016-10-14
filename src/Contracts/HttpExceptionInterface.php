<?php

namespace Fuzz\HttpException\Contracts;

interface HttpExceptionInterface
{
	/**
	 * The HTTP status code
	 *
	 * @return int
	 */
	public function getStatusCode();

	/**
	 * Return headers
	 *
	 * @return array
	 */
	public function getHeaders();

	/**
	 * Data corresponding to the error
	 *
	 * @return array
	 */
	public function getErrorData();

	/**
	 * String code of the error
	 *
	 * i.e. not_found or access_denied
	 *
	 * @return string
	 */
	public function getErrorName();

	/**
	 * A user-friendly error description
	 *
	 * @return string
	 */
	public function getErrorFormatted();
}
