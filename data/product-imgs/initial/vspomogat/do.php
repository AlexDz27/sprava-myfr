<?php
// Get the current directory
$directory = getcwd();

// Get all files in the current directory
$files = scandir($directory);

foreach ($files as $filename) {
    // Skip '.' and '..' directories
    if ($filename === '.' || $filename === '..') {
        continue;
    }
    
    // Skip directories (only process files)
    if (is_dir($filename)) {
        continue;
    }
    
    // Check if the filename contains '_resized'
    if (strpos($filename, '_resized') !== false) {
        // Create the new filename by removing '_resized'
        $newFilename = str_replace('_resized', '', $filename);
        
        // Full paths for old and new filenames
        $oldPath = $directory . DIRECTORY_SEPARATOR . $filename;
        $newPath = $directory . DIRECTORY_SEPARATOR . $newFilename;
        
        // Check if the new filename already exists
        if (file_exists($newPath)) {
            echo "Warning: $newFilename already exists. Skipping $filename\n";
            continue;
        }
        
        // Rename the file
        if (rename($oldPath, $newPath)) {
            echo "Renamed: $filename to $newFilename\n";
        } else {
            echo "Error renaming: $filename\n";
        }
    }
}

echo "Finished processing files.\n";
?>