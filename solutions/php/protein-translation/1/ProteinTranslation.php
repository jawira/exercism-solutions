<?php declare(strict_types=1);

class ProteinTranslation
{
    public function getProteins(string $string): array
    {
        $proteins = [];
        for ($i = 0; $i < strlen($string); $i += 3) {
            $chunck = substr($string, $i, 3);
            if (in_array($chunck, ['UAA', 'UAG', 'UGA'])) {
                break;
            }
            $proteins[] = match ($chunck) {
                'AUG' => 'Methionine',
                'UUU', 'UUC' => 'Phenylalanine',
                'UUA', 'UUG' => 'Leucine',
                'UCU', 'UCC', 'UCA', 'UCG' => 'Serine',
                'UAU', 'UAC' => 'Tyrosine',
                'UGU', 'UGC' => 'Cysteine',
                'UGG' => 'Tryptophan',
                default => throw new InvalidArgumentException('Invalid codon'),
            };
        }
        return $proteins;
    }
}
