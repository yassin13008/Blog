<?php

namespace App\Service;

use App\Entity\Post;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploaderHelper
{
    private $slugger;
    private $postImageDirectory;
    
    public function __construct(SluggerInterface $slugger, string $postImageDirectory)
    {
        $this->slugger = $slugger;
        $this->postImageDirectory = $postImageDirectory;
    }
     
    public function uploadPostImage(Post $post, ?UploadedFile $uploadedFile)
    {
      if ($uploadedFile) {
    
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = $this->slugger->slug($originalFilename) . '-' . uniqid() . '.' . $uploadedFile->guessExtension();
    
        $post->setImage($newFilename);
    
        $uploadedFile->move($this->postImageDirectory, $newFilename);
      }
    }
    
     
}