<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignupFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SignupController extends AbstractController
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }

    /**
     * @Route("/signup", name="security_signup")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(SignupFormType::class);
        $form->handleRequest($request);
        $builder = new User();
        $data = $form->getData();

        if ($form->isSubmitted()) {
            $passwordEncoded = $this->encoder->encodePassword($builder, $data->getPassword());
            $builder->setEmail($data->getEmail())
                    ->setPassword($passwordEncoded)
                    ->setFirstName($data->getFirstName())
                    ->setLastName($data->getLastName())
                    ->setPhoneNumber($data->getphoneNumber())
                    ->setFacebook($data->getFacebook())
                    ->setInstagram($data->getInstagram());
            $em->persist($builder);
            $em->flush();
        }

        return $this->render('signup/index.html.twig', [
            'signupForm' => $form->createView(),
        ]);
    }
}
