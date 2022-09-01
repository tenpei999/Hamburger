<aside class="l-sidebar p-sidebar">
    <div class="l-sidebar--inner">
        <div class="p-sidebar">
            <?php
            if (is_active_sidebar('category_widget')) :
                dynamic_sidebar('category_widget');
            else :
            ?>
                <section class="widget">
                    <h2>No Widget</h2>
                    <p>ウィジットは設定されていません。</p>
                </section>
            <?php endif; ?>
        </div>
    </div>
</aside>