<?php declare(strict_types=1);

function toRna(string $dna): string
{
  $rna = '';
  for ($i = 0; $i < strlen($dna); $i++) {
    $rna .= match ($dna[$i]) {
      'G' => 'C',
      'C' => 'G',
      'T' => 'A',
      'A' => 'U',
    };
  }
  return $rna;
}
