<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileManager extends Controller
{
    private $response;
    private $basePath;

    /**
     * @return JsonResponse
     */
    public function getTree(): JsonResponse
    {
        $type           = request()->post('type') ?? 'directories';
        $isRoot         = (boolean)(request()->post('isRoot') ?? true);
        $this->basePath = trim(request()->get('id') ?? '/', '/');
        $disc           = $disc ?? 'local';

        $response = $this->getFromStorage($disc, $type)->addOptions();
        if ($isRoot) $response = $response->addRootOptions();
        $response = $response->getResponse();

        return response()->json([$response]);
    }

    /**
     * @return JsonResponse
     */
    public function getDirectories(): JsonResponse
    {
        $this->basePath = trim(request()->post('basePath') ?? '/', '/');
        $disc           = $disc ?? 'local';
        return response()->json(
            $this->getFromStorage($disc, 'directories')
        );
    }

    /**
     * @return JsonResponse
     */
    public function getFiles(): JsonResponse
    {
        $this->basePath = trim(request()->post('basePath') ?? '/', '/');
        $disc           = $disc ?? 'local';
        return response()->json(
            $this->getFromStorage($disc, 'files')
        );
    }

    /**
     * @return JsonResponse
     */
    public function getFilesDirectories(): JsonResponse
    {
        $this->basePath = trim(request()->post('basePath') ?? '/', '/');
        $disc           = $disc ?? 'local';
        return response()->json(
            $this->getFromStorage($disc)
        );
    }

    /**
     * @param string $disc
     * @param string $fetch
     * @return FileManager
     */
    private function getFromStorage(string $disc = 'local', string $fetch = ''): FileManager
    {
        switch ($fetch) {
            case 'directories' :
            {
                $directories             = Storage::disk($disc)->directories($this->basePath);
                $response['directories'] = $this->getTrim($directories);
                break;
            }

            case
            'files' :
            {
                $files             = Storage::disk($disc)->files($this->basePath);
                $response['files'] = $this->getTrim($files);
                break;
            }
            default :
            {
                $directories             = Storage::disk($disc)->directories($this->basePath);
                $response['directories'] = $this->getTrim($directories);
                $files                   = Storage::disk($disc)->files($this->basePath);
                $response['files']       = $this->getTrim($files);
                break;
            }
        }

        $this->response = $response;

        return $this;
    }

    /**
     * @param $paths
     * @return array
     */
    private function getTrim($paths): array
    {
        return array_map(function ($file) {
            return Str::after($file, "$this->basePath/");
        }, $paths);
    }

    /**
     * @return FileManager
     */
    private function addRootOptions(): FileManager
    {
        $this->response = [
            "id"       => '/',
            "text"     => "Storage",
            "icon"     => "fa fa-hdd text-warning",
            "state"    => [
                "opened" => true
            ],
            "children" => $this->response['directories']
        ];

        return $this;
    }

    /**
     * @return FileManager
     */
    private function addOptions(): FileManager
    {
        $this->response = collect($this->response)->map(function ($type) {
            return collect($type)->map(function ($directory) {
                return [
                    "id"    => "/{$this->basePath}{$directory}",
                    "text"  => $directory,
                    "icon"  => "fa fa-folder text-warning",
                    "state" => [
                        "opened" => false
                    ]
                ];
            })->toArray();
        })->toArray();

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }
}
