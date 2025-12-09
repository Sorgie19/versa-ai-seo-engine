# Versa AI SEO Engine

AI-assisted planning, writing, and on-page optimization for WordPress. It proposes topics, drafts posts, scans existing content for fixes, and can hold AI changes for human approval.

## What it does
- **Plan**: Weekly topic/keyword ideas with outlines tailored to your business profile.
- **Write**: Daily post generation (draft or auto-publish) with meta title/description and optional FAQ schema.
- **Optimize**: Scans posts/pages for short content, missing meta descriptions, weak internal links, and FAQ schema gaps; queues tasks to fix them.
- **Audit**: Light site crawl to surface site-wide issues and recommendations.
- **Approve**: Optional human-in-the-loop; tasks can wait for approval before the AI runs.

## Requirements
- WordPress 6.x
- PHP 7.4+
- OpenAI API key with access to the configured model (default: `gpt-4.1-mini`).

## Installation
1) Upload the plugin directory or zip to `/wp-content/plugins/`.
2) Activate **Versa AI SEO Engine** in WP Admin → Plugins.
3) On activation, the plugin creates custom tables and schedules its cron events.

## Configuration (WP Admin → Versa AI)
- **Business Profile**: Name, services, locations, audience, tone, posts per week, max words per post, auto-publish toggle.
- **AI Settings**: OpenAI API key and model.
- **Approval**: Toggle “Require Approval for AI Edits” to hold tasks until you approve them.

## How it works (automation cadence)
- Weekly: Planner enqueues topics (`versa_ai_weekly_planner`).
- Daily: Writer turns the next queued topic into a post (`versa_ai_daily_writer`).
- Daily: SEO scan inspects recent posts/pages and enqueues optimization tasks (`versa_ai_daily_seo_scan`).
- Every ~10 minutes: Worker processes pending tasks (`versa_ai_seo_worker`).

### Task types
- `expand_content`: Lengthen and improve thin posts.
- `write_snippet`: Add meta title/description.
- `internal_linking`: Add internal links to known service URLs.
- `faq_schema`: Generate FAQPage JSON-LD from an existing FAQ section.
- `site_audit`: Site-wide recommendations (informational only).

## Approval flow
- When “Require Approval” is ON, new tasks start as `awaiting_approval`.
- Approve → moves to `pending`; the worker then calls OpenAI and applies changes (for post tasks).
- Decline → marks `failed`; nothing is applied.
- Site-audit tasks already contain their suggestion; approving just clears them through the queue.

## Admin screens
- **Versa AI → Settings**: Configure business profile, AI settings, cadence, and approval.
- **Versa AI → Tasks**: Review “Awaiting Approval”, approve/decline, and see recent activity with results.

## Data the plugin stores
- Tables: `wp_versa_ai_content_queue`, `wp_versa_ai_seo_tasks`, `wp_versa_ai_logs`.
- Post meta: Rank Math and Yoast meta fields, `versa_ai_faq_schema`, `_versa_ai_seo_snapshot`, `_versa_ai_content_backup`.
- Options: `versa_ai_business_profile`, `versa_ai_service_urls`.

## Manual testing shortcuts
If you have WP-CLI, you can trigger jobs without waiting for cron:

```bash
wp cron event run versa_ai_daily_seo_scan
wp cron event run versa_ai_seo_worker
wp cron event run versa_ai_weekly_planner
wp cron event run versa_ai_daily_writer
```

## Troubleshooting
- Logs: Check your PHP error log for entries prefixed with `[Versa AI SEO Engine][context]`.
- No output? Ensure OpenAI API key/model are set and valid, and that you have published posts/pages to scan.
- Approval ON but nothing runs? Approve tasks in **Versa AI → Tasks**, or run the worker via WP-CLI.

## Safety notes
- Leave “Auto Publish” off if you want drafts for review.
- With approval enabled, no AI changes apply until you explicitly approve tasks.