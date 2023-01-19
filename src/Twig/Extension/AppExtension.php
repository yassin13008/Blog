<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\AppExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;


class AppExtension extends AbstractExtension
{
    public function __construct(
        private string $postImageUrl
     ){}
     
   public function getFunctions(): array
   {
     return [
        new TwigFunction('asset_post_image', [$this, 'assetPostImage'])
     ];
   }

   public function assetPostImage($imageFilename)
   {
      // Si c'est une URL qui est enregistrée (notamment pour les fixtures)
      if (filter_var($imageFilename, FILTER_VALIDATE_URL)) {
          return $imageFilename;
      }
   
      // Sinon (c'est le nom d'un fichier uploadé)
      return '/'. $this->postImageUrl.'/'. $imageFilename;
   }
}

