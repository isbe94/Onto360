/**
 * Created by isbel on 07/01/2016.
 */
/**
 * Created by isbel on 07/01/2016.
 */

function Noty(color,type, life,icon,title,message,position) {
    $.noty.closeAll();
    var animatedin='animated bounceInRight';
    var animatedout='animated bounceOutRight';
    var style='';
    if(position=='center')
    {
        style='margin-top:20px';
        animatedin='animated fadeIn';
        animatedout='animated fadeOut';
    }
    noty({
        theme: 'relax',
        text: '',
        template: '' +
        '<div style="background-color:'+color+';color: white ;border-color:'+color+'" class="alert media fade in ">' +
        '        <div class="media-left">' +
        '        <i class="'+icon+'" style="font-size: 50px;margin-top: 30px;"></i>' +
        '        </div>' +
        '        <div class="media-body width-100p">' +
        '        <h4 class="alert-title">'+title+'</h4>' +
        '        <p class="alert-message pull-left" style="'+style+'">'+message+'</p>' +
        '        </div>' +
        '</div>',
        type: type,
        maxVisible: 0,
        timeout: life,
        dismissQueue: true,
        layout: position,
        closeWith: ['button','click'],
        animation: {
            open: animatedin,
            close: animatedout,
        }
    });
}