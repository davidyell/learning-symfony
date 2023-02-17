<?php

namespace App\Controller;

use App\Services\BakeryInterface;
use App\Services\DeliveryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BakeryController extends AbstractController
{

    public function __construct(private BakeryInterface $bakery, private DeliveryService $deliveryService)
    {
    }

    #[Route('/bakery/choose-a-cake', name: 'app_bakery')]
    public function index(): Response
    {
        $cake = $this->bakery->chooseForMe();
        $delivery = $this->deliveryService::FREE;
        $type = $this->bakery->getName();

        return $this->render('bakery/index.html.twig', [
            'controller_name' => 'BakeryController',
            'cake' => $cake,
            'delivery' => $delivery,
            'type' => $type
        ]);
    }
}
