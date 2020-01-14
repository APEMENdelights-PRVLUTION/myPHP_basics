
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    var originalAddEventListener = EventTarget.prototype.addEventListener, oldWidth = window.innerWidth;
    EventTarget.prototype.addEventListener = function (eventName, eventHandler, useCapture) {
        if (eventName === "resize") {
            originalAddEventListener.call(this, eventName, function (event) {
                if (oldWidth === window.innerWidth) {
                    return;
                } else if (oldWidth !== window.innerWidth) {
                    oldWidth = window.innerWidth;
                }
                if (eventHandler.handleEvent) {
                    eventHandler.handleEvent.call(this, event);
                } else {
                    eventHandler.call(this, event);
                }
                ;
            }, useCapture);
        } else {
            originalAddEventListener.call(this, eventName, eventHandler, useCapture);
        }
        ;
    };
}
;