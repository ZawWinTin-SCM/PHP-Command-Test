<?php

class MakeFileController
{
    private $availableFileTypes = [
        'command',
        'class',
    ];

    public function make()
    {
        $makeCommand = explode(":", $_SERVER['argv'][1]);
        if (count($makeCommand) > 2) {
            $this->showCreatableFiles();
        } else {
            [$make, $fileType] = $makeCommand;
            if (!in_array($fileType, $this->availableFileTypes)) {
                $this->showCreatableFiles();
            } else {
                $fileType = ucfirst($fileType);
                $this->{"make{$fileType}File"}();
            }
        }
    }

    private function showCreatableFiles()
    {
        echo "You can make these \e[32mfiles\e[39m:\e[34m";
        foreach ($this->availableFileTypes as $file) {
            echo "\n{$file}";
        }
    }

    private function makeCommandFile()
    {
        $srcFile = "Assets/Srcs/Command.zwt";
        if (!isset($_SERVER['argv'][2])) {
            echo "Please Enter File Name !";
        } else {
            $fileName = $_SERVER['argv'][2];
            $filePath = "Commands/{$fileName}.php";
            copy($srcFile, $filePath);
            echo "\e[35m{$fileName} \e[32mCommand created successfully.";
        }
    }

    private function makeClassFile()
    {
        $srcFile = "Assets/Srcs/Class.zwt";
        if (!isset($_SERVER['argv'][2])) {
            echo "Please Enter File Name !";
        } else {
            $fileName = $_SERVER['argv'][2];
            $filePath = "./{$fileName}.php";
            copy($srcFile, $filePath);
            $contents = file_get_contents($filePath);
            $contents = str_replace('{$name}', $fileName, $contents);
            file_put_contents($filePath, $contents);
            echo "\e[35m{$fileName} \e[32mClass created successfully.";
        }
    }
}
