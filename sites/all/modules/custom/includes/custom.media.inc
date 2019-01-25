<?php 
/**
 * @file Custom media functions handler.
 */

/**
 * Process to upload image data to server then return its fid.
 * Mostly will used via the HTML 5 canvas imagedata upload.
 */
function custom_photo_data_upload($filename, $imagedata) {
	global $user;

	// Clean the filename.
	if (module_exists('transliteration')) {
		$filename = transliteration_clean_filename($filename);
	}

	// Create image fieldfield object then store.
  $filepath = 'public://user-photos/' . 'd_' . time() . $filename;
	$file = file_save_data(base64_decode($imagedata), $filepath, FILE_EXISTS_RENAME);
	image_path_flush($file->uri);

	// Set to temp file.
	$file->status = 0;
	file_save($file);

	if ($file->fid) {
	  // Return the fid for continuing processing.
		return $file->fid;
	}

  // Failed to process. Return fid as 0.
  return 0;
}

/**
 * Process to upload image file to server then return its fid.
 * Mostly will use this function via the ajax caller for filefield uploader.
 */
function custom_photo_upload() {
  // Move the images file into the folder
  if (isset($_FILES['file']) and !empty($_FILES['file']['name'])) {
    $filepath_public = 'public://user-photos';
    $image_name = strtolower($_FILES['file']['name']);

    // Clean the filename.
    if (module_exists('transliteration')) {
      $image_name = transliteration_clean_filename($image_name);
    }

    // Get the absolute filepath.
    $filepath_real = drupal_realpath($filepath_public) . '/' . $image_name;

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $filepath_real)) {
      watchdog('custom', t('Could not move the uploaded image %image_name to the right folder!', array('%image_name' => $image_name)));
    }
    else{
      // Create image fieldfield object then store.
      $image = file_get_contents($filepath_real);
      unlink($filepath_real);

      if ($image) {
        // Workaround to skip duplicated tmp file issue.
        $image_name = 'r_' . time() . '_' . $image_name;

        $file = file_save_data($image, $filepath_public . '/' . $image_name, FILE_EXISTS_RENAME);
        image_path_flush($file->uri);

        // Set to temp file.
        $file->status = 0;
        file_save($file);

        if ($file->fid) {
          // Return to client handler for continuing processing.
          echo $file->fid;
          exit;
        }
      }
      else{
        watchdog('custom', t('Could not store image name %image_name', array('%image_name' => $image_name)));
      }
    }
  }

  // Failed to process the file. Return fid as 0.
  echo 0;
  exit;
}