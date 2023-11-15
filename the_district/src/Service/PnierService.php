<?php

namespace App\Service;


class PanierService {
    public function __construct(private RequestStack $requestStack){
        $this->requestStack =$requestStack;
    }

    private $panier = [];
    
        public function ajouterPlat(int $id): void
        {
          $produit=$this->requestStack->getSession()->get('produit');
          if (empty($produit[$id])) {
            $produit[$id]++;
          }else {
            $produit[$id]=1;
          }
     
        }
}
