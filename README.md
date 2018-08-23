# Laravel Generate Language File

This package generates a JavaScript file where all your language files are compiled into one file which can be used in JavaScript.
It creates a global variable called i18n where the translations are stored. Use the underneath function to access the translations.

## Plain JavaScript
```
window.trans = (string, args) => {
    let value = _.get(window.i18n, string)

    _.eachRight(args, (paramVal, paramKey) => {
        value = _.replace(value, `:${paramKey}`, paramVal)
    })

    return value
}
```

## VueJS
```
Vue.prototype.trans = window.trans = (string, args) => {
    let value = _.get(window.i18n, string)

    _.eachRight(args, (paramVal, paramKey) => {
        value = _.replace(value, `:${paramKey}`, paramVal)
    })

    return value
}
```