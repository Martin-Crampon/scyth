<?php

namespace App\Controller;

abstract class Controller
{
    protected String $action;

    public function executerAction()
    {
        //..
    }

    /*
     Méthode abstraite correspondant à l'action par défaut
     Oblige les classes dérivées à implémenter cette action par défaut
    */
    public abstract function index();

    // Génère la vue associée au contrôleur courant
    protected function genererVue($donneesVue = array())
    {
        //..
    }
}
