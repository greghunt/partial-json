<?php

use GregHunt\PartialJson\JsonParser;

$json = '[{"hello":"world"},{"foo": ["bar","baz"]}]';

$partialJsonStrings = [];
foreach (str_split($json, 1) as $char) {
    $lastString = $partialJsonStrings[count($partialJsonStrings) - 1] ?? '';
    $partialJsonStrings[] = $lastString . $char;
}

$parser = new JsonParser();

test('PartialJson', function ($partialJson) use ($parser) {
    $json = $parser->parse($partialJson);
    expect($json)->not->toBeNull();
})->with($partialJsonStrings);
