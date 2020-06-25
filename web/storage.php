<?php

use Google\Cloud\Storage\StorageClient;

class storage
{
    private $projectId;
    private $storage;
    function uploadObject($bucketName, $objectName, $source)
    {
        $file = fopen($source, 'r');
        $bucket = $this->storage->bucket($bucketName);
        $object = $bucket->upload($file, ['name' => $objectName]);
        printf('Uploaded %s to gs://%s/%s' . PHP_EOL, basename($source), $bucketName, $objectName);
        echo "bucket Connected sojas";
    }
}
echo "bucket Connected";
?>
