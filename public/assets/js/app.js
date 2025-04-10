/**
 * App.js - Main application entry point
 */
$(document).ready(function () {
    Router.list.forEach((route) => {
        Router.add(route.path, {
            title: route.title,
            path: Global.cleanPath(route.path),
            parent_title: route.parent_title,
            parent_path: Global.cleanPath(route.parent_path),
            template: route.template,
            callback: route.callback,
        });
    });

    Router.init();

    if (CONFIG.debug) {
        console.log("Application initialized successfully");
    }

});
