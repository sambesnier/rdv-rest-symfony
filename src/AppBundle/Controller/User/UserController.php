<?php

namespace AppBundle\Controller\User;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED, serializerGroups={"user"})
     * @Rest\Post("/users")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @param Request $request
     */
    public function postUserAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(
            UserType::class,
            $user,
            [
                'validation_groups' => ['Default', 'New']
            ]);

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $encoder = $this->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $user;
        } else {
            return $form;
        }
    }

    /**
     * @Rest\View(serializerGroups={"user"})
     * @Rest\Put("/users/{id}")
     * @param Request $request
     * @return User|null|object|\Symfony\Component\Form\Form
     */
    public function updateUserAction(Request $request)
    {
        return $this->updateUser($request, true);
    }

    /**
     * @Rest\View(serializerGroups={"user"})
     * @Rest\Patch("/users/{id}")
     * @param Request $request
     * @return User|null|object|\Symfony\Component\Form\Form
     */
    public function patchUserAction(Request $request)
    {
        return $this->updateUser($request, true);
    }

    /**
     * @param Request $request
     * @param $clearMissing
     * @return User|null|object|\Symfony\Component\Form\Form
     */
    private function updateUser(Request $request, $clearMissing)
    {
        $user = $this->getDoctrine()->getRepository('AppBundle:User')
            ->find($request->get('id'));

        if (empty($user)) {
            return $this->userNotFound();
        }

        if ($clearMissing) {
            $options = ['validation_groups' => ['Default', 'FullUpdate']];
        } else {
            $options = [];
        }

        $form = $this->createForm(
            UserType::class,
            $user,
            $options
        );

        $form->submit($request->request->all(), $clearMissing);

        if ($form->isValid()) {
            if (!empty($user->getPlainPassword())) {
                $encoder = $this->get('security.password_encoder');
                $encoded = $encoder->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($encoded);
            }

            $em = $this->getDoctrine()->getManager();
            $em->merge($user);
            $em->flush();
            return $user;
        } else {
            return $form;
        }
    }

    /**
     *
     */
    private function userNotFound()
    {
        return \FOS\RestBundle\View\View::create(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
    }


}
