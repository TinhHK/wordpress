<div class="wrap">
    <h2>Mrktinh Plugin Setting</h2>
    <p>Display configuration of Mrktinh Plugin </p>
    <form action="options.php" method="post" id="mrktinh-form-setting" enctype="multipart/form-data">
        <?php  echo settings_fields('mrktinh_plugin_options') ?>
        <?php echo do_settings_sections($this->_menuSlug) ?>
        <?php echo do_settings_fields($this->_menuSlug, 'custom-section') ?>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p>
    </form>
</div>