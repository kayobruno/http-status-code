<?php

declare(strict_types=1);

namespace App\Contracts;

use App\HttpStatusCodeCategory;

interface StatusCode
{
	public function description(): string;
	public function isSuccess(): bool;
	public function category(): HttpStatusCodeCategory;
}