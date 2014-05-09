var Toast = (function(){
    var queue = [],
        currentInterval,

        TOAST_WRAPPER_ID = "ToastWrapper",
        TOAST_CONTENTS_ID = "ToastContents",
        TOAST_OPACITY = 0.8,

        DURATION_SHOW = 300,
        DURATION_HIDE = 300,
        DURATION_SHOWING_IN_MILLS = 1500,
        DURATION_HIDING_IN_MILLIS = 750,

        TOAST_WRAPPER_STYLE = {
            "width" : "100%",
            "text-align" : "center"
        },
        TOAST_STYLE = {
            "position" : "absolute",
            "display" : "inline-block",
            "opacity" : 0.8,
            "top" : "40%",
            "padding" : "10px",
            "background" : "black",
            "-moz-border-radius" : "10px",
            "border-radius" : "10px",
            "text-align" : "center" ,
            "color" : "white"
        };


    //private method
    function _make(msg, options){
        if(queue.length == 0){
            _getStarted(msg, options);
        }else{
            _queueItem(msg, options);
        }
    }

    function _getStarted(msg, options){
        _queueItem(msg, options);
        _show(msg, options);
    }

    function _removeToastFromDocument(){
        var toastWrapper = $('#' + TOAST_WRAPPER_ID)[0];
        if(toastWrapper){
            document.body.removeChild(toastWrapper);
        }
    }

    function _queueItem(msg, options){
        var last = queue.length;
        queue[last] = {};
        queue[last].msg = msg;
        queue[last].options = options;
    }

    function _show(msg, options){
        _createElement(msg, options);
        clearInterval(currentInterval);
        $('#' + TOAST_WRAPPER_ID).fadeIn(DURATION_SHOW);
        currentInterval = setInterval(function(){_hide()}, DURATION_SHOWING_IN_MILLS);
    }

    function _hide(){
        queue.splice(firstIndex, 1);
        var firstIndex = 0,
            firstItem = queue[firstIndex],
            haveNextItems = queue.length > 0;

        clearInterval(currentInterval);

        if(haveNextItems){
            currentInterval = setInterval(function(){_show(firstItem.msg, firstItem.options);}, DURATION_HIDING_IN_MILLIS);
            $('#' + TOAST_WRAPPER_ID).fadeOut(DURATION_HIDE);
        }else{
            $('#' + TOAST_WRAPPER_ID).fadeOut(DURATION_HIDE, _removeToastFromDocument);
        }
    }

    function _createElement(msg, options){
        var toastWrapper = $('#' + TOAST_WRAPPER_ID);
        if(toastWrapper.length == 0){
            toastWrapper = $("<div />");
        }
        toastWrapper.attr("id",TOAST_WRAPPER_ID);
        toastWrapper.css(TOAST_WRAPPER_STYLE);
        toastWrapper.hide();
        toastWrapper.html(_getInnerHTML(msg));
        $('body').append(toastWrapper);
    }

    function _getInnerHTML(msg){
        return "<div style='position: absolute; display: block; opacity: 0.8; top: 40%; display:inline-block; padding: 10px; background: none repeat scroll 0% 0% black; border-radius: 10px 10px 10px 10px; text-align: center; color: white;'>" + msg + "</div>";
    }

    //public method
    return {make : _make};
})();