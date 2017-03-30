<?php

/**
 * 返回可读性更好的文件尺寸
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}

/**
 * 判断文件的MIME类型是否为图片
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

/**
 * Return "checked" if true
 */
function checked($value)
{
    return $value ? 'checked' : '';
}

/**
 * Return img url for headers
 */
function page_image($value = null)
{
    if (empty($value)) {
        $value = config('blog.page_image');
    }
    if (! starts_with($value, 'http') && $value[0] !== '/') {
        $value = config('blog.uploads.webpath') . '/' . $value;
    }

    return $value;
}

function timeFormat(Carbon\Carbon $dateTime) {
    $now = Carbon\Carbon::now();
    $minus = $now->timestamp-$dateTime->timestamp;
    if ($minus<180)
        return trans('common.just_now');
    else if ($minus<3600)
        return ceil($minus/60).trans('common.minutes_ago');
    else if ($minus<7200)
        return trans('common.an_hour_ago');
    else if ($minus<86400)
        return ceil($minus/3600).trans('common.hours_ago');
    else if ($minus<172800 && ($now->startOfDay()->timestamp-$dateTime->startOfDay()->timestamp==86400))
        return trans('common.yesterday');
    else if ($now->startOfDay()->timestamp-$dateTime->startOfDay()->timestamp<30*86400)
        return ceil(($now->startOfDay()->timestamp-$dateTime->startOfDay()->timestamp)/86400).trans('common.days_ago');
    else
    return trans('common.date_on').$dateTime->format('F j, Y');
}

function setLanguage() {
    //App::setLocale(Cookie::get('lang'));
}