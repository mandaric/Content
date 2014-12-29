<?php

function page_view(array $data)
{
    extract($data);

    include __DIR__ . "/views/page.phtml";
}