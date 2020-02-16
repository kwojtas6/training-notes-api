<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="app_default_getAll")
     */
    public function getAll(): Response
    {
        return $this->json(['Hello World']);
    }
}
