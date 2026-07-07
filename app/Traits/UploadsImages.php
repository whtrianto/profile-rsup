<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait UploadsImages
{
    /**
     * Upload and compress an image file to be under a maximum size.
     *
     * @param UploadedFile $file The uploaded file
     * @param string $folder Subfolder inside public/uploads/
     * @param int $maxSizeKb Maximum size in KB (default: 200)
     * @return string Relative path to the uploaded image
     */
    protected function uploadAndCompressImage(UploadedFile $file, string $folder, int $maxSizeKb = 200): string
    {
        $destinationPath = public_path('uploads/' . $folder);
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }

        if (!extension_loaded('gd')) {
            $originalName = uniqid('file_', true) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $originalName);
            return 'uploads/' . $folder . '/' . $originalName;
        }

        $useWebp = function_exists('imagewebp');
        $filename = uniqid('img_', true) . ($useWebp ? '.webp' : '.jpg');
        $fullPath = $destinationPath . '/' . $filename;

        $sourcePath = $file->getPathname();
        $imageInfo = @getimagesize($sourcePath);
        if (!$imageInfo) {
            // Fallback: if not a valid image, just move the file
            $originalName = uniqid('file_', true) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $originalName);
            return 'uploads/' . $folder . '/' . $originalName;
        }

        $mime = $imageInfo['mime'];
        $width = $imageInfo[0];
        $height = $imageInfo[1];

        // Create image resource based on mime type
        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = @imagecreatefromjpeg($sourcePath);
                break;
            case 'image/png':
                $image = @imagecreatefrompng($sourcePath);
                break;
            case 'image/webp':
                $image = @imagecreatefromwebp($sourcePath);
                break;
            case 'image/gif':
                $image = @imagecreatefromgif($sourcePath);
                break;
            default:
                $image = false;
        }

        if (!$image) {
            // Fallback: move original file if GD failed to load it
            $originalName = uniqid('file_', true) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $originalName);
            return 'uploads/' . $folder . '/' . $originalName;
        }

        // Proportional resize if width or height is larger than 1200px
        $maxDimension = 1200;
        if ($width > $maxDimension || $height > $maxDimension) {
            if ($width > $height) {
                $newWidth = $maxDimension;
                $newHeight = (int)($height * ($maxDimension / $width));
            } else {
                $newHeight = $maxDimension;
                $newWidth = (int)($width * ($maxDimension / $height));
            }

            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

            // Handle transparency for WebP/PNG
            imagealphablending($resizedImage, false);
            imagesavealpha($resizedImage, true);
            $transparentColor = imagecolorallocatealpha($resizedImage, 0, 0, 0, 127);
            imagefill($resizedImage, 0, 0, $transparentColor);

            imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagedestroy($image);
            $image = $resizedImage;
            $width = $newWidth;
            $height = $newHeight;
        }

        // Loop to reduce quality / scale down until file size is under maxSizeKb
        $quality = 85;
        $maxSizeBytes = $maxSizeKb * 1024;
        $data = '';

        while ($quality >= 20) {
            ob_start();
            if ($useWebp) {
                imagewebp($image, null, $quality);
            } else {
                imagejpeg($image, null, $quality);
            }
            $tempData = ob_get_clean();

            if (strlen($tempData) <= $maxSizeBytes || $quality === 20) {
                $data = $tempData;
                if (strlen($tempData) <= $maxSizeBytes) {
                    break;
                }
            }
            $quality -= 10;
        }

        // If quality reduction alone wasn't enough, scale down resolution progressively
        if (strlen($data) > $maxSizeBytes) {
            $scale = 0.8;
            $currentImg = $image;
            while ($scale >= 0.3) {
                $newWidth = (int)($width * $scale);
                $newHeight = (int)($height * $scale);

                $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
                imagealphablending($resizedImage, false);
                imagesavealpha($resizedImage, true);
                $transparentColor = imagecolorallocatealpha($resizedImage, 0, 0, 0, 127);
                imagefill($resizedImage, 0, 0, $transparentColor);

                imagecopyresampled($resizedImage, $currentImg, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                ob_start();
                if ($useWebp) {
                    imagewebp($resizedImage, null, 40);
                } else {
                    imagejpeg($resizedImage, null, 40);
                }
                $tempData = ob_get_clean();
                imagedestroy($resizedImage);

                if (strlen($tempData) <= $maxSizeBytes) {
                    $data = $tempData;
                    break;
                }
                $scale -= 0.15;
            }
        }

        imagedestroy($image);

        // Write the data to file
        file_put_contents($fullPath, $data);

        return 'uploads/' . $folder . '/' . $filename;
    }

    /**
     * Delete an old image safely if it exists under public/uploads
     *
     * @param string|null $path
     * @return void
     */
    protected function deleteOldImage(?string $path): void
    {
        if ($path) {
            $fullPath = public_path($path);
            if (File::exists($fullPath) && File::isFile($fullPath)) {
                // Security check to avoid deleting files outside the uploads directory
                if (str_contains($path, 'uploads/')) {
                    File::delete($fullPath);
                }
            }
        }
    }
}
