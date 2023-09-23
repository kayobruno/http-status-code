<?php

declare(strict_types=1);

namespace Tests;

use App\{HttpStatusCode, HttpStatusCodeCategory};
use PHPUnit\Framework\Attributes\{CoversClass, Test, TestWith};
use PHPUnit\Framework\TestCase;

#[CoversClass(HttpStatusCode::class)]
class HttpStatusCodeTest extends TestCase
{
	#[Test]
	public function shouldReturnCorrectValues(): void
	{
		$this->assertEquals(100, HttpStatusCode::CONTINUE->value);
		$this->assertEquals(200, HttpStatusCode::OK->value);
		$this->assertEquals(300, HttpStatusCode::MULTIPLE_CHOICES->value);
		$this->assertEquals(400, HttpStatusCode::BAD_REQUEST->value);
		$this->assertEquals(500, HttpStatusCode::INTERNAL_SERVER_ERROR->value);
	}

	#[Test]
	public function shouldReturnCorrectMessages(): void
	{
		$this->assertEquals('The server has received the request headers', HttpStatusCode::CONTINUE->description());
		$this->assertEquals('The request has succeeded', HttpStatusCode::OK->description());
		$this->assertEquals('The request has more than one possible response', HttpStatusCode::MULTIPLE_CHOICES->description());
		$this->assertEquals('The request cannot be fulfilled due to bad syntax', HttpStatusCode::BAD_REQUEST->description());
		$this->assertEquals('The server encountered an unexpected condition that prevented it from fulfilling the request', HttpStatusCode::INTERNAL_SERVER_ERROR->description());
	}

	#[Test]
	#[TestWith([200, true])]
	#[TestWith([201, true])]
	#[TestWith([202, true])]
	#[TestWith([203, true])]
	#[TestWith([204, true])]
	#[TestWith([205, true])]
	#[TestWith([206, true])]
	#[TestWith([207, true])]
	#[TestWith([208, true])]
	#[TestWith([226, true])]
	public function shouldReturnTrueWhenStatusCodeHasSuccessfulCategory(int $statusCodeValue, bool $expectedValue): void
	{
		$httpStatusCode = HttpStatusCode::from($statusCodeValue);
		$this->assertEquals($expectedValue, $httpStatusCode->isSuccess());
		$this->assertEquals(HttpStatusCodeCategory::SUCCESSFUL, $httpStatusCode->category());
	}

	#[Test]
	#[TestWith([100, false])]
	#[TestWith([500, false])]
	#[TestWith([404, false])]
	#[TestWith([301, false])]
	#[TestWith([102, false])]
	#[TestWith([422, false])]
	#[TestWith([405, false])]
	#[TestWith([404, false])]
	#[TestWith([408, false])]
	#[TestWith([503, false])]
	public function shouldReturnFalseWhenStatusCodeHasCategoryDifferentOfSuccessful(int $statusCodeValue, bool $expectedValue): void
	{
		$httpStatusCode = HttpStatusCode::from($statusCodeValue);
		$this->assertEquals($expectedValue, $httpStatusCode->isSuccess());
		$this->assertNotEquals(HttpStatusCodeCategory::SUCCESSFUL, $httpStatusCode->category());
	}

	#[Test]
	#[TestWith([100, HttpStatusCodeCategory::INFORMATIONAL])]
	#[TestWith([200, HttpStatusCodeCategory::SUCCESSFUL])]
	#[TestWith([300, HttpStatusCodeCategory::REDIRECTION])]
	#[TestWith([400, HttpStatusCodeCategory::CLIENT_ERROR])]
	#[TestWith([500, HttpStatusCodeCategory::SERVER_ERROR])]
	public function shouldReturnCorrectCategoryByStatusCode(int $statusCodeValue, HttpStatusCodeCategory $expectedValue): void
	{
		$httpStatusCode = HttpStatusCode::from($statusCodeValue);
		$this->assertEquals($expectedValue, $httpStatusCode->category());
	}
}