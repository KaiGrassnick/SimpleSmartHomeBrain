<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Utils;

use Symfony\Component\Finder\Finder;

class Version
{

    /**
     * @var string
     */
    protected $projectDir;


    /**
     * Version constructor.
     *
     * @param string $projectDir
     */
    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }


    /**
     * @return array
     */
    public function getArray(): array
    {
        $version = $this->getVersionFromComposer();

        return explode('.', $version);
    }


    /**
     * @return string
     */
    public function getString(): string
    {
        return $this->getVersionFromComposer();
    }


    /**
     * @return string
     */
    protected function getVersionFromComposer(): string
    {
        $finder        = new Finder();
        $rootDirectory = $this->projectDir;
        $version       = 'x.x.x';

        $finder->files()->in($rootDirectory)->name('composer.json')->depth(0);

        foreach ($finder as $file) {
            $data    = json_decode($file->getContents());
            $version = $data->version;
        }

        return $version;
    }
}