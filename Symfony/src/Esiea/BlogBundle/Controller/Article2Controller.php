<?php

namespace Esiea\BlogBundle\Controller;

use Esiea\BlogBundle\Entity\Article;
use Esiea\BlogBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
class ArticleController extends Controller
{
    /**
	* @Template()
	*/
    public function indexAction(){
		return $this->render('EsieaBlogBundle:Article:index.html.twig');

    }

	public function newArticleAction(Request $request){

		$article = new Article();

		$form = $this->createForm(new ArticleType(), $article);
		$form->get('date')->setData(new \DateTime('today'));
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($article);
			$em->flush();

			return $this->redirectToRoute('esiea_blog_article');

		}
		return $this->render('EsieaBlogBundle:Article:article.html.twig', array(
				'form' => $form->createView(),
		));

	}

	public function updateArticleAction(){
		$article = new Article();

	}
}