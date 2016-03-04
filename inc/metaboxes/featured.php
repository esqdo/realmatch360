<?php

function add_featured_boxes()
{
    add_meta_box("quote-text", "Quote", "featured_text_markup", "featured", "side", "low", null);
    add_meta_box("frage-text", "Fragen", "featured_questions_text_markup", "featured", "normal", "high", null);
    add_meta_box("antworte-text", "Antworten", "featured_answers_text_markup", "featured", "normal", "high", null);
}
add_action("add_meta_boxes", "add_featured_boxes");

//Map Text
function featured_text_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="quote-text"><strong>Quotetext</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="quote-text"><?php echo get_post_meta($object->ID, "quote-text", true); ?></textarea>
        </div>
    <?php
}

function featured_questions_text_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="question1-text"><strong>Frage1</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="question1-text"><?php echo get_post_meta($object->ID, "question1-text", true); ?></textarea>
            <br>
            <label for="question2-text"><strong>Frage2</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="question2-text"><?php echo get_post_meta($object->ID, "question2-text", true); ?></textarea>
            <br>
            <label for="question3-text"><strong>Frage3</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="question3-text"><?php echo get_post_meta($object->ID, "question3-text", true); ?></textarea>
        </div>
    <?php
}

function featured_answers_text_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div>
            <label for="answer1-text"><strong>Antwort1</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="answer1-text"><?php echo get_post_meta($object->ID, "answer1-text", true); ?></textarea>
            <br>
            <label for="frage2-text"><strong>Antwort2</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="frage2-text"><?php echo get_post_meta($object->ID, "answer3-text", true); ?></textarea>
            <br>
            <label for="answer3-text"><strong>Antwort3</strong></label><br />
            <textarea style="width:95%;" cols="60" rows="10" name="answer3-text"><?php echo get_post_meta($object->ID, "answer3-text", true); ?></textarea>
        </div>
    <?php
}

function save_featured_text($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "featured";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";

    if(isset($_POST["quote-text"]))
    {
        $meta_box_text_value = $_POST["quote-text"];
    }
    update_post_meta($post_id, "quote-text", $meta_box_text_value);

    if(isset($_POST["question1-text"]))
    {
        $meta_box_text_value = $_POST["question1-text"];
    }
    update_post_meta($post_id, "question1-text", $meta_box_text_value);

    if(isset($_POST["question2-text"]))
    {
        $meta_box_text_value = $_POST["question2-text"];
    }
    update_post_meta($post_id, "question2-text", $meta_box_text_value);

    if(isset($_POST["question3-text"]))
    {
        $meta_box_text_value = $_POST["question3-text"];
    }
    update_post_meta($post_id, "question3-text", $meta_box_text_value);

    if(isset($_POST["answer1-text"]))
    {
        $meta_box_text_value = $_POST["answer1-text"];
    }
    update_post_meta($post_id, "answer1-text", $meta_box_text_value);

    if(isset($_POST["answer2-text"]))
    {
        $meta_box_text_value = $_POST["answer2-text"];
    }
    update_post_meta($post_id, "answer2-text", $meta_box_text_value);

    if(isset($_POST["answer3-text"]))
    {
        $meta_box_text_value = $_POST["answer3-text"];
    }
    update_post_meta($post_id, "answer3-text", $meta_box_text_value);
}

add_action("save_post", "save_featured_text", 10, 3);



?>
