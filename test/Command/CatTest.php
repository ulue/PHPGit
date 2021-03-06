<?php declare(strict_types=1);
/**
 * phpGit - A Git wrapper for PHP
 *
 * @author   https://github.com/inhere
 * @link     https://github.com/phpcom-lab/phpgit
 * @license  MIT
 */

use PhpGit\Git;
use Symfony\Component\Filesystem\Filesystem;

class CatTest extends BaseTestCase
{
    public function testCatBlob(): void
    {
        $filesystem = new Filesystem();
        $filesystem->mkdir($this->directory);

        $git = new Git();
        $git->init($this->directory);
        $git->setRepository($this->directory);

        $filesystem->dumpFile($this->directory . '/test.txt', 'foo');
        $git->add('test.txt');
        $git->commit('Initial commit');

        $tree = $git->tree();

        $this->assertEquals('foo', $git->cat->blob($tree[0]['hash']));
    }

    public function testCatType(): void
    {
        $filesystem = new Filesystem();
        $filesystem->mkdir($this->directory);

        $git = new Git();
        $git->init($this->directory);
        $git->setRepository($this->directory);

        $filesystem->dumpFile($this->directory . '/test.txt', 'foo');
        $git->add('test.txt');
        $git->commit('Initial commit');

        $tree = $git->tree();

        $this->assertEquals('blob', $git->cat->type($tree[0]['hash']));
    }

    public function testCatSize(): void
    {
        $filesystem = new Filesystem();
        $filesystem->mkdir($this->directory);

        $git = new Git();
        $git->init($this->directory);
        $git->setRepository($this->directory);

        $filesystem->dumpFile($this->directory . '/test.txt', 'foo');
        $git->add('test.txt');
        $git->commit('Initial commit');

        $tree = $git->tree();

        $this->assertEquals(3, $git->cat->size($tree[0]['hash']));
    }
}
