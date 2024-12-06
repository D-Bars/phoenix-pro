jQuery(document).ready(function ($) {

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

    //header line show/hide to scroll
    var lastScroll = 0;
    const headerLine = $('#header__line');
    const mql = window.matchMedia("(min-width: 800px)");

    const toggleScrollHandler = (mql) => {
        if (mql.matches) {
            window.addEventListener('scroll', handleScroll);
        } else {
            window.removeEventListener('scroll', handleScroll);
        }
    };

    const handleScroll = () => {
        let scrollTop = window.scrollY;
        if (scrollTop > lastScroll) {
            headerLine.css('transform', 'translateY(0)');
        } else {
            headerLine.css('transform', 'translateY(-300px)');
        }
    };

    toggleScrollHandler(mql);

    mql.addEventListener('scroll',toggleScrollHandler);
});