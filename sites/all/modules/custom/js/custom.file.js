/**
 * Process showing thumbnail and store to server, return fid.
 */
function custom_file_image_data_process(img_selector, imagedata, callback) {
  var img = $(img_selector);
  if (!img.length) {return false;}

	// Show image in preview section.
	img.attr('src', 'data:image/jpeg;base64,' + imagedata);

	// Send to server for fid returning.
	var filename = Drupal.user.name + '_' + Date.now() + '.jpg';
	custom_services_call('photo_data_upload', {filename: filename, imagedata: imagedata}, function(result) {
		if (parseInt(result) > 0) {
			img.attr('fid', result);

			if (typeof callback == 'function') {callback(img);}
		}
		else{
			alert('Error occured during the process.');
		}
	});
}

/**
 * File handler.
 * file_id: id of the file field.
 * options: {
 *   max_filesize: 5,
 *   min_width: 300,
 *   min_height: 300,
 *   url: '/image-process' - This URL will return fid if success.
 * }
 * callback: use to output result and process.
 */
function custom_file_handler(file_elm, options, callback) {
  //var file = document.getElementById(file_id);
  var file = jQuery( file_elm);

  if (!file.length) {return false;}

  file.change(function(e) {
	//file.addEventListener('change', function(e) {
		e.stopPropagation();
		e.preventDefault();

		// Setup default value.
		options.max_filesize = options.max_filesize == undefined ? 5 : options.max_filesize; // in MB
		options.min_width = options.min_width == undefined ? 300 : options.min_width; // in pixels
		options.min_height = options.min_height == undefined ? 300 : options.min_height;
		options.url = options.url == undefined ? '/image-process' : options.url;

		var files = null;
		if (e.dataTransfer != undefined) {
			files = e.dataTransfer.files;
		}
		else{
			files = e.target.files;
		}

		for (var i = 0, f; f = files[i]; i++) {
			// Validate the input:
			// Must be images.
			if (!f.type.match('image.*')) {
				alert('File ' + f.name.toUpperCase() + ' is not an image format.');
				continue;
			}

			// Must less than options.max_filesize * 1024 * 1024 MB.
			if (f.size > options.max_filesize * 1024 * 1024) {
				alert('File ' + f.name.toUpperCase() + ' has size that is greater than ' + options.max_filesize + 'MB.');
				continue;
			}

			// Read the file for checking dimension.
			var reader = new FileReader();

			// Closure to capture the file information.
			reader.onload = (function(theFile) {
				return function(e) {
					var image = new Image();
					var file = e;

					image.onload = function(e) {
						var width = this.width;
						var height = this.height;
						var is_error = false;

						if (width < options.min_width) {
							alert('File ' + theFile.name.toUpperCase() + ' has width dimension smaller than ' + options.min_width + 'px.');
							is_error = true;
						}

						if (height < options.min_height) {
							alert('File ' + theFile.name.toUpperCase() + ' has height dimension smaller than ' + options.min_height + 'px.');
							is_error = true;
						}

						// Show the image in the list.
						if (!is_error) {
							var image = jQuery('<img src="' + file.target.result + '" class="photo-thumb" alt="' + theFile.name + '" />');
              //callback(image);

							// Build files form submit.
							var formData = new FormData();
							formData.append('file', theFile);

							var xhr = new XMLHttpRequest();
							xhr.open('POST', options.url);
							xhr.onload = function () {
								if (xhr.status === 200) {
									// Done, success.
									// Update and close popup.
									var fid = parseInt(xhr.response);
									if (fid > 0) {
									  // Output or process the result.
									  if (typeof callback == 'function') {
									    image.attr('fid', fid);
									    callback(image);
									  }
									}
                  else{
                    alert('Error occured during the process.');
                  }
								}
								else {
									alert('Cannot connect to server.');
								}
							};

							xhr.send(formData);

						}
						else{
							// Error.
							// To-do.
              console.log('Error!');
						}
					};

					image.src = e.target.result;
				};
			})(f);

			// Read in the image file as a data URL.
			reader.readAsDataURL(f);
		}

	//}, false);
    return false;
	});
}
