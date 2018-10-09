<?php
/**
 * Created by PhpStorm.
 * User: oem
 * Date: 09.10.18
 * Time: 9:45
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
    return new Response('first page');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'future page to show the articles: %s',$slug
    ));

    }
}