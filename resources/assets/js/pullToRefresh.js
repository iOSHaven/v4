/**
 * @typedef {Object} PtrOptions The options for the PullToRefresh class.
 * @property {HTMLElement} scrollTarget The element that has scolling.
 * @property {HTMLElement} el The element that will hold the pull to refresh messages.
 */


export default class PullToRefresh
{
    /**
     * 
     * @param {PtrOptions} obj
     */
    constructor(obj) {
        this.scrollTarget = obj.scrollTarget
        // obj.scrollTarget.addEventListener("scroll", this.onscroll.bind(this))
        obj.scrollTarget.addEventListener("touchstart", this.ontouchstart.bind(this))
        obj.scrollTarget.addEventListener("touchend", this.ontouchend.bind(this))
        obj.scrollTarget.addEventListener("touchmove", this.ontouchmove.bind(this))
        this.el = obj.el
        this.scrollTimeout;
        this.touching = false;
        this.el.innerHTML = 'Pull to refresh';
        this.isLoading = false;
        // this.el.style.marginTop = (this.el.clientHeight * -1) + 'px'
        this.touches = {
            start: {
                x: 0,
                y: 0
            },
            current: {
                x: 0,
                y: 0
            },
            stop: {
                x: 0,
                y: 0
            }
        }
        // this.el.style.maxHeight = '0px'
        // this.el.style.overflow = "hidden"
        // console.log(this.el)
    }

    ontouchstart (e) {
        if (typeof e['changedTouches'] !== "undefined") {
            var touch = e.changedTouches[0];
            // console.log(e.changedTouches)
            this.touches.start.x = touch.screenX;
            this.touches.start.y = touch.screenY;
        } else {
            this.touches.start.x = e.screenX;
            this.touches.start.y = e.screenY;
        }
        this.rubberbanding = this.scrollTarget.scrollTop <= 0;
    }


    ontouchmove(e) {
        
        if (typeof e['changedTouches'] !== "undefined") {
            var touch = e.changedTouches[0];
            // console.log(e.changedTouches)
            this.touches.current.x = touch.screenX;
            this.touches.current.y = touch.screenY;
        } else {
            this.touches.current.x = e.screenX;
            this.touches.current.y = e.screenY;
        }

        var changeY = Math.abs(this.touches.start.y - this.touches.current.y);
        var rotation = changeY < 100 ? changeY * 30 / 100 : 30;

        if (document.body.scrollTop === 0) {
            if (changeY > 100) this.loading();
        }
    }

    ontouchend (e) {
        if (document.body.scrollTop === 0 && !this.isLoading) {

        }
    }

    

    // isPullDown(dy, dx) {
    //     return dy < 0 && (
    //         (Math.abs(dx) <= 100 && Math.abs(dy) >= 300)
    //         ||
    //         (Math.abs(dx) / Math.abs(dy) <= 0.3 && dy >= 60)
    //     );
    // }

    loading () {
        this.isLoading = true;
        alert("pulled down");
    }
    // onscroll (e) {
    //     window.clearTimeout(this.scrollTimeout);
    //     var pos = e.target.scrollTop;

    //     // console.log("scrolling", e, e.target.scrollTop)
        
    //     // this.el.style.display = "block"
    //     if(pos < 0) {
    //         this.rubberbanding = true;
    //         // this.el.style.backgroundColor = "#ff0000"
    //         this.el.style.marginTop = (pos * -0.99) + "px"
    //     } else {
    //         this.el.style.backgroundColor = "#00ff00"
    //     }
    //     this.scrollTimeout = window.setTimeout(this.onscrollend.bind(this), 100);
    // }

    // onscrollend () {
    //     if (!this.touching) {
    //         this.el.style.backgroundColor = "#0000ff"
    //     }
        
    // }
}