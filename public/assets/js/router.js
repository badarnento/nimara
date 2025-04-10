/**
 * Router.js - Simple SPA routing system
 */

let firstInit = true;

const Router = {
    routes: {},
    isKeepLoading: false,
    currentRoute: null,
    currentParams: {},

    list: [
        {
            path: "/",
            title: "Home",
            template: "home.html",
            callback: function () {},
        },
        {
            path: "/about",
            title: "About",
            template: "about.html",
            callback: function (params) {
                console.log("this is about");
            },
        },
        {
            path: "/product",
            title: "Product",
            template: "roduct.html",
            callback: function (params) {
                console.log("this is product");
            },
        },
    ],

    /**
     * Initialize the router
     */
    init() {
        // Global.showLoading();
        this.navigate(window.location.hash);

        // Listen for hash changes to handle navigation
        $(window).on("hashchange", () => this.navigate(window.location.hash));
    },

    /**
     * Add a route to the router
     * @param {string} path - The route path (e.g., '/about')
     * @param {object} config - Route configuration object
     */
    add(path, config) {
        this.routes[path] = config;
        return this;
    },

    /**
     * Navigate to a route with optional parameters
     * @param {string} path - Route path
     * @param {object} params - Optional parameters to pass
     */
    navigateWithParams(path, params = {}) {
        // Convert params to query string
        const queryString = Object.keys(params)
            .map(
                (key) =>
                    `${encodeURIComponent(key)}=${encodeURIComponent(
                        params[key]
                    )}`
            )
            .join("&");

        // Update hash with optional query string
        window.location.hash = path + (queryString ? `?${queryString}` : "");
    },

    /**
     * Enhanced navigate method to parse parameters
     * @param {string} hash - URL hash including path and optional parameters
     */
    navigate(hash) {
        // Split path and query string
        const [pathWithoutParams, queryString] = hash.substring(1).split("?");
        const path = pathWithoutParams || "/";

        // Parse parameters
        const params = {};
        if (queryString) {
            queryString.split("&").forEach((param) => {
                const [key, value] = param.split("=");
                params[decodeURIComponent(key)] = decodeURIComponent(value);
            });
        }

        // Store current route and params
        this.currentRoute = path;
        this.currentParams = params;

        const route = this.routes[path];
        route ? this.loadPage(route, params) : this.showNotFound();
    },

    /**
     * Modified loadPage to accept parameters
     * @param {object} route - Route configuration
     * @param {object} params - Route parameters
     */
    loadPage(route, params = {}) {
        /* if (!firstInit) {
            Global.showLoading();
        } */
        firstInit = false;
        document.title = `${route.title} | ${CONFIG.appName}`;

        $.get(`pages/${route.template}`)
            .done((content) => {
                $("#app").html(content);

                if (typeof route.callback === "function") {
                    route.callback(params);
                }

                /*  Global.toggleBreadcrumbs();
                this.updatePanelTitle(route.title);
                this.updateActiveNav();

                if (!this.isKeepLoading) {
                    Global.hideLoading();
                } else {
                    this.isKeepLoading = false;
                } */
            })
            .fail(() => {
                $("#app").html(
                    '<div class="error-page"><h1>Error</h1><p>Failed to load page content</p></div>'
                );
            });
    },

    /**
     * Show 404 Not Found page
     */
    showNotFound() {
        // Global.toggleBreadcrumbs(true);
        const notFoundHtml = `
            <div class="page-error page-error-404 text-center">
                <div class="page-content vertical-align-middle">
                    <header>
                        <h1 class="animation-slide-top">404</h1>
                        <p>Page Not Found !</p>
                    </header>
                    <a class="btn btn-primary btn-round waves-effect waves-classic" href="/#">Go Back</a>
                </div>
            </div>
        `;
        $("#app").html(notFoundHtml);
        document.title = `404 - Page Not Found | ${CONFIG.appName}`;
    },

    /**
     * Update active navigation link
     */
    updateActiveNav() {
        $(".nav-link").removeClass("active");
        $(`.nav-link[href="#${this.currentRoute}"]`).addClass("active");
    },
    updatePanelTitle(title) {
        $(".panel-title").html(title);
    },
    setBreadcrumbItems(parentTitle, parentPath, currentTitle) {
        const items = [];

        if (parentTitle && parentPath) {
            items.push({
                text: parentTitle,
                url: Global.cleanPath(parentPath),
                // url: parentPath,
            });
        }

        if (currentTitle) {
            items.push(currentTitle);
        }

        Router.setBreadcrumb(...items);
    },
    setBreadcrumb(...items) {
        // Global.toggleIllustrationImage();
        const breadcrumb = document.getElementById("breadcrumb");
        if (!breadcrumb) return;

        breadcrumb.innerHTML = `<li id="breadcrumb-item" class="breadcrumb-item"><a href="${CONFIG.webUrl}">Home</a></li>`;

        items.forEach((item, index) => {
            const li = document.createElement("li");
            li.classList.add("breadcrumb-item");

            if (index === items.length - 1) {
                li.classList.add("active");
                li.classList.add("breadcrumb-detail");
            }

            if (typeof item === "object" && item.text) {
                li.innerHTML =
                    item.url && index !== items.length - 1
                        ? `<a href="${CONFIG.webUrl}/${item.url}">${item.text}</a>`
                        : item.text;
            } else {
                li.textContent = item;
            }

            breadcrumb.appendChild(li);
        });
    },
};
