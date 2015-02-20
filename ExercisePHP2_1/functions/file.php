<?php

function File_upload($field) {
    if (empty($_FILES))
        return false;
    if (0 !== $_FILES[$field]['error'])
        return false;
    if ('text/html' !== $_FILES[$field]['type'])
        return false;
    if (is_uploaded_file($_FILES[$field]['tmp_name'])) {
        $res =  move_uploaded_file(
            $_FILES[$field]['tmp_name'],
            __DIR__ . '/../news/' . $_FILES[$field]['name']
        );
        if (!$res) {
            return false;
        } else {
            return '/news/' . $_FILES[$field]['name'];
        }
    }
    return false;
}