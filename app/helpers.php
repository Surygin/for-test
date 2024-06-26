<?php

function getCacheKey($data): string
{
    return md5(json_encode($data));
}
