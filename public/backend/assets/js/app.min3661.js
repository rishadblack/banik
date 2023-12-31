var app = {
        class: "app",
        isMobile:
            /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
                navigator.userAgent
            ) || window.innerWidth < 992,
        header: { class: "app-header" },
        sidebar: {
            class: "app-sidebar",
            menuClass: "menu",
            menuItemClass: "menu-item",
            menuItemHasSubClass: "has-sub",
            menuLinkClass: "menu-link",
            menuSubmenuClass: "menu-submenu",
            menuExpandClass: "expand",
            minify: {
                toggledClass: "app-sidebar-minified",
                localStorage: "appSidebarMinified",
                toggleAttr: 'data-toggle="sidebar-minify"',
            },
            mobile: {
                toggledClass: "app-sidebar-mobile-toggled",
                closedClass: "app-sidebar-mobile-closed",
                dismissAttr: 'data-dismiss="sidebar-mobile"',
                toggleAttr: 'data-toggle="sidebar-mobile"',
            },
            scrollBar: { localStorage: "appSidebarScrollPosition", dom: "" },
        },
        floatSubmenu: {
            id: "app-float-submenu",
            dom: "",
            timeout: "",
            class: "app-float-submenu",
            container: { class: "app-float-submenu-container" },
            overflow: { class: "overflow-scroll mh-100vh" },
        },
        topNav: {
            id: "#top-nav",
            class: "app-top-nav",
            mobile: { toggleAttr: 'data-toggle="top-nav-mobile"' },
            menu: {
                class: "menu",
                itemClass: "menu-item",
                itemLinkClass: "menu-link",
                activeClass: "active",
                hasSubClass: "has-sub",
                expandClass: "expand",
                submenu: { class: "menu-submenu" },
            },
            control: {
                class: "menu-control",
                startClass: "menu-control-start",
                endClass: "menu-control-end",
                showClass: "show",
                buttonPrev: {
                    class: "menu-control-start",
                    toggleAttr: 'data-toggle="top-nav-prev"',
                },
                buttonNext: {
                    class: "menu-control-end",
                    toggleAttr: 'data-toggle="top-nav-next"',
                },
            },
        },
        themePanel: {
            class: "theme-panel",
            toggleAttr: 'data-click="theme-panel-expand"',
            expandCookie: "theme-panel",
            expandCookieValue: "expand",
            activeClass: "active",
            themeList: {
                class: "theme-list",
                toggleAttr: "data-theme",
                activeClass: "active",
                cookieName: "theme",
                onChangeEvent: "theme-reload",
            },
            darkMode: {
                class: "dark-mode",
                inputName: "app-theme-dark-mode",
                cookieName: "dark-mode",
            },
        },
        animation: { speed: 300 },
        scrollBar: {
            attr: 'data-scrollbar="true"',
            heightAttr: "data-height",
            skipMobileAttr: 'data-skip-mobile="true"',
            wheelPropagationAttr: "data-wheel-propagation",
        },
        scrollTo: {
            toggleAttr: 'data-toggle="scroll-to"',
            targetAttr: "data-target",
        },
        scrollTopButton: {
            toggleAttr: 'data-click="scroll-top"',
            showClass: "show",
        },
        card: {
            class: "card",
            expand: {
                toggleAttr: 'data-toggle="card-expand"',
                status: !1,
                class: "card-expand",
                tooltipText: "Expand / Compress",
            },
        },
        tooltip: { toggleAttr: 'data-bs-toggle="tooltip"' },
        popover: { toggleAttr: 'data-bs-toggle="popover"' },
        dismissClass: {
            toggleAttr: "data-dismiss-class",
            targetAttr: "data-dismiss-target",
        },
        toggleClass: {
            toggleAttr: "data-toggle-class",
            targetAttr: "data-toggle-target",
        },
        font: {},
        color: {},
        variablePrefix: "bs-",
        variableFontList: [
            "body-font-family",
            "body-font-size",
            "body-font-weight",
            "body-line-height",
        ],
        variableColorList: [
            "theme",
            "theme-rgb",
            "theme-color",
            "theme-color-rgb",
            "default",
            "default-rgb",
            "primary",
            "primary-rgb",
            "primary-bg-subtle",
            "primary-text",
            "primary-border-subtle",
            "secondary",
            "secondary-rgb",
            "secondary-bg-subtle",
            "secondary-text",
            "secondary-border-subtle",
            "success",
            "success-rgb",
            "success-bg-subtle",
            "success-text",
            "success-border-subtle",
            "warning",
            "warning-rgb",
            "warning-bg-subtle",
            "warning-text",
            "warning-border-subtle",
            "info",
            "info-rgb",
            "info-bg-subtle",
            "info-text",
            "info-border-subtle",
            "danger",
            "danger-rgb",
            "danger-bg-subtle",
            "danger-text",
            "danger-border-subtle",
            "light",
            "light-rgb",
            "light-bg-subtle",
            "light-text",
            "light-border-subtle",
            "dark",
            "dark-rgb",
            "dark-bg-subtle",
            "dark-text",
            "dark-border-subtle",
            "white",
            "white-rgb",
            "black",
            "black-rgb",
            "teal",
            "teal-rgb",
            "indigo",
            "indigo-rgb",
            "purple",
            "purple-rgb",
            "yellow",
            "yellow-rgb",
            "pink",
            "pink-rgb",
            "cyan",
            "cyan-rgb",
            "gray-100",
            "gray-200",
            "gray-300",
            "gray-400",
            "gray-500",
            "gray-600",
            "gray-700",
            "gray-800",
            "gray-900",
            "gray-100-rgb",
            "gray-200-rgb",
            "gray-300-rgb",
            "gray-400-rgb",
            "gray-500-rgb",
            "gray-600-rgb",
            "gray-700-rgb",
            "gray-800-rgb",
            "gray-900-rgb",
            "muted",
            "muted-rgb",
            "emphasis-color",
            "emphasis-color-rgb",
            "component-bg",
            "component-bg-rgb",
            "component-color",
            "component-color-rgb",
            "body-bg",
            "body-bg-rgb",
            "body-color",
            "body-color-rgb",
            "heading-color",
            "secondary-color",
            "secondary-color-rgb",
            "secondary-bg",
            "secondary-bg-rgb",
            "tertiary-color",
            "tertiary-color-rgb",
            "tertiary-bg",
            "tertiary-bg-rgb",
            "link-color",
            "link-color-rgb",
            "link-hover-color",
            "link-hover-color-rgb",
            "border-color",
            "border-color-translucent",
        ],
    },
    slideUp = function (e, t = app.animation.speed) {
        e.classList.contains("transitioning") ||
            (e.classList.add("transitioning"),
            (e.style.transitionProperty = "height, margin, padding"),
            (e.style.transitionDuration = t + "ms"),
            (e.style.boxSizing = "border-box"),
            (e.style.height = e.offsetHeight + "px"),
            e.offsetHeight,
            (e.style.overflow = "hidden"),
            (e.style.height = 0),
            (e.style.paddingTop = 0),
            (e.style.paddingBottom = 0),
            (e.style.marginTop = 0),
            (e.style.marginBottom = 0),
            window.setTimeout(() => {
                (e.style.display = "none"),
                    e.style.removeProperty("height"),
                    e.style.removeProperty("padding-top"),
                    e.style.removeProperty("padding-bottom"),
                    e.style.removeProperty("margin-top"),
                    e.style.removeProperty("margin-bottom"),
                    e.style.removeProperty("overflow"),
                    e.style.removeProperty("transition-duration"),
                    e.style.removeProperty("transition-property"),
                    e.classList.remove("transitioning");
            }, t));
    },
    slideDown = function (t, a = app.animation.speed) {
        if (!t.classList.contains("transitioning")) {
            t.classList.add("transitioning"), t.style.removeProperty("display");
            let e = window.getComputedStyle(t).display;
            "none" === e && (e = "block"), (t.style.display = e);
            var o = t.offsetHeight;
            (t.style.overflow = "hidden"),
                (t.style.height = 0),
                (t.style.paddingTop = 0),
                (t.style.paddingBottom = 0),
                (t.style.marginTop = 0),
                (t.style.marginBottom = 0),
                t.offsetHeight,
                (t.style.boxSizing = "border-box"),
                (t.style.transitionProperty = "height, margin, padding"),
                (t.style.transitionDuration = a + "ms"),
                (t.style.height = o + "px"),
                t.style.removeProperty("padding-top"),
                t.style.removeProperty("padding-bottom"),
                t.style.removeProperty("margin-top"),
                t.style.removeProperty("margin-bottom"),
                window.setTimeout(() => {
                    t.style.removeProperty("height"),
                        t.style.removeProperty("overflow"),
                        t.style.removeProperty("transition-duration"),
                        t.style.removeProperty("transition-property"),
                        t.classList.remove("transitioning");
                }, a);
        }
    },
    slideToggle = function (e, t = app.animation.speed) {
        return (
            "none" === window.getComputedStyle(e).display ? slideDown : slideUp
        )(e, t);
    },
    setCookie = function (e, t) {
        var a = new Date(),
            o = a.getTime();
        a.setTime(o + 36e6),
            (document.cookie =
                e + "=" + t + ";expires=" + a.toUTCString() + ";path=/");
    },
    getCookie = function (e) {
        var a = e + "=",
            o = decodeURIComponent(document.cookie).split(";");
        for (let t = 0; t < o.length; t++) {
            let e = o[t];
            for (; " " == e.charAt(0); ) e = e.substring(1);
            if (0 == e.indexOf(a)) return e.substring(a.length, e.length);
        }
        return "";
    },
    handleScrollbar = function () {
        "use strict";
        for (
            var e = document.querySelectorAll("[" + app.scrollBar.attr + "]"),
                t = 0;
            t < e.length;
            t++
        )
            generateScrollbar(e[t]);
    },
    generateScrollbar = function (e) {
        "use strict";
        var t;
        e.scrollbarInit ||
            (app.isMobile && e.getAttribute(app.scrollBar.skipMobileAttr)) ||
            ((t = e.getAttribute(app.scrollBar.heightAttr)
                ? e.getAttribute(app.scrollBar.heightAttr)
                : e.offsetHeight),
            (e.style.height = t),
            (e.scrollbarInit = !0),
            app.isMobile || !PerfectScrollbar
                ? (e.style.overflowX = "scroll")
                : ((t =
                      !!e.getAttribute(app.scrollBar.wheelPropagationAttr) &&
                      e.getAttribute(app.scrollBar.wheelPropagationAttr)),
                  PerfectScrollbar &&
                      (e.closest("." + app.sidebar.class)
                          ? (app.sidebar.scrollBarDom = new PerfectScrollbar(
                                e,
                                { wheelPropagation: t }
                            ))
                          : new PerfectScrollbar(e, { wheelPropagation: t }))));
    },
    handleSidebarMenuToggle = function (a) {
        a.map(function (e) {
            e.onclick = function (e) {
                e.preventDefault();
                var t = this.nextElementSibling;
                (!document.querySelector(
                    "." + app.sidebar.minify.toggledClass
                ) ||
                    window.innerWidth < 992) &&
                    (slideToggle(t),
                    a.map(function (e) {
                        e = e.nextElementSibling;
                        e !== t &&
                            (slideUp(e),
                            e
                                .closest("." + app.sidebar.menuItemClass)
                                .classList.remove(app.sidebar.menuExpandClass));
                    }),
                    (e = t.closest(
                        "." + app.sidebar.menuItemClass
                    )).classList.contains(app.sidebar.menuExpandClass)
                        ? e.classList.remove(app.sidebar.menuExpandClass)
                        : e.classList.add(app.sidebar.menuExpandClass));
            };
        });
    },
    handleSidebarMenu = function () {
        "use strict";
        var e = [].slice.call(
                document.querySelectorAll(
                    "." +
                        app.sidebar.class +
                        " ." +
                        app.sidebar.menuClass +
                        " > ." +
                        app.sidebar.menuItemClass +
                        "." +
                        app.sidebar.menuItemHasSubClass +
                        " > ." +
                        app.sidebar.menuLinkClass
                )
            ),
            e =
                (handleSidebarMenuToggle(e),
                [].slice.call(
                    document.querySelectorAll(
                        "." +
                            app.sidebar.class +
                            " ." +
                            app.sidebar.menuClass +
                            " > ." +
                            app.sidebar.menuItemClass +
                            "." +
                            app.sidebar.menuItemHasSubClass +
                            " ." +
                            app.sidebar.menuSubmenuClass +
                            " ." +
                            app.sidebar.menuItemClass +
                            "." +
                            app.sidebar.menuItemHasSubClass +
                            " > ." +
                            app.sidebar.menuLinkClass
                    )
                ));
        handleSidebarMenuToggle(e);
    },
    handleSidebarScrollMemory = function () {
        if (!app.isMobile)
            try {
                var e, t;
                "undefined" != typeof Storage &&
                    "undefined" != typeof localStorage &&
                    (e = document.querySelector(
                        "." +
                            app.sidebar.class +
                            " [" +
                            app.scrollBar.attr +
                            "]"
                    )) &&
                    ((e.onscroll = function () {
                        localStorage.setItem(
                            app.sidebar.scrollBar.localStorage,
                            this.scrollTop
                        );
                    }),
                    (t = localStorage.getItem(
                        app.sidebar.scrollBar.localStorage
                    ))) &&
                    (document.querySelector(
                        "." +
                            app.sidebar.class +
                            " [" +
                            app.scrollBar.attr +
                            "]"
                    ).scrollTop = t);
            } catch (e) {
                console.log(e);
            }
    },
    handleSidebarMinify = function () {
        var e;
        [].slice
            .call(
                document.querySelectorAll(
                    "[" + app.sidebar.minify.toggleAttr + "]"
                )
            )
            .map(function (e) {
                e.onclick = function (e) {
                    e.preventDefault();
                    e = document.querySelector("." + app.class);
                    e &&
                        (e.classList.contains(app.sidebar.minify.toggledClass)
                            ? (e.classList.remove(
                                  app.sidebar.minify.toggledClass
                              ),
                              localStorage.removeItem(
                                  app.sidebar.minify.localStorage
                              ))
                            : (e.classList.add(app.sidebar.minify.toggledClass),
                              localStorage.setItem(
                                  app.sidebar.minify.localStorage,
                                  !0
                              )));
                };
            }),
            "undefined" != typeof Storage &&
                localStorage[app.sidebar.minify.localStorage] &&
                (e = document.querySelector("." + app.class)) &&
                e.classList.add(app.sidebar.minify.toggledClass);
    },
    handleSidebarMobileToggle = function () {
        [].slice
            .call(
                document.querySelectorAll(
                    "[" + app.sidebar.mobile.toggleAttr + "]"
                )
            )
            .map(function (e) {
                e.onclick = function (e) {
                    e.preventDefault();
                    e = document.querySelector("." + app.class);
                    e &&
                        (e.classList.remove(app.sidebar.mobile.closedClass),
                        e.classList.add(app.sidebar.mobile.toggledClass));
                };
            });
    },
    handleSidebarMobileDismiss = function () {
        [].slice
            .call(
                document.querySelectorAll(
                    "[" + app.sidebar.mobile.dismissAttr + "]"
                )
            )
            .map(function (e) {
                e.onclick = function (e) {
                    e.preventDefault();
                    var t = document.querySelector("." + app.class);
                    t &&
                        (t.classList.remove(app.sidebar.mobile.toggledClass),
                        t.classList.add(app.sidebar.mobile.closedClass),
                        setTimeout(function () {
                            t.classList.remove(app.sidebar.mobile.closedClass);
                        }, app.animation.speed));
                };
            });
    },
    handleGetHiddenMenuHeight = function (e) {
        e.setAttribute(
            "style",
            "position: absolute; visibility: hidden; display: block !important"
        );
        var t = e.clientHeight;
        return e.removeAttribute("style"), t;
    },
    handleSidebarMinifyFloatMenuClick = function () {
        var e = [].slice.call(
            document.querySelectorAll(
                "." +
                    app.floatSubmenu.class +
                    " ." +
                    app.sidebar.menuItemClass +
                    "." +
                    app.sidebar.menuItemHasSubClass +
                    " > ." +
                    app.sidebar.menuLinkClass
            )
        );
        e &&
            e.map(function (e) {
                e.onclick = function (e) {
                    e.preventDefault();
                    var e = this.closest(
                            "." + app.sidebar.menuItemClass
                        ).querySelector("." + app.sidebar.menuSubmenuClass),
                        t = getComputedStyle(e),
                        u = "none" != t.getPropertyValue("display"),
                        d = "none" == t.getPropertyValue("display"),
                        a =
                            (slideToggle(e),
                            setInterval(function () {
                                var e = document.querySelector(
                                        app.floatSubmenu.id
                                    ),
                                    t = document.querySelector(
                                        app.floatSubmenu.arrow.id
                                    ),
                                    a = document.querySelector(
                                        app.floatSubmenu.line.id
                                    ),
                                    o = e.clientHeight,
                                    l = e.getBoundingClientRect(),
                                    s = e.getAttribute("data-offset-top"),
                                    n = e.getAttribute("data-menu-offset-top"),
                                    l = l.top,
                                    r = document.body.clientHeight;
                                if (
                                    (u &&
                                        s < l &&
                                        ((e.style.top =
                                            (l = s < l ? s : l) + "px"),
                                        (e.style.bottom = "auto"),
                                        (t.style.top = "20px"),
                                        (t.style.bottom = "auto"),
                                        (a.style.top = "20px"),
                                        (a.style.bottom = "auto")),
                                    d)
                                ) {
                                    r - l < o &&
                                        ((s = r - n - 22),
                                        (e.style.top = "auto"),
                                        (e.style.bottom = 0),
                                        (t.style.top = "auto"),
                                        (t.style.bottom = s + "px"),
                                        (a.style.top = "20px"),
                                        (a.style.bottom = s + "px"));
                                    var i = document.querySelector(
                                        app.floatSubmenu.id +
                                            " ." +
                                            app.floatSubmenu.class
                                    );
                                    if (r < o && i)
                                        for (
                                            var p =
                                                    app.floatSubmenu.overflow.class.split(
                                                        " "
                                                    ),
                                                c = 0;
                                            c < p.length;
                                            c++
                                        )
                                            i.classList.add(p[c]);
                                }
                            }, 1));
                    setTimeout(function () {
                        clearInterval(a);
                    }, app.animation.speed);
                };
            });
    },
    handleSidebarMinifyFloatMenu = function () {
        var e = [].slice.call(
            document.querySelectorAll(
                "." +
                    app.sidebar.class +
                    " ." +
                    app.sidebar.menuClass +
                    " > ." +
                    app.sidebar.menuItemClass +
                    "." +
                    app.sidebar.menuItemHasSubClass +
                    " > ." +
                    app.sidebar.menuLinkClass
            )
        );
        e &&
            e.map(function (e) {
                (e.onmouseenter = function () {
                    var e = document.querySelector("." + app.class);
                    if (
                        e &&
                        e.classList.contains(app.sidebar.minify.toggledClass) &&
                        992 <= window.innerWidth
                    ) {
                        clearTimeout(app.floatSubmenu.timeout);
                        var t = this.closest(
                            "." + app.sidebar.menuItemClass
                        ).querySelector("." + app.sidebar.menuSubmenuClass);
                        if (
                            app.floatSubmenu.dom != this ||
                            !document.querySelector(app.floatSubmenu.class)
                        ) {
                            app.floatSubmenu.dom = this;
                            var a = t.innerHTML;
                            if (a) {
                                var o = getComputedStyle(document.body),
                                    l = document
                                        .querySelector("." + app.sidebar.class)
                                        .getBoundingClientRect(),
                                    s = parseInt(
                                        document.querySelector(
                                            "." + app.sidebar.class
                                        ).clientWidth
                                    ),
                                    s =
                                        "rtl" != o.getPropertyValue("direction")
                                            ? l.left + s
                                            : document.body.clientWidth -
                                              l.left,
                                    l = handleGetHiddenMenuHeight(t),
                                    t = this.getBoundingClientRect().top,
                                    n =
                                        "rtl" != o.getPropertyValue("direction")
                                            ? s
                                            : "auto",
                                    o =
                                        "rtl" != o.getPropertyValue("direction")
                                            ? "auto"
                                            : s,
                                    s = document.body.clientHeight;
                                if (
                                    document.querySelector(
                                        "#" + app.floatSubmenu.id
                                    )
                                ) {
                                    var r = document.querySelector(
                                            "#" + app.floatSubmenu.id
                                        ),
                                        i = document.querySelector(
                                            "#" +
                                                app.floatSubmenu.id +
                                                " ." +
                                                app.floatSubmenu.container.class
                                        );
                                    if (s < l && i)
                                        for (
                                            var p =
                                                    app.floatSubmenu.overflow.class.split(
                                                        " "
                                                    ),
                                                c = 0;
                                            c < p.length;
                                            c++
                                        )
                                            i.classList.add(p[c]);
                                    r.setAttribute("data-offset-top", t),
                                        r.setAttribute(
                                            "data-menu-offset-top",
                                            t
                                        ),
                                        (i.innerHTML = a);
                                } else {
                                    var r = "",
                                        u =
                                            (s < l &&
                                                (r =
                                                    app.floatSubmenu.overflow
                                                        .class),
                                            document.createElement("div")),
                                        r =
                                            (u.setAttribute(
                                                "id",
                                                app.floatSubmenu.id
                                            ),
                                            u.setAttribute(
                                                "class",
                                                app.floatSubmenu.class
                                            ),
                                            u.setAttribute(
                                                "data-offset-top",
                                                t
                                            ),
                                            u.setAttribute(
                                                "data-menu-offset-top",
                                                t
                                            ),
                                            (u.innerHTML =
                                                '\t<div class="' +
                                                app.floatSubmenu.container
                                                    .class +
                                                " " +
                                                r +
                                                '">' +
                                                a +
                                                "</div>"),
                                            e.appendChild(u),
                                            document.getElementById(
                                                app.floatSubmenu.id
                                            ));
                                    (r.onmouseover = function () {
                                        clearTimeout(app.floatSubmenu.timeout);
                                    }),
                                        (r.onmouseout = function () {
                                            app.floatSubmenu.timeout =
                                                setTimeout(() => {
                                                    document
                                                        .querySelector(
                                                            "#" +
                                                                app.floatSubmenu
                                                                    .id
                                                        )
                                                        .remove();
                                                }, app.animation.speed);
                                        });
                                }
                                (l = document.querySelector(
                                    "#" + app.floatSubmenu.id
                                ).clientHeight),
                                    (i = document.querySelector(
                                        "#" + app.floatSubmenu.id
                                    ));
                                l < s - t
                                    ? i &&
                                      ((i.style.top = t + "px"),
                                      (i.style.left = n + "px"),
                                      (i.style.bottom = "auto"),
                                      (i.style.right = o + "px"))
                                    : i &&
                                      ((i.style.top = "auto"),
                                      (i.style.left = n + "px"),
                                      (i.style.bottom = 0),
                                      (i.style.right = o + "px")),
                                    handleSidebarMinifyFloatMenuClick();
                            } else
                                document
                                    .querySelector("#" + app.floatSubmenu.id)
                                    .remove(),
                                    (app.floatSubmenu.dom = "");
                        }
                    }
                }),
                    (e.onmouseleave = function () {
                        var e = document.querySelector("." + app.class);
                        e &&
                            e.classList.contains(
                                app.sidebar.minify.toggledClass
                            ) &&
                            (app.floatSubmenu.timeout = setTimeout(() => {
                                document
                                    .querySelector("#" + app.floatSubmenu.id)
                                    .remove(),
                                    (app.floatSubmenu.dom = "");
                            }, 250));
                    });
            });
    },
    handleCardAction = function () {
        "use strict";
        if (app.card.expand.status) return !1;
        app.card.expandStatus = !0;
        [].slice
            .call(
                document.querySelectorAll(
                    "[" + app.card.expand.toggleAttr + "]"
                )
            )
            .map(function (e) {
                return (
                    (e.onclick = function (e) {
                        e.preventDefault();
                        var e = this.closest("." + app.card.class),
                            t = app.card.expand.class;
                        document.body.classList.contains(t) &&
                        e.classList.contains(t)
                            ? (e.removeAttribute("style"),
                              e.classList.remove(t),
                              document.body.classList.remove(t))
                            : (document.body.classList.add(t),
                              e.classList.add(t)),
                            window.dispatchEvent(new Event("resize"));
                    }),
                    new bootstrap.Tooltip(e, {
                        title: app.card.expand.tooltipText,
                        placement: "bottom",
                        trigger: "hover",
                        container: "body",
                    })
                );
            });
    },
    handelTooltipPopoverActivation = function () {
        "use strict";
        [].slice
            .call(document.querySelectorAll("[" + app.tooltip.toggleAttr + "]"))
            .map(function (e) {
                return new bootstrap.Tooltip(e);
            }),
            [].slice
                .call(
                    document.querySelectorAll(
                        "[" + app.popover.toggleAttr + "]"
                    )
                )
                .map(function (e) {
                    return new bootstrap.Popover(e);
                });
    },
    handleScrollToTopButton = function () {
        "use strict";
        var a = [].slice.call(
            document.querySelectorAll(
                "[" + app.scrollTopButton.toggleAttr + "]"
            )
        );
        (document.onscroll = function () {
            var e = document.documentElement,
                t = (window.pageYOffset || e.scrollTop) - (e.clientTop || 0);
            a.map(function (e) {
                200 <= t
                    ? e.classList.contains(app.scrollTopButton.showClass) ||
                      e.classList.add(app.scrollTopButton.showClass)
                    : e.classList.remove(app.scrollTopButton.showClass);
            });
        }),
            a.map(function (e) {
                e.onclick = function (e) {
                    e.preventDefault(),
                        window.scrollTo({ top: 0, behavior: "smooth" });
                };
            });
    },
    handleScrollTo = function () {
        [].slice
            .call(
                document.querySelectorAll("[" + app.scrollTo.toggleAttr + "]")
            )
            .map(function (a) {
                a.onclick = function (e) {
                    e.preventDefault();
                    var e = a.getAttribute(app.scrollTo.targetAttr)
                            ? this.getAttribute(app.scrollTo.targetAttr)
                            : this.getAttribute("href"),
                        e = document.querySelectorAll(e)[0],
                        t = document.querySelectorAll("." + app.header.class)[0]
                            .offsetHeight;
                    e &&
                        ((e = e.offsetTop - t + 36),
                        window.scrollTo({ top: e, behavior: "smooth" }));
                };
            });
    },
    handleThemePanelExpand = function () {
        var e;
        [].slice
            .call(
                document.querySelectorAll("[" + app.themePanel.toggleAttr + "]")
            )
            .map(function (e) {
                e.onclick = function (e) {
                    e.preventDefault();
                    e = document.querySelector("." + app.themePanel.class);
                    e.classList.contains(app.themePanel.activeClass)
                        ? (e.classList.remove(app.themePanel.activeClass),
                          setCookie(app.themePanel.expandCookie, ""))
                        : (e.classList.add(app.themePanel.activeClass),
                          setCookie(
                              app.themePanel.expandCookie,
                              app.themePanel.expandCookieValue
                          ));
                };
            }),
            getCookie(app.themePanel.expandCookie) &&
                getCookie(app.themePanel.expandCookie) ==
                    app.themePanel.expandCookieValue &&
                (e = document.querySelector(
                    "[" + app.themePanel.toggleAttr + "]"
                )) &&
                e.click();
    },
    handleThemePageControl = function () {
        var e;
        [].slice
            .call(
                document.querySelectorAll(
                    "." +
                        app.themePanel.themeList.class +
                        " [" +
                        app.themePanel.themeList.toggleAttr +
                        "]"
                )
            )
            .map(function (o) {
                o.onclick = function () {
                    for (
                        var e = this.getAttribute(
                                app.themePanel.themeList.toggleAttr
                            ),
                            t = 0;
                        t < document.body.classList.length;
                        t++
                    ) {
                        var a = document.body.classList[t];
                        -1 < a.search("theme-") &&
                            document.body.classList.remove(a);
                    }
                    e && document.body.classList.add(e),
                        [].slice
                            .call(
                                document.querySelectorAll(
                                    "." +
                                        app.themePanel.themeList.class +
                                        " [" +
                                        app.themePanel.themeList.toggleAttr +
                                        "]"
                                )
                            )
                            .map(function (e) {
                                e != o
                                    ? e
                                          .closest("li")
                                          .classList.remove(
                                              app.themePanel.themeList
                                                  .activeClass
                                          )
                                    : e
                                          .closest("li")
                                          .classList.add(
                                              app.themePanel.themeList
                                                  .activeClass
                                          );
                            }),
                        handleCssVariable(),
                        setCookie(app.themePanel.themeList.cookieName, e),
                        document.dispatchEvent(
                            new CustomEvent(
                                app.themePanel.themeList.onChangeEvent
                            )
                        );
                };
            }),
            getCookie(app.themePanel.themeList.cookieName) &&
                document.querySelector("." + app.themePanel.themeList.class) &&
                (e = document.querySelector(
                    "." +
                        app.themePanel.themeList.class +
                        " [" +
                        app.themePanel.themeList.toggleAttr +
                        '="' +
                        getCookie(app.themePanel.themeList.cookieName) +
                        '"]'
                )) &&
                e.click(),
            [].slice
                .call(
                    document.querySelectorAll(
                        "." +
                            app.themePanel.class +
                            ' [name="' +
                            app.themePanel.darkMode.inputName +
                            '"]'
                    )
                )
                .map(function (e) {
                    e.onchange = function () {
                        var e = "";
                        this.checked
                            ? (document.documentElement.setAttribute(
                                  "data-bs-theme",
                                  "dark"
                              ),
                              (e = "dark-mode"))
                            : document.documentElement.removeAttribute(
                                  "data-bs-theme"
                              ),
                            handleCssVariable(),
                            setCookie(app.themePanel.darkMode.cookieName, e),
                            document.dispatchEvent(
                                new CustomEvent(
                                    app.themePanel.themeList.onChangeEvent
                                )
                            );
                    };
                }),
            getCookie(app.themePanel.darkMode.cookieName) &&
                document.querySelector(
                    "." +
                        app.themePanel.class +
                        ' [name="' +
                        app.themePanel.darkMode.inputName +
                        '"]'
                ) &&
                (e = document.querySelector(
                    "." +
                        app.themePanel.class +
                        ' [name="' +
                        app.themePanel.darkMode.inputName +
                        '"]'
                )) &&
                ((e.checked = !0), e.onchange());
    },
    handleCssVariable = function () {
        var e = getComputedStyle(document.body);
        if (app.variableFontList && app.variablePrefix)
            for (var t = 0; t < app.variableFontList.length; t++)
                app.font[
                    app.variableFontList[t].replace(/-([a-z|0-9])/g, (e, t) =>
                        t.toUpperCase()
                    )
                ] = e
                    .getPropertyValue(
                        "--" + app.variablePrefix + app.variableFontList[t]
                    )
                    .trim();
        if (app.variableColorList && app.variablePrefix)
            for (t = 0; t < app.variableColorList.length; t++)
                app.color[
                    app.variableColorList[t].replace(/-([a-z|0-9])/g, (e, t) =>
                        t.toUpperCase()
                    )
                ] = e
                    .getPropertyValue(
                        "--" + app.variablePrefix + app.variableColorList[t]
                    )
                    .trim();
    },
    handleToggleClass = function () {
        [].slice
            .call(
                document.querySelectorAll(
                    "[" + app.toggleClass.toggleAttr + "]"
                )
            )
            .map(function (e) {
                e.onclick = function (e) {
                    e.preventDefault();
                    var e = this.getAttribute(app.toggleClass.toggleAttr),
                        t = this.getAttribute(app.dismissClass.toggleAttr),
                        a = document.querySelector(
                            this.getAttribute(app.toggleClass.targetAttr)
                        );
                    t && (a.classList.contains(e) || a.classList.contains(t))
                        ? (a.classList.contains(e)
                              ? a.classList.remove(e)
                              : a.classList.add(e),
                          a.classList.contains(t)
                              ? a.classList.remove(t)
                              : a.classList.add(t))
                        : a.classList.contains(e)
                        ? a.classList.remove(e)
                        : a.classList.add(e);
                };
            });
    },
    handleUnlimitedTopNavRender = function () {
        "use strict";
        function t(e, t) {
            var a = e.closest("." + app.topNav.menu.class),
                e = window.getComputedStyle(a),
                o = window.getComputedStyle(document.querySelector("body")),
                l =
                    "rtl" == o.getPropertyValue("direction")
                        ? "margin-right"
                        : "margin-left",
                s = parseInt(e.getPropertyValue(l)),
                n =
                    document.querySelector("." + app.topNav.class).clientWidth -
                    2 *
                        document.querySelector("." + app.topNav.class)
                            .clientHeight,
                r = 0,
                i = 0,
                e = a.querySelector(".menu-control-start"),
                l = e ? e.clientWidth : 0,
                p = a.querySelector(".menu-control-end"),
                c = l + (e ? p.clientWidth : 0),
                l = [].slice.call(
                    a.querySelectorAll("." + app.topNav.menu.itemClass)
                );
            switch (
                (l &&
                    l.map(function (e) {
                        e.classList.contains(app.topNav.control.class) ||
                            (r += e.clientWidth);
                    }),
                t)
            ) {
                case "next":
                    (u = r + s - n) <= n
                        ? ((i = u - s - c),
                          setTimeout(function () {
                              a.querySelector(
                                  "." +
                                      app.topNav.control.class +
                                      "." +
                                      app.topNav.control.buttonNext.class
                              ).classList.remove("show");
                          }, app.animation.speed))
                        : (i = n - s - c),
                        0 !== i &&
                            ((a.style.transitionProperty =
                                "height, margin, padding"),
                            (a.style.transitionDuration =
                                app.animation.speed + "ms"),
                            "rtl" != o.getPropertyValue("direction")
                                ? (a.style.marginLeft = "-" + i + "px")
                                : (a.style.marginRight = "-" + i + "px"),
                            setTimeout(function () {
                                (a.style.transitionProperty = ""),
                                    (a.style.transitionDuration = ""),
                                    a
                                        .querySelector(
                                            "." +
                                                app.topNav.control.class +
                                                "." +
                                                app.topNav.control.buttonPrev
                                                    .class
                                        )
                                        .classList.add("show");
                            }, app.animation.speed));
                    break;
                case "prev":
                    var u,
                        i =
                            (u = -s) <= n
                                ? (a
                                      .querySelector(
                                          "." +
                                              app.topNav.control.class +
                                              "." +
                                              app.topNav.control.buttonPrev
                                                  .class
                                      )
                                      .classList.remove("show"),
                                  0)
                                : u - n + c;
                    (a.style.transitionProperty = "height, margin, padding"),
                        (a.style.transitionDuration =
                            app.animation.speed + "ms"),
                        "rtl" != o.getPropertyValue("direction")
                            ? (a.style.marginLeft = "-" + i + "px")
                            : (a.style.marginRight = "-" + i + "px"),
                        setTimeout(function () {
                            (a.style.transitionProperty = ""),
                                (a.style.transitionDuration = ""),
                                a
                                    .querySelector(
                                        "." +
                                            app.topNav.control.class +
                                            "." +
                                            app.topNav.control.buttonNext.class
                                    )
                                    .classList.add("show");
                        }, app.animation.speed);
            }
        }
        function a() {
            var e,
                t,
                a,
                o,
                l,
                s,
                n,
                r,
                i = document.querySelector(
                    "." + app.topNav.class + " ." + app.topNav.menu.class
                );
            i &&
                ((t = window.getComputedStyle(i)),
                (r =
                    "rtl" ==
                    (e = window.getComputedStyle(
                        document.body
                    )).getPropertyValue("direction")
                        ? "margin-right"
                        : "margin-left"),
                parseInt(t.getPropertyValue(r)),
                (t = document.querySelector(
                    "." + app.topNav.class
                ).clientWidth),
                (o = a = 0),
                (r = i.querySelector(".menu-control-start")) && r.clientWidth,
                (l = i.querySelector(".menu-control-end")),
                (r = r ? l.clientWidth : 0),
                (l = 0),
                (n = [].slice.call(
                    document.querySelectorAll(
                        "." +
                            app.topNav.class +
                            " ." +
                            app.topNav.menu.class +
                            " > ." +
                            app.topNav.menu.itemClass
                    )
                )) &&
                    ((s = !1),
                    n.map(function (e) {
                        e.classList.contains("menu-control") ||
                            ((o += e.clientWidth),
                            s || (a += e.clientWidth),
                            e.classList.contains("active") && (s = !0));
                    })),
                (n = i.querySelector(
                    "." +
                        app.topNav.control.class +
                        "." +
                        app.topNav.control.buttonNext.class
                )),
                a != o && t <= o
                    ? (n.classList.add(app.topNav.control.showClass), (l += r))
                    : n.classList.remove(app.topNav.control.showClass),
                (n = i.querySelector(
                    "." +
                        app.topNav.control.class +
                        "." +
                        app.topNav.control.buttonPrev.class
                )),
                t <= a && t <= o
                    ? n.classList.add(app.topNav.control.showClass)
                    : n.classList.remove(app.topNav.control.showClass),
                t <= a) &&
                ((r = a - t + l),
                "rtl" != e.getPropertyValue("direction")
                    ? (i.style.marginLeft = "-" + r + "px")
                    : (i.style.marginRight = "-" + r + "px"));
        }
        var e = document.querySelector(
            "[" + app.topNav.control.buttonNext.toggleAttr + "]"
        );
        function o(e) {
            const n = document.querySelector(e);
            if (n) {
                const r = n.querySelector(".menu");
                e = r.querySelectorAll(".menu-item:not(.menu-control)");
                let t,
                    a,
                    o,
                    l = 0,
                    s = 0;
                e.forEach((e) => {
                    l += e.offsetWidth;
                }),
                    n.addEventListener("mousedown", (e) => {
                        (o = !0),
                            (t = e.pageX),
                            (a = r.style.marginLeft
                                ? parseInt(r.style.marginLeft)
                                : 0),
                            (s = n.offsetWidth - l);
                    }),
                    n.addEventListener("touchstart", (e) => {
                        o = !0;
                        e = e.targetTouches[0];
                        (t = e.pageX),
                            (a = r.style.marginLeft
                                ? parseInt(r.style.marginLeft)
                                : 0),
                            (s = n.offsetWidth - l);
                    }),
                    n.addEventListener("mouseup", () => {
                        o = !1;
                    }),
                    n.addEventListener("touchend", () => {
                        o = !1;
                    }),
                    n.addEventListener("mousemove", (e) => {
                        t &&
                            o &&
                            (window.innerWidth < 992 ||
                                (e.preventDefault(),
                                (e = e.pageX - t),
                                (e = a + e) <= s
                                    ? ((e = s),
                                      r
                                          .querySelector(
                                              "." +
                                                  app.topNav.control.class +
                                                  "." +
                                                  app.topNav.control.buttonNext
                                                      .class
                                          )
                                          .classList.remove("show"))
                                    : r
                                          .querySelector(
                                              "." +
                                                  app.topNav.control.class +
                                                  "." +
                                                  app.topNav.control.buttonNext
                                                      .class
                                          )
                                          .classList.add("show"),
                                l < n.offsetWidth &&
                                    r
                                        .querySelector(
                                            "." +
                                                app.topNav.control.class +
                                                "." +
                                                app.topNav.control.buttonPrev
                                                    .class
                                        )
                                        .classList.remove("show"),
                                0 < s &&
                                    r
                                        .querySelector(
                                            "." +
                                                app.topNav.control.class +
                                                "." +
                                                app.topNav.control.buttonNext
                                                    .class
                                        )
                                        .classList.remove("show"),
                                0 < e
                                    ? ((e = 0),
                                      r
                                          .querySelector(
                                              "." +
                                                  app.topNav.control.class +
                                                  "." +
                                                  app.topNav.control.buttonPrev
                                                      .class
                                          )
                                          .classList.remove("show"))
                                    : r
                                          .querySelector(
                                              "." +
                                                  app.topNav.control.class +
                                                  "." +
                                                  app.topNav.control.buttonPrev
                                                      .class
                                          )
                                          .classList.add("show"),
                                (r.style.marginLeft = e + "px")));
                    }),
                    n.addEventListener("touchmove", (e) => {
                        t &&
                            o &&
                            (window.innerWidth < 992 ||
                                (e.preventDefault(),
                                (e = e.targetTouches[0].pageX - t),
                                (e = a + e) <= s
                                    ? ((e = s),
                                      r
                                          .querySelector(
                                              "." +
                                                  app.topNav.control.class +
                                                  "." +
                                                  app.topNav.control.buttonNext
                                                      .class
                                          )
                                          .classList.remove("show"))
                                    : r
                                          .querySelector(
                                              "." +
                                                  app.topNav.control.class +
                                                  "." +
                                                  app.topNav.control.buttonNext
                                                      .class
                                          )
                                          .classList.add("show"),
                                l < n.offsetWidth &&
                                    r
                                        .querySelector(
                                            "." +
                                                app.topNav.control.class +
                                                "." +
                                                app.topNav.control.buttonPrev
                                                    .class
                                        )
                                        .classList.remove("show"),
                                0 < s &&
                                    r
                                        .querySelector(
                                            "." +
                                                app.topNav.control.class +
                                                "." +
                                                app.topNav.control.buttonNext
                                                    .class
                                        )
                                        .classList.remove("show"),
                                0 < e
                                    ? ((e = 0),
                                      r
                                          .querySelector(
                                              "." +
                                                  app.topNav.control.class +
                                                  "." +
                                                  app.topNav.control.buttonPrev
                                                      .class
                                          )
                                          .classList.remove("show"))
                                    : r
                                          .querySelector(
                                              "." +
                                                  app.topNav.control.class +
                                                  "." +
                                                  app.topNav.control.buttonPrev
                                                      .class
                                          )
                                          .classList.add("show"),
                                (r.style.marginLeft = e + "px")));
                    });
            }
        }
        e &&
            (e.onclick = function (e) {
                e.preventDefault(), t(this, "next");
            }),
            (e = document.querySelector(
                "[" + app.topNav.control.buttonPrev.toggleAttr + "]"
            )) &&
                (e.onclick = function (e) {
                    e.preventDefault(), t(this, "prev");
                }),
            window.addEventListener("resize", function () {
                var e;
                992 <= window.innerWidth &&
                    ((e = document.querySelector("." + app.topNav.class)) &&
                        e.removeAttribute("style"),
                    (e = document.querySelector(
                        "." + app.topNav.class + " ." + app.topNav.menu.class
                    )) && e.removeAttribute("style"),
                    (e = document.querySelectorAll(
                        "." +
                            app.topNav.class +
                            " ." +
                            app.topNav.menu.submenu.class
                    )) &&
                        e.forEach((e) => {
                            e.removeAttribute("style");
                        }),
                    a()),
                    o("." + app.topNav.class);
            }),
            992 <= window.innerWidth && (a(), o("." + app.topNav.class));
    },
    handleTopNavToggle = function (a, o = !1) {
        a.map(function (e) {
            e.onclick = function (e) {
                var t;
                e.preventDefault(),
                    (!o || document.body.clientWidth < 992) &&
                        ((t = this.nextElementSibling),
                        a.map(function (e) {
                            e = e.nextElementSibling;
                            e !== t &&
                                (slideUp(e),
                                e
                                    .closest("." + app.topNav.menu.itemClass)
                                    .classList.remove(
                                        app.topNav.menu.expandClass
                                    ),
                                e
                                    .closest("." + app.topNav.menu.itemClass)
                                    .classList.add(
                                        app.topNav.menu.closedClass
                                    ));
                        }),
                        slideToggle(t));
            };
        });
    },
    handleTopNavSubMenu = function () {
        "use strict";
        var e =
                "." +
                app.topNav.class +
                " ." +
                app.topNav.menu.class +
                " > ." +
                app.topNav.menu.itemClass +
                "." +
                app.topNav.menu.hasSubClass,
            t =
                " > ." +
                app.topNav.menu.submenu.class +
                " > ." +
                app.topNav.menu.itemClass +
                "." +
                app.topNav.menu.hasSubClass,
            a = e + " > ." + app.topNav.menu.itemLinkClass,
            a = [].slice.call(document.querySelectorAll(a));
        handleTopNavToggle(a, !0);
        a = [].slice.call(
            document.querySelectorAll(
                e + t + " > ." + app.topNav.menu.itemLinkClass
            )
        );
        handleTopNavToggle(a);
        a = [].slice.call(
            document.querySelectorAll(
                e + t + t + " > ." + app.topNav.menu.itemLinkClass
            )
        );
        handleTopNavToggle(a);
    },
    handleTopNavMobileToggle = function () {
        "use strict";
        var e = document.querySelector(
            "[" + app.topNav.mobile.toggleAttr + "]"
        );
        e &&
            (e.onclick = function (e) {
                e.preventDefault(),
                    slideToggle(document.querySelector("." + app.topNav.class)),
                    window.scrollTo(0, 0);
            });
    },
    App = (function () {
        "use strict";
        return {
            init: function () {
                this.initComponent(), this.initSidebar(), this.initTopNav();
            },
            initSidebar: function () {
                handleSidebarScrollMemory(),
                    handleSidebarMinifyFloatMenu(),
                    handleSidebarMenu(),
                    handleSidebarMinify(),
                    handleSidebarMobileToggle(),
                    handleSidebarMobileDismiss();
            },
            initTopNav: function () {
                handleUnlimitedTopNavRender(),
                    handleTopNavSubMenu(),
                    handleTopNavMobileToggle();
            },
            initComponent: function () {
                handleScrollbar(),
                    handleCardAction(),
                    handelTooltipPopoverActivation(),
                    handleScrollToTopButton(),
                    handleScrollTo(),
                    handleThemePanelExpand(),
                    handleThemePageControl(),
                    handleCssVariable(),
                    handleToggleClass();
            },
            scrollTop: function () {
                window.scrollTo({ top: 0, behavior: "smooth" });
            },
        };
    })();

document.addEventListener("livewire:navigated", function () {
    App.init();
});
