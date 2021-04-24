<?php declare(strict_types=1);
/**
 * phpGit - A Git wrapper for PHP
 *
 * @author   https://github.com/inhere
 * @link     https://github.com/phpcom-lab/phpgit
 * @license  MIT
 */

// namespace PhpGitTest;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;

/**
 * @author Kazuyuki Hayashi <hayashi@siance.co.jp>
 */
abstract class BaseTestCase extends TestCase
{
    /**
     * @var string
     */
    protected $directory;

    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        $this->directory = __DIR__ . '/testdata/build/' . strtolower(get_class($this));
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown(): void
    {
        $filesystem = new Filesystem();
        $filesystem->remove($this->directory);
    }
}
