<?php
/**
 * Admin settings page view.
 *
 * @var array  $profile Current profile settings.
 * @var string $services_text Services as newline separated text.
 * @var string $locations_text Locations as newline separated text.
 *
 * @package VersaAISEOEngine
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="wrap">
    <h1><?php esc_html_e( 'Versa AI Business Profile', 'versa-ai-seo-engine' ); ?></h1>

    <form method="post" action="options.php">
        <?php settings_fields( Versa_AI_Settings_Page::MENU_SLUG ); ?>
        <?php do_settings_sections( Versa_AI_Settings_Page::MENU_SLUG ); ?>

        <h2 class="nav-tab-wrapper versa-ai-tab-wrapper">
            <a href="#tab-general" class="nav-tab nav-tab-active" data-tab="tab-general"><?php esc_html_e( 'General Profile', 'versa-ai-seo-engine' ); ?></a>
            <a href="#tab-content" class="nav-tab" data-tab="tab-content"><?php esc_html_e( 'Content', 'versa-ai-seo-engine' ); ?></a>
            <a href="#tab-schema" class="nav-tab" data-tab="tab-schema"><?php esc_html_e( 'Schema & SEO', 'versa-ai-seo-engine' ); ?></a>
            <a href="#tab-tasks" class="nav-tab" data-tab="tab-tasks"><?php esc_html_e( 'Tasks & Safety', 'versa-ai-seo-engine' ); ?></a>
            <a href="#tab-automation" class="nav-tab" data-tab="tab-automation"><?php esc_html_e( 'Automation & Crawl', 'versa-ai-seo-engine' ); ?></a>
            <a href="#tab-provider" class="nav-tab" data-tab="tab-provider"><?php esc_html_e( 'AI Provider', 'versa-ai-seo-engine' ); ?></a>
            <a href="#tab-debug" class="nav-tab" data-tab="tab-debug"><?php esc_html_e( 'Debug', 'versa-ai-seo-engine' ); ?></a>
        </h2>

        <div class="versa-ai-tab-panels">
            <div class="versa-ai-tab-panel active" id="tab-general">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="versa_ai_business_name"><?php esc_html_e( 'Business Name', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[business_name]" id="versa_ai_business_name" type="text" class="regular-text" value="<?php echo esc_attr( $profile['business_name'] ); ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_target_audience"><?php esc_html_e( 'Target Audience', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[target_audience]" id="versa_ai_target_audience" type="text" class="regular-text" value="<?php echo esc_attr( $profile['target_audience'] ); ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_tone_of_voice"><?php esc_html_e( 'Tone of Voice', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <textarea name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[tone_of_voice]" id="versa_ai_tone_of_voice" rows="3" class="large-text code"><?php echo esc_textarea( $profile['tone_of_voice'] ); ?></textarea>
                                <p class="description"><?php esc_html_e( 'Describe the desired writing tone (e.g., friendly, expert, concise).', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_services"><?php esc_html_e( 'Services (one per line)', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <textarea name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[services]" id="versa_ai_services" rows="5" class="large-text code"><?php echo esc_textarea( $services_text ); ?></textarea>
                                <p class="description"><?php esc_html_e( 'List primary services or offerings, one per line.', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_locations"><?php esc_html_e( 'Locations (one per line)', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <textarea name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[locations]" id="versa_ai_locations" rows="4" class="large-text code"><?php echo esc_textarea( $locations_text ); ?></textarea>
                                <p class="description"><?php esc_html_e( 'Cities or service areas, one per line.', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="versa-ai-tab-panel" id="tab-content">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="versa_ai_posts_per_week"><?php esc_html_e( 'Weekly Post Frequency', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[posts_per_week]" id="versa_ai_posts_per_week" type="number" min="0" max="7" value="<?php echo esc_attr( $profile['posts_per_week'] ); ?>" />
                                <p class="description"><?php esc_html_e( 'How many new posts to plan per week (0-7).', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_max_words"><?php esc_html_e( 'Max Words Per Post', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[max_words_per_post]" id="versa_ai_max_words" type="number" min="300" max="5000" value="<?php echo esc_attr( $profile['max_words_per_post'] ); ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php esc_html_e( 'Auto Publish Posts', 'versa-ai-seo-engine' ); ?></th>
                            <td>
                                <label>
                                    <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[auto_publish_posts]" type="checkbox" value="1" <?php checked( $profile['auto_publish_posts'], true ); ?> />
                                    <?php esc_html_e( 'Publish immediately after writing (otherwise leave as draft).', 'versa-ai-seo-engine' ); ?>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php esc_html_e( 'Include Images in Writer Posts', 'versa-ai-seo-engine' ); ?></th>
                            <td>
                                <label>
                                    <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[writer_include_images]" type="checkbox" value="1" <?php checked( ! empty( $profile['writer_include_images'] ), true ); ?> />
                                    <?php esc_html_e( 'Ask the writer to insert a few relevant images with descriptive alt text.', 'versa-ai-seo-engine' ); ?>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_writer_image_count"><?php esc_html_e( 'Writer Image Count', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[writer_image_count]" id="versa_ai_writer_image_count" type="number" min="0" max="6" value="<?php echo esc_attr( $profile['writer_image_count'] ); ?>" />
                                <p class="description"><?php esc_html_e( 'How many images to request (0 disables). Images will use external URLs; replace with your own media after publishing.', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="versa-ai-tab-panel" id="tab-schema">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><?php esc_html_e( 'Schema Tasks', 'versa-ai-seo-engine' ); ?></th>
                            <td>
                                <fieldset>
                                    <legend class="screen-reader-text"><?php esc_html_e( 'Schema task toggles', 'versa-ai-seo-engine' ); ?></legend>
                                    <label><input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_article_schema]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_article_schema'] ), true ); ?> /> <?php esc_html_e( 'Article', 'versa-ai-seo-engine' ); ?></label><br />
                                    <label><input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_breadcrumb_schema]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_breadcrumb_schema'] ), true ); ?> /> <?php esc_html_e( 'Breadcrumb', 'versa-ai-seo-engine' ); ?></label><br />
                                    <label><input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_howto_schema]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_howto_schema'] ), true ); ?> /> <?php esc_html_e( 'HowTo', 'versa-ai-seo-engine' ); ?></label><br />
                                    <label><input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_video_schema]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_video_schema'] ), true ); ?> /> <?php esc_html_e( 'Video', 'versa-ai-seo-engine' ); ?></label><br />
                                    <label><input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_product_schema]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_product_schema'] ), true ); ?> /> <?php esc_html_e( 'Product', 'versa-ai-seo-engine' ); ?></label><br />
                                    <label><input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_service_schema]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_service_schema'] ), true ); ?> /> <?php esc_html_e( 'Service', 'versa-ai-seo-engine' ); ?></label><br />
                                    <label><input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_event_schema]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_event_schema'] ), true ); ?> /> <?php esc_html_e( 'Event', 'versa-ai-seo-engine' ); ?></label><br />
                                    <label><input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_website_schema]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_website_schema'] ), true ); ?> /> <?php esc_html_e( 'WebSite + SearchAction (front page)', 'versa-ai-seo-engine' ); ?></label><br />
                                    <label><input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_org_schema]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_org_schema'] ), true ); ?> /> <?php esc_html_e( 'Organization (front page)', 'versa-ai-seo-engine' ); ?></label><br />
                                    <label><input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_localbusiness_schema]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_localbusiness_schema'] ), true ); ?> /> <?php esc_html_e( 'LocalBusiness (front page)', 'versa-ai-seo-engine' ); ?></label>
                                    <p class="description"><?php esc_html_e( 'Uncheck any schema types you do not want automatically created.', 'versa-ai-seo-engine' ); ?></p>
                                </fieldset>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_schema_tasks_per_run"><?php esc_html_e( 'Max Schema Tasks Per Run', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[schema_tasks_per_run]" id="versa_ai_schema_tasks_per_run" type="number" min="0" max="50" value="<?php echo esc_attr( $profile['schema_tasks_per_run'] ); ?>" />
                                <p class="description"><?php esc_html_e( 'Caps the number of new schema tasks created in a single scan. 0 disables the cap.', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php esc_html_e( 'Generate FAQ Tasks', 'versa-ai-seo-engine' ); ?></th>
                            <td>
                                <label>
                                    <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_faq_tasks]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_faq_tasks'] ), true ); ?> />
                                    <?php esc_html_e( 'Create FAQ schema tasks when FAQ sections are detected.', 'versa-ai-seo-engine' ); ?>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_faq_min_words"><?php esc_html_e( 'FAQ Minimum Word Count', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[faq_min_word_count]" id="versa_ai_faq_min_words" type="number" min="0" max="5000" value="<?php echo esc_attr( $profile['faq_min_word_count'] ); ?>" />
                                <p class="description"><?php esc_html_e( 'Only propose FAQ schema on pages with at least this many words. Set 0 to allow all.', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_faq_post_types"><?php esc_html_e( 'FAQ Eligible Post Types', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[faq_allowed_post_types]" id="versa_ai_faq_post_types" type="text" class="regular-text" value="<?php echo esc_attr( implode( ', ', (array) $profile['faq_allowed_post_types'] ) ); ?>" />
                                <p class="description"><?php esc_html_e( 'Comma or newline separated list (e.g., page, post, product). FAQ tasks will only run for these types.', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="versa-ai-tab-panel" id="tab-tasks">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><?php esc_html_e( 'Require Approval for AI Edits', 'versa-ai-seo-engine' ); ?></th>
                            <td>
                                <label>
                                    <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[require_task_approval]" type="checkbox" value="1" <?php checked( $profile['require_task_approval'], true ); ?> />
                                    <?php esc_html_e( 'Hold AI tasks until you approve them in the Tasks screen.', 'versa-ai-seo-engine' ); ?>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php esc_html_e( 'Require Apply After AI Edits', 'versa-ai-seo-engine' ); ?></th>
                            <td>
                                <label>
                                    <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[require_apply_after_edits]" type="checkbox" value="1" <?php checked( ! empty( $profile['require_apply_after_edits'] ), true ); ?> />
                                    <?php esc_html_e( 'Store AI changes for review; apply or discard them manually in the Tasks screen.', 'versa-ai-seo-engine' ); ?>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="versa-ai-tab-panel" id="tab-automation">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="versa_ai_crawl_limit"><?php esc_html_e( 'Site Crawl Limit', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[crawl_limit]" id="versa_ai_crawl_limit" type="number" min="0" value="<?php echo esc_attr( $profile['crawl_limit'] ); ?>" />
                                <p class="description"><?php esc_html_e( 'Maximum pages per site crawl. Set 0 for no limit (may be heavy on large sites).', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_crawl_cooldown"><?php esc_html_e( 'Crawl Cooldown (hours)', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[crawl_cooldown_hours]" id="versa_ai_crawl_cooldown" type="number" min="1" max="24" value="<?php echo esc_attr( $profile['crawl_cooldown_hours'] ); ?>" />
                                <p class="description"><?php esc_html_e( 'Minimum hours between crawls. Lower values re-crawl more often; higher reduces load.', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php esc_html_e( 'Auto-create Service Pages', 'versa-ai-seo-engine' ); ?></th>
                            <td>
                                <label>
                                    <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[auto_create_service_pages]" type="checkbox" value="1" <?php checked( ! empty( $profile['auto_create_service_pages'] ), true ); ?> />
                                    <?php esc_html_e( 'Create draft service pages if a service URL has no matching page.', 'versa-ai-seo-engine' ); ?>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_auto_service_post_type"><?php esc_html_e( 'Service Page Post Type', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[auto_service_post_type]" id="versa_ai_auto_service_post_type" type="text" class="regular-text" value="<?php echo esc_attr( $profile['auto_service_post_type'] ); ?>" />
                                <p class="description"><?php esc_html_e( 'Post type to use when creating missing service pages (e.g., page, product).', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><?php esc_html_e( 'Auto-publish Service Pages', 'versa-ai-seo-engine' ); ?></th>
                            <td>
                                <label>
                                    <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[auto_service_auto_publish]" type="checkbox" value="1" <?php checked( ! empty( $profile['auto_service_auto_publish'] ), true ); ?> />
                                    <?php esc_html_e( 'Publish automatically after creation (otherwise leave as draft).', 'versa-ai-seo-engine' ); ?>
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_auto_service_max"><?php esc_html_e( 'Max New Service Pages Per Run', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[auto_service_max_per_run]" id="versa_ai_auto_service_max" type="number" min="0" max="20" value="<?php echo esc_attr( $profile['auto_service_max_per_run'] ); ?>" />
                                <p class="description"><?php esc_html_e( '0 = no limit. A small cap prevents flooding your site in one scan.', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="versa-ai-tab-panel" id="tab-provider">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="versa_ai_openai_api_key"><?php esc_html_e( 'OpenAI API Key', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[openai_api_key]" id="versa_ai_openai_api_key" type="password" class="regular-text" value="" autocomplete="new-password" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" />
                                <p class="description"><?php esc_html_e( 'Enter a new key to replace. Leave blank to keep the existing key. Stored in your WordPress database.', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="versa_ai_openai_model"><?php esc_html_e( 'OpenAI Model', 'versa-ai-seo-engine' ); ?></label></th>
                            <td>
                                <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[openai_model]" id="versa_ai_openai_model" type="text" class="regular-text" value="<?php echo esc_attr( $profile['openai_model'] ); ?>" />
                                <p class="description"><?php esc_html_e( 'Example: gpt-4.1-mini. Ensure the model is available to your API key.', 'versa-ai-seo-engine' ); ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="versa-ai-tab-panel" id="tab-debug">
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><?php esc_html_e( 'Enable Debug Logging', 'versa-ai-seo-engine' ); ?></th>
                            <td>
                                <label>
                                    <input name="<?php echo esc_attr( Versa_AI_Settings_Page::OPTION_KEY ); ?>[enable_debug_logging]" type="checkbox" value="1" <?php checked( ! empty( $profile['enable_debug_logging'] ), true ); ?> />
                                    <?php esc_html_e( 'Capture plugin events in the Versa AI log table for troubleshooting.', 'versa-ai-seo-engine' ); ?>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <?php submit_button( __( 'Save Profile', 'versa-ai-seo-engine' ) ); ?>
    </form>

    <style>
        .versa-ai-tab-panel { display: none; }
        .versa-ai-tab-panel.active { display: block; }
        .versa-ai-tab-wrapper { margin-bottom: 12px; }
    </style>
    <script>
        ( function() {
            const tabs = document.querySelectorAll( '.versa-ai-tab-wrapper a' );
            const panels = document.querySelectorAll( '.versa-ai-tab-panel' );
            tabs.forEach( function( tab ) {
                tab.addEventListener( 'click', function( event ) {
                    event.preventDefault();
                    const target = tab.getAttribute( 'data-tab' );
                    tabs.forEach( t => t.classList.remove( 'nav-tab-active' ) );
                    panels.forEach( p => p.classList.remove( 'active' ) );
                    tab.classList.add( 'nav-tab-active' );
                    const panel = document.getElementById( target );
                    if ( panel ) {
                        panel.classList.add( 'active' );
                    }
                } );
            } );
        } )();
    </script>
</div>
