<?php

class Security {
    private static $seed = 'CtwYvHNqvQ';

    static function chiffrer($texte_en_clair) {
    $texte_seed = self::$seed . $texte_en_clair;
    $texte_chiffre = hash('sha256', $texte_seed);
    return $texte_chiffre;
    }

    static public function getSeed() {
    return self::$seed;
    }

    static function generateRandomHex() {
        // Generate a 32 digits hexadecimal number
        $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
        $bytes = openssl_random_pseudo_bytes($numbytes); 
        $hex   = bin2hex($bytes);
        return $hex;
    }

}


//$mot_passe_en_clair = 'apple';
//$mot_passe_chiffre = chiffrer($mot_passe_en_clair);
//echo $mot_passe_chiffre;
//affiche '3a7bd3e2360a3d29eea436fcfb7e44c735d117c42d1c1835420b6b9942dd4f1b'
?>