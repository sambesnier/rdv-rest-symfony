<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Place;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PlaceController extends Controller
{
    /**
     * @Route(
     *     "/places",
     *     name="places_list")
     * @Method({"GET"})
     */
    public function getPlacesAction(Request $request)
    {
        $places = $this->getDoctrine()->getRepository('AppBundle:Address')->findAll();

        $formatted = [];
        foreach ($places as $place) {
            $formatted[] = [
                'id' => $place->getId(),
                'number' => $place->getNumber(),
                'path' => $place->getPath(),
                'postcode' => $place->getZipcode(),
                'city' => $place->getCity(),
                'country' => $place->getCountry()
            ];
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Route(
     *     "/new-place",
     *     name="new_place"
     * )
     * @Method({"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function postAction(Request $request)
    {
        return new JsonResponse([$request->get('test')]);
    }

}
