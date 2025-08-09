<div class="search-link">
  <a href="javascript:void(0);"><i class="ti-search"></i></a>
  <div class="search-box">
    <form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform wndfal-form" >
      <p>
        <input type="text" name="s" id="s" placeholder="<?php esc_attr_e('Search for...','windfall'); ?>" />
        <input type="submit" id="searchsubmit" class="submit-one hover-one button-primary" value="" />
      </p>
    </form>
  </div>
</div>
<?php
