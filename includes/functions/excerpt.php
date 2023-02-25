<?php
function getExcerpt(string $content): string {
  $contentToArray = explode(" ", $content);
  $first6Words = array_slice($contentToArray, 0, 6);

  return implode(" ", $first6Words);
}