<?php

namespace App\Serializers\Encoders;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

class EmployeeEncoder extends JsonEncoder
{
    /**
     * Encodes data into the given format.
     *
     * @param mixed  $data    Data to encode
     * @param string $format  Format name
     * @param array  $context Options that normalizers/encoders have access to
     *
     * @return string
     *
     * @throws UnexpectedValueException
     */
    public function encode($data, string $format, array $context = [])
    {
        $json = json_encode($data);
        if (!is_string($json)) {
            throw new \JsonException('Cannot encode to json.');
        }

        return $json;
    }

}