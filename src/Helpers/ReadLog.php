<?php

namespace Hexters\Ladmin\Helpers;

class ReadLog
{

    /**
     * Get existing file
     *
     * @return void
     */
    public function get_files()
    {
        $logFiles = scandir(storage_path('logs/'));
        $logs = [];
        foreach ($logFiles as $file) {
            if (!in_array($file, ['.', '..', '.gitignore'])) {
                $logs[] = $file;
            }
        }
        $logs = array_reverse($logs);
        return $logs;
    }

    /**
     * Set default file
     *
     * @return void
     */
    public function default_file()
    {
        return $this->get_files()[0] ?? 'laravel.log';
    }

    /**
     * convert to json format
     *
     * @param string $file
     * @return void
     */
    public function json($file = 'laravel.log')
    {

        if (!file_exists(storage_path("logs/{$file}"))) {
            return [];
        }

        $fullPattern = "/^\[(?<date>.*)\]\s(?<env>\w+)\.(?<type>\w+):(?<message>.*)?(\n(\[stacktrace\])\n+(?<trace>(?:(\#.*\n)+)+))/m";
        $content = file_get_contents(storage_path("logs/{$file}"));
        preg_match_all($fullPattern, $content, $fullErroMatches, PREG_SET_ORDER, 0);

        $pattern = "/^\[(?<date>.*)\]\s(?<env>\w+)\.(?<type>\w+):[ ](?<message>.*)[ ]/m";
        $content = file_get_contents(storage_path("logs/{$file}"));
        preg_match_all($pattern, $content, $errorMatch, PREG_SET_ORDER, 0);


        $errors = array_merge($errorMatch, $fullErroMatches);
        $logs = [];
        foreach ($errors as $match) {
            $logs[] = [
                'timestamp' => $match['date'],
                'env' => $match['env'],
                'type' => $match['type'],
                'message' => trim($match['message']),
                'color' => $this->color($match['type']),
                'trace' => isset($match['trace']) ? nl2br($match['trace']) : ''
            ];
        }

        return $logs;
    }

    public function color($type)
    {
        $colors = [
            strtoupper('emergency') => 'danger',
            strtoupper('alert') => 'warning',
            strtoupper('critical') => 'warning',
            strtoupper('error') => 'danger',
            strtoupper('warning') => 'danger',
            strtoupper('notice') => 'primary',
            strtoupper('info') => 'info',
            strtoupper('debug') => 'secondary',
        ];

        return $colors[$type] ?? 'warning';
    }
}
