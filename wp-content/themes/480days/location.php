		<div class="location">
		<?php	
			$category = get_the_category($post->ID); 
			$catName = substr($category[0]->cat_name, 4);
			
			$categoryParent = get_category_parents($category[0], FALSE, '/', FALSE);
			$categoryParent = substr($categoryParent, 4);
			$chopPoint = strcspn($categoryParent, '/');
			$categoryParent = substr($categoryParent, 0, $chopPoint);
		
		?>
			<p><?php echo $catName . ', ' . $categoryParent; ?></p>
		</div>
