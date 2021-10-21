<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return new Response(
            <<<EOF
            <html>
                <body>
                    <img src="/images/underconstruction.jpg" />
                </body>
            </html>
            EOF
        );
    }
}
