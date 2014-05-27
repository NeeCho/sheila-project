<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\StoreBundle\Document\Product;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    public function createAction()
    {
        //direct inject to mongo db
        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        
        $dm = $this->get('doctrine_mongodb')->getManager('prototype');
        $dm->persist($product);
        $dm->flush();

        return new Response('Created product id ' . $product->getId());
    }

}
