
<script type="text/javascript">
    (function() {
        var c = document.body.className;
        c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
        document.body.className = c;
    })();
</script>
<link rel="stylesheet" id="wpo_min-footer-0-css" href="assets/wpo-minify-footer-a7650ee3.min.css" media="all" />
<link rel="stylesheet" id="wpo_min-footer-1-css" href="assets/wpo-minify-footer-7b912468.min.css" media="all" />
<script id="wpo_min-footer-0-js-extra">
    var heartbeatSettings = {
        "ajaxurl": "\/wp-admin\/admin-ajax.php"
    };
    var streamtube = {
        "rest_url": "https:\/\/streamtube.marstheme.com\/wp-json\/streamtube\/v1",
        "nonce": "1ea413ba56",
        "ajaxUrl": "https:\/\/streamtube.marstheme.com\/wp-admin\/admin-ajax.php",
        "_wpnonce": "071ff67130",
        "media_form": "6d7b9724cc",
        "chunkUpload": "on",
        "sliceSize": "1024",
        "restRootUrl": "https:\/\/streamtube.marstheme.com\/wp-json\/",
        "cart_url": "https:\/\/streamtube.marstheme.com\/cart\/",
        "video_extensions": ["mp4", "m4v", "webm", "ogv", "flv", "mov"],
        "max_upload_size": "15728640",
        "incorrect_image": "Incorrect file type, please choose an image file.",
        "can_upload_video": "",
        "can_upload_video_error_message": "Sorry, You do not have permission to upload video, please contact administrator.",
        "invalid_file_format": "Invalid file format.",
        "exceeds_file_size": "The uploaded file size {size}MB exceeds the maximum allowed size: <strong>15<\/strong>MB",
        "copy": "COPY",
        "iframe": "Iframe",
        "shorturl": "Short URL",
        "video_published": "Video Published",
        "pending_review": "Pending Review",
        "file_encode_done": "has been encoded successfully.",
        "view_video": "view video",
        "light_logo": "https:\/\/streamtube.marstheme.com\/wp-content\/uploads\/2021\/09\/logo.png",
        "dark_logo": "https:\/\/streamtube.marstheme.com\/wp-content\/uploads\/2021\/09\/logo-dark.png",
        "light_mode_text": "Light mode",
        "dark_mode_text": "Dark mode",
        "dark_editor_css": "https:\/\/streamtube.marstheme.com\/wp-content\/plugins\/streamtube-core\/public\/assets\/css\/editor-dark.css?ver=1",
        "light_editor_css": "https:\/\/streamtube.marstheme.com\/wp-content\/plugins\/streamtube-core\/public\/assets\/css\/editor-light.css?ver=1",
        "editor_toolbar": ["bold", "italic", "underline", "strikethrough", "hr", "bullist", "numlist", "link",
            "unlink", "forecolor", "undo", "redo", "removeformat", "blockquote"
        ],
        "has_woocommerce": "1",
        "view_cart": "view cart",
        "added_to_cart": "%s has been added to cart",
        "added_to_cart_no_name": "Added to cart",
        "public": "Public",
        "publish": "Publish",
        "published": "Published",
        "bp_message_sent": "You have sent message successfully.",
        "view_ad": "View Ad",
        "cancel": "Cancel",
        "play_now": "Play now",
        "edit": "Edit",
        "save": "Save",
        "report": "Report",
        "comment_reviewed": "This comment is currently being reviewed",
        "tax_terms_cache": ["video_tag", "post_tag"],
        "must_cache_terms": "",
        "upnext_time": "5",
        "sound": {
            "success": "https:\/\/streamtube.marstheme.com\/wp-content\/plugins\/streamtube-core\/public\/assets\/media\/success.mp3",
            "warning": "https:\/\/streamtube.marstheme.com\/wp-content\/plugins\/streamtube-core\/public\/assets\/media\/warning.mp3"
        },
        "toast": {
            "delay": 3000
        }
    };
    var wc_add_to_cart_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
        "i18n_view_cart": "View cart",
        "cart_url": "https:\/\/streamtube.marstheme.com\/cart\/",
        "is_cart": "",
        "cart_redirect_after_add": "no"
    };
    var woocommerce_params = {
        "ajax_url": "\/wp-admin\/admin-ajax.php",
        "wc_ajax_url": "\/?wc-ajax=%%endpoint%%"
    };
</script>
<script src="assets/wpo-minify-footer-fb28da3a.min.js" id="wpo_min-footer-0-js"></script>
<script type="text/javascript">
    (function(undefined) {
        var _localizedStrings = {
            "redirect_overlay_title": "Hold On",
            "redirect_overlay_text": "You are being redirected to another page,<br>it may take a few seconds."
        };
        var _targetWindow = "prefer-popup";
        var _redirectOverlay = "overlay-with-spinner-and-message";
        /**
         * Used when Cross-Origin-Opener-Policy blocked the access to the opener. We can't have a reference of the opened windows, so we should attempt to refresh only the windows that has opened popups.
         */
        window._nslHasOpenedPopup = false;

        window.NSLPopup = function(url, title, w, h) {
            var userAgent = navigator.userAgent,
                mobile = function() {
                    return /\b(iPhone|iP[ao]d)/.test(userAgent) ||
                        /\b(iP[ao]d)/.test(userAgent) ||
                        /Android/i.test(userAgent) ||
                        /Mobile/i.test(userAgent);
                },
                screenX = window.screenX !== undefined ? window.screenX : window.screenLeft,
                screenY = window.screenY !== undefined ? window.screenY : window.screenTop,
                outerWidth = window.outerWidth !== undefined ? window.outerWidth : document.documentElement
                .clientWidth,
                outerHeight = window.outerHeight !== undefined ? window.outerHeight : document.documentElement
                .clientHeight - 22,
                targetWidth = mobile() ? null : w,
                targetHeight = mobile() ? null : h,
                left = parseInt(screenX + (outerWidth - targetWidth) / 2, 10),
                right = parseInt(screenY + (outerHeight - targetHeight) / 2.5, 10),
                features = [];
            if (targetWidth !== null) {
                features.push('width=' + targetWidth);
            }
            if (targetHeight !== null) {
                features.push('height=' + targetHeight);
            }
            features.push('left=' + left);
            features.push('top=' + right);
            features.push('scrollbars=1');

            var newWindow = window.open(url, title, features.join(','));

            if (window.focus) {
                newWindow.focus();
            }

            window._nslHasOpenedPopup = true;

            return newWindow;
        };

        var isWebView = null;

        function checkWebView() {
            if (isWebView === null) {
                function _detectOS(ua) {
                    if (/Android/.test(ua)) {
                        return "Android";
                    } else if (/iPhone|iPad|iPod/.test(ua)) {
                        return "iOS";
                    } else if (/Windows/.test(ua)) {
                        return "Windows";
                    } else if (/Mac OS X/.test(ua)) {
                        return "Mac";
                    } else if (/CrOS/.test(ua)) {
                        return "Chrome OS";
                    } else if (/Firefox/.test(ua)) {
                        return "Firefox OS";
                    }
                    return "";
                }

                function _detectBrowser(ua) {
                    var android = /Android/.test(ua);

                    if (/Opera Mini/.test(ua) || / OPR/.test(ua) || / OPT/.test(ua)) {
                        return "Opera";
                    } else if (/CriOS/.test(ua)) {
                        return "Chrome for iOS";
                    } else if (/Edge/.test(ua)) {
                        return "Edge";
                    } else if (android && /Silk\//.test(ua)) {
                        return "Silk";
                    } else if (/Chrome/.test(ua)) {
                        return "Chrome";
                    } else if (/Firefox/.test(ua)) {
                        return "Firefox";
                    } else if (android) {
                        return "AOSP";
                    } else if (/MSIE|Trident/.test(ua)) {
                        return "IE";
                    } else if (/Safari\//.test(ua)) {
                        return "Safari";
                    } else if (/AppleWebKit/.test(ua)) {
                        return "WebKit";
                    }
                    return "";
                }

                function _detectBrowserVersion(ua, browser) {
                    if (browser === "Opera") {
                        return /Opera Mini/.test(ua) ? _getVersion(ua, "Opera%20Mini/index.html") :
                            / OPR/.test(ua) ? _getVersion(ua, "OPR/index.html") :
                            _getVersion(ua, "OPT/index.html");
                    } else if (browser === "Chrome for iOS") {
                        return _getVersion(ua, "CriOS/index.html");
                    } else if (browser === "Edge") {
                        return _getVersion(ua, "Edge/index.html");
                    } else if (browser === "Chrome") {
                        return _getVersion(ua, "Chrome/index.html");
                    } else if (browser === "Firefox") {
                        return _getVersion(ua, "Firefox/index.html");
                    } else if (browser === "Silk") {
                        return _getVersion(ua, "Silk/index.html");
                    } else if (browser === "AOSP") {
                        return _getVersion(ua, "Version/index.html");
                    } else if (browser === "IE") {
                        return /IEMobile/.test(ua) ? _getVersion(ua, "IEMobile/index.html") :
                            /MSIE/.test(ua) ? _getVersion(ua, "MSIE ") :
                            _getVersion(ua, "rv:");
                    } else if (browser === "Safari") {
                        return _getVersion(ua, "Version/index.html");
                    } else if (browser === "WebKit") {
                        return _getVersion(ua, "WebKit/index.html");
                    }
                    return "0.0.0";
                }

                function _getVersion(ua, token) {
                    try {
                        return _normalizeSemverString(ua.split(token)[1].trim().split(/[^\w\.]/)[0]);
                    } catch (o_O) {}
                    return "0.0.0";
                }

                function _normalizeSemverString(version) {
                    var ary = version.split(/[\._]/);
                    return (parseInt(ary[0], 10) || 0) + "." +
                        (parseInt(ary[1], 10) || 0) + "." +
                        (parseInt(ary[2], 10) || 0);
                }

                function _isWebView(ua, os, browser, version, options) {
                    switch (os + browser) {
                        case "iOSSafari":
                            return false;
                        case "iOSWebKit":
                            return _isWebView_iOS(options);
                        case "AndroidAOSP":
                            return false;
                        case "AndroidChrome":
                            return parseFloat(version) >= 42 ? /; wv/.test(ua) : /\d{2}\.0\.0/.test(version) ?
                                true : _isWebView_Android(options);
                    }
                    return false;
                }

                function _isWebView_iOS(options) {
                    var document = (window["document"] || {});

                    if ("WEB_VIEW" in options) {
                        return options["WEB_VIEW"];
                    }
                    return !("fullscreenEnabled" in document || "webkitFullscreenEnabled" in document || false);
                }

                function _isWebView_Android(options) {
                    if ("WEB_VIEW" in options) {
                        return options["WEB_VIEW"];
                    }
                    return !("requestFileSystem" in window || "webkitRequestFileSystem" in window || false);
                }

                var options = {};
                var nav = window.navigator || {};
                var ua = nav.userAgent || "";
                var os = _detectOS(ua);
                var browser = _detectBrowser(ua);
                var browserVersion = _detectBrowserVersion(ua, browser);

                isWebView = _isWebView(ua, os, browser, browserVersion, options);
            }

            return isWebView;
        }

        function isAllowedWebViewForUserAgent(provider) {
            var facebookAllowedWebViews = [
                    'Instagram',
                    'FBAV',
                    'FBAN'
                ],
                whitelist = [];

            if (provider && provider === 'facebook') {
                whitelist = facebookAllowedWebViews;
            }

            var nav = window.navigator || {};
            var ua = nav.userAgent || "";

            if (whitelist.length && ua.match(new RegExp(whitelist.join('|')))) {
                return true;
            }

            return false;
        }

        window._nslDOMReady(function() {

            window.nslRedirect = function(url) {
                if (_redirectOverlay) {
                    var overlay = document.createElement('div');
                    overlay.id = "nsl-redirect-overlay";
                    var overlayHTML = '',
                        overlayContainer = "<div id='nsl-redirect-overlay-container'>",
                        overlayContainerClose = "</div>",
                        overlaySpinner = "<div id='nsl-redirect-overlay-spinner'></div>",
                        overlayTitle = "<p id='nsl-redirect-overlay-title'>" + _localizedStrings
                        .redirect_overlay_title + "</p>",
                        overlayText = "<p id='nsl-redirect-overlay-text'>" + _localizedStrings
                        .redirect_overlay_text + "</p>";

                    switch (_redirectOverlay) {
                        case "overlay-only":
                            break;
                        case "overlay-with-spinner":
                            overlayHTML = overlayContainer + overlaySpinner + overlayContainerClose;
                            break;
                        default:
                            overlayHTML = overlayContainer + overlaySpinner + overlayTitle +
                                overlayText + overlayContainerClose;
                            break;
                    }

                    overlay.insertAdjacentHTML("afterbegin", overlayHTML);
                    document.body.appendChild(overlay);
                }

                window.location = url;
            };

            var targetWindow = _targetWindow || 'prefer-popup',
                lastPopup = false;


            var buttonLinks = document.querySelectorAll(
                ' a[data-plugin="nsl"][data-action="connect"], a[data-plugin="nsl"][data-action="link"]'
            );
            buttonLinks.forEach(function(buttonLink) {
                buttonLink.addEventListener('click', function(e) {
                    if (lastPopup && !lastPopup.closed) {
                        e.preventDefault();
                        lastPopup.focus();
                    } else {

                        var href = this.href,
                            success = false;
                        if (href.indexOf('?') !== -1) {
                            href += '&';
                        } else {
                            href += '?';
                        }

                        var redirectTo = this.dataset.redirect;
                        if (redirectTo === 'current') {
                            href += 'redirect=' + encodeURIComponent(window.location.href) +
                                '&';
                        } else if (redirectTo && redirectTo !== '') {
                            href += 'redirect=' + encodeURIComponent(redirectTo) + '&';
                        }

                        if (targetWindow !== 'prefer-same-window' && checkWebView()) {
                            targetWindow = 'prefer-same-window';
                        }

                        if (targetWindow === 'prefer-popup') {
                            lastPopup = NSLPopup(href + 'display=popup',
                                'nsl-social-connect', this.dataset.popupwidth, this
                                .dataset.popupheight);
                            if (lastPopup) {
                                success = true;
                                e.preventDefault();
                            }
                        } else if (targetWindow === 'prefer-new-tab') {
                            var newTab = window.open(href + 'display=popup', '_blank');
                            if (newTab) {
                                if (window.focus) {
                                    newTab.focus();
                                }
                                success = true;
                                window._nslHasOpenedPopup = true;
                                e.preventDefault();
                            }
                        }

                        if (!success) {
                            window.location = href;
                            e.preventDefault();
                        }
                    }
                });
            });

            let hasWebViewLimitation = false;

            var googleLoginButtons = document.querySelectorAll(
                ' a[data-plugin="nsl"][data-provider="google"]');
            if (googleLoginButtons.length && checkWebView()) {
                googleLoginButtons.forEach(function(googleLoginButton) {
                    googleLoginButton.remove();
                    hasWebViewLimitation = true;
                });
            }

            var facebookLoginButtons = document.querySelectorAll(
                ' a[data-plugin="nsl"][data-provider="facebook"]');
            if (facebookLoginButtons.length && checkWebView() && /Android/.test(window.navigator
                    .userAgent) && !isAllowedWebViewForUserAgent('facebook')) {
                facebookLoginButtons.forEach(function(facebookLoginButton) {
                    facebookLoginButton.remove();
                    hasWebViewLimitation = true;
                });
            }


            const separators = document.querySelectorAll('div.nsl-separator');
            if (hasWebViewLimitation && separators.length) {
                separators.forEach(function(separator) {
                    let separatorParentNode = separator.parentNode;
                    if (separatorParentNode) {
                        const separatorButtonContainer = separatorParentNode.querySelector(
                            'div.nsl-container-buttons');
                        if (separatorButtonContainer && !separatorButtonContainer.hasChildNodes()) {
                            separator.remove();
                        }
                    }
                })
            }
        });

        /**
         * Cross-Origin-Opener-Policy blocked the access to the opener
         */
        if (typeof BroadcastChannel === "function") {
            const _nslLoginBroadCastChannel = new BroadcastChannel('nsl_login_broadcast_channel');
            _nslLoginBroadCastChannel.onmessage = (event) => {
                if (window?._nslHasOpenedPopup && event.data?.action === 'redirect') {
                    window._nslHasOpenedPopup = false;

                    const url = event.data?.href;
                    _nslLoginBroadCastChannel.close();
                    if (typeof window.nslRedirect === 'function') {
                        window.nslRedirect(url);
                    } else {
                        window.opener.location = url;
                    }
                }
            };
        }
    })();
</script>
</body>

<!-- Mirrored from streamtube.marstheme.com/video/k8mepY2aMy/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Sep 2023 21:13:47 GMT -->

</html>