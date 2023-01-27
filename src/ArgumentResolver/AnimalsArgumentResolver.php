<?php

declare(strict_types=1);

namespace App\ArgumentResolver;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class AnimalsArgumentResolver implements ArgumentValueResolverInterface
{
    private array $data = [
        'cat' => [
            'Boris', 'Angela', 'Craig', 'Bruce'
        ],
        'dog' => [
            'Gonzo', 'Albert', 'Christopher', 'Albert'
        ],
        'fish' => [
            'Jeremy', 'Geoff', 'Clarence', 'Aubry'
        ]
    ];

    public function supports(Request $request, ArgumentMetadata $metadata): bool
    {
        return (bool)strpos($request->getUri(), 'animals');
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $class = new ($argument->getType());

        $animal = $request->query->get('animal');

        if ($animal === 'cat') {
            $class->name = $this->data['cat'][array_rand($this->data['cat'])];
        } else if ($animal === 'dog') {
            $class->name = $this->data['dog'][array_rand($this->data['dog'])];
        } else if ($animal === 'fish') {
            $class->name = $this->data['fish'][array_rand($this->data['fish'])];
        }

        return [$class];
    }
}