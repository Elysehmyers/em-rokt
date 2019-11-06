(function ($) {
    'use strict';

    const ds_suit_version = localStorage.getItem("ds_suit_version");
    if(!ds_suit_version || ds_suit_version !== ds_suit_admin.version) {
        console.log(`Version ${ds_suit_version} is unequal to version current version ${ds_suit_admin.version}. Resetting localStorage.`);
        localStorage.clear();
        localStorage.setItem("ds_suit_version", ds_suit_admin.version);
    } else {
        console.log("Version from localStorage and current version match. No need to reset localStorage.");
    }

    $(window).load(function () {
        if("#wrap-dss_settings" === window.location.hash) {
            $("a[href='#wrap-dss_settings']").click();
        }
    });

})(jQuery);
