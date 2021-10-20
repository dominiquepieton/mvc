<?php

namespace App\Core;

class Form
{
    private $formCode = "";

    /**
     * Générer le formulaire HTML
     *
     * @return string
     */
    public function create()
    {
        return $this->formCode;
    }

    /**
     * Valide si tous les champs proposés sont remplis
     *
     * @param array $form  Tableau contenant les champs à verifier
     * @param array $fields Tableau listant les champs à verifier
     * @return void
     */
    public static function validate(array $form, array $fields)
    {
        foreach($fields as $field){
            if(!isset($form[$field]) || empty($form[$field])){
                return false;
            }
        }
        return true;
    }

    /**
     * Ajoute les attributs envoyés à la balise
     *
     * @param array $attributs Tableau associatif ['class' => 'form-control', 'required' => true]
     * @return string Chaine de caractères générée
     */
    private function ajoutAttributs(array $attributs): string
    {
        $str = '';

        $courts = ['checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate'];

        foreach($attributs as $attribut => $valeur){
            if(in_array($attribut, $courts) && $valeur == true){
                $str .= " $attribut";
            }else{
                $str .= " $attribut='$valeur'";
            }
        }

        return $str;

    }


    /**
     * Balise d'ouverture du formulaire gere les fichier
     *
     * @param string $method Méthode du formulaire (post ou get)
     * @param string $action Action du formulaire
     * @param array $attributs Attributs
     * @return self
     */
    public function debutFormFiles(string $method = 'post', string $action = '#', array $attributs = []): self
    {
        $this->formCode .= "<form action='$action' method='$method' enctype='multipart/form-data'";

        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';

        return $this;
    }
    
    /**
     * Balise d'ouverture du formulaire
     *
     * @param string $method Méthode du formulaire (post ou get)
     * @param string $action Action du formulaire
     * @param array $attributs Attributs
     * @return self
     */
    public function debutFormSimple(string $method = 'post', string $action = '#', array $attributs = []): self
    {
        $this->formCode .= "<form action='$action' method='$method'";

        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';

        return $this;
    }

    /**
     * Balise de fermeture du formulaire
     *
     * @return self
     */
    public function finform(): self
    {
        $this->formCode .= '</form>';

        return $this;
    }

    /**
     * Ajout d'un label
     *
     * @param string $for
     * @param string $texte
     * @param array $attributs
     * @return Form
     */
    public function ajoutLabelFor(string $for, string $texte, array $attributs = []):self
    {
        $this->formCode .= "<label for='$for'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">$texte</label>";

        return $this;
    }

    /**
     * Ajout d'un champ input
     *
     * @param string $type
     * @param string $nom
     * @param array $attributs
     * @return self
     */
    public function ajoutInput(string $type, string $nom, array $attributs = []):self
    {
        
        $this->formCode .= "<input type='$type' name='$nom'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';

        return $this;
    }

    /**
     * Ajoute un champ textarea
     * @param string $nom Nom du champ
     * @param string $valeur Valeur du champ
     * @param array $attributs Attributs
     * @return Form Retourne l'objet
     */
    public function ajoutTextarea(string $nom, string $valeur = '', array $attributs = [], $rows):self
    {
        $this->formCode .= "<textarea name='$nom'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= $rows ? "rows='$rows'"  : '';
        $this->formCode .= ">$valeur</textarea>";

        return $this;
    }


    /**
     * Liste déroulante
     * @param string $nom Nom du champ
     * @param array $options Liste des options (tableau associatif)
     * @param array $attributs 
     * @return Form
     */
    public function ajoutSelect(string $nom, array $options, array $attributs = []):self
    {
        $this->formCode .= "<select name='$nom'";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';

        
        foreach($options as $valeur => $texte){
            $this->formCode .= "<option value='$valeur'>$texte</option>";
        }

        $this->formCode .= '</select>';

        return $this;
    }


    /**
     * Ajoute un bouton
     * @param string $texte 
     * @param array $attributs 
     * @return Form
     */
    public function ajoutBouton(string $texte, array $attributs = []):self
    {
        $this->formCode .= '<button ';
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= ">$texte</button>";

        return $this;
    }

    /**
     * Ajoute un bouton
     * @param string $texte 
     * @param array $attributs 
     * @return Form
     */
    public function ajoutImage(string $texte, array $attributs = [], string $style):self
    {
        $this->formCode .= "<img src=".$texte." ";
        $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';
        $this->formCode .= "style='$style'>";

        return $this;
    }
}