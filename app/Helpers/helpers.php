<?php

use App\Models\Locale;
use Buglinjo\LaravelWebp\Facades\Webp;

/**
 * @param name
 * @return slug_of_name
 */
function generateSlug($name, $type = 'name')
{
    if (!Locale::findBySlug($name, $type)->count())
        return str($name);
    return generateSlug(str($name) . "-" . rand(1, 999));
}

/**
 * @param image_file the request file
 * @param dir the directory of the image
 * @return dir of image
 *
 */
function uploadImages($image_file, $dir)
{
    if (!file_exists(public_path("images"))) {
        mkdir(public_path("images"), 0777);
    }
    if (!file_exists(public_path($dir))) {
        mkdir(public_path($dir), 0777);
    }
    if ($image_file->extension() == "svg" || $image_file->extension() == "webp") {
        $file =  time() . md5(uniqid()) . "." . $image_file->extension();
        $image_file->move(public_path($dir), $file);
        return  $dir . "/" . $file;
    } else {
        $image = Webp::make($image_file);
        $file =  $dir . '/' . time() . md5(uniqid()) . ".webp";
        $image->save($file);
        return  $file;
    }
}

/**
 * @param message which return with of response json
 * @param data $object
 * @param response_status like 200,500,400
 * @param  pagination $pagination have default value null
 * @return response json

 */

function responseJson($response_status, $massage, $object = null, $pagination = null)
{
    return response()->json([
        "message" => $massage,
        "data" => $object,
        "pagination" => $pagination,
    ], $response_status);
}


/**
 * @param collection of data resource
 * @return array of properties for pagination
 */

function getPaginates($collection)
{
    return [
        "per_page" => $collection->perPage(),
        "path" => $collection->path(),
        "total" => $collection->total(),
        "current_page" => $collection->currentPage(),
        "next_page_url" => $collection->nextPageUrl(),
        "previous_page_url" => $collection->previousPageUrl(),
        "last_page" => $collection->lastPage(),
        "has_more_pages" => $collection->hasMorePages()
    ];
}

/**
 * @param name default or anythings
 * @return name in english
 */
function nameInEnglish($c_name = "name")
{
    $name = request()->locales[0]["$c_name"];
    foreach (request()->locales as $field) {
        if ($field["locale"] == "en")
            $name = $field["$c_name"];
    }
    return $name;
}

