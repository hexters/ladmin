import axios from "axios";

class Ladmin {

    constructor() {
        setTimeout(() => this.dashboardBreadcrumb(), 100);
        this.menuToggleStatus();
    }

    /**
     * Find active menu in sidebar
     * @param {Document} el 
     * @returns void
     */
    activeMenuSidebar(el) {
        if (!el) {
            return;
        }
        let parent = el.parentNode;

        if (parent.classList.contains('menu-sidebar')) {
            return;
        }

        if (parent.nodeName === 'LI') {
            parent.classList.add('show');
        }

        this.activeMenuSidebar(parent);
    }

    /**
     * Add caret submenu
     */
    addMenuCarets() {
        let els = document.querySelectorAll('.has-submenu');
        els.forEach((el, i) => {
            let caret = document.createElement('i');

            if (el.classList.contains('show')) {
                caret.classList.add('fa-caret-down');
            } else {
                caret.classList.add('fa-caret-right');
            }
            caret.classList.add('menu-caret');
            caret.classList.add('fa');
            caret.classList.add('fa-solid');
            let anchor = el.querySelector('a');
            anchor.appendChild(caret);
        });
    }


    /**
     * Add caret to spesific menu
     * @param {String} el 
     */
    updateMenuCaret(el) {
        let caret = document.createElement('i');
        if (el.classList.contains('show')) {
            caret.classList.add('fa-caret-down');
        } else {
            caret.classList.add('fa-caret-right');
        }
        caret.classList.add('menu-caret');
        caret.classList.add('fa');
        caret.classList.add('fa-solid');
        let anchor = el.querySelector('a');
        if (anchor) {
            anchor.querySelector('.menu-caret').remove();
            anchor.appendChild(caret);
        }
    }

    /**
     * Add notification badge
     * @param {String} id 
     * @param {String} value 
     */
    addMenuBadge(id, value) {
        let el = document.querySelector(`#${id}`);
        console.log(el);
        let badge = document.createElement('span');
        badge.classList.add('badge');
        badge.classList.add('bg-danger');
        badge.classList.add('rounded-pill');
        badge.classList.add('text-white');
        badge.classList.add('menu-badge');
        badge.innerHTML = value;
        let anchor = el.querySelector('a');
        anchor.appendChild(badge);
    }

    /**
     * Click sidebar menu event
     */
    clickHasSubmenu() {
        let menus = document.querySelectorAll('.has-submenu > a');
        menus.forEach((el) => {
            el.addEventListener('click', (ev) => {
                ev.preventDefault();

                let parent = ev.target.parentNode;

                let show = document.querySelector('.show');
                if (!(parent === show)) {
                    if (show) {
                        show.classList.remove('show');
                        this.updateMenuCaret(show);
                    }
                }

                if (parent.classList.contains('show')) {
                    parent.classList.remove('show');
                    this.updateMenuCaret(parent);
                } else {
                    parent.classList.add('show');
                    this.updateMenuCaret(parent);
                }

                this.activeMenuSidebar(parent);

            });
        });
    }

    /**
     * Create breadcrumb reference by active menu
     * @param {Document} el 
     * @returns 
     */
    breadcrumb(el) {

        if (!el) {
            return;
        }

        let parent = el.parentNode;

        if (parent.classList.contains('menu-sidebar')) {
            return;
        }

        let li = document.createElement('li');
        li.classList.add('breadcrumb-item');

        if (parent.nodeName === 'LI' && !el.classList.contains('active')) {
            let anchor = parent.querySelector('a');
            let title = anchor.querySelector('.title');
            let a = document.createElement('a');
            a.href = anchor.getAttribute('href');
            a.innerText = title.textContent;
            if (!(title.textContent === 'Home')) {
                li.append(a);
            }

            this.addBreadcrumb(li);
        }

        if (el.classList.contains('active')) {
            let item = el.querySelector('a > .title');
            li.classList.add('active');
            li.innerText = item.textContent;
            if (!(item.textContent === 'Home')) {
                this.addBreadcrumb(li);
            }
        }


        this.breadcrumb(parent);

    }

    /**
     * Prepend to breadcrumb
     * @param {*} el 
     */
    addBreadcrumb(el) {
        let breadcrumb = document.querySelector('.breadcrumb');
        breadcrumb.prepend(el);
    }

    /**
     * Add dashboard item
     */
    dashboardBreadcrumb() {
        let li = document.createElement('li');
        li.classList.add('breadcrumb-item');
        let a = document.createElement('a');
        a.setAttribute('href', document.querySelector('[name="url-home"]').getAttribute('content'));
        a.innerText = 'Home';
        li.append(a);
        this.addBreadcrumb(li);
    }

    /**
     * Toggle menu event
     */
    toggleMenu() {
        let ladmin = document.querySelector('.ladmin');
        let state = false;
        if (ladmin.classList.contains('toggle-menu')) {
            ladmin.classList.remove('toggle-menu');
            state = false;
        } else {
            ladmin.classList.add('toggle-menu');
            state = true;
        }

        localStorage.setItem('ladmin-menu-toggle', state);
    }

    /**
     * Status toggle menu
     */
    menuToggleStatus() {
        let toggleMenu = localStorage.getItem('ladmin-menu-toggle');
        let width = window.innerWidth;
        if ([true, 'true', "true"].indexOf(toggleMenu) > -1 && width > 600) {
            let mainLadminClass = document.querySelector('.ladmin');
            mainLadminClass.classList.add('toggle-menu');
        }
    }

    /**
     * Make a notification badge
     */
    notificationBadge() {
        let notifications = document.querySelectorAll('.notification-list-item');
        let span = document.createElement('span');
        let classes = ('position-absolute top-0 start-10 translate-middle badge rounded-pill bg-danger').split(' ');
        classes.forEach(_class => {
            span.classList.add(_class);
        });
        span.innerText = notifications.length > 9 ? '9+' : notifications.length;

        if (notifications.length > 0) {
            let bell = document.querySelector('.notification-bell');
            bell.appendChild(span);
        }
    }

    datatables() {
        let ladmiDatatables = document.querySelectorAll('.ladmin-datatables');
        ladmiDatatables.forEach((el) => {
            let options = el.getAttribute('data-options');
            options = JSON.parse(options);
            $(el).DataTable({
                language: {
                    search: '',
                    searchPlaceholder: 'Search...'
                },
                ...options
            });
        });
    }

    toggleClickPermissions() {
        let inputs = document.querySelectorAll('#ladmin-permission-list input');
        inputs.forEach((el) => {
            el.addEventListener('click', (ev) => {
                this.checkChildPermission(el.parentNode.parentNode.parentNode, ev.target.checked);
                this.checkParentPermission(el, ev.target.checked);
            });
        });
    }

    checkChildPermission(el, state) {
        if (el.classList.contains('has-sub') || el.classList.contains('has-permission')) {
            console.log(el, state);
            let inputs = el.querySelectorAll('ul input');
            inputs.forEach(el => {
                el.checked = state;
            });
        }
    }

    checkParentPermission(el, state) {
        if (el.parentNode.id === 'ladmin-permission-list') {
            return;
        }

        let parent = el.parentNode;


        this.checkParentPermission(parent, state);

        if (!(parent.nodeName === 'LI')) {
            return;
        }

        if (!state) {
            return;
        }

        let input = parent.querySelector('input');
        if (input) {
            input.checked = state;
        }

    }

    permissionSelectDiselectAll() {
        let inputs = document.querySelectorAll('#ladmin-permission-list input');

        if (inputs.length === 0) {
            return;
        }

        let state = inputs[0].checked;
        inputs.forEach(el => {
            el.checked = !state;
        });
    }

    globalSearchListener() {
        let inputSearch = document.querySelector('#ladmin-group-search-input');
        let list = document.querySelector('#ladmin-group-search-results');
        list.innerHTML = 'Enter a search term to find results.';
        inputSearch.addEventListener('input', (ev) => {
            let route = inputSearch.parentElement.parentElement.getAttribute('data-route');
            if (ev.target.value) {
                list.innerHTML = 'Searching...';
                $.get(`${route}?search=${ev.target.value}`, (result) => {
                    list.innerHTML = result;
                });
            } else {
                list.innerHTML = 'Enter a search term to find results.';
            }
        });
    }

    loadAjaxComponent() {

        let ajaxs = document.querySelectorAll('[data-role="ajax"]');
        ajaxs.forEach(async (el) => {
            let ajax = el.getAttribute('data-route')
            if (ajax) {
                let response = await fetch(ajax).then(data => data.text());
                el.innerHTML = response;
            }
        });

    }

}

export default new Ladmin;