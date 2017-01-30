<?php
// Clear the caches.
echo "Clearing all caches...\n";
passthru('drush cc all -y');
echo "Caches cleared.\n";
