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

    class Advantages {
        constructor(collection){
            
            
        }

        getActiveItem (collection) {
            return collection.filter('.adv__active');
        }

        getAnimatedEl(obj){
            let animatedElements = {};

            animatedElements["item"] = obj;
            animatedElements["lightbulb"] = obj.find('img');
            animatedElements["rays"] = obj.find('.rays__box').find('.ray');
            animatedElements["content_box"] = obj.find('.advantages__item__content__box');
            
            return animatedElements;
        }

        getClassesToAnimate(){
            let animatedClasses = {};

            animatedElements["item"] = 'adv__active';
            animatedElements["lightbulb"] = 'lightbulb__active';
            animatedElements["rays"] = 'ray__active';
            animatedElements["content_box"] = 'content__box__active';

            return animatedClasses;
        }
    }
    const collectionAdv = new Advantages($('.advantages__block').find('.advantages__item'));

    //header line show/hide to scroll
    var lastScroll = 0;
    const headerLine = $('.header__line');
    const headerLogoWrapper = $('.header__logo__wrapper');
    const mql = window.matchMedia("(min-width: 800px)");

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

    mql.addEventListener('scroll',toggleScrollHandler);
});