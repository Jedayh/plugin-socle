<?php
namespace PaymentForm\Document;

/**
 * Classe pour l'écriture dans le fichier doc
 *
 * @author     Fabrice <fabrice@medialibs.com>
 *
 * @since      2021-03-16
 */
class DocumentUpdater
{
    private $originalDocumentContentPath = '';
    private $tmpPath                     = '';
    private $searches                    = [];
    private $replaces                    = [];

    public function __construct()
    {
        $this->originalDocumentContentPath = __DIR__ . '/model_document_content';
        if (!file_exists($this->originalDocumentContentPath)) {
            throw new Exception("Erreur: Le dossier contenant le modèle de document est inaccessible: " . $this->originalDocumentContentPath);
        }
        $this->tmpPath = __DIR__ . '/tmp/';
        if (!file_exists($this->tmpPath)) {
            mkdir($this->tmpPath, 0777, true);
        }
    }

    /**
     * Remplacer le contenu du fichier
     *
     * @param file      $searches
     * @param array     $replaces
     * @param array     $outputFile
     *
     * @return null
     */
    public function processReplacement($searches, $replaces, $outputFile)
    {
        // Copie dans le répertoire temporaire
        $temporaryDir = $this->tmpPath . time() . '_' . rand();
        $this->recursiveCopy($this->originalDocumentContentPath, $temporaryDir);
        // Remplacement des valeurs
        $content         = '';
        $documentXmlFile = $temporaryDir . '/word/document.xml';
        if ($content = file_get_contents($documentXmlFile)) {
            $content = str_replace($searches, $replaces, $content);
        } else {
            throw new Exception('Erreur lors de la récupération du contenu de ' . $this->wordDocumentXmlFile);
        }
        file_put_contents($documentXmlFile, $content);
        // Zip
        $this->zipDirectory($temporaryDir, $outputFile);
        // Supprimer le répertoire temporaire
        $this->removeDirectory($temporaryDir);
    }

    /**
     * Copier recursivement un dossier
     *
     * @param string $src Répertoire source
     * @param string $dst Répertoire destination
     *
     * @return null
     */
    private function recursiveCopy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (($file = readdir($dir))) {
            if (('.' != $file) && ('..' != $file)) {
                if (is_dir($src . '/' . $file)) {
                    $this->recursiveCopy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    /**
     * Supprimer le répertoire
     *
     * @param $dir
     *
     * @return null
     */
    private function removeDirectory($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ("." != $object && ".." != $object) {
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . "/" . $object)) {
                        $this->removeDirectory($dir . DIRECTORY_SEPARATOR . $object);
                    } else {
                        unlink($dir . DIRECTORY_SEPARATOR . $object);
                    }
                }
            }
            rmdir($dir);
        }
    }

    /**
     * Compresser les contenus d'un répertoire
     *
     * @param string $inputDirectory
     * @param string $outputZipFile
     *
     * @return null
     */
    private function zipDirectory($inputDirectory, $outputZipFile)
    {
        // Get real path for our folder
        $rootPath = realpath($inputDirectory);
        // Initialize archive object
        $zip = new \ZipArchive();
        $zip->open($outputZipFile, \ZipArchive::CREATE);
        // Create recursive directory iterator
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($rootPath),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach ($files as $name => $file) {
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $filePath     = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
    }
}
