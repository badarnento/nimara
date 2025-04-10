/**
 * Global.js - Common utility functions
 */
const Global = {
    deleteId: 0,
    isShowIllustrationImage: true,
    isShowBreadcrumb: true,
    activeTableElementId: "table_data",
    tableFilter: [],

    /**
     * Format date to a readable string
     * @param {string|Date} date - Date to format
     * @param {string} format - Format string (simple)
     * @returns {string} Formatted date string
     */
    formatDate: function (date, format = "YYYY-MM-DD") {
        const d = new Date(date);

        const year = d.getFullYear();
        const month = String(d.getMonth() + 1).padStart(2, "0");
        const day = String(d.getDate()).padStart(2, "0");
        const hours = String(d.getHours()).padStart(2, "0");
        const minutes = String(d.getMinutes()).padStart(2, "0");

        return format
            .replace("YYYY", year)
            .replace("MM", month)
            .replace("DD", day)
            .replace("HH", hours)
            .replace("mm", minutes);
    },

    /**
     * Serialize form data to JSON object
     * @param {jQuery} form - jQuery form element
     * @returns {object} Form data as JSON object
     */
    serializeForm: function (form) {
        const formData = {};

        form.serializeArray().forEach((item) => {
            formData[item.name] = item.value;
        });

        return formData;
    },

    /**
     * Make an AJAX request
     * @param {string} url - URL to call
     * @param {string} method - HTTP method
     * @param {object} data - Data to send
     * @param {function} successCallback - Success callback
     * @param {function} errorCallback - Error callback
     */
    ajax: function (
        url,
        method = "GET",
        data = null,
        successCallback = null,
        errorCallback = null
    ) {
        let fullUrl = CONFIG.getApiUrl(url); // Tambahkan prefix API

        let isFormData = data instanceof FormData;

        $.ajax({
            url: fullUrl,
            type: method,
            data: isFormData ? data : JSON.stringify(data),
            contentType: isFormData ? false : "application/json",
            processData: !isFormData,
            cache: false,
            dataType: "json",
            timeout: CONFIG.ajaxTimeout,
            success: function (response) {
                if (successCallback && typeof successCallback === "function") {
                    successCallback(response);
                }
            },
            error: function (xhr, status, error) {
                if (errorCallback && typeof errorCallback === "function") {
                    errorCallback(xhr, status, error);
                } else {
                    let response = xhr.responseJSON;
                    if (xhr.status == 404) {
                        Global.toastrNotif("error", "Resource not found");
                        Router.showNotFound();
                    }
                    if (xhr.status == 400) {
                        Global.toastrNotif("error", response.message);
                    }
                    if (xhr.status == 401 || xhr.status == 403) {
                        Global.toastrNotif("error", response.message);
                        window.location.href = "/login";
                    }
                }
            },
        });
    },

    /**
     * Check if a string is valid JSON
     * @param {string} str - String to check
     * @returns {boolean} True if valid JSON
     */
    isValidJSON: function (str) {
        try {
            JSON.parse(str);
            return true;
        } catch (e) {
            return false;
        }
    },

    /**
     * Get value from local storage with expiry check
     * @param {string} key - Storage key
     * @returns {any} Stored value or null if expired/not found
     */
    getFromStorage: function (key) {
        const item = localStorage.getItem(key);

        if (!item) return null;

        // Check if the item is JSON with expiry data
        if (this.isValidJSON(item)) {
            const parsed = JSON.parse(item);

            // If it has expiry timestamp, check it
            if (parsed.expiry && parsed.data) {
                if (new Date().getTime() > parsed.expiry) {
                    // Expired, remove item
                    localStorage.removeItem(key);
                    return null;
                }

                return parsed.data;
            }
        }

        return item;
    },

    /**
     * Set value in local storage with expiry
     * @param {string} key - Storage key
     * @param {any} value - Value to store
     * @param {number} expiryMinutes - Minutes until expiry
     */
    setInStorage: function (
        key,
        value,
        expiryMinutes = CONFIG.cacheExpiration
    ) {
        if (expiryMinutes) {
            const expiry = new Date().getTime() + expiryMinutes * 60 * 1000;
            const item = {
                data: value,
                expiry: expiry,
            };

            localStorage.setItem(key, JSON.stringify(item));
        } else {
            // No expiry, store directly
            if (typeof value === "object") {
                localStorage.setItem(key, JSON.stringify(value));
            } else {
                localStorage.setItem(key, value);
            }
        }
    },
    showLoading() {
        $("#loading").addClass("active");
    },
    hideLoading() {
        setTimeout(() => $("#loading").removeClass("active"), 300);
    },
    redirect(path) {
        window.location.href = CONFIG.webUrl + "/" + path;
    },
    cleanPath(path) {
        if (typeof path !== "string") {
            path = "";
        }
        path = path.replace(/\/{2,}/g, "/");
        if (path.startsWith("/") && path !== "/") {
            path = path.slice(1);
        }
        if (path.endsWith("/") && path !== "/") {
            path = path.slice(0, -1);
        }

        return path;
    },
    checkToken() {
        let token = getCookie("token");

        if (!token) {
            window.location.href = "/login";
        } else {
            /*  fetch("/api/v1.0/me", {
                method: "GET",
                headers: {
                    Authorization: "Bearer " + token,
                    "Content-Type": "application/json",
                },
            })
                .then((response) => {
                    if (!response.ok) {
                        document.cookie =
                            "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                        window.location.href = "/login";
                    }
                })
                .catch((error) => {
                    console.error("Token validation failed:", error);
                    window.location.href = "/login";
                }); */
        }
    },
    toastrNotif(type, message = "", time = null) {
        toastr[type](message, type.charAt(0).toUpperCase() + type.slice(1), {
            timeOut: time || 3000,
        });
    },
    toggleBreadcrumbs(forceHide = false) {
        $("#breadcrumb").toggleClass("d-none", !this.isShowBreadcrumb);
        if (forceHide) {
            $("#breadcrumb").addClass("d-none", !this.isShowBreadcrumb);
        }
        this.isShowBreadcrumb = true;
    },
};
