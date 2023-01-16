<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class EmployeeController extends AbstractController
{
    public SerializerInterface $serializer;

    public function __construct(
        private EmployeeRepository $employeeRepository
    )
    {
        // Add a context to the normalizer, so that it can handle circular references
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_LIMIT => 0,
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function (Employee $object, string $format, array $context) {
                return $object->getDirectReports()->count();
            },
        ];

        $encoders = [new JsonEncoder()];

        // Normalizer order is important!
        $normalizers = [new DateTimeNormalizer(), new ObjectNormalizer(defaultContext: $defaultContext)];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    #[Route(path: '/employees', name: 'app_employee_index')]
    public function index(): JsonResponse
    {
        $employees = $this->employeeRepository->findAll();

        $json = $this->serializer->serialize($employees, 'json');

        return new JsonResponse(data: $json, json: true);
    }
}