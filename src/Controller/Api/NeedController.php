<?php

namespace App\Controller\Api;

use App\Entity\Need;
use App\Repository\NeedRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NeedController extends AbstractController
{
    public function index(NeedRepository $needRepository): JsonResponse
    {
        $needs = $needRepository->findAll();
        $data = [];

        foreach ($needs as $need) {
            $data[] = [
                'id' => $need->getId(),
                'title' => $need->getTitle(),
                'summary' => $need->getSummary(),
                'url' => $need->getUrl(),
            ];
        }

        return $this->json($data);
    }

    public function show(Need $need): JsonResponse
    {
        return $this->json([
            'id' => $need->getId(),
            'title' => $need->getTitle(),
            'summary' => $need->getSummary(),
            'url' => $need->getUrl(),
        ]);
    }

    // TODO: Cette route devrait être protégée par authentification
    public function create(Request $request, NeedRepository $needRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $need = new Need();
        $need->setTitle($data['title'])
            ->setSummary($data['summary'])
            ->setUrl($data['url']);

        $needRepository->save($need);

        return $this->json([
            'message' => 'L"offre à bien été ajoutéé',
            'id' => $need->getId(),
        ]);
    }

    // TODO: Cette route devrait être protégée par authentification (hors périmètre du test)
    public function update(Request $request, Need $need, NeedRepository $needRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['title'])) {
            $need->setTitle($data['title']);
        }

        if (isset($data['summary'])) {
            $need->setSummary($data['summary']);
        }

        if (isset($data['url'])) {
            $need->setUrl($data['url']);
        }

        $needRepository->save($need);

        return $this->json([
            'message' => 'L"offre à bien été modifiée',
        ]);
    }
}