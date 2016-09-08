<?php
$query = "
	SELECT	id,themepage,video_name
	FROM	video
	ORDER by id DESC LIMIT 14";
$res = GeneralMYSQL::query($MSQLc, $query);


while ($row = GeneralMYSQL::fetch_array($res)) {
    ?>

    <div class="padding_left_10">

        <blockquote>
            <strong><a href="<?php echo(GeneralGlobalVars::url);?>/video/<?php echo($row['themepage'] . "/" . $row['id']); ?>" class="small_link_noline"><?php echo($row['video_name']); ?></a>
            </strong>
            <small><?php echo(VideoBase::return_name_section($row['themepage'])); ?></small>
        </blockquote>
    </div>	
<?php } ?>