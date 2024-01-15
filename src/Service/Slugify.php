<?php

namespace App\Service;

class Slugify
{
    public function generate(string $input): string
    {
        // Convertit la chaîne en minuscules
        $input = mb_strtolower($input, 'UTF-8');

        // Remplace les caractères accentués par leur équivalent non accentué
        $input = $this->removeAccents($input);

        // Supprime les caractères spéciaux autres que les lettres et les chiffres
        $input = preg_replace('/[^a-z0-9\-]/', '', $input);

        // Remplace les espaces par des tirets
        $input = preg_replace('/\s+/', '-', $input);

        // Supprime les tirets successifs
        $input = preg_replace('/-+/', '-', $input);

        // Supprime les tirets en début et fin de chaîne
        $input = trim($input, '-');

        return $input;
    }

    private function removeAccents(string $str): string
    {
        $accentedChars = ['à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ'];

        $unaccentedChars = ['a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y'];

        return str_replace($accentedChars, $unaccentedChars, $str);
    }
}
