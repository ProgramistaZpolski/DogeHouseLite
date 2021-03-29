# DogeHouseLite
A lighter version of DogeHouse

Joining rooms is not supported yet, so you will be redirected to the full version of DogeHouse. It uses the DogeGarden API & DogePHP under the hood.

![Demo](demo.png)

## Optimalizations
DogeHouseLite has been optimized for GPRS & Orange Neostrada internet connections. Some of the optimalizations include:
- Caching
- No JavaScript at all
- CSS files have been reduced to the minimum size
- The SVG Logo was both manually and automatically optimized
- Lazyloading images
- Only 4 requests on the main page (1 html, 1 css, 1 svg and favicon)
- 100% Server Side Rendered
- Without the favicon, only around 10kb of data gets loaded.