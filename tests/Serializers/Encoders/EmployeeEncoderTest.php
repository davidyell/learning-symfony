<?php

namespace App\Tests\Serializers\Encoders;

use App\Serializers\Encoders\EmployeeEncoder;
use App\Tests\Factory\EmployeeFactory;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class EmployeeEncoderTest extends TestCase
{
    use Factories;

    public function testEncodingAnEmployeeWithNestedDirectReports()
    {
        // Arrange
        $employee = EmployeeFactory::createOne();
        $employee->setReportsTo(null);
        $employee->setDirectReports(new ArrayCollection([
            EmployeeFactory::createOne(['directReports' => new ArrayCollection([
                EmployeeFactory::createOne()
            ])]),
            EmployeeFactory::createOne()
        ]));

        // Act
        $encoder = new EmployeeEncoder();
        $result = $encoder->encode($employee->object(), 'json');

        dd($result);

        // Assert
        $this->assertJson($result);

//        $dataAsArray = json_decode($result);
//        $this->assertCount(1, $dataAsArray);
//        $this->assertArrayHasKey('directReports', $dataAsArray);
//        $this->assertCount(2, $dataAsArray['directReports']);
    }
}
