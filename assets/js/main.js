jQuery(document).ready(function ($) {
    const mql = window.matchMedia("(min-width: 800px)");

    //header line show/hide to scroll
    var lastScroll = 0;
    const headerLine = $('.header__line');
    const headerLogoWrapper = $('.header__logo__wrapper');

    const toggleScrollHandler = (mql) => {
        if (mql.matches) {
            window.addEventListener('scroll', handleScrollPC);
        } else {
            window.addEventListener('scroll', handleScrollMobile);
        }
    };

    const handleScrollPC = () => {
        let scrollTop = window.scrollY;
        if (scrollTop > lastScroll) {
            headerLine.css('transform', 'translateY(0)');
        } else {
            headerLine.css('transform', 'translateY(-300px)');
        }
    };

    const handleScrollMobile = () => {
        let scrollTop = window.scrollY;
        if (scrollTop > lastScroll) {
            headerLine.addClass('header__background');
            headerLogoWrapper.addClass('header__logo__hide');
        } else {
            headerLine.removeClass('header__background');
            headerLogoWrapper.removeClass('header__logo__hide');
        }
    }

    toggleScrollHandler(mql);

    mql.addEventListener('scroll', toggleScrollHandler);

    class modalWindow {
        constructor(modalTrigger) {
            this.modalTrigger = $(modalTrigger);
            this.mainBox = this.modalTrigger.parent();
            this.modalWrapper = this.mainBox.find('[modal_wrapper]');
            this.modalCloser = this.modalWrapper.find('[closer]');
            this.modalMask = this.modalWrapper.find('[mask]');

            this.triggerHideModal = [this.modalCloser, this.modalMask];

            this.addOnClick(this.modalTrigger, () => this.modalShow());
            this.addHideTriggers(this.triggerHideModal);
        }

        addOnClick(obj, callback) {
            if (Array.isArray(obj)) {
                obj.forEach((currentObj) => {
                    currentObj.on('click', callback);
                });
            } else {
                obj.on('click', callback);
            }
        }

        addHideTriggers(trigger) {
            if (Array.isArray(trigger)) {
                trigger.forEach((currentObj) => {
                    this.triggerHideModal.push(currentObj);
                })
            } else {
                this.triggerHideModal.push(trigger);
            }
            this.addOnClick(trigger, () => this.modalHide());
        }

        modalShow() {
            this.modalWrapper.animate({ top: '0vh' }, 500);
        }

        modalHide() {
            this.modalWrapper.animate({ top: '-100dvh' }, 500);
        }
    }

    const menuModalTrigger = new modalWindow('.burger__menu');

    //added trigers menu items
    const triggersMenuItems = () => {
        menuModalTrigger.addHideTriggers($('.header__menu__items__box').find('.header__menu__item'));
    }
    triggersMenuItems();

    class Advantages {
        constructor(collection) {
            this.collection = collection;
            this.firstItem = this.collection.first();

            this.setCarousel();
            this.addListeners();
        }

        getActiveItem() {
            let activeItem = this.collection.filter('.adv__active');
            if (activeItem.length) {
                return activeItem;
            } else {
                return activeItem = null;
            }
        }

        setActiveItem(obj) {
            obj.addClass('adv__active');
        }

        nextItem() {
            if (this.getActiveItem()) {
                return this.getActiveItem().next();
            } else {
                return null;
            }
        }

        removeActiveClass() {
            this.getActiveItem().removeClass('adv__active');
        }

        addListeners() {
            this.collection.on('mouseenter', (event) => {
                clearInterval(this.intervalID);
                this.removeActiveClass();
                this.setActiveItem($(event.currentTarget));
            })
            this.collection.on('mouseleave', (event) => {
                this.setCarousel();
            })
        }

        setCarousel() {
            this.intervalID = setInterval(() => {
                let newActiveItem = this.nextItem();
                this.removeActiveClass();
                if (newActiveItem.length) {
                    this.setActiveItem(newActiveItem);
                } else {
                    this.setActiveItem(this.firstItem);
                }
            }, 3500);
        }
    }
    if(mql.matches){
        const collectionAdv = new Advantages($('.advantages__block').find('.advantages__item'));
    }
});