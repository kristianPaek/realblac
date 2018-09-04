<?php
// w: width
// h: height
// zc: zoom crop (0 or 1)
// q: quality (default is 75 and max is 100)

class eMeeting_Thumbnail_Preview {


    function eMeeting_Thumbnail_Preview ($cacheDir, $fileDir, $fileName, $mYwidth, $mYheight, $WaterMark="") {
 
        //make sure the GD library is installed
    	if(!function_exists("gd_info")) {
        	echo 'You do not have the GD Library installed.  This class requires the GD library to function properly.' . "\n";
        	echo 'visit http://us2.php.net/manual/en/ref.image.php for more information';
        	exit;
        }

		if( !isset( $fileName ) ) { die( "no image specified" ); }
		
		// clean params before use		
		$src = $fileDir. $fileName;

		$new_width = $mYwidth;
		$new_height = $mYheight;
		$zoom_crop = 0;
		$quality = 100;
		
		// cache directory
		$cache_dir = $cacheDir;
		
		// get mime type of src
		$mime_type = $this->mime_type( $src );
		
		// check to see if this image is in the cache already
		$this->check_cache( $cache_dir, $mime_type, $mYwidth, $mYheight );
		
		// make sure that the src is gif/jpg/png
		if( !$this->valid_src_mime_type( $mime_type ) ) {
			$error = "Invalid src mime type: $mime_type";
			die( $error );
		}
		
		
		if(strlen($src) && file_exists( $src ) ) {
		
			// open the existing image
			$image = $this->open_image( $mime_type, $src );
			if( $image === false ) { die( 'Unable to open image : ' . $src ); }		
		
			// Get original width and height
			$width = imagesx( $image );
			$height = imagesy( $image );
		
			// don't allow new width or height to be greater than the original
			//if( $new_width > $width ) { $new_width = $width; }
			//if( $new_height > $height ) { $new_height = $height; }
		
			// generate new w/h if not provided
			if( $new_width && !$new_height ) {
				$new_height = $height * ( $new_width / $width );
			}
			elseif($new_height && !$new_width) {
				$new_width = $width * ( $new_height / $height );
			}
			elseif(!$new_width && !$new_height) {
				$new_width = $width;
				$new_height = $height;
			}
		
			// create a new true color image
			$canvas = imagecreatetruecolor( $new_width, $new_height );
		
			if( $zoom_crop ) {
		
				$src_x = $src_y = 0;
				$src_w = $width;
				$src_h = $height;
		
				$cmp_x = $width  / $new_width;
				$cmp_y = $height / $new_height;
		
				// calculate x or y coordinate and width or height of source
		
				if ( $cmp_x > $cmp_y ) {
		
					$src_w = round( ( $width / $cmp_x * $cmp_y ) );
					$src_x = round( ( $width - ( $width / $cmp_x * $cmp_y ) ) / 2 );
		
				}
				elseif ( $cmp_y > $cmp_x ) {
		
					$src_h = round( ( $height / $cmp_y * $cmp_x ) );
					$src_y = round( ( $height - ( $height / $cmp_y * $cmp_x ) ) / 2 );
		
				}
				
				imagecopyresampled( $canvas, $image, 0, 0, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h );
		
			}
			else {
		
				// copy and resize part of an image with resampling
				imagecopyresampled( $canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
		
			}
		
			// output image to browser based on mime type
			$this->show_image( $mime_type, $canvas, $quality, $cache_dir, $mYwidth, $mYheight,$WaterMark);

			// remove image from memory
			imagedestroy( $canvas );
			
		} else {
		
			if( strlen( $src ) ) { echo $src . ' not found.'; } else { echo 'no source specified.'; }
			
		}




	}






		function show_image ( $mime_type, $image_resized, $quality, $cache_dir, $mYwidth, $mYheight, $WaterMark ) {
		
			// check to see if we can write to the cache directory
			$is_writable = 0;
			$cache_file_name = $cache_dir . '/' . $mYwidth."-".$mYheight. $this->get_cache_file();        	
		//die($cache_file_name);
			if( touch( $cache_file_name ) ) {
				// give 666 permissions so that the developer 
				// can overwrite web server user
				chmod( $cache_file_name, 0666 );
				$is_writable = 1;
				header( 'Content-type: ' . $mime_type );

			}
			else {
				$cache_file_name = NULL;
				header( 'Content-type: ' . $mime_type );
			}
			
			if( stristr( $mime_type, 'gif' ) ) {
				imagegif( $image_resized, $cache_file_name );
			}
			elseif( stristr( $mime_type, 'jpeg' ) ) {

				if($WaterMark !=""){

					$this->CreateWaterMark($image_resized, $cache_file_name, $quality, $mYwidth, $mYheight, $WaterMark );

				}else{

					imagejpeg( $image_resized, $cache_file_name, $quality );

				}
				
			}
			elseif( stristr( $mime_type, 'png' ) ) {
				//imagepng( $image_resized, $cache_file_name, ceil( $quality / 10 ) );
				imagepng( $image_resized, $cache_file_name, 0, NULL );

			}
			if( $is_writable ) { $this->show_cache_file( $cache_dir, $mime_type, $mYwidth, $mYheight ); }
			exit;
		
		}


		function CreateWaterMark($image_resized, $cache_file_name, $quality, $mYwidth, $mYheight, $WaterMark ){

					$WaterPathFile = str_replace("inc/classes","",dirname(__FILE__))."uploads/files/".$WaterMark;
					$watermark = imagecreatefrompng($WaterPathFile); 
					$watermark_width = imagesx($watermark);  
					$watermark_height = imagesy($watermark);  
					$image = imagecreatetruecolor($watermark_width, $watermark_height); 
		
					$dest_x =  $mYwidth - $watermark_width - 5;  
					$dest_y = $mYheight - $watermark_height - 5;  

					imagecopymerge($image_resized, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, 70); 
					imagejpeg( $image_resized, $cache_file_name, $quality );
					imagedestroy($watermark);

			return;
		
		}

		
		function get_request( $property, $default = 0 ) {
			
			if( isset($_REQUEST[$property]) ) {
				return $_REQUEST[$property];
			} else {
				return $default;
			}
			
		}
		
		function open_image ( $mime_type, $src ) {
		
			if( stristr( $mime_type, 'gif' ) ) {
				$image = imagecreatefromgif( $src );
			}
			elseif( stristr( $mime_type, 'jpeg' ) ) {
				@ini_set('gd.jpeg_ignore_warning', 1);
				$image = imagecreatefromjpeg( $src );
			}
			elseif( stristr( $mime_type, 'png' ) ) {
				$image = imagecreatefrompng( $src );
			}
			return $image;
		
		}
		
		function mime_type ( $file ) {
		
			$os = strtolower(php_uname());
			$mime_type = '';
		
			// use PECL fileinfo to determine mime type
			if( function_exists( 'finfo_open' ) ) {
				$finfo = @finfo_open( FILEINFO_MIME );
				$mime_type = @finfo_file( $finfo, $file );
				@finfo_close( $finfo );
			}
		
			// try to determine mime type by using unix file command
			// this should not be executed on windows
			if( !$this->valid_src_mime_type( $mime_type ) && !(preg_match("/windows/", php_uname()))) {
				if( preg_match( "/freebsd|linux/", $os ) ) {
							$mime_type = trim ( @shell_exec( 'file -bi $file' ) );
				}
			}
		
			// use file's extension to determine mime type
			if( !$this->valid_src_mime_type( $mime_type ) ) {
				$frags = preg_split( '/\./', $file );
				$ext = strtolower( $frags[ count( $frags ) - 1 ] );
				$types = array(
					'jpg'  => 'image/jpeg',
					'jpeg' => 'image/jpeg',
					'png'  => 'image/png',
					'gif'  => 'image/gif'
				);
				if( strlen( $ext ) && strlen( $types[$ext] ) ) {
					$mime_type = $types[ $ext ];
				}
		
				// if no extension provided, default to jpg
				if( !strlen( $ext ) && !$this->valid_src_mime_type( $mime_type ) ) {
					$mime_type = 'image/jpeg';
				}
			}
			return $mime_type;
		
		}
		
		function valid_src_mime_type ( $mime_type ) {
		
			if( preg_match( "/jpg|jpeg|gif|png/i", $mime_type ) ) { return 1; }
			return 0;
		
		}
		
		function check_cache ( $cache_dir, $mime_type, $mYwidth, $mYheight ) {
		
			// make sure cache dir exists
			if( !file_exists( $cache_dir ) ) {
				// give 777 permissions so that developer can overwrite
				// files created by web server user
				mkdir( $cache_dir );
				chmod( $cache_dir, 0777 );
			}
		
			$this->show_cache_file( $cache_dir, $mime_type , $mYwidth, $mYheight);
		
		}
		
		function show_cache_file ( $cache_dir, $mime_type ,$mYwidth, $mYheight) {
		
			$cache_file = $cache_dir . '/' . $mYwidth. "-" . $mYheight.$this->get_cache_file();
		
			if( file_exists( $cache_file ) ) {
				
				if( isset( $_SERVER[ "HTTP_IF_MODIFIED_SINCE" ] ) ) {
				
					// check for updates
					$if_modified_since = preg_replace( '/;.*$/', '', $_SERVER[ "HTTP_IF_MODIFIED_SINCE" ] );					
					$gmdate_mod = gmdate( 'D, d M Y H:i:s', filemtime( $cache_file ) );
					
					if( strstr( $gmdate_mod, 'GMT' ) ) {
						$gmdate_mod .= " GMT";
					}
					
					if ( $if_modified_since == $gmdate_mod ) {
						header( "HTTP/1.1 304 Not Modified" );
						exit;
					}
		
				}
				
				$fileSize = filesize( $cache_file );
				
				// send headers then display image
				header( "Content-Type: " . $mime_type );
				header( "Accept-Ranges: bytes" );
				header( "Last-Modified: " . gmdate( 'D, d M Y H:i:s', filemtime( $cache_file ) ) . " GMT" );
				header( "Content-Length: " . $fileSize );
				header( "Cache-Control: max-age=9999, must-revalidate" );
				header( "Etag: " . md5($fileSize . $gmdate_mod) );						   		
				header( "Expires: " . gmdate( "D, d M Y H:i:s", time() + 9999 ) . "GMT" );
				readfile( $cache_file );
				exit;
		
			}
			
		}
		
		function get_cache_file () {
		
			global $quality;
		
			static $cache_file;
			if(!$cache_file) {
				$frags = preg_split( '/\./', $_REQUEST['src'] );
				$ext = strtolower( $frags[ count( $frags ) - 1 ] );
				if(!$this->valid_extension($ext)) { $ext = 'jpg'; }
				$cachename = $this->get_request( 'src', 'timthumb' ) . $this->get_request( 'w', 100 ) . $this->get_request( 'h', 100 ) . $this->get_request( 'zc', 1 ) . $this->get_request( '9', 80 );
				$cache_file = md5( $cachename ) . '.' . $ext;
			}
			return $cache_file;
		
		}
		
		function valid_extension ($ext) {
		
			if( preg_match( "/jpg|jpeg|png|gif/i", $ext ) ) return 1;
			return 0;
		
		}
	
}
?>
