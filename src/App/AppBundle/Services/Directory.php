<?php
 
namespace App\AppBundle\Services\Directory;
 
use App\UserBundle\Entity\User;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\DependencyInjection\ContainerInterface;
 
/**
 * Directory class
 */
abstract class Directory{
     
    private $userId;
    protected $securityContext;
 
    public function __construct(ContainerInterface $container){
        $this->container = $container;
 
        $filesystem = new Filesystem();
        $folder = $this->getUserRootDir();
 
        if ( ! is_dir($folder)) {
            if (mkdir($folder, 0777, true)) {
                mkdir($folder . '/mainPictureFolder', 0777, true);
            }
        }
    }
 
    /**
     * Get user id
     *
     * @return int $id
     */
    public function getUserId()
    {
        var_dump($this->container);
        return $this->container->get('security.context')->getToken()->getUser()->getId();
    }


    /**
     * Get upload root dir
     *
     * @return string
     */
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../../web/uploads/';
    }

    /**
     * Get User Root Dir
     *
     * @return string
     */
    public function getUserRootDir()
    {
        return $this->getUploadRootDir().$this->getUserId();
    }

    public function setUserRootDir($userRootDir)
    {
        $this->userRootDir = $userRootDir;
    }
}











