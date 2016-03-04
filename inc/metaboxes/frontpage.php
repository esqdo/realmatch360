<?php

function add_frontpage_boxes()
{
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
    // check for a template type
    if ($template_file == 'page-frontpage.php') {
    add_meta_box("map-text", "Seitentext", "map_text_markup", "page", "normal", "high", null);
    add_meta_box("leads-text", "Leadsblock", "leads_text_markup", "page", "normal", "high", null);
    add_meta_box("partner-text", "Partner", "partner_text_markup", "page", "normal", "high", null);
  }
}
add_action("add_meta_boxes", "add_frontpage_boxes");

//Map Text
function map_text_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="feature-text"><strong>Features</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="feature-text"><?php echo get_post_meta($object->ID, "feature-text", true); ?></textarea>
            <br>
            <label for="feature-text"><strong>Services</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="services-text"><?php echo get_post_meta($object->ID, "services-text", true); ?></textarea>
            <br>
            <label for="try-text"><strong>Try It</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="try-text"><?php echo get_post_meta($object->ID, "try-text", true); ?></textarea>
        </div>
    <?php
}

function save_map_text($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";

    if(isset($_POST["feature-text"]))
    {
        $meta_box_text_value = $_POST["feature-text"];
    }
    update_post_meta($post_id, "feature-text", $meta_box_text_value);

    if(isset($_POST["services-text"]))
    {
        $meta_box_text_value = $_POST["services-text"];
    }
    update_post_meta($post_id, "services-text", $meta_box_text_value);

    if(isset($_POST["try-text"]))
    {
        $meta_box_text_value = $_POST["try-text"];
    }
    update_post_meta($post_id, "try-text", $meta_box_text_value);
}

add_action("save_post", "save_map_text", 10, 3);


//Leadsblock
function leads_text_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
          <label for="leads-title"><strong>Leadstitle</strong></label><br />
          <input style="width:95%;" type="text" name="leads-title" value="<?php echo get_post_meta($object->ID, "leads-title", true); ?>">
          <br>
            <label for="leads-text"><strong>Leadsblocktext</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="leads-text"><?php echo get_post_meta($object->ID, "leads-text", true); ?></textarea>
            <br>
            <label for="leads-link"><strong>Leadslink</strong></label><br />
            <input style="width:95%;" type="text" name="leads-link" value="<?php echo get_post_meta($object->ID, "leads-link", true); ?>">
            <br>
            <label for="leads-profile"><strong>Buyer Profile</strong></label><br />
            <input style="width:95%;" type="text" name="leads-profile" value="<?php echo get_post_meta($object->ID, "leads-profile", true); ?>">
            <br>
            <label for="leads-image"><strong>Leadsimage</strong></label><br />
            <input style="width:95%;" type="text" name="leads-image" value="<?php echo get_post_meta($object->ID, "leads-image", true); ?>">
        </div>
    <?php
}

function save_leadsblock_text($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";

    if(isset($_POST["leads-text"]))
    {
        $meta_box_text_value = $_POST["leads-text"];
    }
    update_post_meta($post_id, "leads-text", $meta_box_text_value);

    if(isset($_POST["leads-title"]))
    {
        $meta_box_text_value = $_POST["leads-title"];
    }
    update_post_meta($post_id, "leads-title", $meta_box_text_value);

    if(isset($_POST["leads-profile"]))
    {
        $meta_box_text_value = $_POST["leads-profile"];
    }
    update_post_meta($post_id, "leads-profile", $meta_box_text_value);

    if(isset($_POST["leads-image"]))
    {
        $meta_box_text_value = $_POST["leads-image"];
    }
    update_post_meta($post_id, "leads-image", $meta_box_text_value);

}

add_action("save_post", "save_leadsblock_text", 10, 3);


//Partner
function partner_text_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
          <label for="partner-title"><strong>Leadstitle</strong></label><br />
          <input style="width:95%;" type="text" name="partner-title" value="<?php echo get_post_meta($object->ID, "partner-title", true); ?>">
          <br>
            <label for="partner-text"><strong>Leadsblocktext</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="partner-text"><?php echo get_post_meta($object->ID, "partner-text", true); ?></textarea>
        </div>
    <?php
}

function save_partner_text($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";

    if(isset($_POST["partner-text"]))
    {
        $meta_box_text_value = $_POST["partner-text"];
    }
    update_post_meta($post_id, "partner-text", $meta_box_text_value);

    if(isset($_POST["partner-title"]))
    {
        $meta_box_text_value = $_POST["partner-title"];
    }
    update_post_meta($post_id, "partner-title", $meta_box_text_value);

}

add_action("save_post", "save_partner_text", 10, 3);


?>
