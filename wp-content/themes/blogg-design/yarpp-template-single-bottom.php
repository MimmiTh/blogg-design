<?php /*
Relaterade poster i botten av single.php
Author: Tommy Brunn
*/
?>
<?php if (have_posts()):?>
<ol class="related_posts_bottom">
	<?php while (have_posts()) : the_post(); ?>
	<li>
		<a href="<?php the_permalink() ?>" rel="bookmark">
			<?php if (has_post_thumbnail()) {
				the_post_thumbnail(array(30,30));
			}?>
			<span class="title"><?php the_title(); ?></span>
		</a>
	</li>
	<?php endwhile; ?>
</ol>
<?php else: ?>
<p><i>Inga relaterade artiklar.</i></p>
<?php endif; ?>
