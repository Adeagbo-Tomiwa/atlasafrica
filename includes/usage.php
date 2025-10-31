<?php
$meta_title = "Blog — Atlas Africa";
$meta_desc = "Latest insights from Atlas Africa";
$meta_image = "/assets/images/blog-preview.png";
include __DIR__.'/includes/meta.php';
?>



<!-- Page views/Click tracking -->
<!-- CTA -->
<a href="/consult" onclick="atlasTrackEvent('cta_click',{cta:'book_consultation'})">Book a consult</a>

<!-- Form -->
<form onsubmit="atlasTrackEvent('form_submit',{form:'notify'})">
  ...
</form>
