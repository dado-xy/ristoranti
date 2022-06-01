<?php
function saveImages($file, $title, $directory)
{
    $fileName =
        str_replace(' ', '_', $title)
        . '_' . date('d-m-y')
        . '_' . time()
        . '.' . $file->getClientOriginalExtension();

    return $file->storeAs('images/'.$directory, $fileName, 'public');
}
