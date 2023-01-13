<?php

namespace App\Controller;

use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    public function __construct(
        private EmployeeRepository $employeeRepository
    )
    {
    }

    #[Route(path: '/employees', name: 'app_employee_index')]
    public function index(): JsonResponse
    {
        $employees = $this->employeeRepository->findAll();

        return new JsonResponse($employees);
    }
}