<?php

namespace App\Core;



class ValidationForm
{
    static function inputTextValide($inputText, $nameInput)
    {
        $erreurs = ""; 
        $pattern = "/^([a-zA-ZÀ-ÿ]+([- ']?[a-zA-ZÀ-ÿ]+)*)$/";
        $lengthMin = "3";
        $lengthMax = "30";

        if(empty($inputText)){
            return $erreurs = "Le champs $nameInput ne peut pas être vide.";
        }
        
        if(strlen($inputText) < $lengthMin){
            return $erreurs = "Le nombre de caractères ne peut être inferieur à 3 pour le champs : $nameInput.";
        }

        if(strlen($inputText) > $lengthMax)
        {
            return $erreurs = "Le nombre de caractères ne peut être supèrieur à 30 pour le champs : $nameInput.";
        }

        if(!preg_match($pattern, $inputText)){
            return $erreurs = "Veuillez entrer un texte valide sans caractères spéciaux pour $nameInput.";
        }
    }

    static function textareaValidate($textarea, $name)
    {
        $erreurs = ""; 
        $pattern = "/^([a-zA-ZÀ-ÿ]+([- ']?[a-zA-ZÀ-ÿ]+)*)$/";
        $lengthMin = "";
        $lengthMax = "300";

        if(empty($textarea)){
            return $erreurs = "Le champs $name ne peut pas être vide.";
        }

        if(!preg_match($pattern, $textarea)){
            return $erreurs = "Veuillez entrer un texte valide sans caractères spéciaux pour $name.";
        }

        if(strlen($textarea) > $lengthMax)
        {
            return $erreurs = "Le nombre de caractères ne peut être supèrieur à 300 pour le champs : $name.";
        }
    }

    static function emailValidate($email, $name)
    {
        $erreurs = "";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return $erreurs = "Veuillez entrer un email valide.";
        }

        if(empty($email)){
            return $erreurs = "Le champs $name ne peut pas être vide.";
        }
    }

    static function dateValidate($date, $name)
    {
        $dateDujour = date('Y-m-d');

        if($date < $dateDujour){
            return $erreurs = "La date ne pas être antérieur à aujourd'hui.";
        }

        if(empty($date)){
            return $erreurs = "Le champs $name ne peut pas être vide.";
        }
    }
}