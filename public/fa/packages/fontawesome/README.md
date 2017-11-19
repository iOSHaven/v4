<h1 align="center"><img src="https://img.fortawesome.com/349cfdf6/gh-logo.svg" alt="Font Awesome 5" width="50%"></h1>

## FontAwesome.js - ES6, CommonJS, and AMD module

> "I came here to chew bubblegum and install Font Awesome 5 - and I'm all out of bubblegum"

### Installation

```
$ npm i --save @fortawesome/fontawesome
```

Or

```
$ yarn add @fortawesome/fontawesome
```

Also grab the free solid style or brands:

```
$ yarn add @fortawesome/fontawesome-free-solid
$ yarn add @fortawesome/fontawesome-free-brands
```

## Let's get started

Once you have the packages installed (make sure you get `fontawesome` and at
least one of the styles) you can require or import the library. We're going to give examples in ES6 syntax using import.

```javascript
import fontawesome from '@fortawesome/fontawesome'
import { faUser } from '@fortawesome/fontawesome-free-solid'

fontawesome.icon(faUser)
```

See the [API reference](#api-reference) for more information on what API is available.

## Icon naming

From the beginning Font Awesome has used hyphenated names like `fa-address-book`, `fa-facebook`, or `fa-circle-o`.

JavaScript does not typically use this kind of naming scheme; it uses camelCase. So here are some basic examples of
how imports will work.

* `fa-address-book` becomes `import { faAddressBook } from '@fortawesome/fontawesome-free-solid'`
* `fa-facebook` becomes `import { faFacebookF } from '@fortawesome/fontawesome-free-brands'` (it's in the Brands style and this was renamed to facebook-f)
* `fa-freebsd` becomes `import { faFreebsd } from '@fortawesome/fontawesome-free-brands'` (OCD-warning: we know it's FreeBSD but consistency/guessability is the goal here)

## Configuration

Font Awesome 5 has several configuration options that affect how the library operates.

*Make sure you set your config as early as possible when using automatic CSS inserting* (more on this later)

In a browser the config is exported to `window.FontAwesomeConfig`.

Access the configuration in your app with:

```javascript
import fontawesome from '@fortawesome/fontawesome'

fontawesome.config
```

To update the configuration:

```javascript
import fontawesome from '@fortawesome/fontawesome'

fontawesome.config = {
  familyPrefix: 'fa'
}
```

There is no need to send every possible config value when updating the config. Properties will
be merged with the existing properties and values.

### Options

**familyPrefix** default `fa`

* `String` used to prefix classes like `fa-spin`. Changing this would allow you
to still use Font Awesome 4 with the prefix of `fa`.

**replacementClass** default `svg-inline--fa`

* `String` used as the base class name when building the SVG elements. If you
changed this to `foo` the SVGs would start with `<svg class="foo ...">`.

**autoAddCss** default `true`

* `Boolean` if this is set to `true` Font Awesome will automatically add CSS definitions to the `<head>` of the document.

**autoA11y** default `true`

* `Boolean` whether to automatically apply accessibility best practices for the generated icons.

**measurePerformance** default `false`

* `Boolean` setting this to `true` will add performance markers using the [Performance API](https://developer.mozilla.org/en-US/docs/Web/API/Performance)

The following are not used in the Node.js packages:

* autoReplaceSvg
* observeMutations
* keepOriginalSource
* showMissingIcons

## API reference

### `fontawesome.dom.i2svg(params)`

Will automatically find any `<i>` tags in the page and replace those with `<svg>` elements.

This functionality use
[`requestAnimationFrame`](https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame)
to batch the updates and increase performance.

**Note** that this function requires that the packs (located in `js/packs`) be loaded.

*index.html*
```html
<head>
  <script src="js/packs/solid.js"></script>
  <script src="bundle.js"></script>
</head>

<i class="fa fa-user"></i>
```

*bundle.js*
```javascript
import fontawesome from '@fortawesome/fontawesome'

fontawesome.dom.i2svg()
```

To specify a different element to search:

```javascript
fontawesome.dom.i2svg({ node: document.getElementById('content') })
```

Register a callback that will be triggered when the icons have been rendered:

```javascript
function iconDoneRendering () {
  console.log('Icons have rendered')
}

fontawesome.dom.i2svg({ callback: iconsDoneRendering })
```

---

### `fontawesome.dom.styles()`

Generates the accompanying CSS that is necessary to correctly display icons. If
you choose to disable `autoAddCss` in the configuration you'll need to grab
these styles and insert them manually into the DOM.

---

### `fontawesome.dom.insertStyles()`

Convenience method that will add the given CSS to the DOM.

```javascript
const styles = fontawesome.dom.styles()

fontawesome.dom.insertStyles(styles)
```

---

### `fontawesome.parse.transform(transformString)`

Takes a Power Transform string like `grow-2 left-4 rotate-15` and produces the
transform object used to specify transforms in the API.

```javascript
fontawesome.parse.transform('grow-2 left-4 rotate-15')
```

```javascript
{
  "size": 18,
  "x": -4,
  "y": 0,
  "flipX": false,
  "flipY": false,
  "rotate": 15
}
```
---

### `fontawesome.library.add(...iconDefinitions)`

Pre-registering icon definitions so that do not have to explicitly pass them to render an icon.

example: explicitly passing the icon:

```javascript
import brands from '@fortawesome/fontawesome-free-brands'
import { faUser } from '@fortawesome/fontawesome-free-solid'

fontawesome.icon(faUser)
fontawesome.icon(brands.faFortAwesome)
```

Using the library

```javascript
import brands from '@fortawesome/fontawesome-free-brands'
import { faUser } from '@fortawesome/fontawesome-free-solid'

fontawesome.library.add(brands, faUser)

fontawesome.icon({prefix: 'fab', iconName: 'fort-awesome'})
```
---

### `fontawesome.findIconDefinition(params)`

Takes the class portion of an icon's definition and fetches the icon from pack definitions.

**Note** the icon pack
[`js/packs`](https://github.com/FortAwesome/Font-Awesome-Pro/tree/master/js/packs)
must be loaded for this function to return anything meaningful.

```javascript
fontawesome.findIconDefinition({iconName: 'user'})
```

```javascript
{
  "prefix": "fa",
  "iconName": "user",
  "icon": [
    512,
    512,
    [],
    "f007",
    "M962…-112z"
  ]
}
```

or specify the prefix as well

```javascript
fontawesome.findIconDefinition({prefix: 'fab', iconName: 'fort-awesome'})
```

```javascript
{
  "prefix": "fab",
  "iconName": "fort-awesome",
  "icon": [
    448,
    512,
    [],
    "f286",
    "M412…999z"
  ]
}
```

You can then feed this as the `iconDefinition` to other functions.

---

### `fontawesome.icon(iconDefinition, params)`

Renders an icon as inline SVG.

Simple:

```javascript
import fontawesome from '@fortawesome/fontawesome'
import { faPlus } from '@fortaewsome/fontawesome-free-solid'

const faPlusIcon = fontawesome.icon(faPlus)
```

Getting the HTML for the icon:

```javascript
fontawesome.icon(faPlus).html
```

```javascript
[
  "<svg data-prefix=\"fa\" data-icon=\"user\" class=\"svg-inline--fa fa-user fa-w-16\" …>…</svg>"
]
```

Appending nodes from an [`HTMLCollection`](https://developer.mozilla.org/en-US/docs/Web/API/HTMLCollection):

```javascript
const faPlusIcon = fontawesome.icon(faPlus)

// Get the first element out of the HTMLCollection
document.appendChild(faPlusIcon.node[0])
```

Abstract tree:

**Note** the `abstract` value is mostly useful for library / framework / tooling creators. It provides a data
structure that can easily be converted into other objects.

```javascript
fontawesome.icon(faPlus).abstract
```

```javascript
[
  {
    "tag": "svg",
    "attributes": {
      "data-prefix": "fa",
      "data-icon": "user",
      "class": "svg-inline--fa fa-user fa-w-16",
      "role": "img",
      "xmlns": "http://www.w3.org/2000/svg",
      "viewBox": "0 0 512 512"
    },
    "children": [
      {
        "tag": "path",
        "attributes": {
          "fill": "currentColor",
          "d": "M96…112z"
        }
      }
    ]
  }
]
```

Using a transform:

```javascript
fontawesome.icon(faPlus, {
  transform: {
    size: 8,     // starts at 16 so this if half
    x: -4,       // the same as left-4
    y: 6,        // the same as up-6
    rotate: 90,  // the same as rotate-90
    flipX: true, // the same as flip-h
    flipY: true  // the same as flip-v
  }
}).html
```

If you need help figuring out what the transform use `fontawesome.parse.transform`.

Compose another icon with the main icon:

```javascript
import { faPlus, faCircle } from '@fortawesome/fontawesome-free-solid'

fontawesome.icon(faPlus, {
  compose: faCircle
}).html
```

Add title attribute:

```javascript
fontawesome.icon(faBars, {
  title: 'Navigation menu'
}).html
```

```javascript
[
  "<svg aria-labelledby=\"svg-inline--fa-title-9\" data-prefix=\"fa\" data-icon=\"bars\" class=\"svg-inline--fa fa-bars fa-w-14\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\" >" +
    "<title id=\"svg-inline--fa-title-9\" >Navigation menu</title>" +
    "<path …></path>" +
  "</svg>"
]
```

Additional classes:

```javascript
fontawesome.icon(faSpinner, {
  classes: ['fa-spin']
}).html
```

```javascript
[
  "<svg data-prefix=\"fa\" data-icon=\"spinner\" class=\"svg-inline--fa fa-spinner fa-w-16 fa-spin\" …>…</svg>"
]
```

Additional attributes:

```javascript
fontawesome.icon(faSpinner, {
  attributes: { 'data-component-id': 987654 }
}).html
```

Additional styles:

```javascript
fontawesome.icon(faSpinner, {
  style: { 'background-color': 'coral' }
}).html
```

Creating a symbol (auto-generating ID):

```javascript
fontawesome.icon(faSpinner, {
  symbol: true
}).html
```

Creating a symbol (explicit ID):

```javascript
fontawesome.icon(faSpinner, {
  symbol: 'spinner-icon'
}).html
```

---

### `fontawesome.layer(assembler)`

Allows multiple icons to be assembled together.

```javascript
fontawesome.layer((push) => {
  push(fontawesome.icon(faSpinner))
  push(fontawesome.icon(faUser, { transform: { size: 4 } } ))
}).html
```

---

### `fontawesome.text(content, params)`

Add text to layers.

```javascript
fontawesome.layer((push) => {
  push(fontawesome.icon(faSpinner))
  push(fontawesome.text('Wait…', { transform: { size: 4 } } ))
}).html
```

`params` allow the following keys:

* `transform`
* `title`
* `classes`
* `attributes`
* `style`

## Using the browser JavaScript file to access the API

The [`js/fontawesome.js`](https://github.com/FortAwesome/Font-Awesome-Pro/blob/master/js/fontawesome.js) is primarily used for simpler integration with Font Awesome.

By default it will automatically do the following for you:

1. Search the page for any `<i>` elements and replace them with inline SVG
1. Configure a [mutation observer](https://developer.mozilla.org/en-US/docs/Web/API/MutationObserver) that will watch the page for changes and replace with inline SVG

Another thing that it does is make the API available from the global Window object.

```javascript
window.FontAwesome
```

You can use it just like you would the Node.js package:

```javascript
faUser = FontAwesome.findIconDefinition({prefix: 'fas', iconName: 'user'})

FontAwesome.icon(faUser).html
```

If you would like to disable automatic replacement of `<i>` tags set the configuration before you load Font Awesome.

```html
<head>
  <script>
  window.FontAwesomeConfig = {
    autoReplaceSvg: false,
  }
  </script>
  <script src="js/fontawesome.js"></script>
  <script src="js/packs/solid.js"></script>
</head>
```

## Automatic CSS inserting

By default the API will automatically insert the needed CSS styles into the `<head>` of the document.

If you don't like this behaviour see the [Configuration](#configuration) section and the `autoAddCss` property.

## Tree shaking (or automatic subsetting)

Beginning with the excellent tool [Rollup.js](https://rollupjs.org) by Rich
Harris the concept of tree shaking attempts to eliminate any unused code. Webpack 2 now includes this as well.

FontAwesome.js supports tree shaking and the design of the icon system encourages only importing those icons that you need.

This can result in significantly reduce the bundle size.
