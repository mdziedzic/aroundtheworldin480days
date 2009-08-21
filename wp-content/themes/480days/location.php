		<div class="location">
		<?php	
			$category = get_the_category($post->ID); 
			$category_link = get_category_link($category[0]->cat_ID);
			$catName = substr($category[0]->cat_name, 4);
			
			$categoryParent = get_category_parents($category[0], FALSE, '/', FALSE);
			$categoryParent = substr($categoryParent, 4);
			$chopPoint = strcspn($categoryParent, '/');
			$categoryParent = substr($categoryParent, 0, $chopPoint);
		
		?>
		
		<?php
			if (is_single()) { ?>
				<p><a href="<?php echo $category_link ?>"><?php echo $catName . ', ' . $categoryParent; ?></a></p>
		<?php
			} else { ?>	
				<p><?php echo $catName . ', ' . $categoryParent; ?></p>	
		<?php
			} ?>
			
		</div>
