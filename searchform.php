<form action="<?php echo esc_url(home_url('/'))?>" class="search-form clearfix" method="get">
  <div class="input-field">
    <label for="search_form"><?php esc_html_e("Search", "color-wamp")?></label>
    <input type="search" id="search_form" class="validate s field" name="s">
    <button class="btn btn-flat transparent waves-effect waves-dark right btn-floating" type="submit"><i class='material-icons'>&#xe8b6</i></button>        
  </div>
</form>