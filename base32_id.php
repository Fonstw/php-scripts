<?php

function to_base32(int $decimal): string
{
    // To base32 (0-1, a-v).
    $base32 = strtoupper(base_convert($decimal, 10, 32));

    // No ambiguous characters (I, O, S, Z).
    $base32 = str_replace('I', 'w', $base32);
    $base32 = str_replace('O', 'x', $base32);
    $base32 = str_replace('S', 'y', $base32);

    return $base32;
}

function random32(int $length): string
{
    $alphabet = '0123456789ABCDEFGHJKLMNPQRTUVWXY';
    $response = '';

    // Why not convert 32**$length?
    // That's sometimes too big for PHP to understand.
    for ($i = 0; $i < $length; $i++)
        $response .= $alphabet[random_int(0, 31)];

    return $response;
}

function base32_id(string $splitter): string
{
    // For shorter, still relevant ids.
    $hour = floor(time() / 3600);

    $id = to_base32($hour);
    $id .= $splitter;
    $id .= random32(4);

    return $id;
}

// Print new base32_id, splits by terminal argument, by . if not given.
print base32_id($argv[1] ?? '-') . PHP_EOL;
