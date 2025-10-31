<?php
// includes/meta.php
// defaults
$meta_title  = $meta_title  ?? 'Atlas Africa — Creative Storytelling';
$meta_desc   = $meta_desc   ?? 'Bold insights, creative trends, and storytelling that moves Africa forward.';
$meta_image  = $meta_image  ?? '/assets/images/social-preview.png';
$meta_url    = $meta_url    ?? ("https://" . ($_SERVER['HTTP_HOST'] ?? 'atlasafrica.org') . $_SERVER['REQUEST_URI']);
?>
<title><?= htmlspecialchars($meta_title) ?></title>
<meta name="description" content="<?= htmlspecialchars($meta_desc) ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">

<!-- Open Graph -->
<meta property="og:title" content="<?= htmlspecialchars($meta_title) ?>" />
<meta property="og:description" content="<?= htmlspecialchars($meta_desc)"/>
<meta property="og:image" content="<?= htmlspecialchars($meta_image) ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?= htmlspecialchars($meta_url) ?>" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?= htmlspecialchars($meta_title) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($meta_desc) ?>">
<meta name="twitter:image" content="<?= htmlspecialchars($meta_image) ?>">

<!-- canonical -->
<link rel="canonical" href="<?= htmlspecialchars($meta_url) ?>">

<!-- favicon -->
<link rel="icon" href="/assets/favicon.ico" type="image/x-icon">

<!-- JSON-LD Organization (coming soon / upcoming brand) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Atlas Africa",
  "url": "https://<?= htmlspecialchars($_SERVER['HTTP_HOST'] ?? 'atlasafrica.org') ?>",
  "logo": "https://<?= htmlspecialchars($_SERVER['HTTP_HOST'] ?? 'atlasafrica.org') ?>/assets/images/atlasafrica-logo.png",
  "sameAs": [
    "https://www.instagram.com/atlas_africa_",
    "https://x.com/AtlasAfrica_",
    "https://www.linkedin.com/company/atlasafrica/"
  ],
  "description": "Bold insights, creative trends, and stories that move Africa forward. Coming soon."
}
</script>
