<?php

namespace App\AppBundle\Services\Upload;

use App\PictureBundle\Entity\Picture;
use App\AppBundle\Services\Directory\Directory;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Gedmo\Uploadable(pathMethod="getPath", callback="myCallbackMethod", filenameGenerator="SHA1", allowOverwrite=true, appendNumber=true)
*/

class Upload
{

    public $file;
    public $tempFilename;
    private $uploadFolder;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="original_name", type="string", length=255)
     */
    private $originalName;

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=255)
     */
    private $extension;

    /**
     * @Gedmo\slug(fields={"originalName"})
     *
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;


    /**
     * @ORM\Column(name="path", type="string")
     * @Gedmo\UploadableFilePath
     */
    private $path;

    /**
     * @Assert\File(maxSize="60000000")
     */
    private $file;

}