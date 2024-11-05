<?php

namespace App\Controller;

use App\Service\DebrickedService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploadController extends AbstractController
{
    private $debrickedService;

    public function __construct(DebrickedService $debrickedService)
    {
        $this->debrickedService = $debrickedService;
    }

    /**
     * @Route("/upload", methods={"POST"})
     */
    public function upload(Request $request): Response
    {
        $files = $request->files->get('dependencies');

        if (is_array($files)) {
            $results = [];
            foreach ($files as $file) {
                $result = $this->debrickedService->uploadFile($file);
                $results[] = $result;
            }
            return $this->json($results);
        }

        return $this->json(['error' => 'No files uploaded'], Response::HTTP_BAD_REQUEST);
    }
}
