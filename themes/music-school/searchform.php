<?php
/**
 * Search Form for Music School Theme
 *
 * @package Music School
 * @since 1.0.0
 */
?>
<form method="GET" action="<?php echo esc_url(site_url('/')); ?>">
  <label for="search-query"><?php echo __('Write what you are looking for', 'music-school'); ?></label>
  <input placeholder="<?php echo __('Write your search', 'music-school'); ?>" type="search" name="s" id="search-query">
  <input type="submit" value="Search">
</form>