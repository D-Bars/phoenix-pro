jQuery(document).ready(function($) {

class modalWindow{
    constructor(modalTrigger){
        this.modalTrigger = $(modalTrigger);
        this.mainBox = this.modalTrigger.parent();
        this.modalWrapper = this.mainBox.find('[modal_wrapper]');
        this.modalCloser = this.modalWrapper.find('[closer]');
        this.modalMask = this.modalWrapper.find('[mask]');

        this.triggerHideModal = [this.modalCloser, this.modalMask];

        this.addOnClick(this.modalTrigger, () => this.modalShow());
        this.addHideTriggers(this.triggerHideModal);
    }

    addOnClick(obj, callback){
        if(Array.isArray(obj)){
            obj.forEach((currentObj)=>{
                currentObj.on('click', callback);
            });
        }else{
            obj.on('click', callback);
        }
    }

    addHideTriggers(trigger){
        if(Array.isArray(trigger)){
            trigger.forEach((currentObj)=>{
                this.triggerHideModal.push(currentObj);
            })
        }else{
            this.triggerHideModal.push(trigger);
        }
        this.addOnClick(trigger, () => this.modalHide());
    }

    modalShow(){
        this.modalWrapper.animate({top: '0vh'}, 500);
    }

    modalHide(){
        this.modalWrapper.animate({top: '-100dvh'}, 500);
    }
}

const menuModalTrigger = new modalWindow('.burger__menu');
const triggersMenuItems = () =>{
    menuModalTrigger.addHideTriggers($('.header__menu__items__box').find('.header__menu__item'));
}
triggersMenuItems();
});