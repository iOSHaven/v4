{{-- SCRIPT FOR LINKS IN STANDALONE APP --}}
<script>
    (function(a, b, c) {
        if (c in b && b[c]) {
            var d, e = a.location,
                f = /^(a|html)$/i;
            a.addEventListener("click", function(a) {
                d = a.target;
                while (!f.test(d.nodeName)) d = d.parentNode;
                "href" in d && (d.href.indexOf("http") || ~d.href.indexOf(e.host)) && (a.preventDefault(), e.href = d
                    .href)
            }, !1)
        }
    })(document, window.navigator, "standalone")
</script>