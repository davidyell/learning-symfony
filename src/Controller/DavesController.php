<?php

namespace App\Controller;

use App\Services\CakeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DavesController extends AbstractController
{
    public function __construct(public CakeService $bakeryService)
    {
    }

    #[Route(path: '/daves', name: 'app_daves')]
    public function index(Request $request): JsonResponse
    {
        $response = new JsonResponse([
            'greeting' => 'Hello World!',
            'baked_item' => $this->bakeryService->chooseForMe()
        ]);

        if (!$request->cookies->has('daves_symfony_app')) {
            $cookie = new Cookie(
                name: 'daves_symfony_app',
                value: md5('Whiskey!' . random_int(1, 200)),
                expire: (new \DateTime())->add(new \DateInterval('P3D'))
            );

            $response->headers->setCookie($cookie);
        }

        return $response;
    }
}
