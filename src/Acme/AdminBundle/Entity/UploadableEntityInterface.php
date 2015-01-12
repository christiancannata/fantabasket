<?php

namespace Facile\Adsl\AdminBundle\Entity;

interface UploadableEntityInterface {

    public function getUploadRootDir();
    public function setUploadRootDir($uploadRootDir);
    public function upload();
    public function remove();
}