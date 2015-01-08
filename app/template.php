<?php

/**
 * Render
 *
 * @param string $file
 * @param array $data
 * @param string $layout
 *
 * @return string
 */
function render($file, $data = [], $layout = "layout")
{
    extract($data, EXTR_SKIP);

    ob_start();

    require config("view_dir") . "{$file}.phtml";

    $output = ob_get_clean();

    if (!empty($layout) && is_string($layout))
    {
        $output = render($layout, ["body" => $output] + $data, null);
    }

    return $output;
}

/**
 * Generate current year
 *
 * @return string
 */
function current_year()
{
    return date('Y');
}