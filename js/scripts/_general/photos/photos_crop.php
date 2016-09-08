<script type="text/javascript"> 
function preview(img, selection) {
var filewidth=<?php echo(GeneralImagesCrop::$image_width); ?>;
var fileheight=<?php echo(GeneralImagesCrop::$image_height); ?>;
    var scaleX = <?php echo(GeneralImagesCrop::$minsizecrop); ?> / (selection.width || <?php echo(GeneralImagesCrop::$minsizecrop); ?>);
    var scaleY = <?php echo(GeneralImagesCrop::$minsizecrop); ?> / (selection.height || <?php echo(GeneralImagesCrop::$minsizecrop); ?>);
    $('#avatar + div > img').css({
        width: Math.round(scaleX * filewidth) + 'px',
        height: Math.round(scaleY * fileheight) + 'px',
        marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
        marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
    });
}
$(document).ready(function () {
    $('<div style="border:1px solid #38474e; margin-left:10px;"><img src="<?php echo(GeneralImagesCrop::$image_url."?".GeneralGlobalVars::$timeunix); ?>" style="position: relative; width:100px;"></div>') .css({
        float: 'left',
        overflow: 'hidden',
        width: '100px',
        height: '100px'
    }).insertAfter($('#avatar')); 

    $('#avatar').imgAreaSelect({
        aspectRatio: '1:1',
        handles: true,
		minHeight:<?php echo(GeneralImagesCrop::$minsizecrop); ?>,
		minWidth:<?php echo(GeneralImagesCrop::$minsizecrop); ?>,
        onSelectChange: preview,
        onSelectEnd: function ( image, selection ) {
            $('input[name=x1]').val(selection.x1);
            $('input[name=y1]').val(selection.y1);
            $('input[name=x2]').val(selection.x2);
            $('input[name=y2]').val(selection.y2);
            $('input[name=w]').val(selection.width);
            $('input[name=h]').val(selection.height);
        }
    });	
	$('#avatar').imgAreaSelect({onInit: preview, x1: <?php echo(GeneralImagesCrop::$image_selection_first_x1);?>, y1: <?php echo(GeneralImagesCrop::$image_selection_first_y1);?>, x2: <?php echo(GeneralImagesCrop::$image_selection_first_x2);?>, y2: <?php echo(GeneralImagesCrop::$image_selection_first_y2);?> });	

	
	
});


$('input[name=x1]').val(<?php echo(GeneralImagesCrop::$image_selection_first_x1);?>);
$('input[name=y1]').val(<?php echo(GeneralImagesCrop::$image_selection_first_y1);?>);
$('input[name=x2]').val(<?php echo(GeneralImagesCrop::$image_selection_first_x2);?>);
$('input[name=y2]').val(<?php echo(GeneralImagesCrop::$image_selection_first_y2);?>);
$('input[name=w]').val(<?php echo(GeneralImagesCrop::$image_selection_first_w); ?>);
$('input[name=h]').val(<?php echo(GeneralImagesCrop::$image_selection_first_h); ?>);


 
</script>