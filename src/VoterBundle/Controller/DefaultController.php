<?php

namespace VoterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VoterBundle:Default:index.html.twig');
    }
}
