# Juan Jimenez FinMC Post

Custom Elementor extension/plugin to display articles on websites related to the company Sir Isaac Publishing/Financial Media Corp. By Juan Jimenez.

Plugin Structure: 
```
assets/
      /js   
      /css  Holds plugin CSS Files
      
widgets/
      /juanjimeneztj-finmc-post-widget.php
      /inline-editing.php
      
index.php
juanjimeneztj-elementor-finmc-post.php
plugin.php
```


* `assets` directory - holds plugin JavaScript and CSS assets
  * `/js` directory - Holds plugin Javascript Files
  * `/css` directory - Holds plugin CSS Files
* `widgets` directory - Holds Plugin widgets
  * `/juanjimeneztj-finmc-post-widget.php` - Hello World demo Widget class
  * `/inline-editing.php` - Inline Editing demo Widget class
* `index.php`	- Prevent direct access to directories
* `juanjimeneztj-elementor-finmc-post.php`	- Main plugin file, used as a loader if plugin minimum requirements are met.
* `plugin.php` - The actual Plugin file/Class.
