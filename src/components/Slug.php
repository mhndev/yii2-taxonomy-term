<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 8/31/16
 * Time: 2:49 PM
 */
namespace mhndev\yii2TaxonomyTerm\components;

class Slug
{

    /**
     * @param string $text
     * @return string
     */
    public function generate($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
