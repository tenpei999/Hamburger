<aside class="l-sidebar p-sidebar">
<div class="p-sidebar">
    <?php
        if ( is_active_sidebar( 'category_widget' ) ) :
            dynamic_sidebar( 'category_widget' );
        else:
    ?>
    <div class="widget">
        <h2>No Widget</h2>
        <p>ウィジットは設定されていません。</p>
    </div>
    <?php endif; ?>
</aside>
