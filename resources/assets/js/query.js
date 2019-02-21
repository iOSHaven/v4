const $$ = {
    register(name, method) {
        this[name] = method
    }
}

function $ (query, context=document) {
    query = query.trim().toLowerCase()
    this.$$ = $$
    if (query[0] == "#" || query == "body" || query == "html" || query == "window") {
        this.$$.$els = context.querySelector(query)
    } else {
        this.$$.$els = Array.from(context.querySelectorAll(query))
    }
    this.$$.toArray = () => Array.from(context.querySelectorAll(query))
    this.$$.$els.$$ = this.$$
    return new Proxy(this.$$.$els, {
        get (obj, prop) {
            if (typeof obj.$$[prop] !== "undefined") {
                return obj.$$[prop]
            }
            return obj[prop]
        }
    })
}

$$.register('class', function (newclass, type="add") {
    var els = this.$$.$els
    var c = (node) => {
        if (Array.isArray(newclass)) {
            node.classList[type].apply(newclass)
        } else if (typeof newclass == "string") {
            node.classList[type](newclass)
        }
    }
    if (els instanceof HTMLElement) {
        c(els)
    } else {
        els.forEach(node => c(node))
    }
    return this
})

$$.register('addClass', function (newclass) {
    return this.class(newclass, 'add')
})

$$.register('removeClass', function (newclass) {
    return this.class(newclass, 'remove')
})

$$.register('toggleClass', function (newclass) {
    return this.class(newclass, 'toggle')
})

$$.register('find', function (query) {
    var els = this.$$.$els
    if (els.length == 1) {
        return $(query, els[0])
    } else if (els instanceof HTMLElement) {
        return $(query, els)
    }
})

$$.register('has', function (query) {
    return this.find(query).toArray().length > 0
})

$$.register('css', function (obj, value) {
    var els = this.$$.$els
    if (els instanceof HTMLElement) {
        if (typeof obj == 'object') {
            Object.assign(els.style, obj)
        } else if (typeof obj == 'string' && typeof value == 'string') {
            els.style[obj] = value
        }
    }
    return this
})
