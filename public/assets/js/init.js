



const remoteaddr="https://localhost/regist";


function openmodal(modal){
  $('.'+modal).addClass('active');
}

function closemodal(modal){
  $('.'+modal).removeClass('active');
}

$(function () {

  $('.modal-open').click(function (e) { 
    var modalname=$(this).data('modal');
    $('.'+modalname).addClass('active');
  });
  
  $('.modal-close').click(function (e) { 
    $(this).parents('.modal').removeClass('active');
  });
    

  jconfirm.defaults = {
    // title: 'Hello',
    typeAnimated: true,
    draggable: true,
    dragWindowGap: 15,
    dragWindowBorder: true,
    animateFromElement: true,
    smoothContent: true,
    bgOpacity: null,
    theme: 'material',
    animation: 'scale',
    closeAnimation: 'scale',
    animationSpeed: 400,
    animationBounce: 1,
    container: 'body',
    containerFluid: false,
    backgroundDismiss: true,
    backgroundDismissAnimation: 'shake',
    // autoClose: 5000,
    boxWidth: '50%',
    scrollToPreviousElement: true,
    scrollToPreviousElementAnimate: true,
    useBootstrap: false,
//    offsetTop: 40,
//    offsetBottom: 40,
};
});




function notify(text,alert='info',area='center'){

  var icon='';
switch (alert) {
  case 'success':icon='<i class="icon icon-emoji"></i>';break;
  case 'error':icon='<i class="icon icon-cross"></i>';break;
  case 'info':icon='<i class="icon icon-check"></i>';break;
  case 'warning':icon='<i class="icon icon-stop"></i>';break;
}

    notif({
      msg: icon+' '+text,
      type: alert,
      position: area,
      height:20,
      // autohide:true,
      opacity:0.8,
      // fade:true,
      time:100
    });

}