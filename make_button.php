<?php
	$button_text = $_REQUEST['button_text'];
	$color = $_REQUEST['color'];
	
	if (empty($button_text) || empty($color)) {
		echo 'form was not filled correctly. Unable to create image.';
		exit;
	}
	
	$im = ImageCreateFromPNG ($color.'button.png');
	
	$width_image = ImageSX($im);
	$height_image = ImageSY($im);
	
	$width_image_wo_margins = $width_image - (2*18);
	$height_image_wo_margins = $height_image - (2*18);
	
	$font_size = 33;
	
	//Super segane
	$fontpath = realpath('./font/');
	putenv('GDFONTPATH=.$fontpath');
	$fontname = './font/arial.ttf';
	
	do
	{
	$font_size--;
	
	$bbox=ImageTTFBBox ($font_size, 0, $fontname, $button_text);
	$right_text = $bbox[2];
	$left_text = $bbox[0];
	$width_text = $right_text - $left_text;
	$height_text = abs($bbox[7] - $bbox[1]);
	}
	while ($font_size > 8 && ($height_image > $height_image_wo_margins || $width_text > $width_image_wo_margins));
	if ($height_text > $height_image_wo_margins)
	{
		echo 'Text does not fit into the button.<br />';
	} else
	{
		$text_x = $width_image/2.0 - $width_text/2.0;
		$text_y = $height_image/2.0 - $height_text/2.0;
		
		if ($left_text < 0)
		$text_x += abs($left_text);
		$above_line_text = abs($bbox[7]);
		$text_y += $above_line_text;
		
		$text_y -= 2;
		
		$white = ImageColorAllocate ($im, 255, 255, 255);
		ImageTTFText ($im, $font_size, 0, $text_x, $text_y, $white, $fontname, $button_text);
		Header ('Content-type: iamge/png');
		ImagePNG ($im);
	}
	ImageDestroy ($im);
?>