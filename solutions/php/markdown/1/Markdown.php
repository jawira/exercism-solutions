<?php declare(strict_types=1);

function parseMarkdown($markdown)
{
    $lines = explode("\n", $markdown);

    $isInList = false;

    foreach ($lines as &$line) {
        if (preg_match('/^(#+)(.*)/', $line, $matches)) {
            $level = strlen($matches[1]);
            $content = trim($matches[2]);
            $line = "<h$level>$content</h$level>";
        }

        if (preg_match('/\*(.*)/', $line, $matches)) {
            $isBold = false;
            $isItalic = false;
            if (preg_match('/(.*)__(.*)__(.*)/', $matches[1], $matches2)) {
                $matches[1] = $matches2[1] . '<em>' . $matches2[2] . '</em>' . $matches2[3];
                $isBold = true;
            }

            if (preg_match('/(.*)_(.*)_(.*)/', $matches[1], $matches3)) {
                $matches[1] = $matches3[1] . '<i>' . $matches3[2] . '</i>' . $matches3[3];
                $isItalic = true;
            }

            $content = trim($matches[1]);
            if (!($isItalic || $isBold)) {
                $content = "<p>$content</p>";
            }

            $prefix = $isInList ? '' : '<ul>';
            $line = $prefix . "<li>$content</li>";
            $isInList = true;
        } elseif ($isInList) {
            $line = "</ul>" . $line;
            $isInList = false;
        }

        if (!preg_match('/<h|<ul|<p|<li/', $line)) {
            $line = "<p>$line</p>";
        }

        if (preg_match('/(.*)__(.*)__(.*)/', $line, $matches)) {
            $line = $matches[1] . '<em>' . $matches[2] . '</em>' . $matches[3];
        }

        if (preg_match('/(.*)_(.*)_(.*)/', $line, $matches)) {
            $line = $matches[1] . '<i>' . $matches[2] . '</i>' . $matches[3];
        }
    }
    $html = join($lines);
    if ($isInList) {
        $html .= '</ul>';
    }
    return $html;
}
