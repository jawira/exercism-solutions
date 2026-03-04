<?php declare(strict_types=1);

function encode(string $input): string
{
  if (empty($input)) {
    return $input;
  }
  $output = '';
  for ($i = 1, $last = $input[0], $counter = 1, $length = strlen($input); $i <= $length; $i++) {
    if ($i < $length && $input[$i] === $last) {
      $counter++;
      continue;
    }
    $output .= ($counter === 1 ? '' : $counter) . $last;
    $counter = 1;
    if ($i >= $length) {
      break;
    }
    $last = $input[$i];
  }
  return $output;
}

function decode(string $input): string
{
  preg_match_all('#(\d*)([a-zA-Z ]{1})#', $input, $results, PREG_SET_ORDER);
  $reducer = function ($carry, $item): string {
    return $carry . str_repeat($item[2], is_numeric($item[1]) ? intval($item[1]) : 1);
  };
  return array_reduce($results, $reducer, '');
}
