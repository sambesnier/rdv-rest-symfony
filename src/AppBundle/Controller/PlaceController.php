<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Entity\Place;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlaceController extends Controller
{
    /**
     * @Rest\Get(
     *     "/places"
     * )
     * @Rest\View()
     */
    public function getPlacesAction(Request $request)
    {
        $places = $this->getDoctrine()->getRepository('AppBundle:Place')->findAll();

        return $places;
    }

    /**
     *
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     *
     * @Rest\Post(
     *     "/places"
     * )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function postPlacesAction(Request $request)
    {

    }

}
