<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><div class="wrap">
	<h2><?php _e ('Search Unleashed | Modules', 'search-unleashed'); ?></h2>

	<?php $this->submenu (true); ?>

	<p style="clear: both"><?php _e ('Select what to include in the search', 'search-unleashed'); ?>:</p>

	<ul class="modules">
		<?php foreach ($types AS $module) : ?>
			<li class="<?php if (!isset ($options['active'][$module->id ()])) echo 'disabled' ?>" id="module_<?php echo $module->id () ?>"><?php $this->render_admin ('module', array ('module' => $module, 'active' => isset ($options['active'][$module->id ()]) ? true : false))?></li>
		<?php endforeach; ?>
	</ul>
</div>
