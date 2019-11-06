// This script is loaded both on the frontend page and in the Visual Builder.
jQuery(function($) {

    if(window.ETBuilderBackend && window.ETBuilderBackend.defaults){
        window.ETBuilderBackend.defaults.dss_bucket = {
            image: window.DsSuitBuilderData.defaults.image,
            title: window.DsSuitBuilderData.defaults.title,
            content: window.DsSuitBuilderData.defaults.content,
        };
    }

    $(".dss_video_lightbox").each(function(){
        const lightbox = $(this).find(".video");
        const lightbox_on_mobile = lightbox.attr("data-lightbox_on_mobile");
        lightbox.magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            disableOn: 'on' === lightbox_on_mobile ? 0 : 768,
        });
    });

    $(window).load(function(){
        $(".dss_video_lightbox").removeClass("preload");
    });
});
