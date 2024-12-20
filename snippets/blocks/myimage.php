<?php

/** @var \Kirby\Cms\Block $block */
$alt          = $block->alt();
$caption      = $block->caption();
$crop         = $block->crop()->isTrue();
$link         = $block->link();
$ratio        = $block->ratio()->or('auto');
$src          = null;
$target       = $block->target();
$title        = $block->title();
$lazy         = $block->lazy();
$alignment    = $block->alignment();
$width        = $block->width();
$height       = $block->height();
$maxwidth     = $block->maxwidth();
$maxheight    = $block->maxheight();
$topmargin    = $block->topmargin();
$bottommargin = $block->bottommargin();
$leftmargin   = $block->leftmargin();
$rightmargin  = $block->rightmargin();

if ($block->location() == 'web') {
	$src = $block->src()->esc();
} elseif ($image = $block->image()->toFile()) {
	$alt = $alt->or($image->alt());
	$src = $image->url();
}

?>
<?php if ($src): ?>
<figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?> <?php if ($alignment == 'center'): ?>class="text-center"<?php elseif ($alignment == 'right'): ?>class="text-right"<?php else: ?><?php endif ?>>
	<?php if ($link->isNotEmpty()): ?>
	<a href="<?= Str::esc($link->toUrl()) ?>" <?php if ($target->isTrue()): ?>target="_blank"<?php endif ?>>
		<img src="<?= $src ?>" alt="<?= $alt->esc() ?>" <?php if ($title->isTrue()): ?>title="<?= $alt->esc() ?>"<?php endif ?> <?php if ($lazy->isTrue()): ?>loading="lazy"<?php endif ?> style="<?php if ($width->isNotEmpty()): ?>width:<?= $width ?>; <?php endif ?><?php if ($height->isNotEmpty()): ?>height:<?= $height ?>; <?php endif ?><?php if ($maxwidth->isNotEmpty()): ?>max-width:<?= $maxwidth ?>; <?php endif ?><?php if ($maxheight->isNotEmpty()): ?>max-height:<?= $maxheight ?>; <?php endif ?><?php if ($topmargin->isNotEmpty()): ?>margin-top:<?= $topmargin ?>; <?php endif ?><?php if ($bottommargin->isNotEmpty()): ?>margin-bottom:<?= $bottommargin ?>; <?php endif ?><?php if ($leftmargin->isNotEmpty()): ?>margin-left:<?= $leftmargin ?>; <?php endif ?><?php if ($rightmargin->isNotEmpty()): ?>margin-right:<?= $rightmargin ?>; <?php endif ?>">
	</a>
	<?php else: ?>
	<img src="<?= $src ?>" alt="<?= $alt->esc() ?>" <?php if ($title->isTrue()): ?>title="<?= $alt->esc() ?>"<?php endif ?> <?php if ($lazy->isTrue()): ?>loading="lazy"<?php endif ?> style="<?php if ($width->isNotEmpty()): ?>width:<?= $width ?>; <?php endif ?><?php if ($height->isNotEmpty()): ?>height:<?= $height ?>; <?php endif ?><?php if ($maxwidth->isNotEmpty()): ?>max-width:<?= $maxwidth ?>; <?php endif ?><?php if ($maxheight->isNotEmpty()): ?>max-height:<?= $maxheight ?>; <?php endif ?><?php if ($topmargin->isNotEmpty()): ?>margin-top:<?= $topmargin ?>; <?php endif ?><?php if ($bottommargin->isNotEmpty()): ?>margin-bottom:<?= $bottommargin ?>; <?php endif ?><?php if ($leftmargin->isNotEmpty()): ?>margin-left:<?= $leftmargin ?>; <?php endif ?><?php if ($rightmargin->isNotEmpty()): ?>margin-right:<?= $rightmargin ?>; <?php endif ?>">
	<?php endif ?>

	<?php if ($caption->isNotEmpty()): ?>
	<figcaption>
		<?= $caption ?>
	</figcaption>
	<?php endif ?>
</figure>
<?php endif ?>