<?php

if ($pokemon) {
  echo '<h1>'. $pokemon->getName() .'</h1>';
}
else{
  echo '<p>Pokemon not found.</p>';
}