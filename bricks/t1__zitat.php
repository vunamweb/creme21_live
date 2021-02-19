<?php

$zitat = explode("\n", $text);

$output .= '
                            <blockquote class="blockquote text-center">
                                <p class="mb-0">'.$zitat[0].'</p>
                                <footer class="blockquote-footer bg-transparent p-0">'.$zitat[1].'</footer>
                            </blockquote>';
$morp = $text;

?>