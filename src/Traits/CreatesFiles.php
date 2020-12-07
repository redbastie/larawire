<?php

namespace Redbastie\Larawire\Traits;

use Illuminate\Support\Str;

trait CreatesFiles
{
    protected $filesystem;
    protected $stubDir;
    protected $argument;
    private $replaces = [];

    public function setReplaces()
    {
        $title = preg_replace('/(.)(?=[A-Z])/u', '$1 ', $this->argument);
        $titles = Str::plural($title);

        $this->replaces = [
            'dummyCamels' => Str::camel($titles),
            'dummyCamel' => Str::camel($title),
            'DummyPascals' => Str::studly($titles),
            'DummyPascal' => Str::studly($title),
            'dummy-slugs' => Str::slug($titles),
            'dummy-slug' => Str::slug($title),
            'dummy_snakes' => Str::snake($titles),
            'dummy_snake' => Str::snake($title),
            'Dummy Titles' => $titles,
            'Dummy Title' => $title,
            'dummy titles' => Str::lower($titles),
            'dummy title' => Str::lower($title),
        ];
    }

    public function createFiles()
    {
        foreach ($this->filesystem->allFiles($this->stubDir, true) as $file) {
            $filePath = $this->replace(Str::replaceLast('.stub', '', $file->getRelativePathname()));
            $fileDir = $this->replace($file->getRelativePath());

            if (Str::contains($filePath, '.DS_Store')) {
                continue;
            }

            if ($fileDir) {
                $this->filesystem->ensureDirectoryExists($fileDir);
            }

            $this->filesystem->put($filePath, $this->replace($file->getContents()));

            $this->warn('Created file: <info>' . $filePath . '</info>');
        }
    }

    private function replace($content)
    {
        foreach ($this->replaces as $search => $replace) {
            $content = str_replace($search, $replace, $content);
        }

        return $content;
    }
}
