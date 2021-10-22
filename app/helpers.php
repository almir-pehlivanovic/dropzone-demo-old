<?php
function imagePath($value)
{
    $imagePath = '/storage/uploads/' . $value;
    
    return $imagePath;
}