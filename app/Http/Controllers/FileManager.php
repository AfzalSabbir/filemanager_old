<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileManager extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getDirectories(): JsonResponse
    {
        $basePath = trim(request()->post('basePath') ?? '/', '/');
        $disc     = $disc ?? 'local';
        return response()->json([
            $basePath,
            $this->getFromStorage($basePath, $disc, 'directories')
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function getFiles(): JsonResponse
    {
        $basePath = trim(request()->post('basePath') ?? '/', '/');
        $disc     = $disc ?? 'local';
        return response()->json([
            $basePath,
            $this->getFromStorage($basePath, $disc, 'files')
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function getFilesDirectories(): JsonResponse
    {
        $basePath = trim(request()->post('basePath') ?? '/', '/');
        $disc     = $disc ?? 'local';
        return response()->json([
            $basePath,
            $this->getFromStorage($basePath, $disc)
        ]);
    }

    /**
     * @param $basePath
     * @param string $disc
     * @param string $fetch
     * @return array
     */
    private function getFromStorage($basePath, string $disc = 'local', string $fetch = ''): array
    {
        switch ($fetch) {
            case 'directories' :
            {
                $directories             = Storage::disk($disc)->directories($basePath);
                $response['directories'] = $this->getTrim($basePath, $directories);
                break;
            }
            case 'files' :
            {
                $files             = Storage::disk($disc)->files($basePath);
                $response['files'] = $this->getTrim($basePath, $files);
                break;
            }
            default :
            {
                $directories             = Storage::disk($disc)->directories($basePath);
                $response['directories'] = $this->getTrim($basePath, $directories);
                $files                   = Storage::disk($disc)->files($basePath);
                $response['files']       = $this->getTrim($basePath, $files);
                break;
            }
        }

        return $response;
    }

    /**
     * @param $basePath
     * @param $paths
     * @return array|string[]
     */
    private function getTrim($basePath, $paths): array
    {
        return array_map(function ($file) use ($basePath) {
            return Str::after($file, "$basePath/");
        }, $paths);
    }
}
