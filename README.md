# Kirby custom image block

This plugin provides additional attributes to the standard Kirby image block, including alignment, dimensions, margins, etc.

## Installation

Download, extract and copy this repository to `/site/plugins/custom-image-block`.

## Usage

Once you've installed the plugin, simply add `- customimage` to your `fieldsets` option in the relevant blueprints in place of the stadnard image block. For example...

```
  fieldname:
    type: blocks
    fieldsets:
      - text
      - customimage
      - gallery
      - markdown
```

You can also make the custom image block universally available by adding it to a default list of blocks via your `/site/config/config.php` file...

```
  <?php

  return [
    'blocks' => [
      'fieldsets' => [
        'text',
        'customimage',
        'gallery',
        'markdown',
      ]
    ]
  ];
```

When you add a button block in the Panel, the fields for completion will be displayed on the right-hand side of the screen...

* **Location and image:** as standard, a choice between a Kirby file or web URL.
* **Alternative text:** alt text for the image.
* **Use as title:** a toggle allowing you to use the alt text as a title attribute as well.
* **Caption:** Image caption text to appear immediately below the image.
* **Link:** using the default Kirby link field, specify a target location &ndash; an external URL, an internal page, etc.
* **Open in new window:** add a `target="_blank"` attribute.
* **Alignment:** choose to centre or right-align your button.
* **Ratio and Crop:** standard Kirby image block tools.
* **Lazy loading:** add a `loading="lazy"` attribute for images below the 'fold'.
* **Width, Height, Max-width and Max-height:** set specific image dimensions, if required.
* **Top, Bottom, Left and Right margin:** set specific margin spacing, if required.

In the Panel preview, the alignment marks add `img-c` (centre) or `img-r` (right) classes to the `img` element. These classes are already included in the plugin's CSS file at `/site/plugins/custom-image-block/index.css`. The marks act as toggles, so clicking again will remove the class. If you want to change the names of the custom classes, edit the stylesheet, as above, and the relevant code in `index.js`.

For the front-end, the custom snippet (`/site/plugins/custom-image-block/snippets/blocks/customimage.php`) the Tailwind classes `text-center` or `text-right` are added to the `figure` parent. To style the classes in the front-end, simply ensure that `text-center` or `text-right` are included in your main CSS file...

```
    .text-center { text-align: center; }
    .text-right { text-align: right; }

```

**Note:** the plugin only includes options to centre and right-align images because in LTR languages content defaults to left-aligned. To add a left-align option...

* Add `value === 'left' ? 'img-l'` to the `className` section in `index.js`.
* Add a `- left` option to the `button.yml` custom block blueprint.
* Add `img-l` (or similar) styles to the `index.css` file.
* Add a `<?php elseif ($alignment() == 'left'): ?>class="text-left"` statement into the `<figure>` parent element in the `customimage.php` custom block snippet.
* Add `text-left` (or similar) styles to your main CSS file.

## Disclaimer

This plugin is provided "as is" and with no guarantee. You use it at your own risk. Always test it before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/brandsis/custom-image-block/issues/new).

## License

[MIT](https://choosealicense.com/licenses/mit/)
