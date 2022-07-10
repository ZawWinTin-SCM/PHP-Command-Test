<?php

class CommandController
{
    protected $dir = "Commands/";

    public function command()
    {
        if (count($_SERVER['argv']) <= 1) {
            echo "You can enter these \e[32mcommands\e[39m:\e[34m";
            $this->showCommandList();
        } else {
            if (file_exists("{$this->dir}{$_SERVER['argv'][1]}.php")) {
                require_once "{$this->dir}{$_SERVER['argv'][1]}.php";
            } else {
                echo "Please enter valid \e[31mcommands\e[39m:\e[34m";
                $this->showCommandList();
            }
        }
    }

    private function showCommandList()
    {
        $files = scandir($this->dir);
        foreach ($files as $file) {
            if (!in_array($file, ['.', '..'])) {
                $command = str_replace('.php', '', $file);
                echo "\n{$command}";
            }
        }
    }
}
