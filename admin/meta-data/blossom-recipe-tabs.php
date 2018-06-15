<div id="blossom-recipe-navigation">
    <h2 class="nav-tab-wrapper current">
        <a class="nav-tab nav-tab-active" href="javascript:;">Recipe Details</a>
        <a class="nav-tab" href="javascript:;">Ingredients & Instructions</a>
        <a class="nav-tab" href="javascript:;">Recipe Notes</a>
    </h2>

    <?php

    	// Include the meta-data for rendering the tabbed content
        include BLOSSOM_RECIPE_BASE_PATH.'/admin/meta-data/recipe-details.php' ;
        include BLOSSOM_RECIPE_BASE_PATH.'/admin/meta-data/ingredients-instructions.php' ;
        include BLOSSOM_RECIPE_BASE_PATH.'/admin/meta-data/recipe-notes.php' ;

        // Add a nonce field for security
        wp_nonce_field( 'blossom_recipe_save', 'blossom_recipe_nonce' );
    ?>


</div>